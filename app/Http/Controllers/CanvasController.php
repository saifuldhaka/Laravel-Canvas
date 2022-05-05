<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Identifier;
use App\Models\Canvas;
use PDF;


class CanvasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $canvases = Canvas::paginate(20);
        return view('canvas.canvas', compact('canvases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $identifier = Identifier::find($request->id);
        return view('canvas.create', compact('identifier'));
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
          'html_canvas' => 'required'
      ]);
      try{
        $canvas = new Canvas([
            'name' => $request->name,
            'canvas' => $request->html_canvas,
            'user_id' => $request->user_id,
            'user_name' => $request->user_name,
            'country' => $request->country,
            'organization' => $request->organization,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $canvas->save();
        return redirect('/canvas')->with('success', 'Canvas saved!');

      }catch (\Exception $e) {
        return redirect('/canvas')->with('error', $e->getMessage());
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
        //
        $canvas = Canvas::find($id);
        return view('canvas.show', compact('canvas'));
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
      Canvas::where('id', $id)->delete();
      return redirect('/canvas')->with('success', 'Canvas deleted!');
    }

    /**
    * Download PDF
    * @param int $id
    * @param \Illuminate\Http\Response
    */
    public function createPdf($id){
      $canvas = Canvas::find($id);
      $pdf = PDF::loadView('canvas.pdf_view', compact('canvas'));
      return $pdf->download(time().'-'.$canvas->name.'.pdf');
    }
}
