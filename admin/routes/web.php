<?php

use App\Http\Controllers\Admin\CardProviderController;
use App\Http\Controllers\admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\KolPartnerController;
use App\Http\Controllers\Admin\HirePartnerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReferPartnerController;
use App\Http\Controllers\Admin\PromoCodeController;
use App\Http\Controllers\Admin\ConfigSystemController;
use App\Http\Controllers\Admin\LibraryController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CardExchangerController;
use App\Http\Controllers\Admin\CardExchangerRateController;
use App\Http\Controllers\Admin\CardTransactionController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\GroupProductController;
use App\Http\Controllers\Admin\LogActivityController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\MemberContrller;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductController as ProductClientController;
use App\Http\Controllers\Client\OrderController as OrderClientController;
use App\Http\Controllers\Client\PromoCodeController as PromoCodeClientController;
use App\Http\Controllers\Client\AuthClientController;
use App\Http\Controllers\Client\UserController as UserClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::get('/dang-nhap.html', 'login')->name('login');
    Route::get('/dang-xuất.html', 'logout')->name('logout');
    Route::post('/dang-nhap', 'checkLogin')->middleware('check.throttles_login')->name('checkLogin');
});

Route::get('/user-profile', [MemberContrller::class, 'userProfile'])->name('user.profile');

//Route::get('/user/card-transaction', [MemberContrller::class, 'cardTransaction'])->name('user.card.transaction');

