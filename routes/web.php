<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('seckill_orders', 'OrdersController@seckill')->name('seckill_orders.store');

// Route::get('/', 'PagesController@root')->name('root');
Route::redirect('/', '/products')->name('root');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
	// 提示需要验证邮箱
    Route::get('/email_verify_notice', 'PagesController@emailVerifyNotice')->name('email_verify_notice');
    // 邮箱验证
    Route::get('/email_verification/verify', 'EmailVerificationController@verify')->name('email_verification.verify');
    // 重新发送验证邮件
    Route::get('/email_verification/send', 'EmailVerificationController@send')->name('email_verification.send');

    // 是否已验证中间件
    Route::group(['middleware' => 'email_verified'], function() {
    	// 用户地址列表
        Route::get('user_addresses', 'UserAddressesController@index')->name('user_addresses.index');

        // 地址新建页
        Route::get('user_addresses/create', 'UserAddressesController@create')->name('user_addresses.create');

        // 执行新建
        Route::post('user_addresses', 'UserAddressesController@store')->name('user_addresses.store');

        // 修改地址页
        Route::get('user_addresses/{user_address}', 'UserAddressesController@edit')->name('user_addresses.edit');

        // 执行修改
        Route::put('user_addresses/{user_address}', 'UserAddressesController@update')->name('user_addresses.update');

        // 删除地址
        Route::delete('user_addresses/{user_address}', 'UserAddressesController@destroy')->name('user_addresses.destroy');

        // 收藏商品
        Route::post('products/{product}/favorite', 'ProductsController@favor')->name('products.favor');
        // 取消收藏
        Route::delete('products/{product}/favorite', 'ProductsController@disfavor')->name('products.disfavor');
        // 收藏商品列表
        Route::get('products/favorites', 'ProductsController@favorites')->name('products.favorites');

        // 加入购物车
        Route::post('cart', 'CartController@add')->name('cart.add');

        // 查看购物车
        Route::get('cart', 'CartController@index')->name('cart.index');

        // 从购物车移除
        Route::delete('cart/{sku}', 'CartController@remove')->name('cart.remove');

        // 创建购物订单
        Route::post('orders', 'OrdersController@store')->name('orders.store');

        // 订单列表
        Route::get('orders', 'OrdersController@index')->name('orders.index');

        // 订单详情
        Route::get('orders/{order}', 'OrdersController@show')->name('orders.show');

        // 支付宝订单支付
        Route::get('payment/{order}/alipay', 'PaymentController@payByAlipay')->name('payment.alipay');
        // 支付宝前端回调
        Route::get('payment/alipay/return', 'PaymentController@alipayReturn')->name('payment.alipay.return');

        // 微信支付
        Route::get('payment/{order}/wechat', 'PaymentController@payByWechat')->name('payment.wechat');

        // 用户确认收货
        Route::post('orders/{order}/received', 'OrdersController@received')->name('orders.received');

        // 订单评价
        Route::get('orders/{order}/review', 'OrdersController@review')->name('orders.review.show');
        Route::post('orders/{order}/review', 'OrdersController@sendReview')->name('orders.review.store');

        // 退款申请
        Route::post('orders/{order}/apply_refund', 'OrdersController@applyRefund')->name('orders.apply_refund');

        // 优惠券查询
        Route::get('coupon_codes/{code}', 'CouponCodesController@show')->name('coupon_codes.show');

        // 创建众筹订单
        Route::post('crowdfunding_orders', 'OrdersController@crowdfunding')->name('crowdfunding_orders.store');

        // 创建分期付款单，分期还款计划
        Route::post('payment/{order}/installment', 'PaymentController@payByInstallment')->name('payment.installment');

        // 分期付款列表
        Route::get('installments', 'InstallmentsController@index')->name('installments.index');

        // 分期付款详情
        Route::get('installments/{installment}', 'InstallmentsController@show')->name('installments.show');

        // 拉起支付宝分期支付
        Route::get('installments/{installment}/alipay', 'InstallmentsController@payByAlipay')->name('installments.alipay');
        // 支付宝分期付款前端回调
        Route::get('installments/alipay/return', 'InstallmentsController@alipayReturn')->name('installments.alipay.return');

        // 拉起微信支付
        Route::get('installments/{installment}/wechat', 'InstallmentsController@payByWechat')->name('installments.wechat');

    });

});

Route::get('products', 'ProductsController@index')->name('products.index');
Route::get('products/{product}', 'ProductsController@show')->name('products.show');


// Route::get('alipay', function() {
//     return app('alipay')->web([
//         'out_trade_no' => time(),
//         'total_amount' => '1',
//         'subject' => 'test subject - 测试',
//     ]);
// });

// 支付宝服务器端回调
Route::post('payment/alipay/notify', 'PaymentController@alipayNotify')->name('payment.alipay.notify');
// 微信支付回调
Route::post('payment/wechat/notify', 'PaymentController@wechatNotify')->name('payment.wechat.notify');
// 微信退款回调
Route::post('payment/wechat/refund_notify', 'PaymentController@wechatRefundNotify')->name('payment.wechat.refund_notify');
// 分期付款支付宝支付后端回调
Route::post('installments/alipay/notify', 'InstallmentsController@alipayNotify')->name('installments.alipay.notify');
// 分期付款微信支付回调
Route::post('installments/wechat/notify', 'InstallmentsController@wechatNotify')->name('installments.wechat.notify');
// 分期付款微信支付退款回调
Route::post('installments/wechat/refund_notify', 'InstallmentsController@wechatRefundNotify')->name('installments.wechat.refund_notify');
