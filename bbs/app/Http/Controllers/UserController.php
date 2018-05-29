<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
class UserController extends Controller
{
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
        
        echo  '<pre>';
        var_dump($user);

        echo '</pre>';
        exit();
        $user->update($request->all());

        var_dump($user);
        exit();
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }
}