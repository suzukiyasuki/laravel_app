@extends('layouts.app')

@section('content')
<main class="justify-content-center row mt-3">
    <form>
    <div class="row">
    <div class="mb-3 col-xs-5">
        <label for="" class="form-label">商品名</label>
        <input type="email" class="form-control" id="" aria-describedby="emailHelp">
    </div>
</div>
<div class="row">
    <div class="mb-3 col-xs-5">
        <label for="" class="form-label">カテゴリ</label>
        <input type="password" class="form-control" id="">
    </div>
</div>
<div class="row">
    <div class="mb-3 col-xs-5">
        <label for="" class="form-label">商品情報</label>
        <input type="password" class="form-control" id="">
    </div>
</div>
<div class="row">

    <div class="mb-3 col-xs-5">
        <label for="" class="form-label">金額</label>
        <input type="password" class="form-control" id="">
    </div>
</div>
<div class="row">
    <div class="mb-3 col-xs-5">
        <img src="..." class="img-thumbnail" alt="...">写真追加
    </div>
</div>
<div class="row">
    </form>
        <div class="mb-3 col-xs-3">
            <button type="button" class="btn btn-outline-danger">追加</button>
        </div>
</div>
</main>

@endsection