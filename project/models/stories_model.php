<?php
/**
 * Main application model, gets stories
 */
class stories_model extends b_model{
    /**
     * 
     * @param type $id
     * @return \stdClass
     * Gets all feeds+categories the user is subscribed to
     */
    public function getSubscribedFeeds($id){
        $this->database->query('SELECT likings.cat_id,likings.type,likings.popularity,categories.name,categories.related_to FROM likings,categories WHERE user_id='.$id.' AND categories.id=likings.cat_id');
        $likes=$this->database->returnObject();
        foreach($likes as $like){
            $this->database->query('SELECT * FROM feeds WHERE cat_id='.$like->cat_id);
            $feeds[$like->cat_id]=$this->database->returnObject();
        }
        $return=new stdClass();
        $return->feeds=$feeds;
        $return->categories=$likes;
        return $return;
        
    }
    /**
     * 
     * @param type $categories
     * @return type
     * Gets all the popularity for the stories
     */
    public function getCollectivePopulation($categories){
        $collectivePopularity=0;
        foreach($categories as $cat){
            $collectivePopularity=$collectivePopularity+$cat->popularity;
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
    public function getStoriesPerCategory($collectivePopulation,$storiesCount,$categories){
        if($collectivePopulation==0){
            $splitter=count($categories);
            $perCat=(int)$storiesCount/$splitter; //We don't want 12.5 stories, do we?
            foreach($categories as $key=>$value){
                $categories[$key]->storyCount=$perCat;
            }
        }
        else{
            $multiplier=(int)$storiesCount/$collectivePopulation;
           // echo $multiplier;
            foreach($categories as $key=>$value){
                $categories[$key]->storyCount=(int)$categories[$key]->popularity*$multiplier;
                
                if($categories[$key]->storyCount==0){
                    $categories[$key]->storyCount++;
                    
                }
            }
            
            
            
        }
       // var_dump($categories);
            return $categories;
    }
    
    public function getRandomStories($categories,$feeds){
      //  print_r($feeds);
        $this->loadModel('rssReader_model');
        foreach($categories as $cat){
            $i=0;
            while($i<$cat->storyCount){
               // print_r($cat);
                $i++;
                $randomFeed=$feeds[$cat->cat_id][array_rand($feeds[$cat->cat_id])]->link; //If this is not complicated, I don't know what is
               // print_r($randomFeed);
                //echo 'Choosing URL:'.$randomFeed;
                $this->rssReader_model->setUrl($randomFeed);
                $story=$this->rssReader_model->getRandom();
                $stories[]=$story;
            }
        }
        shuffle($stories);
        return $stories;
    }
}