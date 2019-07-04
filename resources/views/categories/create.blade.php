@extends('layouts.app')

@section('content')
<div class="card card-default">
  <div class="card-header">

        <h1>Edit the categorie</h1>

  </div>

  <div class="card-body">


    <form action="{{route("categories.update", $categories->id)}}"  method="POST" enctype="multipart/form-data">

      @csrf
      @method("PUT")



      <div §lass="form-group">
        <label for="title">Categorie name</label>
        <input type="text" class="form-control" name="title" id='title' value="{{$categories->name}}">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-success mt-4">

            Update Categories

        </button>
      </div>
    </form>
  </div>
</div>
@endsection
