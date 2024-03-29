@extends('template_admin.home')
@section('title', 'Edit User Type')
@section('content')
@if(count($errors)>0)
  @foreach($errors->all() as $error)
      <div class="alert alert-danger" role="alert">
        {{ $error }}
      </div>
  @endforeach
@endif
                <form action="{{ route('user-types.update', $data->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-8 col-md-3 col-lg-3">Type</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" id="type" name="type" value="{{ $data->types }}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Save</button>
                        <a href="{{ route('user-types.index') }}" class="btn btn-dark">Cancel</a>
                      </div>
                    </div>
                </form>
@endsection