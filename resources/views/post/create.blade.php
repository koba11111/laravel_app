@extends('layouts.main')

@section('content')
    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data" class="text-center">
        @csrf
        <div class="p-2">
        <input tyep="text" name="title" placeholder="料理名を入力してください">
        </div>
        <div class="p-2">
        <textarea name="comment" placeholder="コメントを入力してください"></textarea>
        </div>
        <div>
        <input type="file" name="image" placeholder="料理の画像を選択してください">
        </div>
        <div>
        <input type="submit" name="投稿"  class="btn border-red-300 border-2">
        </div>
    </form>
@endsection