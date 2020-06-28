@extends('template_editor.home')
@section('title', 'List Article')
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
                          <th>Author</th>                          
                          <th>Status</th>
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
                              {{ $res->users->name }}
                          </td>                          
                          <td>
                            <span class="badge badge-success">Publish</span>
                          </td>
                          <td>
                                <a href="{{ route('editor.postEdit', $res->id) }}" class="btn btn-warning">Edit</a>
                          </td>
                        </tr>
                        @endforeach
                      </table>
                      {{ $post->links() }}
                    </div>
@endsection