<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Faker\Provider\en_UG\PhoneNumber;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostLiked;


class PostLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Post $post, Request $request)
    {
        if ($post->likedBy($request->user())){
            return response(null,409);
       }
        $post->likes()->create([
            'user_id'=> $request->user()->id,

        ]);
        Mail::to($post->user)->send(new PostLiked(auth()->user(),$post));
        return back();
    }
    public function destroy(Post $post, Request $request)
    {
        $request->user()->likes()->where('post_id',$post->id)->delete();
        return back();
    }
}
