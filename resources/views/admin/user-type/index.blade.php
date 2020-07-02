@extends('template_admin.home')
@section('title', 'List User Type')
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
                    <a href="{{ route('user-types.create') }}" class="btn btn-primary mb-3">Add User Type</a>
                    <div class="table-responsive">
                      <table class="table table-hover table-striped table-bordered">
                        <tr>
                          <th>#</th>
                          <th>Type</th>
                          <th>Action</th>
                        </tr>
                        @foreach($data as $key => $res)
                        <tr>
                          <td scope="row">{{ $data->firstItem() + $key }}</td>
                          <td>{{ $res->types }}</td>
                          <td>
                            <form action="{{ route('user-types.destroy', $res->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('user-types.edit', $res->id) }}" class="btn btn-warning">Edit</a>
                                <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure?');">
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </table>
                      {{ $data->links() }}
                    </div>
                  </div>
                </div>
              </div>
@endsection