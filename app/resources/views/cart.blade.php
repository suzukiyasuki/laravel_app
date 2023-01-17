@extends('layouts.app')

@section('content')
<main class="container mt-5">
    <div class="justify-content-center ">
        <div class="card center-block">
            <div class="row">
                <div class="d-flex justify-content-center col">
                    <a href="">#</a>
                </div>
                <div class="d-flex justify-content-center col">
                    <p>追加した商品表示</p>
                </div>
                <div class="d-flex justify-content-center col">
                    <a href="">取り消し</a>
                </div>
            </div>
        </div>
            <div class="d-flex justify-content-center">
                <div class="d-flex justify-content-center col">
                    <button type="button" class="btn btn-secondary">戻る</button>
                </div>
                <div class="d-flex justify-content-center col">
                    <button type="button" class="btn btn-danger">購入</button>
                </div>
            </div>
    </div>
</main>


@endsection