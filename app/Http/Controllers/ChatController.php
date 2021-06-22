<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id_user = Auth::user()->id;

      $data = DB::table('chats')
      ->where('dest_id' , '=' , $id_user)
      ->join('users', 'users.id', '=', 'chats.author_id')
      ->select('users.name as name','chats.readed as readed','chats.title as title','chats.body as body', 'chats.created_at as created_at', 'chats.id as pop')
      ->paginate(5);
/*
foreach ($data as $key => $value) {
  //  echo($value->{'pop'});
    print_r($value);
    echo "</br>";
}*/
  //    $data = Chat::where('dest_id' , '=' , $id_user)->join('users', 'users.id', '=', 'chats.author_id')->paginate(5);
      $toto = Chat::where('dest_id' , '=' , $id_user)->update(array('readed' => 1));
      return view('chat.index',compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chat.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
          'title' => 'required',
          'body' => 'required',
          'name' => 'required',
      ]);
      $user = $request->name;
      $author_id = Auth::user()->id;
      $dest_id = User::where('name' , '=' , $user)->first();
      if ($dest_id == null || $author_id == $dest_id->id) {
        return redirect()->route('chat.index')->with('error','message send failed.');
      }
      $request->request->add(['author_id' => $author_id]);
      $request->request->add(['dest_id' => $dest_id->id]);
      $request->request->add(['readed' => 0]);
      Chat::create($request->all());
      return redirect()->route('chat.index')->with('success','message sent successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
       $post = Chat::find($id);
       $post->delete();
       return redirect()->route('chat.index')->with('success','Ce message a ete suprime');
     }
}
