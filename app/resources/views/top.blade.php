@extends('layouts.app')

@section('content')

<div class="d-flex">
    <aside class="sticky ml-3 h-75 w-25">
        <div class="clearfit">
            <form action="/top" method="GET">
                <div class="input-group mt-5">
                    <input type="text" name="keyword" class="form-control col-md-10" placeholder="キーワードを入力">
                    <button class="btn btn-outline-success" type="submit" id="button-addon2"><i class="fas fa-search"></i> 検索</button>
                </div>
                <div class="mt-3">
                    @foreach($categories as $category)
                    <div class="form-check">
                        <input class="form-check-input" name="category" type="checkbox" value="{{ $category->id }}" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">{{ $category->name }}</label>
                    </div>
                    @endforeach
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
                <div class="mt-5">
                    <a href="/cart" class="btn btn-outline-secondary">カート内</a>
                </div>
            </form>
        </div>
    </aside>
    <main class="justify-content-around border-left ml-3 mt-3 pl-5">
        <div class="clearfit mt-3">
            <div class="d-flex justify-content-around flex-wrap m-4">
                @foreach($items as $item)
                <div class="card mt-3" style="width: 18rem;">
                    <img class="h-50" src="{{ asset('storage/' . $item['image']) }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item['name'] }}</h5>
                        <p class="card-text">{{ $item['text'] }}</p>
                        @auth
                        @if(isset($item->like[0]))
                        <a class="toggle_wish" item_id="{{ $item['id']}}" like="1">
                            <i class="fas fa-heart"></i>
                        </a>
                        @else
                        <a class="toggle_wish" item_id="{{ $item['id'] }}" like="0">
                            <i class="far fa-heart"></i>
                        </a>
                        @endif
                        @endauth
                        <div class="row justify-content-around mt-2">
                            <a href="/items/{{ $item['id'] }}" class="btn btn-primary">商品の詳細</a>
                            @if($item['user_id'] != Auth::id())
                            <form action="{{ route('buy' , ['id' => $item['id']]) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary">カートに追加</button>
                            </form>
                            @endif
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

<div><a href="/like">いいねした商品のみ表示</a></div>
<div><a href="/management">管理者ページ</a></div>
<div><a href="/management_user">管理者専用ユーザーページ</a></div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>
    $(function() {
        //「toggle_wish」というクラスを持つタグがクリックされたときに以下の処理が走る
        $('.toggle_wish').on('click', function() {
            alert();
            //表示しているプロダクトのIDと状態、押下し他ボタンの情報を取得
            item_id = $(this).attr("item_id");
            like = $(this).attr("like");
            click_button = $(this);

            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') //基本的にはデフォルトでOK
                    },
                    url: '/top', //route.phpで指定したコントローラーのメソッドURLを指定
                    type: 'POST', //GETかPOSTメソットを選択
                    data: {
                        'item_id': item_id,
                        'like': like,
                    }, //コントローラーに送るに名称をつけてデータを指定
                })
                //正常にコントローラーの処理が完了した場合
                .done(function(data) //コントローラーからのリターンされた値をdataとして指定
                    {
                        if (data == 0) {
                            //クリックしたタグのステータスを変更
                            click_button.attr("like", "1");
                            //クリックしたタグの子の要素を変更(表示されているハートの模様を書き換える)
                            click_button.children().attr("class", "fas fa-heart");
                        }
                        if (data == 1) {
                            //クリックしたタグのステータスを変更
                            click_button.attr("like", "0");
                            //クリックしたタグの子の要素を変更(表示されているハートの模様を書き換える)
                            click_button.children().attr("class", "far fa-heart");
                        }
                    })
                ////正常に処理が完了しなかった場合
                .fail(function(data) {
                    alert('いいね処理失敗');
                    alert(JSON.stringify(data));
                });
        });
    });
</script>
@endsection