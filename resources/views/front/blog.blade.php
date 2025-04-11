@extends('front/layouts/masterlayout')
@section('content')
@section('title', 'Blog')

@include('front.components.top-bar')

<div class="container py-5">
    <div class="row">
        <!-- Blog Post 1 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card blog-card h-100">
                <div class="blog-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         class="card-img-top" alt="Xu hướng thời trang 2023">
                    <div class="blog-date">
                        <span class="day">15</span>
                        <span class="month">Tháng 6</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="blog-category">
                        <a href="#" class="text-primary">Thời trang</a>
                    </div>
                    <h5 class="card-title blog-title">
                        <a href="{{ route('blog.detail', ['id' => 1]) }}">Xu hướng thời trang 2023: Phong cách tối giản và bền vững</a>
                    </h5>
                    <p class="card-text blog-excerpt">
                        Khám phá những xu hướng thời trang nổi bật năm 2023, tập trung vào phong cách tối giản và thời trang bền vững. Tìm hiểu cách kết hợp các món đồ cơ bản để tạo nên phong cách cá nhân độc đáo.
                    </p>
                    <div class="blog-meta">
                        <span class="text-muted"><i class="fa fa-user mr-2"></i>Admin</span>
                        <span class="text-muted ml-3"><i class="fa fa-comments mr-2"></i>12 bình luận</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog Post 2 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card blog-card h-100">
                <div class="blog-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1567401893414-76b7b1e5a7a5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         class="card-img-top" alt="Bí quyết phối đồ">
                    <div class="blog-date">
                        <span class="day">22</span>
                        <span class="month">Tháng 6</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="blog-category">
                        <a href="#" class="text-primary">Phong cách</a>
                    </div>
                    <h5 class="card-title blog-title">
                        <a href="{{ route('blog.detail', ['id' => 2]) }}">Bí quyết phối đồ: Từ cơ bản đến nâng cao</a>
                    </h5>
                    <p class="card-text blog-excerpt">
                        Hướng dẫn chi tiết về cách phối đồ từ những món đồ cơ bản trong tủ quần áo. Từ cách kết hợp màu sắc đến việc chọn phụ kiện phù hợp, tất cả sẽ giúp bạn tự tin hơn trong phong cách ăn mặc.
                    </p>
                    <div class="blog-meta">
                        <span class="text-muted"><i class="fa fa-user mr-2"></i>Stylist</span>
                        <span class="text-muted ml-3"><i class="fa fa-comments mr-2"></i>8 bình luận</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog Post 3 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card blog-card h-100">
                <div class="blog-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1551232864-3f0890e580d9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         class="card-img-top" alt="Chăm sóc quần áo">
                    <div class="blog-date">
                        <span class="day">30</span>
                        <span class="month">Tháng 6</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="blog-category">
                        <a href="#" class="text-primary">Chăm sóc</a>
                    </div>
                    <h5 class="card-title blog-title">
                        <a href="{{ route('blog.detail', ['id' => 3]) }}">Hướng dẫn chăm sóc và bảo quản quần áo đúng cách</a>
                    </h5>
                    <p class="card-text blog-excerpt">
                        Bí quyết giữ quần áo luôn mới và bền đẹp. Từ cách giặt, phơi đến việc bảo quản theo mùa, tất cả sẽ giúp bạn kéo dài tuổi thọ của trang phục yêu thích.
                    </p>
                    <div class="blog-meta">
                        <span class="text-muted"><i class="fa fa-user mr-2"></i>Chuyên gia</span>
                        <span class="text-muted ml-3"><i class="fa fa-comments mr-2"></i>15 bình luận</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog Post 4 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card blog-card h-100">
                <div class="blog-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         class="card-img-top" alt="Phong cách công sở">
                    <div class="blog-date">
                        <span class="day">05</span>
                        <span class="month">Tháng 7</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="blog-category">
                        <a href="#" class="text-primary">Công sở</a>
                    </div>
                    <h5 class="card-title blog-title">
                        <a href="#">Phong cách công sở: Từ formal đến casual</a>
                    </h5>
                    <p class="card-text blog-excerpt">
                        Cách mix đồ công sở phù hợp với mọi hoàn cảnh. Từ những bộ vest thanh lịch đến phong cách casual thoải mái, tất cả đều giúp bạn tự tin và chuyên nghiệp.
                    </p>
                    <div class="blog-meta">
                        <span class="text-muted"><i class="fa fa-user mr-2"></i>Fashionista</span>
                        <span class="text-muted ml-3"><i class="fa fa-comments mr-2"></i>10 bình luận</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog Post 5 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card blog-card h-100">
                <div class="blog-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1551107696-a4b0c5a0d9a2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         class="card-img-top" alt="Phụ kiện thời trang">
                    <div class="blog-date">
                        <span class="day">12</span>
                        <span class="month">Tháng 7</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="blog-category">
                        <a href="#" class="text-primary">Phụ kiện</a>
                    </div>
                    <h5 class="card-title blog-title">
                        <a href="#">Phụ kiện thời trang: Điểm nhấn cho phong cách của bạn</a>
                    </h5>
                    <p class="card-text blog-excerpt">
                        Khám phá cách chọn và phối phụ kiện phù hợp với từng phong cách. Từ túi xách, giày dép đến trang sức, tất cả đều góp phần tạo nên vẻ đẹp hoàn hảo.
                    </p>
                    <div class="blog-meta">
                        <span class="text-muted"><i class="fa fa-user mr-2"></i>Accessory Expert</span>
                        <span class="text-muted ml-3"><i class="fa fa-comments mr-2"></i>7 bình luận</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog Post 6 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card blog-card h-100">
                <div class="blog-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1551107696-a4b0c5a0d9a2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         class="card-img-top" alt="Thời trang nam">
                    <div class="blog-date">
                        <span class="day">20</span>
                        <span class="month">Tháng 7</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="blog-category">
                        <a href="#" class="text-primary">Nam giới</a>
                    </div>
                    <h5 class="card-title blog-title">
                        <a href="#">Thời trang nam: Phong cách lịch lãm và hiện đại</a>
                    </h5>
                    <p class="card-text blog-excerpt">
                        Cách phối đồ nam giới từ cơ bản đến nâng cao. Từ những bộ suit thanh lịch đến phong cách streetwear cá tính, tất cả đều giúp bạn trở nên tự tin và thu hút.
                    </p>
                    <div class="blog-meta">
                        <span class="text-muted"><i class="fa fa-user mr-2"></i>Men's Style</span>
                        <span class="text-muted ml-3"><i class="fa fa-comments mr-2"></i>9 bình luận</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog Post 7 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card blog-card h-100">
                <div class="blog-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1551107696-a4b0c5a0d9a2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         class="card-img-top" alt="Thời trang nữ">
                    <div class="blog-date">
                        <span class="day">25</span>
                        <span class="month">Tháng 7</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="blog-category">
                        <a href="#" class="text-primary">Nữ giới</a>
                    </div>
                    <h5 class="card-title blog-title">
                        <a href="#">Thời trang nữ: Xu hướng và phong cách mới nhất</a>
                    </h5>
                    <p class="card-text blog-excerpt">
                        Cập nhật những xu hướng thời trang nữ mới nhất. Từ váy đầm thanh lịch đến phong cách streetwear cá tính, tất cả đều giúp bạn trở nên xinh đẹp và tự tin.
                    </p>
                    <div class="blog-meta">
                        <span class="text-muted"><i class="fa fa-user mr-2"></i>Women's Style</span>
                        <span class="text-muted ml-3"><i class="fa fa-comments mr-2"></i>11 bình luận</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog Post 8 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card blog-card h-100">
                <div class="blog-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1551107696-a4b0c5a0d9a2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         class="card-img-top" alt="Thời trang trẻ em">
                    <div class="blog-date">
                        <span class="day">01</span>
                        <span class="month">Tháng 8</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="blog-category">
                        <a href="#" class="text-primary">Trẻ em</a>
                    </div>
                    <h5 class="card-title blog-title">
                        <a href="#">Thời trang trẻ em: An toàn và phong cách</a>
                    </h5>
                    <p class="card-text blog-excerpt">
                        Hướng dẫn chọn quần áo cho trẻ em vừa an toàn vừa thời trang. Từ chất liệu đến kiểu dáng, tất cả đều giúp bé yêu của bạn thoải mái và xinh xắn.
                    </p>
                    <div class="blog-meta">
                        <span class="text-muted"><i class="fa fa-user mr-2"></i>Kids Fashion</span>
                        <span class="text-muted ml-3"><i class="fa fa-comments mr-2"></i>6 bình luận</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog Post 9 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card blog-card h-100">
                <div class="blog-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1551107696-a4b0c5a0d9a2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         class="card-img-top" alt="Thời trang bền vững">
                    <div class="blog-date">
                        <span class="day">08</span>
                        <span class="month">Tháng 8</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="blog-category">
                        <a href="#" class="text-primary">Bền vững</a>
                    </div>
                    <h5 class="card-title blog-title">
                        <a href="#">Thời trang bền vững: Xu hướng tương lai</a>
                    </h5>
                    <p class="card-text blog-excerpt">
                        Tìm hiểu về thời trang bền vững và cách lựa chọn quần áo thân thiện với môi trường. Từ chất liệu đến quy trình sản xuất, tất cả đều hướng đến một tương lai xanh hơn.
                    </p>
                    <div class="blog-meta">
                        <span class="text-muted"><i class="fa fa-user mr-2"></i>Eco Fashion</span>
                        <span class="text-muted ml-3"><i class="fa fa-comments mr-2"></i>14 bình luận</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.blog-card {
    border: none;
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.blog-image-wrapper {
    position: relative;
    overflow: hidden;
}

.blog-image-wrapper img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.blog-card:hover .blog-image-wrapper img {
    transform: scale(1.05);
}

.blog-date {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(209, 156, 151, 0.9);
    color: white;
    padding: 10px;
    border-radius: 5px;
    text-align: center;
    min-width: 60px;
}

.blog-date .day {
    display: block;
    font-size: 1.5rem;
    font-weight: bold;
    line-height: 1;
}

.blog-date .month {
    display: block;
    font-size: 0.8rem;
    text-transform: uppercase;
}

.blog-category {
    margin-bottom: 10px;
}

.blog-category a {
    font-size: 0.9rem;
    font-weight: 500;
    text-decoration: none;
    transition: color 0.3s ease;
}

.blog-category a:hover {
    color: #D19C97 !important;
}

.blog-title {
    margin-bottom: 15px;
}

.blog-title a {
    color: #2b2f4c;
    text-decoration: none;
    transition: color 0.3s ease;
    font-size: 1.2rem;
    line-height: 1.4;
}

.blog-title a:hover {
    color: #D19C97;
}

.blog-excerpt {
    color: #6c757d;
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 15px;
}

.blog-meta {
    font-size: 0.85rem;
    border-top: 1px solid #eee;
    padding-top: 15px;
    margin-top: 15px;
}

.card-body {
    padding: 25px;
}
</style>

@endsection 