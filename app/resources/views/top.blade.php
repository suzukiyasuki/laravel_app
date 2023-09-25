@extends('layouts.app')

@section('content')

<div class="d-flex">
    <aside class="sticky ml-3 h-75" style="width: 450px;">
        <div class="clearfit">
            <form action="/top" method="GET">
                <div class="input-group mt-5">
                    <input type="text" name="keyword" class="form-control" placeholder="キーワードを入力">
                    <button class="btn btn-outline-success" type="submit" id="button-addon2"><i class="fas fa-search"></i> 検索</button>
                </div>
                <div class="input-group mb-3 mt-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">サイズ</label>
                    </div>
                    <select name="size" class="custom-select" id="inputGroupSelect01">
                        @foreach(SizeListConst::SIZE_LIST as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3 ml-3">
                    <div class="">シーンで探す</div>
                    @foreach($categories as $category)
                    <div class="form-check">
                        <input class="form-check-input" name="category" type="checkbox" value="{{ $category->id }}" id="flexCheckDefault{{ $category->id }}">
                        <label class="form-check-label" for="flexCheckDefault{{ $category->id }}">{{ $category->name }}</label>
                    </div>
                    @endforeach
                </div>
                <div class="text-center mt-5">
                    <a href="/cart" class="btn btn-warning">カート内</a>
                    <div class="panel-body card-body mx-auto text-center" style="width:200px;">
                        @if(session('message'))
                        <div class="alert alert-danger">
                            <div>{{ session('message') }}</div>
                        </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </aside>
    <main class="justify-content-around border-left ml-3 mt-3 pl-5">
        <div class="mt-3">
            <div class="d-flex justify-content-around flex-wrap m-4">
                @foreach($items as $item)
                <div class="card mt-3" style="width: 18rem;">
                    <img class="h-65" src="{{ asset('storage/' . $item['image']) }}">
                    <div class="card-body" style="height: 230px;">
                        <h5 class="card-title">ITEM: {{ $item['name'] }}</h5>
                        <div class="d-flex">
                            <p class="card-text">SIZE: {{ SizeListConst::SIZE_LIST[$item['size']] }}</p>
                            <span class="mr-3 ml-3">/</span>
                            @switch($item['category_id'])
                            @case(1)
                            <p class="card-text">SCENE: カジュアル</p>
                            @break
                            @case(2)
                            <p class="card-text">SCENE: ビジネス</p>
                            @break
                            @case(3)
                            <p class="card-text">SCENE: フォーマル</p>
                            @break
                            @case(4)
                            <p class="card-text">SCENE: スポーツ</p>
                            @break
                            @case(5)
                            <p class="card-text">SCENE: ルームウェア</p>
                            @break
                            @endswitch
                        </div>
                        <p class="card-text">¥ {{ $item['amount'] }} -</p>
                        @auth
                        @if(isset($item->like[0]))
                        <a class="toggle" item_id="{{ $item['id']}}" like="1">
                            <i class="fas fa-heart"></i>
                        </a>
                        @else
                        <a class="toggle" item_id="{{ $item['id'] }}" like="0">
                            <i class="far fa-heart"></i>
                        </a>
                        @endif
                        @endauth
                        <div class="row justify-content-around mt-2">
                            <a href="/items/{{ $item['id'] }}" class="btn btn-outline-primary">商品の詳細</a>
                            @if($item['user_id'] != Auth::id())
                            <button id="{{ $item['id'] }}" type="button" class="item btn btn-primary">カートに追加</button>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</div>

<script>
    $(function() {
        console.log($('meta[name="csrf-token"]').attr('content'))
        //「toggle_wish」というクラスを持つタグがクリックされたときに以下の処理が走る
        $('.toggle').on('click', function() {
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
        $('.item').on('click', function() {
            id = $(this).attr("id");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), //基本的にはデフォルトでOK
                    'Content-Type': 'application/json'
                },
                url: '/add-cart',
                type: 'POST',

                data: {
                    id: id,
                },
                dataType: 'json'

            })
            var form = new FormData();
            form.append($(this).val('id'));

            data: form

                .done(function(message) {
                    console.log(message)
                })
                .fail(function(error) {
                    alert(JSON.stringify(error))
                })

        });
    });
</script>
@endsection