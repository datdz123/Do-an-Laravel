<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\Product_categoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\front\AuthUserController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\front\CheckoutController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\OrderUserController;
use App\Http\Controllers\front\Shop_detailsController;
use App\Http\Controllers\front\ShopController;
use App\Http\Controllers\front\UserController;
use Illuminate\Support\Facades\Route;

//front
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop/detail/{id}-{slug}', [Shop_detailsController::class, 'index'])->name('detail');
Route::post('/shop/detail/{id}-{slug}', [Shop_detailsController::class, 'product_comment']);
Route::get('/shop/{id}-{slug}', [ShopController::class, 'category'])->name('shop/category');


//đăng nhập & đăng ký
Route::get('/login', [AuthUserController::class, 'login'])->name('loginUser');
Route::post('/login', [AuthUserController::class, 'post_login']);
Route::get('/register', [AuthUserController::class, 'register'])->name('registerUser');
Route::post('/register', [AuthUserController::class, 'post_register']);
Route::get('/logout', [AuthUserController::class, 'logout'])->name('logoutUser');
Route::get('/forgot-password', [AuthUserController::class, 'forgot_password'])->name('forgot-user-password');
Route::post('/forgot-password', [AuthUserController::class, 'post_forgot_password']);
Route::get('/reset-user-password', [AuthUserController::class, 'reset_password'])->name('reset-user-password');
Route::post('/reset-user-password', [AuthUserController::class, 'post_reset_password']);

//thông tin cá nhân
Route::middleware(['auth'])->group(function () {
    Route::get('/user-information', [UserController::class, 'index'])->name('user.information');
    Route::get('/user-information/change-password', [UserController::class, 'get_changePassword'])->name('user.change-password');
    Route::post('/user-information/change-password', [UserController::class, 'changePassword']);
    Route::post('/user-information/change-information', [UserController::class, 'changeInformation'])->name('user.information.change-information');
});
//cart
Route::group(['prefix' => 'cart'], function () {
    Route::get('', [CartController::class, 'index'])->name('cart');
    Route::post('add', [CartController::class, 'add'])->name('cart.add');
    Route::get('remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::get('clear', [CartController::class, 'clear'])->name('cart.clear');
});

//checkout
Route::group(['prefix' => 'checkout'], function () {
    Route::get('', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('', [CheckoutController::class, 'order'])->name('checkout.order');
    Route::get('vnPayCheck', [CheckoutController::class, 'vnPayCheck']);
    Route::get('checkout-success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('checkout-fail', [CheckoutController::class, 'fail'])->name('checkout.fail');
});
//oder
Route::get('order/{id}', [OrderUserController::class, 'order'])->name('order.user');
Route::get('order-detail/{id}', [OrderUserController::class, 'order_detail'])->name('order.detail.user');
Route::put('order-detail', [OrderUserController::class, 'order_cancel'])->name('order.cancel.user');
Route::get('check-order', [OrderUserController::class, 'check_order'])->name('check.order'); //kt đơn khi k đăng nhập mua hàng

//contact
Route::get('contact', [ContactController::class, 'index'])->name('contact');
//about us


// back
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'post_login']);
    Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('forgot-password');
    Route::post('/forgot-password', [AuthController::class, 'post_forgot_password']);
    Route::get('/reset-password', [AuthController::class, 'reset_password'])->name('reset-password');
    Route::post('/reset-password', [AuthController::class, 'post_reset_password']);

    Route::middleware(['auth:admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/', [DashboardController::class, 'filter_chart_total']);

    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile', [ProfileController::class, 'update'])->name('edit_profile');
    Route::post('profile-changePassword', [ProfileController::class, 'changePassword'])->name('profile.changePassword');

    Route::get('/logout', [AuthController::class, 'log_out'])->name('logout');

    //admins
    // Route::middleware(['role:super-admin'])->group(function () {
    Route::get('/member', [AdminController::class, 'index'])->name('member');
    Route::get('/member/create', [AdminController::class, 'create'])->name('member.create');
    Route::put('/member/store', [AdminController::class, 'store'])->name('member.store');
    Route::get('/member/edit/{id}', [AdminController::class, 'edit'])->name('member.edit');
    Route::delete('/member/delete/{id}', [AdminController::class, 'destroy'])->name('member.delete');

    Route::get('/member/assignRole/{id}', [AdminController::class, 'assignRole'])->name('member.assignRole');
    Route::post('/member/assignRole/{id}', [AdminController::class, 'post_assignRole'])->name('member.post_assignRole');

    Route::get('member/roles', [RoleController::class, 'index'])->name('member.roles');
    Route::get('/member/roles/create', [RoleController::class, 'create'])->name('member.roles.create');
    Route::post('/member/roles/create', [RoleController::class, 'store']);
    Route::get('/member/roles/edit/{id}', [RoleController::class, 'edit'])->name('member.roles.edit');
    Route::put('/member/roles/update/{id}', [RoleController::class, 'update'])->name('member.roles.update');
    Route::delete('/member/roles/destroy/{id}', [RoleController::class, 'destroy'])->name('member.roles.destroy');

    Route::get('/member/permissions', [PermissionController::class, 'index'])->name('member.permissions');
    Route::get('/member/permissions/create', [PermissionController::class, 'create'])->name('member.permissions.create');
    Route::post('/member/permissions/create', [PermissionController::class, 'store']);
    Route::get('/member/permissions/edit/{id}', [PermissionController::class, 'edit'])->name('member.permissions.edit');
    Route::put('/member/permissions/update/{id}', [PermissionController::class, 'update'])->name('member.permissions.update');
    Route::delete('/member/permissions/destroy/{id}', [PermissionController::class, 'destroy'])->name('member.permissions.destroy');

    // });

    // product_categories
    Route::group(['prefix' => 'product-categories'], function () {

        Route::get('/', [Product_categoriesController::class, 'index'])->name('product_categories');
//                ->middleware('role_or_permission:super-admin|product categories view');
        Route::get('/delete/{id}', [Product_categoriesController::class, 'delete'])
            ->name('product_categories/delete');
//                ->middleware('role_or_permission:super-admin|delete product categories');
        Route::get('/add', [Product_categoriesController::class, 'add'])->name('product_categories/add');
//                ->middleware('role_or_permission:super-admin|create product categories');
        Route::post('/add', [Product_categoriesController::class, 'post_add']);
//                ->middleware('role_or_permission:super-admin|create product categories');
        Route::get('/update/{id}', [Product_categoriesController::class, 'update'])->name('product_categories/update');
//                ->middleware('role_or_permission:super-admin|product categories view');
        Route::post('/update/{id}', [Product_categoriesController::class, 'post_update']);
//                ->middleware('role_or_permission:super-admin|edit product categories');
    });
    //products
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductsController::class, 'index'])->name('product');
//                ->middleware('role_or_permission:super-admin|product view');
        Route::get('comments', [ProductsController::class, 'comments'])->name('product.comments');
