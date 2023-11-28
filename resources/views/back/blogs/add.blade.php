@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Thêm mới thương hiệu')

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> @yield('title') </h3>
            <h3 class="box-title pull-right"> <a class="btn btn-primary" href="{{ route('brands') }}">
                    <i class="fa fa-list"></i> Danh sách</a>
            </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="" role="form">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Tên</label>
                    <input type="text" name="name" class="form-control" id="name"
                        placeholder="Tên thương hiệu ...">
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
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
        </form>
    </div>
</section>

@section('js')
    @include('sweetalert::alert')
@endsection

@endsection