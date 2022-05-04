@extends('layout.mainlayout')
@section('content')
<div class="album text-muted">
  <div class="container">
    <div class="row">
      <h1 class="display-4">Edit Identifier</h1>
      <div class="col-sm-8 offset-sm-2">
        <div>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
              </ul>
            </div><br />
          @endif
          <form method="post" action="{{ route('identifier.update', $identifier->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="form-group">
              <label for="first_name">Name:</label>
              <input type="text" class="form-control" name="name" value="{{$identifier->name}}" required/>
            </div>

            <div class="form-group">
              <label for="country">Country:</label>
              <input type="text" class="form-control" name="country" value="{{$identifier->country}}" required/>
            </div>

            <div class="form-group">
              <label for="organization">Organization:</label>
              <input type="text" class="form-control" name="organization"  value="{{$identifier->organization}}" required/>
            </div>

            <div class="form-group">
              <img src="{{ url('public/Image/'.$identifier->photo) }}" style="height: 100px;">
            </div>
            <div class="form-group">
              <label for="photo">photo:</label>
              <input type="file" class="form-control" name="photo"/>
            </div>


            <button type="submit" class="btn btn-primary-outline">Update Identifier</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
