@extends('adminlte::page')

@section('title', '商品マスタ')

@section('content_header')
    <h1><small>商品マスタ画面</small></h1>

    <!-- 検索フォーム -->
<div class="container mt-5">
    <form method="get" action="" class="form-inline" >
    <div class="row mb-3"> 
    <div class="col-5">
        <input type="text" name="keyword" class="form-control" value="" placeholder="検索キーワード" aria-label="検索キーワード" aria-describedby="basic-addon1">
    </div>
    <div class="col-4 input-group">
              <select name="type" class="form-control" id="rank" >
          
          <option selected>カテゴリー選択</option>
                <option value="1">トップス</option>
                <option value="2">ボトムス</option>
                <option value="3">アウター</option>
                <option value="4">インナー</option>
                <option value="5">アクセサリー</option>
                <option value="6">その他</option>
        </select>
        <button type="submit"  class="btn btn-info btn-outline-secondary" style="color:white; "  >検索</button>
            
    </div>
        <div class="col-3" ><a href="/" class="btn btn-info" style="color:white; " >リセット</a></div> 
    
    </div> 
    </form>
</div>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-warning btn-lg">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                       <tr class="table-info">
                                <th>商品番号</th>
                                <th>商品名</th>
                                <th>カテゴリー</th>
                                <th>更新日時</th>
                                <th></th>
                                <th></th>
                            </tr>
                        
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->type == 1 ? "トップス" : ($item->type == 2 ? "ボトムス" : ( $item->type == 3 ? "アウター" : ($item->type == 4 ? "インナー" : ( $item->type == 5 ? "アクセサリー" : "その他" ))))}}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td><a href="detail/{{$item->id}}"><button type="button" class="btn btn-success">詳細</button></a></td>
                                    <td><a href="items/edit/{{$item->id}}"><button type="button" class="btn btn-primary">編集 / 削除</button></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                            <!-- ページネーション: appendsでパラメータを指定する -->
                            {{ $items->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                </div>
            </div>
        </div>


     @stop

@section('css')
@stop

@section('js')
@stop
