@extends('adminlte::page')
@section('content')

        <h1><small>ユーザー管理(管理者のみ)</small></h1>
        <form method="post" action="{{ route('user.update',$user) }}">
            @method('post')
            @csrf

            
            <div class="form-group">
                <p> </p>
                <p> ユーザーID: {{$user->id}} </p>
                <p> 登録日時: {{$user->created_at}} </p>
                <p> 更新日時: {{$user->updated_at}} </p>
            <div>
            <label>
               氏名 <span class="badge rounded-pill bg-danger">{{ __('必須') }}</span>
            <input class="form-control" placeholder="氏名" type="text" name="name" value="{{ old('name', $user->name) }}">
            </label></div>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
            <div><label>
                権限 <span class="badge rounded-pill bg-danger">{{ __('必須') }}</span>
             <input class="form-control" placeholder="権限" type="Integer" name="role" value="{{ old('role', $user->role) }}">
             </label></div>
             @error('role')
                 <div class="error">{{ $message }}</div>
             @enderror

             <div><label>
                メールアドレス <span class="badge rounded-pill bg-danger">{{ __('必須') }}</span>
            <input class="form-control" placeholder="email" type="email" name="email" value="{{ old('email', $user->email) }}">
            </label></div>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
  
        </form>

            <div class="form-button">
                <button class="btn btn-success button-update">更新</button>
                <button type="button" id="delete_button" class="btn btn-danger button-delete">削除</button>
                <a id="btn--back" class="btn btn-primary button-back"> 戻る</a>
            </div>
        </form>
        <form id="delete_post" method="post" action="{{ route('delete', $user)}}">
          @csrf
         </form>

            <script>
                'use strict';
                {
                    document.getElementById('delete_button').addEventListener('click', e => {
                        e.preventDefault();
                        if (!confirm('本当に削除してもよろしいですか?')) {
                            return;
                        }
                        document.getElementById('delete_post').submit();
                    });
                }
                // 戻るボタン
                const back = document.getElementById('btn--back');
                back.addEventListener('click', (e) => { history.back(); return false; });
             </script>

@endsection