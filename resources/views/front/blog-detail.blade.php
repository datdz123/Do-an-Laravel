@extends('front/layouts/masterlayout')
@section('content')
@section('title', 'Chi tiết bài viết')

@include('front.components.top-bar')

<div class="container py-5">
    <div class="row">
        <!-- Nội dung chính -->
        <div class="col-lg-8">
            <article class="blog-detail">
                <div class="blog-detail-header">
                    <div class="blog-detail-image">
                        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                             class="img-fluid rounded" alt="Xu hướng thời trang 2023">
                    </div>
                    <div class="blog-detail-meta mt-4">
                        <span class="blog-detail-date">
                            <i class="fa fa-calendar mr-2"></i>15 Tháng 6, 2023
                        </span>
                        <span class="blog-detail-author ml-4">
                            <i class="fa fa-user mr-2"></i>Admin
                        </span>
                        <span class="blog-detail-category ml-4">
                            <i class="fa fa-folder mr-2"></i>
                            <a href="#" class="text-primary">Thời trang</a>
                        </span>
                        <span class="blog-detail-comments ml-4">
                            <i class="fa fa-comments mr-2"></i>12 bình luận
                        </span>
                    </div>
                </div>

                <div class="blog-detail-content mt-4">
                    <h1 class="blog-detail-title">Xu hướng thời trang 2023: Phong cách tối giản và bền vững</h1>
                    
                    <div class="blog-detail-text">
                        <p>Năm 2023 đánh dấu một bước ngoặt lớn trong ngành thời trang, khi xu hướng tối giản và bền vững trở thành tâm điểm của sự chú ý. Không chỉ là một trào lưu nhất thời, đây là sự thay đổi mang tính cách mạng trong cách chúng ta suy nghĩ về thời trang.</p>

                        <h2>1. Phong cách tối giản: Less is more</h2>
                        <p>Phong cách tối giản không còn là một khái niệm xa lạ, nhưng trong năm 2023, nó được nâng tầm lên một mức độ mới. Các nhà thiết kế tập trung vào:</p>
                        <ul>
                            <li>Đường cắt đơn giản nhưng tinh tế</li>
                            <li>Màu sắc trung tính và tone-on-tone</li>
                            <li>Chất liệu cao cấp và bền bỉ</li>
                            <li>Thiết kế đa năng, có thể mix & match</li>
                        </ul>

                        <h2>2. Thời trang bền vững: Xu hướng tất yếu</h2>
                        <p>Với sự quan tâm ngày càng lớn về môi trường, thời trang bền vững đã trở thành một phần không thể thiếu trong tủ quần áo của người tiêu dùng hiện đại. Các thương hiệu đang:</p>
                        <ul>
                            <li>Sử dụng chất liệu tái chế và thân thiện với môi trường</li>
                            <li>Áp dụng quy trình sản xuất bền vững</li>
                            <li>Giảm thiểu chất thải trong quá trình sản xuất</li>
                            <li>Khuyến khích tái sử dụng và tái chế quần áo</li>
                        </ul>

                        <h2>3. Cách phối đồ theo xu hướng mới</h2>
                        <p>Để theo kịp xu hướng này, bạn có thể bắt đầu với những bước đơn giản:</p>
                        <ol>
                            <li>Lựa chọn những món đồ cơ bản, chất lượng cao</li>
                            <li>Ưu tiên các thương hiệu bền vững</li>
                            <li>Học cách mix & match linh hoạt</li>
                            <li>Đầu tư vào phụ kiện chất lượng</li>
                        </ol>

                        <blockquote class="blockquote">
                            <p class="mb-0">"Thời trang bền vững không chỉ là một xu hướng, đó là trách nhiệm của mỗi chúng ta đối với tương lai của hành tinh."</p>
                            <footer class="blockquote-footer">Chuyên gia thời trang</footer>
                        </blockquote>
                    </div>

                    <div class="blog-detail-tags mt-4">
                        <span class="font-weight-bold">Tags:</span>
                        <a href="#" class="badge badge-primary ml-2">Thời trang</a>
                        <a href="#" class="badge badge-primary ml-2">Xu hướng</a>
                        <a href="#" class="badge badge-primary ml-2">Bền vững</a>
                        <a href="#" class="badge badge-primary ml-2">Phong cách</a>
                    </div>

                    <div class="blog-detail-share mt-4">
                        <span class="font-weight-bold">Chia sẻ:</span>
                        <a href="#" class="btn btn-outline-primary btn-sm ml-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-outline-info btn-sm ml-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-outline-danger btn-sm ml-2"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
            </article>

            <!-- Phần bình luận -->
            <div class="blog-comments mt-5">
                <h3 class="mb-4">12 Bình luận</h3>
                
                <div class="media mb-4">
                    <img src="https://randomuser.me/api/portraits/women/1.jpg" class="mr-3 rounded-circle" alt="User" style="width: 50px;">
                    <div class="media-body">
                        <h5 class="mt-0">Nguyễn Thị A</h5>
                        <p class="text-muted small">15 Tháng 6, 2023</p>
                        <p>Bài viết rất hay và hữu ích. Tôi đã áp dụng một số gợi ý và thấy rất hiệu quả!</p>
                    </div>
                </div>

                <div class="media mb-4">
                    <img src="https://randomuser.me/api/portraits/men/1.jpg" class="mr-3 rounded-circle" alt="User" style="width: 50px;">
                    <div class="media-body">
                        <h5 class="mt-0">Trần Văn B</h5>
                        <p class="text-muted small">16 Tháng 6, 2023</p>
                        <p>Cảm ơn tác giả đã chia sẻ những thông tin bổ ích. Tôi rất quan tâm đến xu hướng thời trang bền vững.</p>
                    </div>
                </div>

                <!-- Form bình luận -->
                <div class="blog-comment-form mt-5">
                    <h3 class="mb-4">Để lại bình luận</h3>
                    <form>
                        <div class="form-group">
                            <textarea class="form-control" rows="4" placeholder="Nội dung bình luận..."></textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Tên của bạn">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" placeholder="Email của bạn">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi bình luận</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="blog-sidebar">
                <!-- Tìm kiếm -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Tìm kiếm</h5>
                        <form class="form-inline">
                            <input class="form-control mr-2" type="search" placeholder="Tìm kiếm...">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>

                <!-- Danh mục -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Danh mục</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Thời trang (12)</a></li>
                            <li><a href="#">Phong cách (8)</a></li>
                            <li><a href="#">Công sở (5)</a></li>
                            <li><a href="#">Phụ kiện (7)</a></li>
                            <li><a href="#">Bền vững (4)</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Bài viết mới nhất -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Bài viết mới nhất</h5>
                        <div class="media mb-3">
                            <img src="https://images.unsplash.com/photo-1551107696-a4b0c5a0d9a2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80" 
                                 class="mr-3" alt="..." style="width: 80px; height: 80px; object-fit: cover;">
                            <div class="media-body">
                                <h6 class="mt-0"><a href="#">Phong cách công sở: Từ formal đến casual</a></h6>
                                <small class="text-muted">05 Tháng 7, 2023</small>
                            </div>
                        </div>
                        <div class="media mb-3">
                            <img src="https://images.unsplash.com/photo-1551107696-a4b0c5a0d9a2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80" 
                                 class="mr-3" alt="..." style="width: 80px; height: 80px; object-fit: cover;">
                            <div class="media-body">
                                <h6 class="mt-0"><a href="#">Phụ kiện thời trang: Điểm nhấn cho phong cách của bạn</a></h6>
                                <small class="text-muted">12 Tháng 7, 2023</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tags -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tags</h5>
                        <div class="blog-tags">
                            <a href="#" class="badge badge-primary">Thời trang</a>
                            <a href="#" class="badge badge-primary">Xu hướng</a>
                            <a href="#" class="badge badge-primary">Phong cách</a>
                            <a href="#" class="badge badge-primary">Công sở</a>
                            <a href="#" class="badge badge-primary">Phụ kiện</a>
                            <a href="#" class="badge badge-primary">Bền vững</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.blog-detail {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    padding: 30px;
}

