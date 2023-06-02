@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><small>ユーザー管理画面</small></h1>
@stop

@section('content')

    <!-- タスク一覧表示 -->
                            @if (count($users) > 0)
 
<div class="table-responsive">
    <table class="table text-nowrap">
       <tr class="table-info">
                                <th scope="col" width="10%">登録ID</th>
                                <th scope="col" width="15%">名前</th>
                                <th scope="col" width="30%">権限</th>
                                <th scope="col" width="15%">メールアドレス</th>
                                <th scope="col" width="30%">登録日時</th>
                                <th scope="col" width="15%">更新日時</th>
                                <th></th>
                                <th></th>
                            </tr>
                        
        <tr>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>@if($user->role==0) 一般 @elseif($user->role==1) 管理者 @endif</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td><a href="/user/edit/{{$user->id}}" class="btn btn-info"> >>編集</td>
                            <td>
                        </tr>
 
                    <td>
                    </td>
                </tr>
                        @endforeach
            </tbody>
                    </table>
</div>
@endif

@if (session('message'))
    <div class="alert alert-info">
        {{ session('message') }}

    </div>
@endif
@stop