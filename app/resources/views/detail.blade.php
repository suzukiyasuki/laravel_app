@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="row justify-content-around mt-2">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class='text-center'>{{ $item['name'] }}</div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <tr>
                                    <th scope=''>
                                        <img class="h-50" src="{{ asset('storage/' . $item->image) }}">
                                    </th>
                                </tr>
                            </div>
                            <div class="col">
                                <tr>
                                    <th scope=''>{{ $item['text'] }}</th>
                                </tr>
                            </div>
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th class='text-center' scope='col'>金額：{{ $item['amount'] }}</th>
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
    <div class="mt-2">
        <div class="row justify-content-around mt-2 col">
            @if(Auth::id() == $item->user_id)
            <form action="/items/{{ $item->id }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">削除</button>
            </form>
            @endif
            <a href="/items/{{ $item->id }}/edit" class="btn btn-primary">編集</a>
        </div>
    </div>
</main>

@endsection