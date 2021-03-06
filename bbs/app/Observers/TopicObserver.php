<?php

namespace App\Observers;

use App\Models\Topic;

use App\Handlers\SlugTranslateHandler;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function creating(Topic $topic)
    {
        //
    }

    public function updating(Topic $topic)
    {
        //
    }
    public function saving(Topic $topic)
    {
        $topic->excerpt = make_excerpt($topic->body);
        if(!$topic->slug){
            $topic->slug =app(SlugTranslateHandler::class)->translate($topic->title);

        }
    }
   
}