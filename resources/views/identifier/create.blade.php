@extends('layout.mainlayout')
@section('content')
<div class="album text-muted">
  <div class="container">
    <div class="row">
      <h1 class="display-4">Create Identifier</h1>
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
          <form method="post" action="{{ route('identifier.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="first_name">Name:</label>
            <input type="text" class="form-control" name="name" required/>
          </div>

          <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" class="form-control" name="country" required/>
          </div>

          <div class="form-group">
            <label for="organization">Organization:</label>
            <input type="text" class="form-control" name="organization" required/>
          </div>

          <div class="form-group">
            <label for="photo">photo:</label>
            <input type="file" class="form-control" name="photo" required/>
          </div>


          <button type="submit" class="btn btn-primary-outline">Add Identifier</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
