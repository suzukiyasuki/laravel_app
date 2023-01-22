@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">編集</div>

                <div class="card-body">
                    <form method="post" action="/items/{{ $item->id }}" enctype='multipart/form-data'>
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">商品名</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $item->name }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-xs-5">
                                <label for="" class="form-label">カテゴリ</label>
                                <select type="size" name='category_id' class='form-control'>
                                    @foreach($categories as $category)
                                    @if($item->category_id == $category['id'])
                                    <option value="{{ $category['id'] }}" selected>{{ $category['name'] }}</option>
                                    @else
                                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">商品情報</label>
                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control" name="text" value="{{ $item->text }}" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-xs-5">
                                <label for="" class="form-label">サイズ</label>
                                <select name="size" class="form-control">
                                    @foreach(SizeListConst::SIZE_LIST as $key => $value)
                                    @if($key == $item['size'])
                                    <option value="{{ $key }}" selected>{{ $value }}</option>
                                    @else
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">金額</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="amount" class="form-control" name="amount" value="{{ $item->amount }}" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('写真') }}</label>
                            <img class="h-50" src="{{ asset('storage/' . $item->image) }}">
                            <div class="col-md-6">
                                <input id="" type="file" class="form-control" name="image" accept=".png, .jpg, .jpeg, .HEIC" value="">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('登録') }}
                                </button>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('キャンセル') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection