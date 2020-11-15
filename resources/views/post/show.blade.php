@extends('layouts.main')

@section('content')

{{$post->title}}
<img src="{{asset('storage/images/' . $post->image)}}" />
{{$post->comment}}
@if ($post->is_auth_user())
<a href="{{route('post.edit', $post->id)}}" class="bg-orange-400 cursor-pointer rounded">
<span class="fas fa-edit px-2" />edit</a>

<a class="bg-red-400 cursor-pointer rounded">
    <span class="fas fa-trash px-2"
    onclick="event.preventDefault();
    if(confirm('Are you really want to delete?')){
    document.getElementById('form-delete-{{$post->id}}')
    .submit()
    }"/>delete</a>
@else

@endif
    <form style="display:none" id="{{'form-delete-'.$post->id}}" 
    method="post" action="{{route('post.destroy', $post->id)}}">
    @csrf
    @method('delete')
    </form>
@endsection