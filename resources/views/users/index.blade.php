@extends('layouts.app')

@section("content")
<div class="col-md-8">
    <div class="card card-default">

        <div class="card-header">
            Users
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


        {{-- <form action="{{route("categories.store")}}" method="POST">
        @csrf

        <input type="text" name="name" class="form-control" placeholder="Enter categories name">


        <button type="submit" class="btn btn-success mt-2 mb-2 float-right"><i class="far fa-plus-square"></i> Add
            Categorie</button>

        </form> --}}



        <h1 class="text-center mt-5">Users List : </h1>

        @foreach ($users as $user)


        <form action="{{route("categories.destroy", $user->id)}}" method="POST">
            @csrf
            @method('DELETE')


                <li class="list-group-item d-flex">

                    <p>{{$user["name"]}}</p>

                    @if(!$user->isAdmin())

                    <button class="btn btn-success text-center mt-2 mb-2 ml-5" type="submit">Make Admin</button>

                    @endif


              
                </li>


        </form>



    @endforeach

</div>




</div>

@endsection
