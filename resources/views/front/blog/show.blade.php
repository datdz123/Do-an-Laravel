@extends('front.layouts.master')
@section('title', $blog->title)

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <article>
                <header class="mb-4">
                    <h1 class="fw-bolder mb-1">{{ $blog->title }}</h1>
                    <div class="text-muted fst-italic mb-2">
                        Đăng ngày {{ $blog->created_at->format('d/m/Y') }}
                    </div>
                </header>

                <figure class="mb-4">
                    <img class="img-fluid rounded" src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                </figure>

                <section class="mb-5">
                    <p class="fs-5 mb-4">{{ $blog->description }}</p>
                    <div class="blog-content">
                        {!! $blog->content !!}
                    </div>
                </section>
            </article>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Bài viết mới nhất</h5>
                </div>
                <div class="card-body">
                    @foreach($latestBlogs as $latestBlog)
                    <div class="mb-3">
                        <a href="{{ route('blog.show', $latestBlog->id) }}" class="text-decoration-none">
                            <h6 class="mb-1">{{ $latestBlog->title }}</h6>
                            <small class="text-muted">{{ $latestBlog->created_at->format('d/m/Y') }}</small>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Chia sẻ</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-around">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" 
                           class="btn btn-primary" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $blog->title }}" 
                           class="btn btn-info" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ $blog->title }}" 
                           class="btn btn-primary" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 