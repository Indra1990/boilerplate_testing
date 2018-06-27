@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
{{-- <link rel="stylesheet" href="{{ asset('summernote/summernote-bs4.css') }}"> --}}
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


  <div class="row">
      <div class="col">
        @if(session('tag_error'))
          <div class="alert alert-danger">
            {{ session('tag_error') }}
          </div>
          @endif
          @if (count($errors) > 0)
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   @endif
          <div class="card">
              <div class="card-header">
                  <strong>Add Quote</strong>
              </div><!--card-header-->
                <div class="card-block">

                  <form action="{{url('admin/quotes/create')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                      <label for="nama">Title :</label>
                      <input type="text" class="form-control" name="title" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                      {{-- <label for="no_telp">subject :</label>
                      <textarea class="form-control" name="subject" rows="10" value="{{old('subject')}}"></textarea> --}}
                      <textarea class="summernote" name="subject"></textarea>
                       {{-- <textarea name="subject" id="summernote"></textarea> --}}

                    </div>
                    {{-- <div id="tag_wrapper" class="form-group">
                      <label for="no_telp">Tag Maximal 3 :</label>
                      <div id="add_tag"> Add Tag </div>
                        <select  id="tag_select" name="tags[]">
                          <option value="0">Tidak Ada</option>
                          @foreach ($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
                          @endforeach
                        </select>
                        <script type="text/javascript" src="{{ asset('js/tag.js') }}"></script>
                    </div> --}}
                    <div class="form-group">
                      <label>Tag Maximal 3 :</label>
                      <br>
                    <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple" >
                      @foreach ($tags as $tag)
                        <option value="{{$tag->id}}" >{{$tag->tag_name}}</option>
                      @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <input type="file" name="photos[]" multiple  id="file" onchange="return fileValidate()"/>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                  </form>

                </div>
            </div>
        </div>
  </div>
 {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script> --}}

 {{-- <script type="text/javascript" src="{{asset('js/summernote.min.js')}}"></script> --}}
 {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script> --}}
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
 <script>
 function fileValidate(){
   var fileInput = document.getElementById("file");
   var filePath = fileInput.value;
   var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
   if (!allowedExtensions.exec(filePath)) {
     alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
     fileInput.value = '';
     return false;
   }
 }
 </script>
<script type="text/javascript">
  $('.js-example-basic-multiple').select2();
</script>
 <script>
      $('.summernote').summernote({
        height: 300,
      });


 </script>


@endsection
