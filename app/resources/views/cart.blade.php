@extends('layouts.app')

@section('content')
<main class="container mt-5">
    <div class="justify-content-center ">
        <div class="card-body">
            <div class="card-body">
                <table class='table'>
                    <thead>
                        <tr>
                            <th scope='col'>詳細</th>
                            <th scope='col'>商品</th>
                            <th scope='col'>金額</th>
                            <th scope='col'>取り消し</th>
                        </tr>
                    </thead>
                    @foreach($item as $value)
                    <tbody>
                        <tr>
                            <th scope='col'><a href="/items/{{ $value['id'] }}">#</a></th>
                            <th scope='col'>{{ $value->name }}</th>
                            <th scope='col'>{{ $value->amount }}</th>
                            <th scope='col'>
                                <form action="/cart/{{$value->id}}/remove" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">取り消し</button>
                                </form>
                            </th>
                        </tr>
                    </tbody>
                    @endforeach
                    <td class="border-bottom-0 align-middle">
                        合計金額：{{ $Sum }}円
                    </td>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="d-flex justify-content-center col">
                <a href="/top" class="btn btn-secondary">戻る</a>
            </div>
            <form action="/cart/{{ Auth::id() }}" method="POST">
                @csrf
                <div class="row justify-content-around mt-2">
                    <button type="submit" class="btn btn-danger">購入</button>
                </div>
            </form>
        </div>
    </div>
</main>


@endsection