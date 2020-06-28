@extends('template_blog.home')
@section('title', 'Tes Blog')
@section('content')
            <div class="row">
            @foreach($data as $p)
              <div class="col-12 col-sm-6 col-md-6 col-lg-3">
              
                <article class="article">
                  <div class="article-header">
                    <div class="article-image" data-background="{{ asset($p->image) }}">
                    </div>
                    <div class="article-title">
                      <h2><a href="#">{{ $p->title }}</a></h2>
                    </div>
                  </div>
                  <div class="article-details">
                    <p>{{$p->description}}</p>
                    <div class="article-cta">
                      <a href="{{ route('blog.content', $p->slug) }}" class="btn btn-primary">Read More</a>
                    </div>
                  </div>
                </article>
                
              </div>
            @endforeach
            </div>
            {{ $data->links() }}
@endsection