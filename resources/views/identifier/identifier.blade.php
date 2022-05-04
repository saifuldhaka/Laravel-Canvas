@extends('layout.mainlayout')
@section('content')
   <div class="album text-muted">
     <div class="container">
       <div class="row">
         <h1>Identifier</h1>
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
         <div>
           <a style="margin: 19px;" href="{{ route('identifier.create')}}" class="btn btn-primary">New contact</a>
         </div>
         <table class="table table-striped">
            <thead>
                <tr>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Country</th>
                  <th>Organization</th>
                  <th colspan = 3></th>
                </tr>
            </thead>
            <tbody>
                @foreach($identifiers as $identifier)
                <tr>
                    <td>
                      <img src="{{ url('public/Image/'.$identifier->photo) }}" style="height: 100px;">
                    </td>
                    <td>{{$identifier->name}} </td>
                    <td>{{$identifier->country}}</td>
                    <td>{{$identifier->organization}}</td>
                    <td>
                        <!-- <a href="{{ route('identifier.edit',$identifier->id)}}" class="btn btn-primary">Edit</a> -->
                        <a href="{{ route('canvas.create',['id'=>$identifier->id])}}" class="btn btn-primary">Create Canvas</a>
                    </td>
                    <td>
                        <a href="{{ route('identifier.edit',$identifier->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('identifier.destroy', $identifier->id)}}" method="post">
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
            {!! $identifiers->links() !!}
          </div>

       </div>
     </div>
   </div>
@endsection
