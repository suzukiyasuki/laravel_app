@extends('layouts.app')

@section('content')
<main class="py-4">
    <div class="row justify-content-around mt-2">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ $item['name'] }}</div>
                <div class="card-body d-flex justify-content-center align-items-center">
                    <div class="p-4">
                        <img class="" style=" height: 400px;" src=" {{ asset('storage/' . $item->image) }}">
                    </div>
                    <div class="p-4">
                        <div class="m-3 text-break">{{ $item['text'] }}</div>
                        <div class="d-flex">
                            <div class="mt-3 ml-3 mb-3">SIZE: {{ SizeListConst::SIZE_LIST[$item['size']] }}</div>
                            <span class="m-3">/</span>
                            <div class="mt-3 mr-3 mb-3">
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
                        </div>
                        <div class="m-3">¥ {{ $item['amount'] }} -</div>
                        <div class="d-flex align-items-end">
                            <div class="row justify-content-around mt-2 col">
                                @if(Auth::id() == $item->user_id)
                                <a href="/items/{{ $item->id }}/edit" class="btn btn-outline-primary">編集</a>
                                <form action="/items/{{ $item->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">削除</button>
                                </form>
                                @elseif(Auth::id() != $item->user_id)
                                <form action="/count/{{ $item->user_id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">報告</button>
                                </form>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection