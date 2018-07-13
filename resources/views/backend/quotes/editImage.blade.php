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
                          <p class="card-text">
                            <form  action="{{ url('admin/quotes/editImage/'.$key->id)}}" method="post">
                              {{ csrf_field() }}
                              <input type="hidden" name="_method" value="DELETE">
                              <input  type="submit" class="btn btn-danger" value="Delete">
                            </form>
                      </div>
                    </div>

                @endforeach

                </div><!--card-group-->
                <br>
                <form  action="{{ url('/admin/quotes/editImage/'.$quote->slug) }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}

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
