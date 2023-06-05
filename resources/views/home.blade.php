@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1><small>商品検索・詳細画面</small></h1>
@stop

@section('content')
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
    
    <div class="table-responsive">
        <table class="table text-nowrap">
           <tr class="table-info">
             <th scope="col" width="10%">商品番号</th>
             <th scope="col" width="15%">商品名</th>
             <th scope="col" width="30%">カテゴリー</th>
             <th scope="col" width="15%">更新日時</th>
             <th scope="col" width="30%" colspan="3">詳細情報</th>
           </tr>
    
    @foreach($items as $item)
    
              <tr>
              
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->name}}</td>
               <!-- typeを品目名に変換して表示-->
              <td>{{ $item->type == 1 ? "トップス" : ($item->type == 2 ? "ボトムス" : ( $item->type == 3 ? "アウター" : ($item->type == 4 ? "インナー" : ( $item->type == 5 ? "アクセサリー" : "その他" ))))}}</td>
              <td>{{$item->updated_at}}</td>
              <td><a href="detail/{{$item->id}}"><button type="button" class="btn btn-success">詳細</button></a></td>
             </tr>
    @endforeach
        </table>
    </div>
           <!--/テーブル-->
    
    
      <!--ページネーション-->
    <!-- ページネーション: appendsでパラメータを指定する -->
      {{ $items->appends(request()->query())->links('pagination::bootstrap-4') }}
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

@if (session('error'))
  <div class="alert alert-danger">
      {{ session('error') }}
  </div>
@endif




