<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'payment/alipay/notify', // 支付宝服务器端回调
        'payment/wechat/notify', // 微信支付回调
        'payment/wechat/refund_notify', // 微信退款回调
        'installments/alipay/notify', // 分期付款支付宝支付后端回调
        'installments/wechat/notify', // 分期付款微信支付回调
        'installments/wechat/refund_notify', // 分期付款微信支付退款回调
    ];
}
