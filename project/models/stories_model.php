<?php

/**
 * Main application model, gets stories
 */
class stories_model {

    use b_model;

    /**
     * 
     * @param type $id
     * @return \stdClass
     * Gets all feeds+categories the user is subscribed to
     */
    public function getSubscribedFeeds($id, $readyFeeds = '') {
        if (!is_array($readyFeeds)) {
            $this->database->query('SELECT likings.cat_id,likings.type,likings.popularity,categories.name,categories.related_to FROM likings,categories WHERE user_id=' . $id . ' AND categories.id=likings.cat_id');

            $likes = $this->database->returnObject();
        } else {
            $likes = $readyFeeds;
        }
        foreach ($likes as $key => $like) {
            $q = $this->database->query('SELECT popularity FROM likings WHERE `cat_id`=' . $like->cat_id);
            $others = $this->database->returnObject();
            // var_dump($others);
            $collectivePop = 0;
            if (count($others) > 0) {
                foreach ($others as $other) {
                    $collectivePop = $collectivePop + $other->popularity;
                }
                $addition = $collectivePop / count($others) / 5; //5 times less affection
                $likes[$key]->popularity = $likes[$key]->popularity + $addition;
            }
            $this->database->query('SELECT * FROM feeds WHERE cat_id=' . $like->cat_id);
            $feeds[$like->cat_id] = $this->database->returnObject();
        }
        $return = new stdClass();
        $return->feeds = $feeds;
        $return->categories = $likes;
        return $return;
    }

    /**
     * 
     * @param type $categories
     * @return type
     * Gets all the popularity for the stories
     */
    public function getCollectivePopulation($categories) {
        $collectivePopularity = 0;
        foreach ($categories as $cat) {
            $collectivePopularity = $collectivePopularity + $cat->popularity;
        }
        return $collectivePopularity;
    }

    /**
     * 
     * @param type $collectivePopulation
     * @param type $storiesCount
     * @param type $categories
     * @return type
     * Gets how many stories per category should there be
     */
    public function getStoriesPerCategory($collectivePopulation, $storiesCount, $categories) {
        if ($collectivePopulation == 0) {

            $splitter = count($categories);
            $perCat = (int) $storiesCount / $splitter; //We don't want 12.5 stories, do we?
            foreach ($categories as $key => $value) {
                $categories[$key]->storyCount = $perCat;
            }
        } else {

            $multiplier = (int) $storiesCount / $collectivePopulation;
            // echo $multiplier;
            foreach ($categories as $key => $value) {
                $categories[$key]->storyCount = (int) $categories[$key]->popularity * $multiplier;

                if ($categories[$key]->storyCount == 0) {
                    $categories[$key]->storyCount++;
                }
            }
        }

        return $categories;
    }

    /**
     * 
     * @param type $url
     * @param type $rating
     * Writes a rating to the database
     */
    public function addRating($url, $rating) {
        $this->database->query('INSERT INTO ratings(url,rating,count)
            VALUES("' . $this->database->escape($url) . '",' . $rating . ',1) ON DUPLICATE KEY UPDATE rating=rating+' . $rating . ',count=count+1');
    }

    /**
     * 
     * @param type $categories
     * @param type $feeds
     *
     * @return type
     * Returns random stories from subscribed categories
     */
    public function getRandomStories($categories, $feeds, $userid, $recommended = false) {
        //This is used so we can return the value
        //  print_r($feeds);
        $this->loadModel('rssReader_model');
        $stories = array(); //To prevent a notice
        foreach ($categories as $cat) {
            $i = 0;
            while ($i < $cat->storyCount) {

                // print_r($cat);
                $i++;
                $randomFeed = $feeds[$cat->cat_id][array_rand($feeds[$cat->cat_id])]->link; //If this is not complicated, I don't know what is
                // print_r($randomFeed);
                //echo 'Choosing URL:'.$randomFeed;
                $this->rssReader_model->setUrl($randomFeed);
                $story = $this->rssReader_model->getRandom();
                if (is_object($story)) {
                    $story->cat_id = $cat->cat_id;
                    $story->rating = $this->getStoryRating($story->link);
                    if (isset($cat->name)) {
                        $story->cat_name = $cat->name;
                    }
                    if ($recommended == true) {

                        $story->is_recommended = true;
                    }
                    //Don't show a story user has already read
                    $this->database->query('SELECT id FROM clicks WHERE user_id=' . $userid . ' AND url="' . $this->database->escape($story->link) . '" AND time>' . time() - 7200);
                    //Stops repeating stories
                    if (in_array($story, $stories) && $this->database->getRows() < 1) {
                        $i--;
                    } else {
                        $stories[] = $story;
                    }
                } else {
                    $i--;
                }
            }
        }

        shuffle($stories);
        return $stories;
    }

    /**
     * 
     * @param type $link
     * @return int
     * Returns a story's rating
     */
    private function getStoryRating($link) {
        $this->database->query('SELECT * FROM ratings WHERE url="' . $this->database->escape($link) . '"');
        if ($this->database->getRows() != 0) {
            $object = $this->database->returnObject()[0];
            return $object->rating / $object->count;
        } else {
            return 0;
        }
    }

    /**
     * 
     * @param type $categories
     * @param type $feeds
     * @param type $recommended
     * @return type
     * Gets the newest stories
     */
    public function getNewestStories($categories, $feeds, $recommended = false) {

        $this->loadModel('rssReader_model');
        $stories = array(); //To prevent a notice
        foreach ($categories as $cat) {
            $i = 0;
            while ($i < $cat->storyCount) {
                $i++;
                //We are still picking random feeds :)
                $randomFeed = $feeds[$cat->cat_id][array_rand($feeds[$cat->cat_id])]->link;
                $this->rssReader_model->setUrl($randomFeed);
                $stories_cat = $this->rssReader_model->getFirstNews(3);
                $increase = 0;
                foreach ($stories_cat as $story) {
                    if (is_object($story)) {

                        $increase++;
                        $story->rating = $this->getStoryRating($story->link);

                        $story->cat_id = $cat->cat_id;
                        if ($recommended == true) {

                            $story->is_recommended = true;
                        }
                        $stories[] = $story;
                    }
                }
                $i = $i + $increase;
            }
        }
        shuffle($stories);
        $stories = array_unique($stories);
        return $stories;
    }

    /**
     * 
     * @param type $categories
     * @param type $id
     * @return \stdClass
     * Returns recommended categoreis based on likes
     */
    public function getSuggestedCategories($categories, $id) {
        $recommended = array();
        foreach ($categories as $cat) {
            $exploded = explode(',', $cat->related_to);
            $recommended = array_merge($recommended, $exploded);
        }
        $clear_recommended = array_unique($recommended);
        $this->database->query('SELECT `cat_id` FROM `likings` WHERE `user_id`=' . $id . ' AND (`type`=0 OR `type`=1)');
        $unlike = $this->database->returnObject();
        $unlike_cats = array(); //We aren't like cats

        foreach ($unlike as $entry) {
            $unlike_cats[] = $entry->cat_id;
        }
        /**
         * We have to convert it into an array and back
         * so we can do the following
         */
        $should_display = array_diff($clear_recommended, $unlike_cats);
        $return = array();
        //likings.cat_id,likings.type,likings.popularity,categories.name,categories.related_to
        foreach ($should_display as $key => $entry) {
            $return[$key] = new stdClass();
            $return[$key]->cat_id = $entry;
            $return[$key]->popularity = 1; //Minimum popularity for recommendations
            $return[$key]->type = 2;
        }
        return $return;
    }

}