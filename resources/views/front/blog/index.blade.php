@extends('front.layouts.master')
@section('title', 'Blog')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <h1 class="mb-4">Blog</h1>
            
            @foreach($blogs as $blog)
            <div class="card mb-4">
                <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
                <div class="card-body">
                    <h2 class="card-title">{{ $blog->title }}</h2>
                    <p class="card-text">{{ $blog->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-sm btn-outline-primary">Đọc thêm</a>
                        </div>
                        <small class="text-muted">{{ $blog->created_at->format('d/m/Y') }}</small>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="mt-4">
                {{ $blogs->links() }}
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
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
        </div>
    </div>
</div>
@endsection 