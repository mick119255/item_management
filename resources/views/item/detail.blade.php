@extends('adminlte::page')
@section('content')
 <div class="page-header" >
  <h1><small>商品詳細画面</small></h1>
  </div>

<!--ヘッダー-->
<!-- nav.blade.phpのテンプレート利用 -->

<!--フォーム-->
<div class="container mt-5 p-lg-5">
<form action="" method="post">

    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{$item->id}}">
    <input type="hidden" name="name" value="{{$item->name}}">
    <input type="hidden" name="type" value="{{$item->type}}">
    <input type="hidden" name="detail" value="{{$item->detail}}">
    <input type="hidden" name="created_at" value="{{$item->created_at}}">
    <input type="hidden" name="updated_at" value="{{$item->updated_at}}">
    
    <!--商品番号-->
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">商品番号</label>
        <div class="col-sm-10">{{$item->id}}</div>
    </div>
     
    <!--商品名-->
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">商品名</label>
        <div class="col-sm-10">{{$item->name}}</div>
    </div>

    <!--type-->
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">カテゴリー</label>
        <div class="col-sm-10">{{ $item->type == 1 ? "トップス" : ($item->type == 2 ? "ボトムス" : ( $item->type == 3 ? "アウター" : ($item->type == 4 ? "インナー" : ( $item->type == 5 ? "アクセサリー" : "その他" ))))}}</td></div>
    </div>

    
    <!--商品詳細-->
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">商品詳細</label>
        <div class="col-sm-10">{!! nl2br(e( $item->detail )) !!}</div>
    </div>

     <!--登録日時-->
     <div class="form-group row">
        <label class="col-sm-2 col-form-label">登録日時</label>
        <div class="col-sm-10">{{$item->created_at}}</div>
    </div>


  <!--更新日時-->
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">更新日時</label>
    <div class="col-sm-10">{{$item->updated_at}}</div>
</div>


    <!--ボタンブロック-->
      <div class="row">
        <div class="col-md">
    <div class="form-group row mt-5">
        <div class="col-sm-12">
            <button type="button" class="btn btn-primary" onclick="history.back()">戻る</button>
        </div>
    </div>
    <!--/ボタンブロック-->
        </form>
    <!--/フォーム-->

@endsection