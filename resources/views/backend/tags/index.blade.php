@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
  <div class="row">
      <div class="col">
        @if(Session::has('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-info-circle"></i>    {{ Session::get('success') }}
        </div>
        @endif
          <a href="{{ url('admin/tags/create') }}" class="btn btn-secondary">Add tags</a>
          <br><br>
          <div class="card">
              <div class="card-header">
                  <strong>{{ __('strings.backend.dashboard.welcome') }} {{ $logged_in_user->name }}!</strong>
              </div><!--card-header-->
                <div class="card-block">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Name Tags</th>
                        <th>Date Time</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($tags as $tag)
                      <tr>
                        <td>{{ $tag->tag_name }}</td>
                        <td>{{ $tag->created_at}}</td>
                        <td>
                        <a href="{{ url('admin/tags/edit/'.$tag->slug)}}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                          <a href="" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                          <a href="" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>

                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>

                </div><!--card-block-->

          </div><!--card-->
      </div><!--col-->
  </div>
@endsection
