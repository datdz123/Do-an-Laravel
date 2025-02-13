@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Thêm mới sản phẩm')

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
                {{-- @php
                showCategories($product_categories);
            @endphp --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Danh mục sản phẩm</label>
                            <select name="product_category_id" class="form-control select2" style="width: 100%;">
                                {{-- @foreach ($product_categories as $item)
                                    <option {{($item->parent_id == 0) ? 'disabled' : ""}} value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach --}}

                                    {{$showCategories::showCategoriesOptions($product_categories)}}


                            </select>
                        </div>
                        <div class="form-group @error('name') has-error @enderror">
                            <label for="name">Tên</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{ old('name') }}" onkeyup="ChangeToSlug()"
                                placeholder="Tên sản phẩm ...">
                            @error('name')
                                <div class="text-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group @error('slug') has-error @enderror">
                            <label for="">Slug</label>
                            <input class="form-control" id="slug" type="text" name="slug"
                                value="{{ old('slug') }}">
                        </div>

                        {{-- <div class="form-group @error('name') has-error @enderror">
                            <label for="">Ảnh sản phẩm</label>
                            <input accept="image/*" id="files" name="image[]" class="form-control" type="file" multiple>
                            <div id="preview"></div>
                            @error('image')
                            <div class="text-danger">
                                <p>{{ $message }}</p>
                            </div>
                        @enderror
                        </div> --}}

                        <div class="form-group @error('price') has-error @enderror">
                            <label for="">Giá</label>
                            <div class="input-group">
                                <input type="text" name="price" class="form-control" id="price" min="0"
                                    {{-- onkeyup="formatmoney()"  --}} placeholder="Giá sản phẩm ..." value="{{ old('price') }}">
                                <span class="input-group-addon">VND</span>
                            </div>
                            @error('price')
                                <div class="text-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                            {{-- <div class="text-info">
                                <p id="formatPrice"></p>
                            </div> --}}
                        </div>
                        <div class="form-group @if (Session::has('errorPrice')) has-error @endif">
                            <label for="">Giá khuyến mãi</label>
                            <div class="input-group">
                                <input type="text" name="discount" class="form-control" id="discount" min="0"
                                 placeholder="Giá khuyến mãi sản phẩm ...(Có thể trống)" value="{{ old('discount') }}">
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
                        {{-- <label for="">Thuộc tính sản phẩm</label>
                        <div class="row">
                            <div class="form-group @error('name') has-error @enderror">
                                <div class="col-md-5">
                                    <input class="form-control" style=" text-transform: uppercase;" type="text"
                                        name="size[]" value="" placeholder="Size" />
                                    @error('size[]')
                                        <div class="text-danger">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-5">
                                    <input class="form-control" type="number" name="qty[]" value=""
                                        placeholder="Số lượng" />
                                    @error('qty[]')
                                        <div class="text-danger">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                                <a href="javascript:void(0);" class="btn btn-primary add_button"
                                    title="Add field">Thêm</a>
                            </div>
                            <div class="field_wrapper"></div>
                        </div> --}}

                        <div class="form-group @error('size') has-error @enderror">
                            <label>Size</label>
                            <select class="form-control select2" name="size[]" multiple="multiple"
                                data-placeholder="Chọn size" style="width: 100%;">
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="2XL">2XL</option>
                                <option value="3XL">3XL</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
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
                                placeholder="Số lượng sản phẩm ..." value="{{ old('qty') }}">
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
                                    name="filepath">
                            </div>
                            @error('images')
                                <div class="text-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>

                        </div>

                    </div>
                </div>

                <div class="form-group @error('description') has-error @enderror">
                    <label>Mô tả</label>
                    <textarea class="form-control" id="" name="description" rows="2">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group @error('content') has-error @enderror">
                    <label>Nội dung</label>
                    <textarea id="editor2" name="content" rows="10" cols="80">{{ old('content') }}
                    </textarea>
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
                            <input type="radio" name="status" id="" value="active" checked="">
                            Kích hoạt
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" id="" value="inactive">
                            Không kích hoạt
                        </label>
                    </div>
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

    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

    <script src="{{ asset('back/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- CK Editor -->
    <script src="{{ asset('back/bower_components/ckeditor/ckeditor.js') }}"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            // filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            // filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
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
