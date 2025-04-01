@extends('back.layouts.master')
@section('title', 'Chi tiết bài viết')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chi tiết bài viết</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h2>{{ $blog->title }}</h2>
                            <div class="mb-3">
                                <span class="badge badge-{{ $blog->status === 'published' ? 'success' : 'warning' }}">
                                    {{ $blog->status === 'published' ? 'Đã xuất bản' : 'Nháp' }}
                                </span>
                            </div>
                            <div class="mb-4">
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-fluid">
                            </div>
                            <div class="mb-4">
                                <h5>Mô tả ngắn:</h5>
                                <p>{{ $blog->description }}</p>
                            </div>
                            <div>
                                <h5>Nội dung:</h5>
                                <div class="blog-content">
                                    {!! $blog->content !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Thông tin bài viết</h5>
                                </div>
                                <div class="card-body">
                                    <p><strong>Ngày tạo:</strong> {{ $blog->created_at->format('d/m/Y H:i') }}</p>
                                    <p><strong>Ngày cập nhật:</strong> {{ $blog->updated_at->format('d/m/Y H:i') }}</p>
                                </div>
                            </div>
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h5 class="card-title">Thao tác</h5>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-warning btn-block mb-2">
                                        <i class="fas fa-edit"></i> Chỉnh sửa
                                    </a>
                                    <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-block" 
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')">
                                            <i class="fas fa-trash"></i> Xóa
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 