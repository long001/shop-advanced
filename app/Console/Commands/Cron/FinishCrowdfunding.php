<?php
namespace App\Console\Commands\Cron;

use App\Models\CrowdfundingProduct;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Services\OrderService;
use App\Jobs\RefundCrowdfundingOrders;

class FinishCrowdfunding extends Command
{
    protected $signature = 'cron:finish-crowdfunding';

    protected $description = '结束众筹';

    public function handle()
    {
        CrowdfundingProduct::query()
            // 众筹结束时间早于当前时间
            ->where('end_at', '<=', Carbon::now())
            // 众筹状态为众筹中
            ->where('status', CrowdfundingProduct::STATUS_FUNDING)
            ->get()
            ->each(function (CrowdfundingProduct $crowdfunding) {
                // 如果众筹目标金额大于实际众筹金额
                if ($crowdfunding->target_amount > $crowdfunding->total_amount) {
                    // 调用众筹失败逻辑
                    $this->crowdfundingFailed($crowdfunding);
                } else {
                    // 否则调用众筹成功逻辑
                    $this->crowdfundingSucceed($crowdfunding);
                }
            });
    }

    protected function crowdfundingSucceed(CrowdfundingProduct $crowdfunding)
    {
        // 只需将众筹状态改为众筹成功即可
        $crowdfunding->update([
            'status' => CrowdfundingProduct::STATUS_SUCCESS,
        ]);
    }

    protected function crowdfundingFailed(CrowdfundingProduct $crowdfunding)
    {
        // 将众筹状态改为众筹失败
        $crowdfunding->update([
            'status' => CrowdfundingProduct::STATUS_FAIL,
        ]);

        // $orderService = app(OrderService::class);

        // // 查询出所有参与了此众筹的订单
        // Order::query()
        //     // 订单类型为众筹商品订单
        //     ->where('type', Order::TYPE_CROWDFUNDING)
        //     // 已支付的订单
        //     ->whereNotNull('paid_at')
        //     ->whereHas('items', function ($query) use ($crowdfunding) {
        //         // 包含了当前商品
        //         $query->where('product_id', $crowdfunding->product_id);
        //     })
        //     ->get()
        //     ->each(function (Order $order) use ($orderService) {
        //         // todo 调用退款逻辑
        //         $orderService->refundOrder($order);
        //     });

        // 触发队列任务    
        dispatch(new RefundCrowdfundingOrders($crowdfunding));
    }
}