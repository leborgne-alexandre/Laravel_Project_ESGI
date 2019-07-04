@extends('layouts.app')


@section('content')


<div class="mdb-lightbox d-flex flex-wrap">


    @foreach ($posts as $post)

    <form action="{{route("posts.destroy", $post["id"])}}" method="POST">


        @csrf

        @method('DELETE')

        <figure class="col-md-4 mt-5">
            <h4 class="text-center">{{$post["title"]}}</h4>
            <img style="max-width: 500px; height: 300px;" src="storage/{{$post["id_image"]}}" alt="">
        </figure>

        @if($post->trashed())

        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-bomb fa-2x"></i>Destroy</button>


        @endif



    </form>


    <form action="{{route("restore-post", $post->id)}}" method="POST">

    @csrf
    @method("PUT")


    @if($post->trashed())

        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-recycle fa-2x"></i>Restore</button>

    @endif

    </form>


    @endforeach

</div>



@endsection
