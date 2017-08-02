<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Skill;
use App\UserDescription;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auth = Auth::user();
        if(Auth::check() && $auth->id == $id) {
            return redirect('rodyti_mano_profili');
        }
        //$comments = Comment::where('user_id', $id)->paginate(3);
        $description = UserDescription::where('user_id', $id)->first();
        $username = User::where('id', $id)->first();
        $skills = Skill::where('user_id', $id)->get();

        // $skills = $user->skills()->getResults()->toArray();
        //$comments = $auth->comments()->getResults()->toArray();
        $comments = Comment::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(3);

        $data = array(
            'id'=> $id,
            'comments' =>  $comments,
            'description' => $description,
            'username' => $username['username'],
            'skills' => $skills
        );

        return view('layouts.user_profile')->withData($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dump("edit " . $id);
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
        dump("update " . $request . " " . $id);
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

    public function showMyProfile() {
        if(Auth::check()) {
            $user = Auth::user();
            $userId = $user->id;

            $description = UserDescription::where('user_id', $userId)->first();
            $username = $user->username;
//            $skills = Skill::where('user_id', $userId)->get();
//            $comments = Comment::where('user_id', $userId)->paginate(3);

            $skills = $user->skills()->getResults();
            $comments = $user->comments()->paginate(3);

            $data = array(
                'id'=> $userId,
                'comments' =>  $comments,
                'description' => $description,
                'username' => $username,
                'skills' => $skills
            );

            return view('layouts.user_profile')->withData($data);
        }
        return -1;
    }

    public function editMyProfile(Request $request) {
        $user = Auth::user();

        $skills = Skill::where('user_id', $user->id);
        $skills->delete();

        $skillsArr = [];
        foreach ($request->get('skills') as $skill) {
            $skillsArr[] = new Skill($skill);
        }
        $user->skills()->saveMany($skillsArr);
        $matchThese = array('user_id'=>$user->id);
        $user->description()->updateOrCreate($matchThese,['description'=>$request->get('desc')]);

        return  1;
    }

    public function getUserData($id) {
        $user = Auth::user();
        //

//        $description = UserDescription::select('description')
//            ->where('user_id', $user)
//            ->first();
//        $skills = Skill::select('skill_title', 'knowledge_level')
//            ::where('user_id', $user)
//            ->get();

        $description = $user->description()->getResults()['description'];
        $skills = $user->skills()->getResults()->toArray();

        $data = array(
            'description' => $description,
            'skills' => $skills
        );

        return json_encode($data);
        //dump($description);
        //$data = [$skills, $description];
        //return $description->toJson();
    }

    function postComment(Request $request) {
        $user = Auth::user()->id;

        $comment = new Comment;
        $comment->user_id = $request->get('user_to_write_comment_id');
        $comment->written_user_id = $user;
        $comment->comment = $request->get('desc');
        $comment->ranking = 1;
        $comment->save();

        return 1;
    }
}
