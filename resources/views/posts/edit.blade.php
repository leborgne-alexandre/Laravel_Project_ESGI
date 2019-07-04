@extends("layouts.app")



@section('content')

<form action="{{route("posts.update", $posts->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")

    <div class="container">
        <div class="tablo" style="background:white; padding: 30px; border-radius: 10px;">
            <h3>Edit your Post Details</h3>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="{{$posts->title}}">
                    <img style="max-width:400px" src="storage/{{$posts->id_image}}"  alt="">
                </div>
                {{-- <label for="id_image"></label>
                @if(isset($posts))
                <div class="form-group">
                    <img src="storage/app/public/{{$posts["id_image"]}}" style="width: 100%;" alt="your image">
                </div>

                @endif

                <input class="form-control-file" type="file" name="id_image">
                <label for="category">Category</label>
                <select class="form-control" name="category" id="category">

                    @foreach ($categories as $key)

                    <option value="{{$posts->id}}">{{$posts->category_id}}</option>

                    @endforeach


                </select> --}}


            </div>
            <button type="submit" class="btn btn-primary mt-4">Edit My Gag</button>
        </div>
    </div>
</form>


@endsection