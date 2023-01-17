@extends('layouts.app')

@section('content')
<div class="container d-flex">
    <aside class="sticky mr-3 h-75">
        <div class="clearfit" >
            <div class="input-group mt-5">
                <input type="text" class="form-control " placeholder="キーワードを入力">
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
            <div class="mt-5">
                <button type="button" class="btn btn-outline-secondary">いいねした商品のみ表示</button>
            </div>
            <div class="mt-5">
                <button type="button" class="btn btn-outline-secondary">カート内</button>
            </div>
        </div>
    </aside>
    <main class="justify-content-around border-left ml-3 pl-5">
        <div class="clearfit">
            <div class="">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">商品名</h5>
                        <p class="card-text">商品情報</p>
                        <a href="#" class="btn btn-primary">カートに追加</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfit">
            <div class="">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">商品名</h5>
                        <p class="card-text">商品情報</p>
                        <a href="#" class="btn btn-primary">カートに追加</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfit">
            <div class="">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">商品名</h5>
                        <p class="card-text">商品情報</p>
                        <a href="#" class="btn btn-primary">カートに追加</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfit">
            <div class="">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">商品名</h5>
                        <p class="card-text">商品情報</p>
                        <a href="#" class="btn btn-primary">カートに追加</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfit">
            <div class="">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">商品名</h5>
                        <p class="card-text">商品情報</p>
                        <a href="#" class="btn btn-primary">カートに追加</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfit">
            <div class="">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">商品名</h5>
                        <p class="card-text">商品情報</p>
                        <a href="#" class="btn btn-primary">カートに追加</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<footer class="footer">
  <div class="container">
    <p class="text-muted">Place sticky footer content here.</p>
  </div>
</footer>

@endsection
