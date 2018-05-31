<?php

namespace App\Http\Controllers;
use APP\Handlers\ImageUploadHandler;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>['show']]);
    }
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    public function update(UserRequest $request, User $user)
    {
       
      // exit();
      // 
       $data =$request->all();
      // if($request->avatar){
      //   $result =$uploader->save($request->avatar,'avatars',$user->id);
      //   if($result){
      //       $data['avatar']  = $result['path'];

      //   }

      // }

      
        $user->update($data);

        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }
}