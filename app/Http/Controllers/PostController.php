<?php


namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Like;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ユーザーの投稿データを取得
        $posts = Post::orderBy('created_at', 'desc')->paginate(6);

        //いいねの数が多い投稿を取得
        $best_posts = Post::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();
        
        return view('post.index', compact('posts', 'best_posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //画像ファイルを取得
        $filename = $request->image->getClientOriginalName();
        $request->image->storeAs('images', $filename, 'public');

        //投稿データを登録
        auth()->user()->posts()->create([
            'title' => $request->title,
            'image' => $filename,
            'comment' => $request->comment,
            ]);

        return redirect(route('post.index'))->with('message', '投稿しました！');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post, PostRequest $request)
    {
        $post->update([
            'title' => $request->title,
            'comment' => $request->comment,
        ]);

        return redirect(route('post.show', $post->id))->with('message', '編集が完了しました！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect(route('post.index'))->with('message', '投稿を削除しました！');
    }

    public function like(Post $post)
    {
        $post->update(['like' => true]);
        Like::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
        ]);
        return redirect(route('post.index'));
    }

    public function dislike(Post $post)
    {
        $like = $post->likes->where('user_id', auth()->user()->id)->first();
        $like->delete();
        return redirect(route('post.index'));
    }
}
