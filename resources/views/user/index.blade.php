@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><small>ユーザー管理画面</small></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('/user/register') }}" class="btn btn-warning btn-lg">ユーザー登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                       <tr class="table-info">
                                <th scope="col" width="10%">登録ID</th>
                                <th scope="col" width="25%">名前</th>
                                <th scope="col" width="10%">権限</th>
                                <th scope="col" width="25%">メールアドレス</th>
                                <th scope="col" width="20%">登録日時</th>
                                <th scope="col" width="20%">更新日時</th>
                                <th></th>
                                <th></th>
                        </tr>
                        
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>@if($user->role==0) 一般 @elseif($user->role==1) 管理者 @endif</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td><a href="/user/edit/{{$user->id}}" class="btn btn-info"> >>編集//削除<<</td>
                        </tr>
                        @endforeach
            </tbody>
                    </table>
                     <!-- ページネーション: appendsでパラメータを指定する -->
                     {{ $users->appends(request()->query())->links('pagination::bootstrap-4') }}

                    </div>
                        @if (session('message'))
                            <div class="alert alert-info">
                             {{ session('message') }}

                    </div>
                        @endif
            </div>
        </div>
    </div>

@stop
@section('css')
@stop

@section('js')
@stop