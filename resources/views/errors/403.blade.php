@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Không thể truy cập trang này')

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> @yield('title') </h3>
          
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <section class="content">
            <div class="error-page">
              <h2 class="headline text-yellow"> 403</h2>
      
              <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i> Oops! Bạn không có quyền truy cập vào đường dẫn này.</h3>
      
                <p>
                  Bạn bị giới hạn quyền truy cập.
                  {{Auth::user()->name}}, bạn có thể <a href="{{route('dashboard')}}">quay trở lại trang chủ</a> hoặc tìm kiếm đường link qua form này.
                </p>
      
                <form class="search-form">
                  <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search">
      
                    <div class="input-group-btn">
                      <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.input-group -->
                </form>
              </div>
              <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
          </section>
    </div>
</section>

@section('js')


@endsection

@endsection
