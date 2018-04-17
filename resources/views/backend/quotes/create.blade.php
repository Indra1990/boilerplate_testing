@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

  <div class="row">
      <div class="col">
        @if(session('tag_error'))
          <div class="alert alert-danger">
            {{ session('tag_error') }}
          </div>
          @endif
          <div class="card">
              <div class="card-header">
                  <strong>Add Quote</strong>
              </div><!--card-header-->
                <div class="card-block">

                  <form action="{{url('admin/quotes/create')}}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                      <label for="nama">Title :</label>
                      <input type="text" class="form-control" name="title" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                      <label for="no_telp">subject :</label>
                      <textarea class="form-control" name="subject" rows="10" value="{{old('subject')}}"></textarea>
                    </div>
                    <div id="tag_wrapper" class="form-group">
                      <label for="no_telp">Tag Maximal 3 :</label>
                      <div id="add_tag"> Add Tag </div>
                        <select  id="tag_select" name="tags[]">
                          <option value="0">Tidak Ada</option>
                          @foreach ($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
                          @endforeach
                        </select>
                        <script type="text/javascript" src="{{ asset('js/tag.js') }}"></script>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                  </form>

                </div>
            </div>
        </div>
  </div>

@endsection
