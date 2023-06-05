<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(Request $request)
    {
       //クエリ生成
    $query = User::query();
    // $query ->where('users.role', 'active');    
// 全件取得 +ページネーション
    $users = $query->orderBy('updated_at','desc')->paginate(5);
    return view('user.index')->with('users',$users);
    }


    //編集画面
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

    
    //データを削除
    public function delete($id){
        User::find($id)->delete();
        return redirect('/user');
    }

  

     public function register(){
        return view('user.register');
    }

    //foamに入力されたデータを保存
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|min:1',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            
        ]);

        $user->save();

        return redirect('/user');
}

 // ログアウト処理
 public function logout()
 {
     Auth::logout();
     return redirect('/');
 }



}