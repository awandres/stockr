<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;

class CommentsController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $posted_to_id)
    {

      $this->validate(request(), [
        'content' => 'required|max:200',

      ]);

      $posted_to = User::find($posted_to_id);

      $comment = Comment::create([
        'author' => auth()->user()->name,
        'content' => request('content'),
        'posted_to_id' => $posted_to->id
      ]);


      return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->route('dashboard');
    }
}
