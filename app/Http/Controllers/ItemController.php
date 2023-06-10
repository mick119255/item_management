<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
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
     * 商品一覧
     */
    public function index()
{

    //クエリ生成
    $query = Item::query();
    $query ->where('items.status', 'active');
        
      // 全件取得 +ページネーション
     $items = $query->orderBy('updated_at','desc')->paginate(10);
     return view('item.index')->with('items',$items);


    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

        return redirect('/items');
        }

        return view('item.add');
    }


        /**
    * 詳細画面
    */
   public function detail($id)
   {
       $item = Item::findOrFail($id);
       return view('item.detail')->with('item',$item);
   }
   
 

 /**
     * 編集画面（入力）
     */
    public function edit_index($id)
    {
        $item = \App\Models\Item::findOrFail($id);
        return view('item.edit_index')->with('item',$item);
    }

    // /**
    //  * 編集画面（確認）
    //  */
    // public function edit_confirm(\App\Http\Requests\ValiCrudRequest $req)
    // {
    //     $data = $req->all();
    //     return view('item.edit_confirm')->with($data);
    // }

    /**
     * 編集画面（完了）
     */
    public function edit_finish(Request $request, $id)
    {
        //該当レコードを抽出
        $item = \App\Models\Item::findOrFail($id);

        //値を代入
        $item->name = $request->name;
        $item->email = $request->email;
        $item->tel = $request->tel;
        $item->message = $request->message;

        //保存（更新）
        $item->save();

        //リダイレクト
        return redirect()->to('item/index');
    }

/**
 * 削除
 */
public function us_delete($id)
{
    // 削除対象レコードを検索
    $item = \App\Models\Item::find($id);
    // 削除
    $item->delete();
    // リダイレクト
    return redirect()->to('item/index')->with('home');
}

public function store(Request $request)
{
$item = new Item();
$item->name = $request->name;
$item->type = $request->type;
$item->detail = $request->detail;
// $item->user_id = 1;
$item->user_id = Auth::id();

$item->save();

return redirect()
    ->route('items');
}
public function edit(Item $item)
{

return view('item.edit')
    ->with(['item' => $item]);
}
public function update(Request $request, Item $item)
{

$item->name = $request->name;
$item->type = $request->type;
$item->detail = $request->detail;
$item->save();

return redirect()
    ->route('items');
}

public function destroy(Item $item)
{
$item->delete();
return redirect()
    ->route('items');
}

}
