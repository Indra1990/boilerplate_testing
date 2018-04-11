@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
  <div class="row">
      <div class="col">
          <div class="card">
              <div class="card-header">
                  <strong>{{ __('strings.backend.dashboard.welcome') }} {{ $logged_in_user->name }}!</strong>
              </div><!--card-header-->
                <div class="card-block">

                  <form action="{{ url('/admin/item/edit/'.$item->id)}}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                      <label for="nama">Nama :</label>
                      <input type="text" class="form-control" name="nama_barang" id="email" value="{{ $item->nama_barang}}">
                    </div>
                    <div class="form-group">
                      <label for="no_telp">No Telp :</label>
                      <input type="text" class="form-control" name="no_telp" id="" value="{{ $item->no_telp}}">
                    </div>

                    <button type="submit" class="btn btn-default">Submit</button>
                  </form>

                </div>
            </div>
        </div>
  </div>
@endsection
