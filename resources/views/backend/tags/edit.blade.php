
@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
  <div class="row">
      <div class="col">
          <div class="card">
              <div class="card-header">
                  <strong>Edit Tags</strong>
              </div><!--card-header-->
                <div class="card-block">

                  <form action="{{ url('/admin/tags/edit/'.$tag->id) }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                      <label for="nama">Tag :</label>
                      <input type="text" class="form-control" name="tag_name" value="{{ (old('tag_name')) ? old('tag_name') : $tag->tag_name }}">
                    </div>


                    <button type="submit" class="btn btn-success">Submit</button>
                  </form>

                </div>
            </div>
        </div>
  </div>
@endsection
