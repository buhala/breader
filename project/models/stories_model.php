<?php
class stories_model extends b_model{
    public function getSubscribedFeeds($id){
        $this->database->query('SELECT likings.cat_id,likings.type,likings.popularity,categories.name,categories.related_to FROM likings,categories WHERE user_id='.$id.' AND categories.id=likings.cat_id');
        $likes=$this->database->returnObject();
        foreach($likes as $like){
            $this->database->query('SELECT * FROM feeds WHERE cat_id='.$like->cat_id);
            $feeds[]=$this->database->returnObject();
        }
        $return=new stdClass();
        $return->feeds=$feeds;
        $return->categories=$likes;
        return $return;
        
    }
    public function getCollectivePopulation($categories){
        $collectivePopularity=0;
        foreach($categories as $cat){
            $collectivePopularity=$collectivePopularity+$cat->popularity;
        }
        return $collectivePopularity;
    }
    public function getStoriesPerCategory($collectivePopulation,$storiesCount,$categories){
        if($collectivePopulation==0){
            $splitter=count($categories);
            $perCat=(int)$storiesCount/$splitter; //We don't want 12.5 stories, do we?
            foreach($categories as $key=>$value){
                $categories[$key]->storyCount=$perCat;
            }
        }
        else{
            $multiplier=(int)$collectivePopulation/$storiesCount;
            foreach($categories as $key=>$value){
                $categories[$key]->storyCount=(int)$categories->popularity*$multiplier;
                if($categories[$key]->storyCount==0){
                    $categories[$key]->storyCount++;
                }
            }
            
            
            
        }
            return $categories;
    }
}