@extends('layouts.app')

@section('content')
@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error )
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<main class="justify-content-center row mt-3">
    <form action="{{ route('items.store') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <div class="row">
            <div class="mb-3 col-xs-5">
                <label for="" class="form-label">商品名</label>
                <input name="name" type="name" class="form-control" id="" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-xs-5">
                <label for="" class="form-label">金額</label>
                <input name="amount" type="amount" class="form-control" id="">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-xs-5">
                <label for="" class="form-label">サイズ</label>
                <select name="size" class="form-control">
                    @foreach(SizeListConst::SIZE_LIST as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-xs-5">
                <label for="" class="form-label">カテゴリ</label>
                <select type="size" name='category_id' class='form-control'>
                    <option value='' hidden>カテゴリ</option>
                    @foreach($categories as $category)
                    <option value="{{ $category['id']}}">{{ $category['name'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-xs-5">
                <label for="" class="form-label">商品情報</label>
                <input name="text" type="text" class="form-control" id="">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-xs-5">
                <label for="" class="form-label d-block">写真を追加</label>
                <input type="file" name="image" accept=".png, .jpg, .jpeg, .HEIC">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-xs-3">
                <button type="submit" class="btn btn-outline-danger">追加</button>
            </div>
        </div>
    </form>
</main>

@endsection