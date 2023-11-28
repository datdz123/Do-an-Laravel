@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Cập nhật danh mục sản phẩm')

{{-- <section class="content-header">
    <h1>
      General Form Elements
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">General Elements</li>
    </ol>
  </section> --}}
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> @yield('title') </h3>

            <h3 class="box-title pull-right"> <a class="btn btn-primary" href="{{ route('product_categories') }}">
                    <i class="fa fa-list"></i> Danh sách</a>
            </h3>

        </div>

        <!-- /.box-header -->
        <!-- form start -->
        <form id="form1" method="POST" action="" role="form">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label>Danh mục gốc</label>
                    <select name="parent_id" class="form-control select2" style="width: 100%;">
                        @foreach ($product_categories as $item)
                            <option  {{ $item->id == $category->parent_id ? 'selected' : '' }}
                                 value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                        <option {{$category->parent_id== 0 ? 'selected' : ""}} value="0"> --- Danh mục gốc</option>
                    </select>
                </div>
                <div class="form-group @error('name') has-error @enderror">
                    <label for="name">Tên</label>
                    <input value="{{ $category->name }}" type="text" name="name" class="form-control"
                    onkeyup="ChangeToSlug()"  id="name" placeholder="Tên danh mục sản phẩm ...">
                    @if ($errors->any())
                    <div class="text-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                </div>
                <div class="form-group">
                    <label for="">Slug</label>
                    <input class="form-control" id="slug" type="text" name="slug" value="{{ $category->slug }}">
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button id="xac_nhan" type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
        </form>
    </div>
</section>

@section('js')

    <script src="{{ asset('back/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $('.select2').select2()
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
    <script language="javascript">
        function ChangeToSlug() {
            var title, slug;

            //Lấy text từ thẻ input title 
            title = document.getElementById("name").value;

            //Đổi chữ hoa thành chữ thường
            slug = title.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            document.getElementById('slug').value = slug;
        }
    </script>

@endsection

@endsection