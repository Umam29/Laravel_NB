@extends('template_admin.home')
@section('title', 'List Editor')
@section('content')
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
                <div class="card">
                  <div class="card-body">
                    <a href="{{ route('admin.createEditor') }}" class="btn btn-primary mb-3">Add Editor</a>
                    <div class="table-responsive">
                      <table class="table table-hover table-striped table-bordered">
                        <tr>
                          <th>#</th>
                          <th>Full Name</th>
                          <th>Email</th>
                          <th>Action</th>
                        </tr>
                        @foreach($editor as $key => $res)
                        <tr>
                          <td scope="row">{{ $editor->firstItem() + $key }}</td>
                          <td>{{ $res->name }}</td>
                          <td>{{ $res->email }}</td>
                          <td>
                            <form action="{{ route('admin.destroyEditor', $res->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('admin.editEditor', $res->id) }}" class="btn btn-warning">Edit</a>
                                <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure?');">
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </table>
                      {{ $editor->links() }}
                    </div>
                  </div>
                </div>
              </div>
@endsection