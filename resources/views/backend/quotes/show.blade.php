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
          <br>
          <div class="card">
              <div class="card-header">
                  <strong>{{ $quote->title}}</strong>
              </div><!--card-header-->
                <div class="card-block">
                  <div class="jumbotron">
                    <p>{{$quote->subject}}</p>
                    <p>Di Tulis Oleh : <a href="">{{ $quote->user->name }}</a></p>
                    <a href="{{url('/admin/quotes')}}" class="btn btn-primary">kembali ke index</a>

                  </div>
                </div><!--card-block-->
          </div><!--card-->
      </div><!--col-->
  </div>
@endsection
