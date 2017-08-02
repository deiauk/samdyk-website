<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class MainPage extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::orderBy('created_at', 'DESC')->limit(7)->get();
        return view('homepage')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $data = $request->all(); // This will get all the request data.


        $this->validate($request, [
            'title' => 'required|max:100',
            'body' => 'required|min:10'
        ]);

        $post = new Post;
        $post->user_id = $data['user_id'];
        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->post_type = $data['post_type'];
        $post->user_name = $data['user_name'];
        $post->save();
        
        return  $data['user_id'] . " " . $data['title']
            . " " . $data['body'] . " " . $data['post_type'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
