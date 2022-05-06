@extends('layout.mainlayout')
@section('content')
<style>
.canvas-content{
  border: 1px solid;
  border-radius: 5px;
  padding: 15px;
  background: #f0f0f0;
}
#canvas-content-holder{
  background: #fff;
  min-height: 470px;
}
</style>
   <div class="album text-muted">
     <div class="container">
       <div class="row">
         <div class="col-sm-12">
           <h1 class="display-4">Show Canvas</h1>
         </div>
         <div class="col-sm-8 canvas-content">
           <div id="canvas-content-holder" >
              <img src="{{$canvas->canvas}}" style="width: fit-content;">
           </div>
         </div>

         <div class="col-sm-4" >
            <a href="{{ route('canvas.create-pdf',$canvas->id)}}" class="btn btn-primary float-right" target="_blank" >Download as PDF</a>
         </div>
       </div>
     </div>
   </div>
@endsection
