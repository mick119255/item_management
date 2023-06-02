<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index(Request $request)
    {
       //クエリ生成
    $query = User::query();
    $query ->where('users.role', 'active');    
// 全件取得 +ページネーション
    $users = $query->orderBy('updated_at','desc')->paginate(5);
    return view('user.index')->with('users',$users);
    }


    public function edit(Request $request)
    {
        $user=User::find($request->id);
        return view('user.edit',[
            'user' =>$user,
        ]);
    }

    public function update(Request $request){
        //データを更新 
        //dd($request);
        $user=User::find($request->id);
        $user->name =$request->name;
        $user->role =$request->role;
        $user->email =$request->email;
        $user->save();

        return redirect('/user');
    }
    public function delete($id){
        User::find($id)->delete();
        return redirect('/user')->with('message','削除しました。');
    }



}

