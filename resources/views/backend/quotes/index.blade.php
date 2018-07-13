@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

  <meta name="_token" content="{{ csrf_token() }}" />

  <div class="row">
      <div class="col">
        @if(Session::has('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-info-circle"></i>    {{ Session::get('success') }}
        </div>
        @endif

        @if(Session::has('delete'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-info-circle"></i>    {{ Session::get('delete') }}
        </div>
        @endif

          <a href="{{ url('admin/quotes/create') }}" class="btn btn-secondary">Add Quote</a>
          <br>
          <div class="card">
              <div class="card-header">
                  <strong>{{ __('strings.backend.dashboard.welcome') }} {{ $logged_in_user->name }}!</strong>
              </div><!--card-header-->
                <div class="card-block">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Subject</th>
                        <th>Tags</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($quotes as $quote)
                      <tr id="quote{{$quote->id}}">
                        <td>{{ $quote->title }}</td>
                        <td>{!! $quote->subject !!}</td>
                        <td>
                        @foreach ($quote->tags as $tag)
                          @if ($tag->tag_name == "aku cinta indonesia")
                            <span class="badge badge-pill badge-primary">{{$tag->tag_name}}</span>
                          @endif
                          @if ($tag->tag_name == "cinta gila")
                            <span class="badge badge-pill badge-danger">{{$tag->tag_name}}</span>
                          @endif
                          @if ($tag->tag_name == "aku adalah aku")
                            <span class="badge badge-pill badge-success">{{$tag->tag_name}}</span>
                          @endif
                          <br>
                        @endforeach
                        </td>
                        <td>
                          <a href="{{ url('admin/quotes/edit/'.$quote->slug) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                          <a href="{{ url('admin/quotes/show/'.$quote->title) }}" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                          <button  class="btn btn-danger delete-quote" value="{{$quote->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  <?php echo $quotes->render(); ?>

                </div><!--card-block-->

          </div><!--card-->
      </div><!--col-->
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      var url = "http://localhost:8000/admin/quotes";

      $('.delete-quote').click(function() {
        var id_quote = $(this).val();
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
            type: "DELETE",
            url: url + '/' + id_quote,
            success: function (data) {
                console.log(data);
                $("#quote" + id_quote).remove();
                toastr.error('Deleted Quote Successfully.', 'Success Alert', {timeOut: 5000});

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
      });
    });

  </script>
@endsection
