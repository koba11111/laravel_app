<a href="{{route('post.show', $post->id)}}">
                    <div class="card">
                        <img src="{{asset('storage/images/' . $post->image)}}" alt="oniku" class="w-full h-32 sm:h-48 object-cover" />
                        <div class="m-4">
                            <span class="font-bold">{{$post->title}}</span>
                            <div class="flex justify-between">
                                <span class="block text-gray-500 text-sm">{{$post->comment}}</span>
                                @if($post->is_liked_by_auth_user())
                                            <span onclick="event.preventDefault();
                                            document.getElementById('form-incomplete-{{$post->id}}').submit()"
                                            class="fas fa-check  text-green-400 cursor-pointer px-2" />
                                            <span>{{$post->likes->count()}}</span>
                                            <form style="display:none" id="{{'form-incomplete-'.$post->id}}" method="post" action="{{route('post.dislike', $post->id)}}">
                                            @csrf
                                            @method('delete')
                                            </form>
                                @else(!$post->is_liked_by_auth_user())
                                            <span onclick="event.preventDefault();
                                            document.getElementById('form-complete-{{$post->id}}').submit()"
                                            class="fas fa-check  text-gray-300 cursor-pointer px-2" />
                                            <span>{{$post->likes->count()}}</span>
                                            <form style="display:none" id="{{'form-complete-'.$post->id}}" method="post" action="{{route('post.like', $post->id)}}">
                                            @csrf
                                            @method('put')
                                            </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>