@extends('layouts.app')

@section('content')

<div class="d-flex">
    <aside class="sticky ml-3 h-75 w-50">
        <div class="clearfit" >
            <div class="input-group mt-5">
                <input type="text" class="form-control col-md-10" placeholder="キーワードを入力">
                <button class="btn btn-outline-success" type="button" id="button-addon2"><i class="fas fa-search"></i> 検索</button>
            </div>
            <div class="mt-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">カテゴリー１</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">カテゴリー２</label>
                </div>
                <button class="btn btn-outline-success" type="button" id="button-addon2"><i class="fas fa-search"></i> 検索</button>
            </div>
            <div class="row justify-content-around mt-2">
                <a href="/items/create" class="btn btn-outline-secondary">商品投稿</a>
            </div>
            <div class="mt-5">
                <button type="button" class="btn btn-outline-secondary">カート内</button>
            </div>
        </div>
    </aside>
    <main class="justify-content-around border-left ml-3 mt-3 pl-5">
        <div class="clearfit mt-3">
            <div class="d-flex justify-content-around flex-wrap mt-3">
                @foreach($items as $item)
                <div class="card" style="width: 18rem;">
                <img src="{{ asset('images'. $item['image']) }}">
                <!-- docker-env/app/storage/app/public/images
                docker-env/app/resources/views/top.blade.php -->
                    <div class="card-body">
                        <h5 class="card-title">{{ $item['name'] }}</h5>
                        <p class="card-text">{{ $item['text'] }}</p>
                        <div class="row justify-content-around mt-2">
                            <a href="/items" class="btn btn-primary">商品の詳細</a>
                            <a href="#" class="btn btn-primary">カートに追加</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</div>
<footer class="footer">
  <div class="container">
    <p class="text-muted">Place sticky footer content here.</p>
  </div>
</footer>

    <div><a href="/item_detail">商品の詳細</a></div>
    <div><a href="/top_login">ログイン後のトップ</a></div>
    <div><a href="/like">いいねした商品のみ表示</a></div>
    <div><a href="/cart">カート</a></div>
    <div><a href="/complete">購入完了画面</a></div>
    
    <div><a href="/management">管理者ページ</a></div>
    <div><a href="/management_user">管理者専用ユーザーページ</a></div>


@endsection