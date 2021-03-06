@extends('template_editor.home')
@section('title', 'Edit Post')
@section('content')
@if(count($errors)>0)
@foreach($errors->all() as $error)
    <div class="col-md-6 mx-auto">
      <div class="alert alert-danger" role="alert">
        {{ $error }}
      </div>
    </div>
  @endforeach
@endif
            <form action="{{ route('editor.postUpdate', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
                <div class="card">
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="category" id="category">
                            <option value="" holder>Select Category</option>
                            @foreach($category as $res)
                            <option  value="{{ $res->id }}"
                            @if($post->category_id == $res->id)
                            selected
                            @endif
                            >{{ $res->category_name }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="desc" id="desc" value="{{ $post->description }}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Body</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="summernote-simple" name="body" id="body">{!! $post->body !!}</textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="avatar" id="image-upload" />
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="status" id="status">
                            <option value="" holder>Select Status</option>
                            <option value="publish"
                            @if($post->status == "publish")
                            selected
                            @endif
                            >Publish</option>
                            <option value="reject"
                            @if($post->type == "reject")
                            selected
                            @endif
                            >Reject</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Reason</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="reason" id="reason" value="{{ $post->reason }}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Save Change</button>
                      </div>
                    </div>
                  </div>
                </div>
            </form>
@endsection