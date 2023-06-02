@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1><small>商品マスタ画面</small></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品マスタ</h3>
                      <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-warning btn-lg">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>種別№</th>
                                <th>種別</th>
                                <th>更新日時</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->type }}</td>
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
    </div>

     @stop

@section('css')
@stop

@section('js')
@stop
