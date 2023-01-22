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
                            <th scope='col'>取り消し</th>
                        </tr>
                    </thead>
                    @foreach($item as $value)
                    <tbody>
                        <tr>
                            <th scope='col'><a href="/items/{{ $value['id'] }}">#</a></th>
                            <th scope='col'>{{ $value->name }}</th>
                            <th scope='col'>
                                <a href="">#</a>
                            </th>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="d-flex justify-content-center col">
                <button type="button" class="btn btn-secondary">戻る</button>
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