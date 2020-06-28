@extends('template_blog.home')
@section('title', 'Tes Blog')
@section('content')
            
            <div class="row">
              @foreach($data as $res)
              <div class="col-12 col-md-12 col-lg-12">              
                <article class="article article-style-c">
                  <div class="article-header">
                    <div class="article-image" data-background="{{ asset($res->image) }}">
                    </div>
                  </div>
                  <div class="article-details">
                    <div class="article-category"><a href="{{ route('blog.content.category', $res->category->slug) }}">{{ $res->category->category_name }}</a> <div class="bullet"></div> {{ $res->created_at->diffForHumans() }}</div>
                    <div class="article-title">
                      <h2><a href="#">{{ $res->title }}</a></h2>
                    </div>
                    {!! $res->body !!}
                    <div class="article-user">
                      <img alt="image" src="{{ asset($res->users->avatar) }}">
                      <div class="article-user-details">
                        <div class="user-detail-name">
                          <a href="{{ route('blog.content.user', $res->users_id) }}">{{ $res->users->name }}</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </article>
              </div>
              @endforeach
            </div>
            
@endsection