@extends('layouts.main')

@section('content')
    <div class="text-2xl">
        @foreach($categories as $category)
            <div onclick="event.preventDefault();
            document.getElementById('form-categoryId-{{$category['categoryId']}}').submit()"
            class="text-center py-3 text-lg cursor-pointer">
            <span id="{{$category['categoryId']}}">{{$category['categoryName']}}</span></div>             
            <form style="display:none" id="{{'form-categoryId-'.$category['categoryId']}}" method="post" action="{{route('recipie.category', $category['categoryId'])}}">
            <input type="hidden" name="categoryId" value="{{$category['categoryId']}}">
            @csrf
            </form>
        @endforeach
    </div>
@endsection