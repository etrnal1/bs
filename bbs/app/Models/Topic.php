<?php

namespace App\Models;

class Topic extends Model
{
    protected $fillable = ['title', 'body',  'category_id',    'excerpt', 'slug'];


/**
 * [scopeWithOrder description]不同的排序，使用不同的数据读取逻辑
 * @param  [type] $query [description]
 * @param  [type] $order [description]
 * @return [type]        [description]
 */
    public function  scopeWithOrder($query,$order)
    {
    		
    		  switch ($order) {
            case 'recent':
                $query->recent();
                break;

            default:
                $query->recentReplied();
                break;
        }
        // 预加载防止 N+1 问题
        return $query->with('user', 'category');

    }
     public  function  scopeRecentReplied($query)
     {

     	//当话题有新回复时,我们将编写逻辑更新话题模型的reply_count 模型
     	return $query->orderby('created_at','desc');
     }





    public function category()
    {
    	return  $this->belongsTo(Category::class);

    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
