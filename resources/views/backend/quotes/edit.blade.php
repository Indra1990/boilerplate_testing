@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

  <div class="row">
      <div class="col">
          <div class="card">
              <div class="card-header">
                  <strong>Edit Quote</strong>
              </div><!--card-header-->
                <div class="card-block">

                  <form action="{{ url('/admin/quotes/edit/'.$quote->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                      <label for="nama">Title :</label>
                      <input type="text" class="form-control" name="title" value="{{ (old('title')) ? old('title') : $quote->title }}">
                    </div>
                    <div class="form-group">
                      <label for="no_telp">subject :</label>
                      {{-- <textarea class="form-control" name="subject" rows="10" value="{{ $quote->subject}}">{{ (old('subject')) ? old('subject') : $quote->subject }}</textarea> --}}
                      <textarea id="summernote" name="subject">{{ (old('subject')) ? old('subject') : $quote->subject }}</textarea>

                    </div>

                    {{-- <div id="tag_wrapper" class="form-group">
                      <label for="no_telp">Tag Maximal 3 :</label>
                      <div id="add_tag"> Add Tag </div>

                        @foreach ($quote->tags as $oldtag)
                          <select  id="tag_select" name="tags[]">
                            <option value="0">Tidak Ada</option>
                            @foreach ($tags as $tag)
                              <option value="{{$tag->id}}" @if($oldtag->id == $tag->id) selected="selected" @endif>{{$tag->tag_name}}</option>
                            @endforeach
                          </select>
                        @endforeach

                      <script type="text/javascript" src="{{ asset('js/tag.js') }}"></script>
                    </div> --}}

                    <div class="form-group">
                      <label>Tag Maximal 3 :</label>
                      <br>
                      <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
                          @foreach ($tags as $tag)
                          <option value="{{$tag->id}}" @if(in_array($tag->id, $selected)) selected="selected" @endif>{{$tag->tag_name}}</option>
                          @endforeach
                      </select>
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                  </form>


                </div>
            </div>
        </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
 <script type="text/javascript">
   $('.js-example-basic-multiple').select2();
 </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
  <script>
    $('#summernote').summernote({
      placeholder: 'Hello bootstrap 4',
      tabsize: 2,
      height: 100,
      multiple: true,

    });
  </script>
@endsection
