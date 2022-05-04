<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MOdels\Identifier;
use Carbon\Carbon;

class IdentifierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $identifiers = Identifier::paginate(20);
        return view('identifier.identifier',compact('identifiers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('identifier.create');
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
          'name'=>'required',
          'country'=>'required',
          'organization'=>'required',
      ]);
      try{
        if($request->file('photo')){
          $file= $request->file('photo');
          $filename= date('YmdHi').$file->getClientOriginalName();
          $file-> move(public_path('public/Image'), $filename);

          $identifier = new Identifier([
              'name' => $request->name,
              'country' => $request->country,
              'organization' => $request->organization,
              'photo' => $filename,
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now()
          ]);

          $identifier->save();
          return redirect('/identifier')->with('success', 'Identiy saved!');

        }else{
          return redirect('/identifier')->with('error', 'Photo not uploaded');
        }

      }catch (\Exception $e) {
        return redirect('/identifier')->with('error', $e->getMessage());
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $identifier = Identifier::find($id);
      return view('identifier.edit', compact('identifier'));
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
      $request->validate([
        'name'=>'required',
        'country'=>'required',
        'organization'=>'required',
      ]);

      if($request->file('photo')){
        $file= $request->file('photo');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('public/Image'), $filename);

        $data = [
          'name' => $request->name,
          'country' => $request->country,
          'organization' => $request->organization,
          'photo' => $filename,
          'updated_at' => Carbon::now()
        ];
        Identifier::where('id', $id)->update($data);

      }else{
        $data = [
          'name' => $request->name,
          'country' => $request->country,
          'organization' => $request->organization,
          'updated_at' => Carbon::now()
        ];
        Identifier::where('id', $id)->update($data);
      }

      return redirect('/identifier')->with('success', 'Identy updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Identifier::where('id', $id)->delete();
        return redirect('/identifier')->with('success', 'Identifier deleted!');
    }
}
