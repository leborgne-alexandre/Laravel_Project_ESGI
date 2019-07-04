@extends('layouts.app')


@section("content")
<div class="col-md-8">
    <div class="card card-default">

        <div class="card-header">
            Categories
        </div>

        <div class="card-body">

            @if($errors->any())

            <div class="alert alert-danger">

                <ul class="list-group">

                    @foreach ($errors->all() as $errors)


                    <li class="list-group-item text-danger">

                        {{$errors}}

                    </li>

                    @endforeach


                </ul>


            </div>



            @endif

        </div>


    <form action="{{route("categories.store")}}" method="POST">
            @csrf

            <input type="text" name="name" class="form-control" placeholder="Enter categories name">


            <button type="submit" class="btn btn-success mt-2 mb-2 float-right"><i class="far fa-plus-square"></i> Add Categorie</button>

        </form>



        <h1 class="text-center mt-5">

            @if($categories->count() != 0)

            Categories list :

            @else



            ¯\_(ツ)_/¯    There is no categories yet


            @endif

        </h1>

        @foreach ($categories as $categorie)

       <li class="list-group-item">{{$categorie["name"]}}</li>

    <form action="{{route("categories.destroy", $categorie->id)}}" method="POST">

        @csrf
        @method('DELETE')

        <button class="btn btn-danger text-center mt-2 mb-2" type="submit">Delete</button>
        {{-- <a href="{{route("categories.edit", $categorie->id )}}"  class="btn btn-primary text-center mt-2 mb-2">Edit</a> --}}

        </form>

        @endforeach

    </div>




</div>

@endsection
