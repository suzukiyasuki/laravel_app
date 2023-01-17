@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="row justify-content-around mt-2">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class='text-center'>商品詳細</div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <tr>
                                    <th scope=''>ここに写真</th>
                                </tr>
                            </div>
                            <div class="col">
                                <tr>
                                    <th scope=''>ここに商品の詳細コメントを記入</th>
                                </tr>
                            </div>
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th class='text-center' scope='col'>金額</th>
                                    </tr>
                                </thead>
                                <tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-around mt-2">
    <div class="row justify-content-around mt-2 col">
        <button type="button" class="btn btn-primary">削除</button>
    </div>
    <div class="row justify-content-around mt-2 col">
        <button type="button" class="btn btn-primary">編集</button>
    </div>
</div>
</main>

@endsection