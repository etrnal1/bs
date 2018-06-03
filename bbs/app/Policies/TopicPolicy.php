<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Topic;

class TopicPolicy extends Policy
{
    public function update(User $user, Topic $topic)
    {

    	//当作者的id 等于关联作者的id的时候 才允许登录
         return $topic->user_id == $user->id;
        //return true;
    }

    public function destroy(User $user, Topic $topic)
    {
        return true;
    }
}
