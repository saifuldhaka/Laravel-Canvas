@extends('layout.mainlayout')
@section('content')

   <div class="album text-muted">
     <div class="container">
       <div class="row">
         <div class="col-sm-12">
           <h1 class="display-4">Show Canvas</h1>
         </div>
         <div id="canvas-content-holder" class="col-sm-8">
            <img src="{{$canvas->canvas}}" style="width: fit-content;">
         </div>

         <div class="col-sm-4" >
            <a href="{{ route('canvas.create-pdf',$canvas->id)}}" class="btn btn-primary float-right" target="_blank" >Download as PDF</a>
         </div>
       </div>
     </div>
   </div>
@endsection