//                ->middleware('role_or_permission:super-admin|product comments');
        Route::delete('comments/delete/{id}', [ProductsController::class, 'delete_comments'])->name('product.comments.delete');
//                ->middleware('role_or_permission:super-admin|delete product comments');
        Route::get('/add', [ProductsController::class, 'add'])->name('product/add');
//            ->middleware('role_or_permission:super-admin|create product');
        Route::post('/add', [ProductsController::class, 'post_add']);
//                ->middleware('role_or_permission:super-admin|create product');
        Route::get('/update/{id}', [ProductsController::class, 'update'])->name('product/update');
//                ->middleware('role_or_permission:super-admin|product view');

        Route::post('/update/{id}', [ProductsController::class, 'post_update']);
//                ->middleware('role_or_permission:super-admin|edit product');

        Route::delete('/delete/{id}', [ProductsController::class, 'delete'])->name('product/delete');
//                ->middleware('role_or_permission:super-admin|delete product');-admin|delete product');
    });
    //slider
    Route::group(['prefix' => 'slider'], function () {
        Route::get('/', [SliderController::class, 'index'])->name('slider');
        // ->middleware('role_or_permission:super-admin|slider view');

        Route::get('/add', [SliderController::class, 'add'])->name('slider/add');
        // ->middleware('role_or_permission:super-admin|create slider');

        Route::post('/add', [SliderController::class, 'post_add']);
        // ->middleware('role_or_permission:super-admin|create slider');

        Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('slider/delete');
        // ->middleware('role_or_permission:super-admin|delete slider');

        Route::get('/update/{id}', [SliderController::class, 'update'])->name('slider/update');
        // ->middleware('role_or_permission:super-admin|slider view');

        Route::post('/update/{id}', [SliderController::class, 'post_update']);
        // ->middleware('role_or_permission:super-admin|edit slider');
    });

    //order
    Route::group(['prefix' => 'orders'], function () {
        Route::get('', [OrderController::class, 'index'])->name('order');
        // ->middleware('role_or_permission:super-admin|order view');

        Route::get('order-detail/{id}', [OrderController::class, 'detail'])->name('order.detail');
        // ->middleware('role_or_permission:super-admin|order view');

        Route::put('order-detail', [OrderController::class, 'edit'])->name('order.edit');
        // ->middleware('role_or_permission:super-admin|edit order');

        Route::delete('delete', [OrderController::class, 'delete'])->name('order.delete');
        // ->middleware('role_or_permission:super-admin|delete order');

        Route::get('invoice-print/{id}', [OrderController::class, 'print'])->name('order.print');
        // ->middleware('role_or_permission:super-admin|order view');
    });

    //users
    Route::group(['prefix' => 'users'], function () {
        Route::get('', [UsersController::class, 'index'])->name('users');
//            ->middleware('role_or_permission:super-admin|user view');
        Route::delete('delete{id}', [UsersController::class, 'delete'])->name('users.delete');
//            ->middleware('role_or_permission:super-admin|delete user');
    });

    //banner
    // Route::group(['prefix' => 'banner'], function () {
    Route::resource('banner', BannerController::class);
    // });

    Route::get('/file-manager', function () {
        return view('back.layouts.file-manager');
    })->name('file-manager');
//        ->middleware('role_or_permission:super-admin|file manager');


    Route::group(['prefix' => 'site-setting'], function () {
        Route::get('', [SiteSettingController::class, 'index'])->name('site-setting');
//            ->middleware('role_or_permission:super-admin|site setting view');
        Route::post('', [SiteSettingController::class, 'edit']);
//                ->middleware('role_or_permission:super-admin|edit site setting');

        // Route::get('email-config', [SiteSettingController::class, 'email_config'])->name('email-config')->middleware('permission:edit slider');
        // Route::post('email-config', [SiteSettingController::class, 'post_email_config'])->middleware('permission:edit slider');
    });
});
});
Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