//
Route::group(['prefix' => 'admin', 'middleware' => 'check.auth'], function () {
    /**
     * DASHBOARD
     */
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');

    /**
     * USER
     */
    Route::controller(UserController::class)->prefix('khach-hang')->name('admin.')->group(function () {
        Route::get('/', 'index')->name('user');
        Route::get('/get-list-user', 'listUser')->name('user.list_user');
        Route::get('/create', 'create')->name('user.create');
        Route::post('/store', 'store')->name('user.store');
        Route::delete('/{id}', 'delete')->name('user.delete');
        Route::get('/{id}/edit', 'edit')->name('user.edit');
        Route::post('/{id}/update', 'update')->name('user.update');
        Route::post('/update-status', 'updateStatus')->name('user.update_data');
        Route::get('/search', 'search')->name('user.search');
        Route::get('/{id}/detail', 'detail')->name('user.detail');
        Route::get('/{id}/chi-tiet', 'detailV2')->name('user.detail_v2');
    });

    /**
     * CATEGORY
     */
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/danh-muc', 'index')->name('admin.category');
        Route::get('/danh-muc/get-list-category', 'listCategory')->name('admin.category.listCategory');
        Route::get('/danh-muc/create', 'create')->name('admin.category.create');
        Route::post('/danh-muc/create/store', 'store')->name('admin.category.store');
        Route::get('/danh-muc/edit/{id}', 'edit')->name('admin.category.edit');
        Route::post('/danh-muc/update/{id}', 'update')->name('admin.category.update');
        Route::get('/danh-muc/delete/{id}', 'delete')->name('admin.category.delete');
        Route::get('/danh-muc/search', 'search')->name('admin.category.search');
        Route::get('/danh-muc/infor-of-category/{id}', 'inforOfCategory')->name('admin.category.infor.of.category');
        Route::post('/danh-muc/update-status', 'updateStatus')->name('admin.categoryPost.update_data');
    });

    /**
     * PRODUCT
     */
    Route::controller(ProductController::class)->group(function () {
        Route::get('/san-pham', 'index')->name('admin.product');
        Route::get('/san-pham/get-list-product', 'listProduct')->name('admin.product.listProduct');
        Route::get('/san-pham/create', 'create')->name('admin.product.create');
        Route::post('/san-pham/create/store', 'store')->name('admin.product.store');
        Route::get('/san-pham/edit/{id}', 'edit')->name('admin.product.edit');
        Route::post('/san-pham/update/{id}', 'update')->name('admin.product.update');
        Route::get('/san-pham/delete/{id}', 'delete')->name('admin.product.delete');
        Route::get('/san-pham/detail/{id}', 'getProductById')->name('admin.product.detail_by_id');
        Route::post('/san-pham/changeStatusProduct', 'changeStatusProduct')->name('admin.product.changeStatusProduct');
        Route::get('/san-pham/search', 'search')->name('admin.product.search');
        Route::get('/san-pham/infor-of-product/{id}', 'inforOfProduct')->name('admin.product.infor.of.product');
    });

    /*
     * KOL
     */
    Route::controller(KolPartnerController::class)->prefix('kol')->name('admin.')->group(function () {
        Route::get('/', 'index')->name('kol');
        Route::get('/get-list-kol', 'listKol')->name('kol.listKol');
        Route::get('/create', 'create')->name('kol.create');
        Route::post('/create-or-update', 'createOrUpdate')->name('kol.create_or_update');
        Route::get('/{id}/edit', 'edit')->name('kol.edit');
        Route::post('/{id}/update', 'update')->name('kol.update');
        Route::delete('/delete/{id}', 'delete')->name('kol.delete');
        Route::get('/user-of-kol/{id}', 'listUserOfKol')->name('kol.list_user_of_kol');
    });

    /**
     * HIRE
     */
    Route::controller(HirePartnerController::class)->group(function () {
        Route::get('/cay-thue', 'index')->name('admin.hire');
        Route::get('/cay-thue/get-list-hire', 'listHire')->name('admin.hire.listHire');
        Route::get('/cay-thue/create', 'create')->name('admin.hire.create');
        Route::post('/cay-thue/create/store', 'store')->name('admin.hire.store');
        Route::get('/cay-thue/edit/{id}', 'edit')->name('admin.hire.edit');
        Route::post('/cay-thue/update/{id}', 'update')->name('admin.hire.update');
        Route::get('/cay-thue/delete/{id}', 'delete')->name('admin.hire.delete');
        Route::get('/cay-thue/search', 'search')->name('admin.hire.search');
        Route::get('/cay-thue/infor-of-hirepartner/{id}', 'inforOfHirePartner')->name('admin.product.infor.of.hirepartner');
        Route::post('/cay-thue/add-user-to-group', 'addUserToGroup')->name('admin.hire.add_user_to_group');
    });

    /**
     * REFER
     */
    Route::controller(ReferPartnerController::class)->group(function () {
        Route::get('/refer', 'index')->name('admin.refer');
        Route::get('/refer/get-list-refer', 'listRefer')->name('admin.refer.listRefer');
        Route::get('/refer/create', 'create')->name('admin.refer.create');
        Route::post('/refer/create/store', 'store')->name('admin.refer.store');
        Route::get('/refer/edit/{id}', 'edit')->name('admin.refer.edit');
        Route::post('/refer/update/{id}', 'update')->name('admin.refer.update');
        Route::get('/refer/delete/{id}', 'delete')->name('admin.refer.delete');
        Route::get('/refer/search', 'search')->name('admin.refer.search');
        Route::get('/refer/infor-of-referpartner/{id}', 'inforOfReferPartner')->name('admin.refer.infor.of.referpartner');
        Route::post('/refer/add-user-to-group', 'addUserToGroup')->name('admin.refer.add_user_to_group');
    });

    /**
     * LOG_ACTIVITY
     */
    Route::controller(LogActivityController::class)->group(function () {
        Route::get('/log-activity', 'index')->name('admin.log');
        Route::get('/log-activity/get-list-log-activity', 'listLogActivity')->name('admin.log.listLogActivity');

        //Route::get('/log-activity/edit/{id}', 'edit')->name('admin.log.edit');
    });

    /**
     * CARD_PROVIDER
     */
    Route::controller(CardProviderController::class)->group(function () {
        Route::get('/card-provider', 'index')->name('admin.card-provider');
        Route::get('/card-provider/get-list-card-provider', 'listCardProvider')->name('admin.card-provider.listCardProvider');
        Route::get('/card-provider/get-detail', 'getDetailCardProvider')->name('admin.card_provider.detail');
        Route::post('/card-provider/action', 'actionCardProvider')->name('admin.card_provider.action');
    });

    /**
     * CARD_TRANSACTION
     */
    Route::controller(CardTransactionController::class)->group(function () {
        Route::get('/card-transaction', 'index')->name('admin.card-transaction');
        Route::get('/card-transaction/get-list-card-transaction', 'listCardTransaction')->name('admin.card-transaction.listCardTransaction');
    });

    /**
     * CARD_EXCHANGER
     */
    Route::controller(CardExchangerController::class)->group(function () {
        Route::get('/card-exchanger', 'index')->name('admin.card-exchanger');
        Route::get('/card-exchanger/get-list-card-exchanger', 'listCardExchanger')->name('admin.card-exchanger.listCardExchanger');
        Route::get('/card-exchanger/create', 'create')->name('admin.card-exchanger.create');
        Route::post('/card-exchanger/create/store', 'store')->name('admin.card-exchanger.store');
        Route::get('/card-exchanger/edit/{id}', 'edit')->name('admin.card-exchanger.edit');
        Route::post('/card-exchanger/update/{id}', 'update')->name('admin.card-exchanger.update');
        Route::get('/card-exchanger/delete/{id}', 'delete')->name('admin.card-exchanger.delete');
        Route::post('/card-exchanger/update-status', 'updateStatus')->name('admin.card-exchanger.update_data');
        Route::get('/card-exchanger/detail/{id}', 'detail')->name('admin.card-exchanger.detail');
    });

    /**
     * CARD_EXCHANGER_RATE
     */
    Route::controller(CardExchangerRateController::class)->group(function () {
        Route::get('/card-exchanger-rate', 'index')->name('admin.card-exchanger-rate');
        Route::get('/card-exchanger-rate/get-list-card-exchanger-rate', 'listCardExchangerRate')->name('admin.card-exchanger.listCardExchanger-rate');
    });

    /**
     * PROMO CODE
     */
    Route::controller(PromoCodeController::class)->prefix('promo-code')->name('admin.')->group(function () {
        Route::get('/', 'index')->name('promo_code');
        Route::get('/create', 'create')->name('promo_code.create');
        Route::post('/store', 'store')->name('promo_code.store');
        Route::delete('/{id}', 'delete')->name('promo_code.delete');
        Route::get('/{id}/edit', 'edit')->name('promo_code.edit');
        Route::post('/{id}/update', 'update')->name('promo_code.update');
        Route::get('/get-list-promo-code', 'listPromoCode')->name('promo_code.list_promo_code');
        Route::post('/update-status', 'updateStatus')->name('promo_code.update_data');
    });
    /**
     * CONFIG SYSTEM
     */
    Route::controller(ConfigSystemController::class)->group(function () {
        Route::get('/thiet-lap-he-thong', 'index')->name('admin.system_config');
        Route::post('/thiet-lap-he-thong/cap-nhat-he-thong', 'saveChange')->name('admin.system.saveChange');
        Route::post('/config-system/send-mail-test', 'sendMailTest')->name('admin.system.sendMailTest');
        Route::get('/config-system/send-telegram-test', 'sendTelegramTest')->name('admin.system.sendTelegramTest');
    });

    /**
     * CONFIG SYSTEM
     */
    Route::controller(LibraryController::class)->group(function () {
        Route::get('library/load-library', 'loadLibrary')->name('admin.library');
        Route::post('library/upload-load-file', 'updateLoadFile')->name('admin.library.updateLoadFile');
    });

    /**
     * Bài viết
     */
    Route::controller(PostController::class)->group(function () {
        /*Category*/
        Route::get('bai-viet/chuyen-muc-bai-viet', 'categoryPost')->name('admin.categoryPost');
        Route::get('post/getGroupPost', 'getCategoryPost')->name('admin.categoryPost.getCategoryPost');
        Route::get('post/getDetailGroupPost', 'getDetailGroupPost')->name('admin.categoryPost.getDetailGroupPost');
        Route::post('post/actionGroupPost', 'actionCategoryPost')->name('admin.categoryPost.actionCategoryPost');

        /*TAB*/
        Route::get('bai-viet/the', 'tabPost')->name('admin.tabPost');
        Route::post('post/actionTabPost', 'actionTabPost')->name('admin.tabPost.actionTabPost');
        Route::get('post/getDetailTabPost', 'getDetailTabPost')->name('admin.tabPost.getDetailTabPost');
        Route::get('post/getTabPost', 'getTabPost')->name('admin.tabPost.getTabPost');

        /*Bài viết*/
        Route::get('bai-viet/danh-sach-bai-viet', 'viewPost')->name('admin.viewPost');
        Route::get('bai-viet/getPost', 'getPost')->name('admin.getPost');
        Route::get('bai-viet/tao-bai-viet', 'createPost')->name('admin.createPost');
        Route::post('post/storagePost', 'storagePost')->name('admin.storagePost');
        Route::get('bai-viet/chinh-sua-bai-viet/{post_id}', 'editPost')->name('admin.editPost');
        Route::put('post/updatePost', 'updatePost')->name('admin.updatePost');
        Route::post('post/actionPost', 'actionPost')->name('admin.actionPost');
    });

    /**
     * FEEDBACK
     */
    Route::controller(FeedbackController::class)->prefix('feedback')->name('admin.')->group(function () {
        Route::get('/', 'index')->name('feedback');
        Route::get('/create', 'create')->name('feedback.create');
        Route::post('/store', 'store')->name('feedback.store');
        Route::delete('/{id}', 'delete')->name('feedback.delete');
        Route::get('/{id}/edit', 'edit')->name('feedback.edit');
        Route::post('/{id}/update', 'update')->name('feedback.update');
        Route::get('/get-list-feedback', 'listFeedback')->name('feedback.list_feedback');
    });

    /**
     * ORDER
     */
    Route::controller(OrderController::class)->prefix('order')->name('admin.')->group(function () {
        Route::get('/', 'index')->name('order');
        Route::get('/create', 'create')->name('order.create');
        Route::post('/store', 'store')->name('order.store');
        Route::delete('/{id}', 'delete')->name('order.delete');
        Route::get('/{id}/edit', 'edit')->name('order.edit');
        Route::post('/{id}/update', 'update')->name('order.update');
        Route::get('/get-list-order', 'getListOrder')->name('order.list_order');
    });

    /**
     * Bài viết
     */
    Route::controller(GroupProductController::class)->name('admin.group-product.')->group(function () {
        /*Category*/
        Route::get('/nhom-san-pham/index', 'index')->name('index');
        Route::get('/group-product/get-group-product', 'getGroupProductSearch')->name('get_group_product_search');
        Route::get('/group-product/get-detail-group-product', 'getDetailGroupProduct')->name('get_detail_group_product');
        Route::post('/group-product/action-group-product', 'actionGroupProduct')->name('action_group_product');
    });

    /**
     * Slider
     */
    Route::controller(SliderController::class)->name('admin.slider.')->group(function () {
        Route::get('/slider', 'index')->name('index');
        Route::get('/slider-search', 'getSliderSearch')->name('search');
        Route::post('/slider/action', 'sliderAction')->name('action');
        Route::get('/slider/detail', 'getDetailSlider')->name('detail');
        Route::post('/slider/update-status', 'updateStatusSlider')->name('update_data');
        Route::get('/slider/preview', 'getPreviewSlider')->name('preview');
    });
});

