<?php

namespace App\Helpers;

class menuAdminHelper{
    public static function menu()
    {
        return [
            [
                'text' => 'Dashboard',
                'icon' => 'fa fa-dashboard',
                'link' => route('dashboard'),
                'isActive' => request()->is('admin'),
                'subItems' => [],
            ],
            [
                'text' => 'Slider',
                'icon' => 'fa fa-window-restore',
                'link' => '#',
                'isActive' => request()->is('admin/slider*'),
                'subItems' => [
                    [
                        'text' => 'Danh sách',
                        'icon' => 'fa fa-list',
                        'link' => url('admin/slider'),
                        'isActive' => request()->is('admin/slider'),
                    ],
                    [
                        'text' => 'Thêm mới',
                        'icon' => 'fa fa-plus-square',
                        'link' => route('slider/add'),
                        'isActive' => request()->is('admin/slider/add'),
                    ],
                    // Thêm các mục con khác nếu cần
                ],
            ],
            [
                'text' => 'Banner',
                'icon' => 'fa fa-picture-o',
                'link' => '#',
                'isActive' => request()->is('admin/banner*'),
                'subItems' => [
                    [
                        'text' => 'Danh sách',
                        'icon' => 'fa fa-list',
                        'link' => route('banner.index'),
                        'isActive' => request()->is('admin/banner'),
                    ],
                    [
                        'text' => 'Thêm mới',
                        'icon' => 'fa fa-plus-square',
                        'link' => route('banner.create'),
                        'isActive' => request()->is('admin/banner/create'),
                    ],
                    // Thêm các mục con khác nếu cần
                ],
            ],
            [
                'text' => 'Danh mục sản phẩm',
                'icon' => 'fa fa-align-left',
                'link' => '#',
                'isActive' => request()->is('admin/product_categories*'),
                'subItems' => [
                    [
                        'text' => 'Danh sách',
                        'icon' => 'fa fa-list',
                        'link' => route('product_categories'),
                        'isActive' => request()->is('admin/product_categories'),
                    ],
                    [
                        'text' => 'Thêm mới',
                        'icon' => 'fa fa-plus-square',
                        'link' => route('product_categories/add'),
                        'isActive' => request()->is('admin/product_categories/add'),
                    ],
                    // Thêm các mục con khác nếu cần
                ],
            ],
            [
                'text' => 'Sản phẩm',
                'icon' => 'fa fa-product-hunt',
                'link' => '#',
                'isActive' => request()->is('admin/products*'),
                'subItems' => [
                    [
                        'text' => 'Danh sách',
                        'icon' => 'fa fa-list',
                        'link' => url('admin/products'),
                        'isActive' => request()->is('admin/products'),
                    ],
                    [
                        'text' => 'Thêm mới',
                        'icon' => 'fa fa-plus-square',
                        'link' => route('product/add'),
                        'isActive' => request()->is('admin/products/add'),
                    ],
                    [
                        'text' => 'Nhận xét',
                        'icon' => 'fa fa-comment',
                        'link' => route('product.comments'),
                        'isActive' => request()->is('admin/products/comments'),
                    ],
                    // Thêm các mục con khác nếu cần
                ],
            ],
            [
                'text' => 'Đơn hàng',
                'icon' => 'fa fa-truck',
                'link' => '#',
                'isActive' => request()->is('admin/order*'),
                'subItems' => [
                    [
                        'text' => 'Danh sách',
                        'icon' => 'fa fa-list',
                        'link' => route('order'),
                        'isActive' => request()->is('admin/order'),
                    ],
                    // Các mục con khác nếu cần
                ],
            ],
            [
                'text' => 'Người dùng đăng ký',
                'icon' => 'fa fa-user',
                'link' => route('users'),
                'isActive' => request()->is('admin/users'),
                'subItems' => [],
            ],
            [
                'text' => 'Thành viên, phân quyền',
                'icon' => 'fa fa-users',
                'link' => '#',
                'isActive' => request()->is('admin/member*'),
                'subItems' => [
                    [
                        'text' => 'Danh sách thành viên',
                        'icon' => 'fa fa-list',
                        'link' => route('member'),
                        'isActive' => request()->is('admin/member'),
                    ],
                    [
                        'text' => 'Thêm mới thành viên',
                        'icon' => 'fa fa-plus-square',
                        'link' => route('member.create'),
                        'isActive' => request()->is('admin/member/create'),
                    ],
                    [
                        'text' => 'Vai trò',
                        'icon' => 'fa fa-flag-o',
                        'link' => route('member.roles'),
                        'isActive' => request()->is('admin/member/roles*'),
                    ],
                    [
                        'text' => 'Quyền',
                        'icon' => 'fa fa-ban',
                        'link' => route('member.permissions'),
                        'isActive' => request()->is('admin/member/permissions*'),
                    ],
                    // Thêm các mục con khác nếu cần
                ],
            ],
            [
                'text' => 'Quản lý files',
                'icon' => 'fa fa-file-image-o',
                'link' => route('file-manager'),
                'isActive' => request()->is('admin/file-manager'),
                'subItems' => [],
            ],
            [
                'text' => 'Cài đặt trang web',
                'icon' => 'fa fa-cog',
                'link' => '#',
                'isActive' => request()->is('admin/site-setting*'),
                'subItems' => [
                    [
                        'text' => 'Thông tin trang web',
                        'icon' => 'fa fa-info-circle',
                        'link' => route('site-setting'),
                        'isActive' => request()->is('admin/site-setting'),
                    ],
                    // Thêm các mục con khác nếu cần
                ],
            ],


        ];
    }
}
