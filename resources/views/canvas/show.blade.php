@extends('layout.mainlayout')
@section('content')

   <div class="album text-muted">
     <div class="container">
       <div class="row">
         <div class="col-sm-12">
           <h1 class="display-4">Show Canvas</h1>
         </div>
         <div id="canvas-content-holder" class="col-sm-8">
            <img src="{{$canvas->canvas}}">
         </div>

         <div class="col-sm-4" >
            <button type="button" class="btn btn-primary float-right" onClick="convertBase64()">Print</button>
         </div>
       </div>
     </div>
   </div>


   <script>

   function convertBase64(){
      html2canvas([document.getElementById('canvas-content-holder')], {
        onrendered: function(canvas) {
          var data = canvas.toDataURL('image/png');
          var image = new Image();
          image.src = data;
          $('#html_canvas').val(image.src);
          $( "#form-canvas" ).submit();
        }
      });
   }

   </script>

@endsection
