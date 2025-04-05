@extends('back.layouts.master')
@section('title', 'Chỉnh sửa bài viết')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chỉnh sửa bài viết</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title', $blog->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Mô tả ngắn</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="3" required>{{ old('description', $blog->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content">Nội dung</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" 
                                      id="content" name="content" rows="10" required>{{ old('content', $blog->content) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Hình ảnh</label>
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" style="max-width: 200px;">
                            </div>
                            <input type="file" class="form-control-file @error('image') is-invalid @enderror" 
                                   id="image" name="image">
                            <small class="form-text text-muted">Chỉ tải lên ảnh mới nếu muốn thay đổi ảnh hiện tại</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <select class="form-control @error('status') is-invalid @enderror" 
                                    id="status" name="status" required>
                                <option value="draft" {{ old('status', $blog->status) == 'draft' ? 'selected' : '' }}>Nháp</option>
                                <option value="published" {{ old('status', $blog->status) == 'published' ? 'selected' : '' }}>Xuất bản</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Cập nhật bài viết</button>
                            <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush
@endsection 