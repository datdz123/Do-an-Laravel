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
                                @php
                                    showCategories($product_categories);
                                @endphp
                                @php
                                    function showCategories($categories, $parent_id = 0, $char = '')
                                    {
                                        foreach ($categories as $key => $item) {
                                            // Nếu là chuyên mục con thì hiển thị
                                            if ($item['parent_id'] == $parent_id) {
                                                // Xử lý hiển thị chuyên mục
                                                if($item->parent_id == 0){
                                                    echo ' <option disabled >' .$item->name . '</option>';
                                                }else {
                                                    # code...
                                                    echo ' <option value=" ' . $item->id . '">' . $char . $item->name . '</option>';
                                                }
                                                // Xóa chuyên mục đã lặp
                                                unset($categories[$key]);
                                                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                                                showCategories($categories, $item['id'], $char . '|--- ');
                                            }
                                        }
                                    }
                                @endphp
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

        //     // DOM utility functions:

        // const el = (sel, par) => (par || document).querySelector(sel);
        // const elNew = (tag, props) => Object.assign(document.createElement(tag), props);


        // // Preview images before upload:

        // const elFiles = el("#files");
        // const elPreview = el("#preview");

        // const previewImage = (props) => elPreview.append(elNew("img", props));

        // const reader = (file, method = "readAsDataURL") => new Promise((resolve, reject) => {
        //   const fr = new FileReader();
        //   fr.onload = () => resolve({ file, result: fr.result });
        //   fr.onerror = (err) => reject(err);
        //   fr[method](file);
        // });

        // const previewImages = async(files) => {
        //   // Remove existing preview images
        //   elPreview.innerHTML = "";

        //   let filesData = [];

        //   try {
        //     // Read all files. Return Array of Promises
        //     const readerPromises = files.map((file) => reader(file));
        //     filesData = await Promise.all(readerPromises);
        //   } catch (err) {
        //     // Notify the user that something went wrong.
        //     elPreview.textContent = "An error occurred while loading images. Try again.";
        //     // In this specific case Promise.all() might be preferred over
        //     // Promise.allSettled(), since it isn't trivial to modify a FileList
        //     // to a subset of files of what the user initially selected.
        //     // Therefore, let's just stash the entire operation.
        //     console.error(err);
        //     return; // Exit function here.
        //   }

        //   // All OK. Preview images:
        //   filesData.forEach(data => {
        //     previewImage({
        //       src: data.result, // Base64 String
        //       alt: data.file.name // File.name String
        //     });
        //   });
        // };

        // elFiles.addEventListener("change", (ev) => {
        //   if (!ev.currentTarget.files) return; // Do nothing.
        //   previewImages([...ev.currentTarget.files]);
        // });
    </script>

    {{-- <script type="text/javascript">
        $(document).ready(function() {
            var maxField = 7; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML =
                `<div class="form-group">
            <div class="col-md-5">
                  <input class="form-control" style=" text-transform: uppercase;" type="text" name="size[]" value="" placeholder="Size" /></div>
                  <div class="col-md-5">
                      <input class="form-control" type="number" name="qty[]" value="" placeholder="Số lượng" />
                  </div>
            <a href="javascript:void(0);" class="btn btn-danger remove_button">Xóa</a></div></div>`; //New input field html 
            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function() {
                //Check maximum number of input fields
                if (x < maxField) {
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e) {
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
    </script> --}}


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

    {{-- <script>
        function formatmoney() {
            const number = document.getElementById('price').value;
            document.getElementById('formatPrice').innerHTML = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
            }).format(number);
        }
    </script> --}}

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
