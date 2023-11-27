@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Phân quyền')

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> @yield('title') cho {{ $admin->name }}</h3>
            <h3 class="box-title pull-right"> <a class="btn btn-primary" href="{{ route('admins') }}">
                    <i class="fa fa-list"></i> Danh sách</a>
            </h3>
        </div>
        <!-- /.box-header -->

        <!-- form start -->
        <form method="POST" action="{{ route('admin.store') }}" role="form">
            @csrf
            @method('PUT')
            <div class="box-body">
                <div class="form-group">
                    @foreach ($role as $item)
                        <!-- checkbox -->
                        <label style="margin-right: 15px">
                            <input type="checkbox" class="flat-red" value="{{ $item->name }}"> {{ $item->name }}
                        </label>
                    @endforeach
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
        </form>
    </div>
</section>

@section('js')
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('back/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        })
    </script>

@endsection

@endsection
