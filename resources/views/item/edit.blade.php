@extends('adminlte::page')
@section('content')

        <h1><small>商品編集･削除画面</small></h1>
        <form method="post" action="{{ route('items.update',$item) }}">
            @method('PATCH')
            @csrf

            <div class="form-group">
                <p> </p>
                <p> 商品番号: {{$item->id}} </p>
                <p> 登録日時: {{$item->created_at}} </p>
                <p> 更新日時: {{$item->updated_at}} </p>
            
            <div class="form-group"><label>
                    商品名 <span class="badge rounded-pill bg-danger">{{ __('必須') }}</span>
                    <input class="form-control" placeholder="商品名" type="text" name="name" value="{{ old('name', $item->name) }}">
                </label></div>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>    

            <div class="form-group">
                
                <label for="type">{{ __('カテゴリー') }}<span class="badge rounded-pill bg-danger">{{ __('必須') }}</span></label>
                <div class="row">
                    <div class="col-xs-5">
                <select class="form-control" id="type" name="type">>
                 <option value=""> -  カテゴリー </option>
                <option value="1" @if(old('type',$item->type) == '1') selected @endif >1.トップス</option>
                <option value="2" @if(old('type',$item->type) == '2') selected @endif >2.ボトムス</option>
                <option value="3" @if(old('type',$item->type) == '3') selected @endif >3.アウター</option>
                <option value="4" @if(old('type',$item->type) == '4') selected @endif >4.インナー</option>
                <option value="5" @if(old('type',$item->type) == '5') selected @endif >5.アクセサリー</option>
                <option value="6" @if(old('type',$item->type) == '6') selected @endif >6.その他</option>
                 </select>
                @error('type')
                <div class="error">{{ $message }}</div>
                 @enderror
                </div>
            </div>
        </div>    


            <div class="form-group">
                <label class="VareDetails">
                    商品詳細 <span class="badge rounded-pill bg-danger">{{ __('必須') }}</span>
                </label>
                <div class="row">
                    <div class="col-5">
                    <textarea class="form-control" placeholder="商品詳細" name="detail" rows="5">{{ old('detail', $item->detail) }}</textarea>
                    @error('detail')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
            <div class="form-button">
                <button class="btn btn-success button-update">更新</button>
                <button type="button" id="delete_button" class="btn btn-danger button-delete">削除</button>
                {{-- <a href="{{ route('items') }}" class="btn btn-warning button-back"> 戻る</a> --}}
                <a class="btn btn-primary" href="{{ route('items') }}">戻る</a>
      
            </div>
        </form>
        <form id="delete_post" method="post" action="{{ route('items.destroy', $item)}}">
            @method('DELETE')
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