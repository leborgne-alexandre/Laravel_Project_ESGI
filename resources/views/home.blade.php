@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <a href="{{route("posts.index")}}"></a>

          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New Gag</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>


                <div class="modal-body">


                  <form action="{{route("posts.store")}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                      <h3>Title</h3>
                      <input type="text" class="form-control" name="title" placeholder="Describe your gag">
                    </div>


                    <div class="form-group">
                      <h3>Put your content</h3>
                      <input type="file" name="id_image">
                    </div>


                </div>

                <div class="modal-footer">

                  <input class="button" name="submit" type="submit" value="Button">
                  <button type="submit" class="btn btn-primary">Post my gag</button>
                </div>

                </form>


              </div>
            </div>
          </div>


          @if(session()->has('success'))

          @endif

          @foreach ($posts as $post)

          <div>
            <div class="d-flex">
              <h6 class="mr-5"> {{$post->user->name}}</h6>
              <h6>{{ date('d-M-y', strtotime($post->created_at)) }}</h6>
            </div>

            <h3 class="mr-5 font-weight-bold">{{$post['title']}}</h3>

            <img style="max-width: 500px; padding: 20px;" src="storage/{{$post["id_image"]}}" alt="">

            <form action="{{route("posts.destroy", $post->id)}}" method="POST">
              @csrf

              @method("DELETE")

              <div class="addthis_inline_share_toolbox mb-2"></div>

              {{-- Check if user is admin --}}
              @if(auth()->user()->isAdmin())

              <a href="{{route("posts.edit", $post->id)}}" class="btn btn-info btn-sm mt-3 mb-3">Edit</a>
              <button type="submit" class= "btn btn-danger btn-sm mt-3 mb-3">Trash</button>

              @endif

            </form>

            <button class="like_dislike" id="like" data-id="{{$post->id}}"
              data-user-id="{{Auth()->user()->id}}">Like</button>
            <button class="like_dislike" id="dislike" data-id="{{$post->id}}"
              data-user-id="{{Auth()->user()->id}}">Dislike</button>

          </div>

          <hr>

          @endforeach

        </div>
      </div>
    </div>
  </div>
</div>



<script>
  $(document).ready(function(){


      $(".like_dislike").click(function(){

          $.ajax({
            url : "likeOrDislikePost/"+ $(this).attr("data-id")+"/"+ $(this).attr("data-user-id")+"/"+ $(this).attr("id"),
            type : "GET",
            success: function(data){
            }
          });
        });
    });

</script>


@endsection
