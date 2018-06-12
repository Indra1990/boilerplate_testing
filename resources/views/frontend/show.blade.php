@extends('frontend.layouts.app')

@section('title', app_name() . ' | '.__('navs.general.home'))

@section('content')

  <meta name="_token" content="{{ csrf_token() }}" />

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">{{$quote->title}}</h1>
        <!-- Author -->
        <hr>
        <!-- Date/Time -->
        <p>  Posted on {{ date('d-m-Y', strtotime($quote->created_at)) }} by <a href="#">{{ $quote->user->name }}</a></p>
        <hr>
        <!-- Preview Image -->
        <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">
        <hr>

        <!-- Post Content -->
        <p class="lead"> {{$quote->subject}}</p>

        <hr>

        <!-- Single Comment -->
          @foreach ($quote->comments as $comment)
            <div class="media mb-4" >
              <img class="d-flex mr-3 rounded-circle imgComment" src="@if(!empty($comment->user->avatar_location )){{ asset($comment->user->avatar_location) }} @else http://placehold.it/50x50 @endif" alt="">
              <div class="media-body">
                <h5 class="mt-0" >{{$comment->user->name}}</h5>
                {{ $comment->subject}}
                <br><br>
              {{--<a href="{{url('/show/'.$comment->id.'/edit')}}" class="btn btn-default ">Edit</a>--}}

            @if ($comment->isOwner())
              <div class="btn-group " role="group">

              <button href="{{url('/show/'.$comment->id.'/edit')}}"  class="btn btn-outline-primary">Edit</button>

              <form action="{{url('/show/'.$comment->id)}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <input  type="submit" class="btn btn-outline-danger" value="Delete">
                {{-- <button type="button" name="button" class="btn btn-outline-danger" >DELETE</button> --}}
              </form>
            </div>
            @endif
              <hr>
              </div>
            </div>
          @endforeach
          @if(session('msg'))
            <div class="alert alert-success">
            <p>{{ session('msg') }}</p>
            </div>
          @endif
        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form method="POST" action="{{ url('/show/'.$quote->id )}}">
              {{ csrf_field() }}
              <div class="form-group">
                <textarea class="form-control" rows="3" name="subject"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>





        <!-- Start Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
                <div class="form-group error">
                 <label for="inputName" class="col-sm-3 control-label">Subject</label>
                   <div class="col-sm-9">
                    <textarea class="form-control" id="subject" name="subject"></textarea>
                   </div>

                  </div>
                 </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modal -->

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Tags</h5>
          <div class="card-body">

            <div class="row">
              <div class="col-lg-10">
                <ul class="list-unstyled mb-0">
                  @foreach ($tags as $tag)
                    <li>
                      <a  href="{{url('/filter/'.$tag->slug)}}">{{$tag->tag_name}}</a>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>

  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
    </div>
    <!-- /.container -->
  </footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){


  // $('.open_modal').click(function(){
  //     var comment_id = $(this).val();
       //var id = $(this).val("id");
      // console.log(id);
  //   console.log(comment_id);
  // //  $.get(url + '/' + comment_id, function (data) {
  //   $.get(url + '/' + comment_id, function (data) {
  //
  //     console.log(data);
  //         $('#comment_id').val(data.id);
  //          $('#subject').val(data.subject);
  //          $('#btn-save').val("update");
  //          $('#exampleModal').modal('show');
  //      });
  //  });
});
//   http://www.expertphp.in/article/laravel-5-ajax-crud-example-to-build-web-application-without-page-refresh
  </script>
@endsection
