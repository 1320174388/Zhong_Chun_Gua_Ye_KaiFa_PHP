<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  BalanceService.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/08/09 15:03
 *  文件描述 :  中春果业-店铺的零钱信息逻辑处理
 *  历史记录 :  -----------------------
 */
namespace app\order_module\working_version\v1\service;
use app\order_module\working_version\v1\dao\OrderDao;

class OrderService
{
    /**
     * 名  称 : OrderSel()
     * 功  能 : 订单详情逻辑
     * 变  量 : --------------------------------------
     * 输  入 : (string) $shopSel['order_status']     => '订单号';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":trun}
     * 创  建 : 2018/08/11 10:55
     */
    public function OrderSel($shopSel)
    {
        // 引入Dao层
        $balance = (new OrderDao())->OrderSel($shopSel);
        // 判断是否有数据
        if($balance['msg']=='error') return returnData('error');
        // 返回数据格式
        return returnData('success',$balance['data']);
    }


    /**
     * 名  称 : OrderUpd()
     * 功  能 : 声明：修改订单号
     * 输  入 : (string) $order => '订单主键';
     * 输  入 : (string) $upl => '订单状态';
     * 输  出 : [ 'msg'=>'success', 'data'=>$user ]
     * 创  建 : 2018/08/11 10:55
     */
    public function OrderUpd($order,$upl)
    {
        $res=(new OrderDao())->OrderUpd($order,$upl);
        // 判断是否有数据
        if($res['msg']=='error') return returnData('error');
        // 返回数据
        return returnData('success',true);

    }

}