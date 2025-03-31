@extends('back/layouts/masterlayout')
@section('title', 'Danh sách Blog')
<section class="content">
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách bài viết</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Thêm bài viết mới
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Hình ảnh</th>
                                <th>Tiêu đề</th>
                                <th>Danh mục</th>
                                <th>Tác giả</th>
                                <th>Ngày tạo</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                            <tr>
                                <td>{{ $blog->id }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" style="max-width: 100px;">
                                </td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->category }}</td>
                                <td>{{ $blog->user->name }}</td>
                                <td>{{ $blog->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.blog.show', $blog->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.blog.destroy', $blog->id) }}" class="btn btn-danger btn-sm delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('back/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('back/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(function() {
            $('#example1').DataTable()
        })
    </script>

    <script>
        $('.delete').on('click', function(ev) {
            ev.preventDefault()
            var self = $(this)
            Swal.fire({
                title: 'Xóa',
                text: "Bạn có chắc muốn xóa mục này không?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Xóa'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = self.attr('href')
                }
            })
        })
    </script>

    @include('sweetalert::alert')
@endsection
