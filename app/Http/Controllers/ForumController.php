<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Requests;
use App\Post;
use App\User;
use App\Category;
use App\Reply;
use Auth;

class ForumController extends Controller
{
	private $rules = [
		'title'=>['required','max:30','min:5'],
		'body'=>['required','min:5']
	];

	public function __construct()
	{
		$this->middleware('auth',['except'=>['viewPost']]);
	}

    public function getPost()
    {
    	$category = Category::all();

    	return view('pages.question',compact('category'));
    }

    public function postQuestion(Request $request)
    {
    	$this->validate($request, $this->rules);

    	$post = new Post();

        // $post->user_id = Auth::user()->id;
    	$post->category_id = $request->category;
    	$post->title = $request->title;
    	$post->body = $request->body;

        $request->user()->posts()->save($post);

    	return redirect()->route('home')->with('message','Successfully Post');
    }

    public function viewPost($slug)
    {
        try
        {
            $post = Post::where('slug', '=', $slug)->first();

            return view('pages.reply',compact('post'));
        }
        catch(ModelNotFoundException $ex)
        {
            return redirect()->route('home');
        }
    }

    public function saveReply(Request $request)
    {
        $this->validate($request, [
            'body'=>'required|max:1000'
            ]);

        $post = Post::where('slug', '=', $request->slug)->first();

        if ( $post )
        {
            $reply = new Reply;

            $reply->post_id = $post->id;
            $reply->user_id = Auth::user()->id;
            $reply->body = $request->body;

            $reply->save();

            return redirect()->back();
        }

        return redirect()->route('home');
    }

    public function deleteQuestion($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('home');
    }

    public function deleteReply($id)
    {
        $reply = Reply::find($id);
        $reply->delete();

        return redirect()->back();
    }
}
