<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Pagination\Paginator;
use Mockery\Matcher\Type;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }


    /**
 * 一覧表示
 */

//  キーワード検索

public function index(Request $rq)
{
    //キーワード受け取り
    $keyword = $rq->input('keyword');     //フリーキーワード検索
   

    //クエリ生成
    $query = Item::query();

    //もしキーワードがあったら
    if(!empty($keyword))
    {
        $query->where('id','like','%'.$keyword.'%');
        $query->orWhere('name','like','%'.$keyword.'%');
        $query->orWhere('type','like','%'.$keyword.'%');
        // $query->orWhere('updated_at','like','%'.$keyword.'%');
    }
    $type=$rq->input('type');   //プルダウン検索（カテゴリー）

    //もしプルダウンがあったら
    if(!empty($type))
    {
        $query->where('type',$type);
        
    }
       // 全件取得 +ページネーション
       $items = $query->orderBy('updated_at','desc')->paginate(5);
       return view('home')->with('items',$items)->with('keyword',$keyword);
    }

   }

