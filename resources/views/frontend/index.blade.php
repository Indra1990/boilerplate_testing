@extends('frontend.layouts.app')

@section('title', app_name() . ' | '.__('navs.general.home'))

@section('content')
  <style media="screen">
      .test{
        margin: 20px;
      }
  </style>
      <!-- Navigation -->

      <!-- Page Content -->
      <div class="container">

        <div class="row">

          <!-- Blog Entries Column -->
          <div class="col-md-8">
            @foreach ($quotes as $quote)

            <!-- Blog Post -->

            <div class="card mb-4">
              <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
              <div class="card-body">
                <h2 class="card-title">{{$quote->title}}</h2>
                <p class="card-text">{!!$quote->subject!!}</p>
                <div class="flex center">
                @foreach ($quote->tags as $tag)
                  @if ($tag->tag_name == "aku adalah aku")
                    <a href="{{url('/filter/'.$tag->slug)}}"><span class="badge badge-pill badge-primary"><i class="fa fa-tags"></i> {{$tag->tag_name}}</span></a>
                  @endif
                  @if ($tag->tag_name == "aku senag sekali")
                    <a href="{{url('/filter/'.$tag->slug)}}"><span class="badge badge-pill badge-danger"><i class="fa fa-tags"></i> {{$tag->tag_name}}</span></a>
                  @endif
                  @if ($tag->tag_name == "aku anak indonesia")
                    <a href="{{url('/filter/'.$tag->slug)}}"><span class="badge badge-pill badge-success"><i class="fa fa-tags"></i> {{$tag->tag_name}}</span></a>
                  @endif
                @endforeach
              </div>
              <br>
                <a href="{{ url('/show/'.$quote->slug) }}" class="btn btn-primary">Read More &rarr;</a>
              </div>
              <div class="card-footer text-muted">
                Posted on {{ date('d-m-Y', strtotime($quote->created_at)) }} by
                <a href="#">{{ $quote->user->name }}</a>
              </div>
            </div>
          @endforeach



            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
              <li class="page-item">
                <a class="page-link" href="#">&larr; Older</a>
              </li>
              <li class="page-item disabled">
                <a class="page-link" href="#">Newer &rarr;</a>
              </li>
            </ul>

          </div>

          <!-- Sidebar Widgets Column -->
          <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
              <h5 class="card-header">Search</h5>
              <div class="card-body">
                <form action="{{url('/')}}" method="get">
                <div class="input-group">
                  <input type="text" class="form-control" name="search" placeholder="Search for Quote">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">Go!</button>
                  </span>
                </div>
              </form>

              </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
              <h5 class="card-header">Tags</h5>
              <div class="card-body">

                <div class="row">
                  <div class="col-lg-10">
                    <ul class="list-unstyled mb-0">
                      @foreach ($tags as $tag)
                        <li>
                          {{-- <a href="{{url('/filter/'.$tag->slug)}}">{{$tag->tag_name}}</a> --}}
                          @if ($tag->tag_name == "aku adalah aku")
                            <a href="{{url('/filter/'.$tag->slug)}}"><span class="badge badge-pill badge-primary"><i class="fa fa-tags"></i> {{$tag->tag_name}}</span></a>
                          @endif
                          @if ($tag->tag_name == "aku senag sekali")
                            <a href="{{url('/filter/'.$tag->slug)}}"><span class="badge badge-pill badge-danger"><i class="fa fa-tags"></i> {{$tag->tag_name}}</span></a>
                          @endif
                          @if ($tag->tag_name == "aku anak indonesia")
                            <a href="{{url('/filter/'.$tag->slug)}}"><span class="badge badge-pill badge-success"><i class="fa fa-tags"></i> {{$tag->tag_name}}</span></a>
                          @endif
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
      <!-- /.container -->

      <!-- Footer -->
      <footer class="py-5 bg-dark">
        <div class="container">
          <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
        </div>
        <!-- /.container -->
      </footer>
@endsection
