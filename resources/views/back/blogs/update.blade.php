@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Cập nhật thương hiệu')

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> @yield('title') </h3>

            <h3 class="box-title pull-right"> <a class="btn btn-primary" href="{{ route('brands') }}">
                    <i class="fa fa-list"></i>  Danh sách</a>
            </h3>

        </div>

        <!-- /.box-header -->
        <!-- form start -->
        <form id="form1" method="POST" action="" role="form">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Tên</label>
                    <input value="{{ $brands->name }}" type="text" name="name" class="form-control"
                        id="name" placeholder="Tên danh mục sản phẩm ...">
                </div>
                @if ($errors->any())
                <div class="text-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button id="xac_nhan" type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
        </form>
    </div>
</section>

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('sweetalert::alert')

    <script>
        $('#xac_nhan').on('click', function(ev) {
            ev.preventDefault()
            var self = $(this)
            Swal.fire({
                title: 'Cập nhật',
                text: "Bạn có muốn cập nhật lại hay không?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Đồng ý',
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form1').submit();
                }
            })
        })
    </script>

@endsection

@endsection
