@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Cập nhật sản phẩm')

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> @yield('title') </h3>
            <h3 class="box-title pull-right"> <a class="btn btn-primary" href="{{ url('admin/products') }}">
                    <i class="fa fa-list"></i> Danh sách</a>
            </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="" role="form">
            @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- @php
                            $product1 = $product->product_category_id;
                            showCategories($product_categories, $product1,);
                        @endphp --}}
                            <label>Danh mục sản phẩm</label>
                            <select name="product_category_id" class="form-control select2" style="width: 100%;">
                                {{-- @foreach ($product_categories as $item)
                                    <option {{ $item->id == $product->product_category_id ? 'selected' : '' }}
                                        value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach --}}
                                @php
                                    showCategories($product_categories, $product->product_category_id);
                                @endphp
                                @php
                                    function showCategories($categories, $product, $parent_id = 0, $char = '')
                                    {
                                        foreach ($categories as $key => $item) {
                                            // Nếu là chuyên mục con thì hiển thị
                                            if ($item['parent_id'] == $parent_id) {
                                                // Xử lý hiển thị chuyên mục
                                                if ($item->parent_id == 0) {
                                                    echo ' <option disabled >' . $item->name . '</option>';
                                                } elseif ($item->id == $product) {
                                                    echo ' <option selected value=" ' . $item->id . '">' . $char . $item->name . '</option>';
                                                } else {
                                                    # code...
                                                    echo ' <option value=" ' . $item->id . '">' . $char . $item->name . '</option>';
                                                }
                                                // Xóa chuyên mục đã lặp
                                                unset($categories[$key]);
                                                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                                                showCategories($categories, $product, $item['id'], $char . '|--- ');
                                            }
                                        }
                                    }
                                    
                                @endphp
                            </select>
                        </div>
                        <div class="form-group @error('name') has-error @enderror ">
                            <label for="name">Tên</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{ $product->name }}" onkeyup="ChangeToSlug()" placeholder="Tên sản phẩm ...">
                            @error('name')
                                <div class="text-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group @error('slug') has-error @enderror">
                            <label for="">Slug</label>
                            <input class="form-control" id="slug" type="text" name="slug"
                                value="{{ $product->slug }}">
                        </div>

                        <div class="form-group @error('price') has-error @enderror">
                            <label for="">Giá</label>
                            <div class="input-group">
                                <input type="text" name="price" class="form-control" id="price" min="0"
                                    placeholder="Giá sản phẩm ..." value="{{ $product->price }}">
                                <span class="input-group-addon">VND</span>
                            </div>
                            @error('price')
                                <div class="text-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group @error('discount') has-error @enderror">
                            <label for="">Giá khuyến mãi</label>
                            <div class="input-group">
                                <input type="text" name="discount" class="form-control" id="discount" min="0"
                                    placeholder="Giá khuyến mãi sản phẩm ...(Có thể trống)"
                                    value="{{ $product->discount }}">
                                <span class="input-group-addon">VND</span>
                            </div>
                            @if (Session::has('errorPrice'))
                                <div class="text-danger">
                                    <p>{{ Session::get('errorPrice') }}</p>
                                </div>
                                @php
                                    Session::forget('errorPrice');
                                @endphp
                            @endif
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="form-group @error('size') has-error @enderror">
                            <label>Size</label>
                            <select class="form-control select2" name="size[]" multiple="multiple"
                                data-placeholder="Chọn size" style="width: 100%;">
                                @foreach ($product_size as $item)
                                    @php
                                        $data = explode(',', $item->size);
                                    @endphp
                                    <option @if (in_array('S', $data)) selected @endif value="S">S</option>
                                    <option @if (in_array('M', $data)) selected @endif value="M">M</option>
                                    <option @if (in_array('L', $data)) selected @endif value="L">L</option>
                                    <option @if (in_array('XL', $data)) selected @endif value="XL">XL</option>
                                    <option @if (in_array('2XL', $data)) selected @endif value="2XL">2XL
                                    </option>
                                    <option @if (in_array('3XL', $data)) selected @endif value="3XL">3XL
                                    </option>
                                    <option @if (in_array('37', $data)) selected @endif value="37">37</option>
                                    <option @if (in_array('38', $data)) selected @endif value="38">38</option>
                                    <option @if (in_array('39', $data)) selected @endif value="39">39</option>
                                    <option @if (in_array('40', $data)) selected @endif value="40">40
                                    </option>
                                    <option @if (in_array('41', $data)) selected @endif value="41">41
                                    </option>
                                    <option @if (in_array('42', $data)) selected @endif value="42">42
                                    </option>
                                    <option @if (in_array('43', $data)) selected @endif value="43">43
                                    </option>
                                    <option @if (in_array('44', $data)) selected @endif value="44">44
                                    </option>
                                @endforeach
                            </select>
                            @error('size')
                                <div class="text-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group @error('qty') has-error @enderror">
                            <label for="">Số lượng</label>
                            <input type="number" name="qty" class="form-control" min="0"
                                placeholder="Số lượng sản phẩm ..." value="{{ $product->qty }}">
                            @error('qty')
                                <div class="text-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group @error('images') has-error @enderror">
                            <label for="">Ảnh</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder"
                                        class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Chọn ảnh
                                    </a>
                                </span>
                                <input name="images" id="thumbnail" class="form-control" type="text"
                                    name="filepath" value="{{ $product->images }}">
                            </div>
                            @error('images')
                                <div class="text-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                            <div id="holder" style="margin-top:10px;">
                                @php
                                $images = explode(',', $product->images);
                            @endphp
                            @foreach ($images as $item)
                                <img style="height: 80px; margin: 2px;" src="{{ $item }}"
                                    alt="">
                            @endforeach
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group @error('description') has-error @enderror">
                    <label>Mô tả</label>
                    <textarea class="form-control" name="description" rows="2">{{ old('description') }}{{ $product->description }} </textarea>
                    @error('description')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group @error('content') has-error @enderror">
                    <label>Nội dung</label>
                    <textarea id="editor2" name="content" rows="10" cols="80">{{ old('content') }}
                        {{ $product->content }} </textarea>
                    @error('content')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group @error('status') has-error @enderror">
                    <label for="">Trạng thái</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" id="" value="active"
                                {{ $product->status == 'active' ? 'checked' : '' }}>
                            Kích hoạt
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" id="" value="inactive"
                                {{ $product->status == 'inactive' ? 'checked' : '' }}>
                            Không kích hoạt
                        </label>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button id="confirm" type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
        </form>
    </div>
</section>

@section('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('#confirm').on('click', function(ev) {
        var form = $(this).closest('form');
        ev.preventDefault()
        Swal.fire({
            title: 'Cập nhật',
            text: "Bạn có muốn cập nhật lại hay không?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit()
            }
        })
    })
</script>

    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

    <script src="{{ asset('back/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- CK Editor -->
    <script src="{{ asset('back/bower_components/ckeditor/ckeditor.js') }}"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: 'laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: 'laravel-filemanager/upload?type=Images&_token=',
        };
        $('.select2').select2()

        $(function() {
            CKEDITOR.replace('editor2', options)
            $('.textarea').wysihtml5()
        })

        var route_prefix = "/laravel-filemanager";
        $('#lfm').filemanager('image', {
            prefix: route_prefix
        });
    </script>

{{-- slug --}}
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

    <script src=" https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
    <script>
        var cleave = new Cleave('#price', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
        var cleave = new Cleave('#discount', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
    </script>
@endsection

@endsection
