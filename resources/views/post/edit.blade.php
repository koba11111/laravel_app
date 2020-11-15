@extends('layouts.main')

@section('content')

    <form action="{{route('post.update', $post->id)}}" method="post" class="text-center">
        @csrf
        <div class="p-2">
        <input tyep="text" name="title" value="{{$post->title}}">
        </div>
        <div class="p-2">
        <textarea name="comment" value="{{$post->comment}}"></textarea>
        </div>
        <div>
        <input type="submit" name="編集"  class="btn border-red-300 border-2">
        </div>
        @method('patch')
    </form>

@endsection