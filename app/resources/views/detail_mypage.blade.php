@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="row justify-content-around mt-2">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>ユーザー名</th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th scope='col'>メールアドレス</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-around mt-2">
        <button type="button" class="btn btn-primary">編集</button>
    </div>
    <div class="row justify-content-around mt-2">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class='text-center'>購入履歴画面</div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th scope='col'>詳細</th>
                                    <th scope='col'>日付</th>
                                    <th scope='col'>金額</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <!-- ここに収入を表示する -->
                                    
                                <tr>
                                    <th scope='col'>
                                        <a href="">#</a>
                                    </th>
                                    <th scope='col'></th>
                                    <th scope='col'></th>
                                </tr>
                                
                            </tbody>
                        </table>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th class='text-center' scope='col'>購入合計:</th>
                                </tr>
                            </thead>
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class='text-center'>投稿した商品一覧</div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th scope='col'>詳細</th>
                                    <th scope='col'>日付</th>
                                    <th scope='col'>金額</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope='col'>
                                        <a href="">#</a>
                                    </th>
                                    <th scope='col'></th>
                                    <th scope='col'></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection