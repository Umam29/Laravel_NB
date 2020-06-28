@extends('template_writer.home')
@section('title', 'Profile')
@section('content')
            <div class="section-body">
            <h2 class="section-title">Hi, {{ $writer->name }}!</h2>
            <p class="section-lead">
              Change information about yourself on this page.
            </p>
            @if(count($errors)>0)
              @foreach($errors->all() as $error)
                  <div class="alert alert-danger" role="alert">
                    {{ $error }}
                  </div>
              @endforeach
            @endif

            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                  {{ Session('success') }}
                </div>
            @endif

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">                     
                    <img alt="image" src="{{ asset($writer->avatar) }}" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Posts</div>
                        <div class="profile-widget-item-value">{{ $count_post }}</div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name">{{ $writer->name }} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Writer</div></div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <form action="" method="post" class="needs-validation" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                    <div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-5 col-12">
                            <label>Full Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $writer->name }}" required="">
                            <div class="invalid-feedback">
                              Please fill in the full name
                            </div>
                          </div>
                          <div class="form-group col-md-7 col-12">
                            <label>Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $writer->email }}" required="">
                            <div class="invalid-feedback">
                              Please fill in the email
                            </div>
                          </div>
                        </div>
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Avatar</label>
                          <div class="col-sm-12 col-md-7">
                            <div id="image-preview" class="image-preview">
                              <label for="image-upload" id="image-label">Choose File</label>
                              <input type="file" name="avatar" id="image-upload" />
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
@endsection