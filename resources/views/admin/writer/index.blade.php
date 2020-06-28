@extends('template_admin.home')
@section('title', 'List Writer')
@section('content')
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session('success') }}
    </div>
@endif
                <div class="card">
                  <div class="card-body">
                    <a href="{{ route('admin.createWriter') }}" class="btn btn-primary mb-3">Add Writer</a>
                    <div class="table-responsive">
                      <table class="table table-hover table-striped table-bordered">
                        <tr>
                          <th>#</th>
                          <th>Full Name</th>
                          <th>Email</th>
                          <th>Action</th>
                        </tr>
                        @foreach($writer as $key => $res)
                        <tr>
                          <td scope="row">{{ $writer->firstItem() + $key }}</td>
                          <td>{{ $res->name }}</td>
                          <td>{{ $res->email }}</td>
                          <td>
                            <form action="{{ route('admin.destroyWriter', $res->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('admin.editWriter', $res->id) }}" class="btn btn-warning">Edit</a>
                                <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure?');">
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </table>
                      {{ $writer->links() }}
                    </div>
                  </div>
                </div>
              </div>
@endsection