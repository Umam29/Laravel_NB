@extends('template_writer.home')
@section('title', 'List Draft')
@section('content')
            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">

                    <div class="table-responsive">
                      <table class="table table-hover table-striped table-bordered">
                        <tr>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Description</th>
                          <th>Author</th>                          
                          <th>Action</th>
                        </tr>
                        @foreach($post as $res)
                        <tr>
                          <td>
                            <img src="{{ asset($res->image) }}" class="img-thumbnail" width="100">
                          </td>
                          <td>{{ $res->title }}
                          </td>
                          <td>
                            {{ $res->category->category_name }}
                          </td>
                          <td>
                            {{ $res->description }}
                          </td>
                          <td>
                              {{ $res->consumers->name }}
                          </td>                          
                          <td>
                            <form action="{{ route('writer.postDelete', $res->id) }}" method="post">
                              @csrf
                              @method('delete')
                                <a href="{{ route('writer.postEdit', $res->id) }}" class="btn btn-warning">Edit</a>
                                <input type="submit" class="btn btn-danger" value="Trash" onclick="return confirm('Are you sure?');">
                              </form>
                          </td>
                        </tr>
                        @endforeach
                      </table>
                      {{ $post->links() }}
                    </div>
@endsection