@extends("layouts.app")

@section("content")



<form action="{{route("posts.store")}}" method="POST" enctype="multipart/form-data">

    @csrf
    
    <div class="container">
        <div class="tablo" style="background:white; padding: 30px; border-radius: 10px;">
            <h3>Give your Post Details</h3>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Describe your Gag">
                </div>
                <label for="id_image"></label>
                <input class="form-control-file" type="file" name="id_image">
                <label for="category">Category</label>
                <select class="form-control" name="category" id="category">

                    @foreach ($categories as $categorie)

                    <option value="{{$categorie->id}}">{{$categorie->name}}</option>

                    @endforeach

                </select>


            </div>
            <button type="submit" class="btn btn-primary mt-4">Post My Gag</button>
        </div>
    </div>
</form>




@endsection
