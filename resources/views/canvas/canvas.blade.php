@extends('layout.mainlayout')
@section('content')
   <div class="album text-muted">
     <div class="container">
       <div class="row">
         <div class="col-sm-12">
           <h1 class="display-4">Canvas</h1>
           <div class="col-sm-12">
             @if(session()->get('success'))
               <div class="alert alert-success">
                 {{ session()->get('success') }}
               </div>
             @endif
             @if(session()->get('error'))
               <div class="alert alert-warning">
                 {{ session()->get('error') }}
               </div>
             @endif
           </div>
           <table class="table table-striped">
             <thead>
                 <tr>
                   <th>Canvas Name</th>
                   <th>User Name</th>
                   <th>Country</th>
                   <th>Organization</th>
                   <th colspan = 2>Actions</th>
                 </tr>
             </thead>


             <tbody>
                 @foreach($canvases as $canvas)
                 <tr>
                     <td>{{$canvas->name}}</td>
                     <td>{{$canvas->user_name}}</td>
                     <td>{{$canvas->country}}</td>
                     <td>{{$canvas->organization}}</td>
                     <td>
                         <a href="{{ route('canvas.show',$canvas->id)}}" class="btn btn-primary">Show</a>
                     </td>
                     <td>
                         <form action="{{ route('canvas.destroy', $canvas->id)}}" method="post">
                           @csrf
                           @method('DELETE')
                           <button class="btn btn-danger" type="submit">Delete</button>
                         </form>
                     </td>
                 </tr>
                 @endforeach
             </tbody>
           </table>

           <div class="text-justify">
             {!! $canvases->links() !!}
           </div>
         <div>
       </div>
   </div>
@endsection
