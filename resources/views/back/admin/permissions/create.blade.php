@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Thêm mới quyền')

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> @yield('title') </h3>
            <h3 class="box-title pull-right"> <a class="btn btn-primary" href="{{ route('member.permissions') }}">
                    <i class="fa fa-list"></i> Danh sách</a>
            </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="" role="form">
            @csrf
            <div class="box-body">
                <div class="form-group @error('name') has-error @enderror">
                    <label for="name">Tên (*)</label>
                    <input id="name" type="text" name="name" class="form-control" placeholder="Tên quyền ..."
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
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


@endsection

@endsection
