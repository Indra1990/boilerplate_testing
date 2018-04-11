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
          <div class="card">
              <div class="card-header">
                  <strong>{{ __('strings.backend.dashboard.welcome') }} {{ $logged_in_user->name }}!</strong>
              </div><!--card-header-->
              <div class="card-block">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>No Telp</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($items as $item)
                    <tr>
                      <td>{{ $item->nama_barang}}</td>
                      <td>{{ $item->no_telp}}</td>
                      <td>
                        <a href="{{ url('admin/item/edit/'.$item->nama_barang) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a href="" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                <?php echo $items->render(); ?>
              </div><!--card-block-->
          </div><!--card-->
      </div><!--col-->
  </div><!
@endsection
