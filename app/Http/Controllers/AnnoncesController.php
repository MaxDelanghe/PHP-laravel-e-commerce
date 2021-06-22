<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Annonces;
use Illuminate\Http\Request;

class AnnoncesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Annonces::latest()->paginate(5);
        return view('annonces.index',compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function index_perso()
    {
        $id_auth = Auth::user()->id;
        $data = Annonces::where('author_id', '=', $id_auth)->latest()->paginate(5);
        return view('annonces.index_perso',compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annonces.create');
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
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'image3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'title' => 'required',
          'description' => 'required',
          'year' => 'required',
          'prix' => 'required',
      ]);
      $id_auth = Auth::user()->id;
      $request->request->add(['author_id' => $id_auth]);
      $input = $request->all();
      if ($request->hasFile('image2')) {
          $file = $request->file('image2');
          $file_extension = $file->getClientOriginalName();
          $destination_path = public_path() . '/folder/images/';
          $filename = "img_".rand(123456,999999).rand(123456,999999).rand(123456,999999).rand(123456,999999).$file_extension;
          $request->file('image2')->move($destination_path, $filename);
          $input['image2'] = $filename;
      }
      if ($request->hasFile('image3')) {
          $file = $request->file('image3');
          $file_extension = $file->getClientOriginalName();
          $destination_path = public_path() . '/folder/images/';
          $filename = "img_".rand(123456,999999).rand(123456,999999).rand(123456,999999).rand(123456,999999).$file_extension;
          $request->file('image3')->move($destination_path, $filename);
          $input['image3'] = $filename;
      }
      if ($request->hasFile('image')) {
          $file = $request->file('image');
          $file_extension = $file->getClientOriginalName();
          $destination_path = public_path() . '/folder/images/';
          $filename = "img_".rand(123456,999999).rand(123456,999999).rand(123456,999999).rand(123456,999999).$file_extension;
          $request->file('image')->move($destination_path, $filename);
          $input['image'] = $filename;
      }
      Annonces::create($input);
      return redirect()->route('annonces.index')->with('success','annonce created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Annonces  $annonces
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $annonces = Annonces::find($id);
      return view('annonces/show',compact('annonces'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Annonces  $annonces
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $annonces = Annonces::find($id);
        return view('annonces/edit',compact('annonces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Annonces  $annonces
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'image3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'title' => 'required',
        'description' => 'required',
        'year' => 'required',
        'prix' => 'required',
      ]);
      $input = $request->all();
      if ($request->hasFile('image2')) {
          $file = $request->file('image2');
          $file_extension = $file->getClientOriginalName();
          $destination_path = public_path() . '/folder/images/';
          $filename = "img_".rand(123456,999999).rand(123456,999999).rand(123456,999999).rand(123456,999999).$file_extension;
          $request->file('image2')->move($destination_path, $filename);
          $input['image2'] = $filename;
      }
      if ($request->hasFile('image3')) {
          $file = $request->file('image3');
          $file_extension = $file->getClientOriginalName();
          $destination_path = public_path() . '/folder/images/';
          $filename = "img_".rand(123456,999999).rand(123456,999999).rand(123456,999999).rand(123456,999999).$file_extension;
          $request->file('image3')->move($destination_path, $filename);
          $input['image3'] = $filename;
      }
      if ($request->hasFile('image')) {
          $file = $request->file('image');
          $file_extension = $file->getClientOriginalName();
          $destination_path = public_path() . '/folder/images/';
          $filename = "img_".rand(123456,999999).rand(123456,999999).rand(123456,999999).rand(123456,999999).$file_extension;
          $request->file('image')->move($destination_path, $filename);
          $input['image'] = $filename;
      }

      $blog = Annonces::where('id', '=', $id)->first();
      $blog->update($input);
      return redirect()->route('annonces.index')->with('success','Votre annonce a ete mis a jour');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Annonces  $annonces
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Annonces::find($id);
      $post->delete();
      return redirect()->route('annonces.index')->with('success','Votre annonce a ete suprime');
    }
}