/*
|--------------------------------------------------------------------------
| ROUTE CLIENT
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| ROUTE HOME
|--------------------------------------------------------------------------
*/
Route::controller(HomeController::class)->name('client.')->group(function () {
    Route::get('/', 'home')->name('home');
});

/*
|--------------------------------------------------------------------------
| ROUTE PRODUCT
|--------------------------------------------------------------------------
*/
Route::controller(ProductClientController::class)->name('client.product.')->group(function () {
    Route::get('/{uri_parent}/{uri_children}', 'list')->name('list');
    Route::get('/views/{uri_category}/{uri_product}', 'detail')->name('detail');
});

/*
|--------------------------------------------------------------------------
| ROUTE ORDER
|--------------------------------------------------------------------------
*/
Route::controller(OrderClientController::class)->middleware('isCustomer')->name('client.order.')->group(function () {
    Route::post('/client/order', 'order')->name('order');
});

/*
|--------------------------------------------------------------------------
| ROUTE PROMO CODE
|--------------------------------------------------------------------------
*/
Route::controller(PromoCodeClientController::class)->name('client.promo_code.')->group(function () {
    Route::get('/promo-code/check/{discount_code}', 'checkPromoCode')->name('check');
});

/*
|--------------------------------------------------------------------------
| ROUTE AUTH
|--------------------------------------------------------------------------
*/
Route::controller(AuthClientController::class)->name('client.user.')->group(function () {
    Route::post('/register', 'register')->name('register_user');
    Route::post('/login', 'login')->name('login_user');
});


/*
|--------------------------------------------------------------------------
| ROUTE USER
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'user', 'middleware' => 'isCustomer'], function () {
    Route::controller(UserClientController::class)->name('client.user.')->group(function () {
        Route::get('/recharge', 'recharge')->name('recharge');
    });
});
