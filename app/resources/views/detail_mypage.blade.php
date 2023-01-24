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
                                <th scope='col'>{{ $user->name }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <form action="/users/{{ Auth::id() }}" method="POST">
        @method('DELETE')
        @csrf
        <div class="row justify-content-around mt-2">
            <button type="submit" class="btn btn-danger">退会</button>
        </div>
    </form>
    <div class="row justify-content-around mt-2">
        <a href="{{ route('users.edit', ['user' => Auth::id()]) }}" class="btn btn-primary">編集</a>
    </div>
    <div class="row justify-content-around mt-2">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class='text-center'>購入履歴画面</div>
                </div>
                <div class="card-body">
                    <table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>商品名</th>
                                <th scope='col'>金額</th>
                            </tr>
                        </thead>
                        @foreach($items as $items)
                        <tbody>
                            <tr>
                                <th scope='col'>{{ $items->name }}</th>
                                <th scope='col'>{{ $items->amount }}</th>
                            </tr>
                        </tbody>
                        @endforeach
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
                                    <th scope='col'>商品名</th>
                                    <th scope='col'>金額</th>
                                    <th scope='col'>詳細</th>
                                </tr>
                            </thead>
                            @foreach($user->item as $item)
                            <tbody>
                                <tr>
                                    <th scope='col'>
                                        {{ $item->name }}
                                    </th>
                                    <th scope='col'>{{ $item->amount }}</th>
                                    <th scope='col'>
                                        <a href="/items/{{ $item['id'] }}">#</a>
                                    </th>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection