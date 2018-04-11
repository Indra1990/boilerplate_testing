@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
  <div class="row">
      <div class="col">
          <div class="card">
              <div class="card-header">
                  <strong>Edit Quote</strong>
              </div><!--card-header-->
                <div class="card-block">

                  <form action="{{ url('/admin/quotes/edit/'.$quote->id) }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                      <label for="nama">Title :</label>
                      <input type="text" class="form-control" name="title" value="{{ (old('title')) ? old('title') : $quote->title }}">
                    </div>
                    <div class="form-group">
                      <label for="no_telp">subject :</label>
                      <textarea class="form-control" name="subject" rows="10" value="{{ $quote->subject}}">{{ (old('subject')) ? old('subject') : $quote->subject }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                  </form>

                </div>
            </div>
        </div>
  </div>
@endsection
