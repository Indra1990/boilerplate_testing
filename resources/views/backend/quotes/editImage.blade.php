@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
  {{-- <link rel="stylesheet" href="{{asset('css/thumbnail-gallery.css')}}"> --}}

  <div class="row">
      <div class="col">
          <div class="card">
              <div class="card-header">
                  <strong>Edit Image </strong>
              </div><!--card-header-->
              <div class="card-block">
                <div class="card-group">
                  @foreach ($photo as $key)
                    {{-- <div class="card" style="width: 18rem;">
                      <img class="card-img-top" src="{{ asset('img/frontend/quoteImage/'.$key->filename) }}" alt="Card image cap">
                        <br>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div> --}}
                    <div class="card">
                      <img class="card-img-top"  src="{{ asset('img/frontend/quoteImage/'.$key->filename) }}"  alt="Card image cap">
                      <div class="card-body">
                          <p class="card-text"><a href="#" class="btn btn-primary">Delete Image</a></p>
                      </div>
                    </div>

                @endforeach

                </div><!--card-group-->
                <br>
                <form class="" action="index.html" method="post">
                  <div class="form-group">
                      <input type="file" name="photos[]" multiple  id="file" onchange="return fileValidate()"/>
                  </div>
                  <button type="submit" class="btn btn-success">Submit</button>

                </form>
              </div><!--card-block-->
          </div><!--card-->
      </div><!--col-->
  </div><!--row-->
@endsection
