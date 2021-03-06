<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;

class CategoriesController extends Controller
{

	 public function show(Category $category,Request $request ,Topic $topic)
	 {
  //读取分类ID关联的话题
	 	$topics = $topic->withOrder($request->order)
	 	->where('category_id',$category->id)
	 	->paginate(20);
	 	//传递参数到模板
	 	return view('topics.index',compact('topics','category'));

	 }
    //
}
