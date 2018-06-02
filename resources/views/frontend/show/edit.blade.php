@extends('frontend.layouts.app')

@section('title', app_name() . ' | '.__('navs.general.home'))

@section('content')

  <form  class="form-horizontal" method="POST" action="{{url('show/'.$comment->id.'/edit')}}">
    {{ csrf_field() }}

  <div class="form-group error">
   <label for="inputName" class="col-sm-3 control-label">Subject</label>
     <div class="col-sm-9">
       <div class="form-group">
         <textarea class="form-control" id="subject" name="subject">{{ (old('subject')) ? old('subject') : $comment->subject }}</textarea>
       </div>
     </div>
     <input type="hidden" name="_method" value="PUT">

     <div class="col-md-8">
       <div class="form-group">
         <input type="submit" class="btn btn-primary" value="Submit" value="Edit Komentar">
       </div>
     </div>

    </div>
   </form>
@endsection
