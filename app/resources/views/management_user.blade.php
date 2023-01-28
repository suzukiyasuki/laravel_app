@extends('layouts.app')

@section('content')
<main class="container mt-5">
    <div class="justify-content-center">
        <div class="card center-block">
            <table>
                <thead>
                    <tr>
                        <th>ユーザー情報</th>
                        <th>ユーザー削除</th>
                    </tr>
                </thead>
                @foreach($user as $users)

                <tbody>
                    <tr>
                        <td>
                            <p>{{ $users->name }}</p>
                        </td>
                        <td>
                            <form action="/admin/{{ $users->id }}/delete" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">ユーザー削除</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</main>
@endsection