.blog-detail-image {
    margin-bottom: 20px;
}

.blog-detail-image img {
    width: 100%;
    height: 500px;
    object-fit: cover;
    border-radius: 10px;
}

.blog-detail-meta {
    color: #6c757d;
    font-size: 0.9rem;
}

.blog-detail-title {
    font-size: 2rem;
    color: #2b2f4c;
    margin-bottom: 20px;
}

.blog-detail-text {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #495057;
}

.blog-detail-text h2 {
    font-size: 1.5rem;
    color: #2b2f4c;
    margin: 30px 0 20px;
}

.blog-detail-text ul, .blog-detail-text ol {
    padding-left: 20px;
    margin-bottom: 20px;
}

.blog-detail-text li {
    margin-bottom: 10px;
}

.blockquote {
    border-left: 4px solid #D19C97;
    padding-left: 20px;
    margin: 30px 0;
    font-style: italic;
}

.blog-detail-tags .badge {
    font-size: 0.9rem;
    padding: 8px 12px;
    margin-bottom: 5px;
}

.blog-detail-share .btn {
    width: 40px;
    height: 40px;
    padding: 0;
    line-height: 40px;
    text-align: center;
    border-radius: 50%;
}

.blog-comments .media {
    padding: 20px;
    background: #f8f9fa;
    border-radius: 10px;
    margin-bottom: 20px;
}

.blog-comment-form textarea {
    resize: none;
}

.blog-sidebar .card {
    border: none;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    border-radius: 10px;
    margin-bottom: 30px;
}

.blog-sidebar .card-title {
    color: #2b2f4c;
    font-size: 1.2rem;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
}

.blog-sidebar .list-unstyled li {
    margin-bottom: 10px;
}

.blog-sidebar .list-unstyled li a {
    color: #495057;
    text-decoration: none;
    transition: color 0.3s ease;
}

.blog-sidebar .list-unstyled li a:hover {
    color: #D19C97;
}

.blog-tags .badge {
    margin-right: 5px;
    margin-bottom: 5px;
    padding: 8px 12px;
    font-size: 0.9rem;
}
</style>

@endsection 