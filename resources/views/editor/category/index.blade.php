@extends('template_editor.home')
@section('title', 'List Category')
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
                    <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">Add Category</a>
                    <div class="table-responsive">
                      <table class="table table-hover table-striped table-bordered">
                        <tr>
                          <th>#</th>
                          <th>Category Name</th>
                          <th>Action</th>
                        </tr>
                        @foreach($category as $key => $res)
                        <tr>
                          <td scope="row">{{ $category->firstItem() + $key }}</td>
                          <td>{{ $res->category_name }}</td>
                          <td>
                            <form action="{{ route('category.destroy', $res->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('category.edit', $res->id) }}" class="btn btn-warning">Edit</a>
                                <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure?');">
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </table>
                      {{ $category->links() }}
                    </div>
                  </div>
                </div>
              </div>
@endsection