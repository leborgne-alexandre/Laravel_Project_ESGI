@extends('layouts.app')

@section("content")

<div class="container">

    <form action="{{route('categories.update', $category->id)}}" method="POST">
        @csrf
        @method("PUT")
        
    <input type="text" name="name" class="form-control" value="{{isset($category) ? $category->name : "fail" }}">
            <button type="submit" class="btn btn-success mt-2 mb-2 float-right"><i class="far fa-plus-square"></i>
                {{isset($category) ? "Edit Categorie" : "Create Categorie" }}
            </button>
    </form>

</div>
@endsection