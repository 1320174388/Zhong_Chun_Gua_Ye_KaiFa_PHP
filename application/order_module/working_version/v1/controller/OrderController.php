<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  BalanceController.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/08/09 15:03
 *  文件描述 :  中春果业-店铺的零钱信息控制器
 *  历史记录 :  -----------------------
 */
namespace app\order_module\working_version\v1\controller;
use think\Controller;
use think\Request;
use app\order_module\working_version\v1\service\OrderService;

class OrderController extends Controller
{
    /**
     * 名  称 : OrderSel()
     * 功  能 : 订单详情控制器
     * 变  量 : --------------------------------------
     * 输  入 : (string) $profitSel['order_status']     => '订单状态';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":trun}
     * 创  建 : 2018/08/11 10:55
     */
    public function OrderSel(Request $request)
    {
        // 获取数据
        $shopSel = $request->post('order_number');
        // 验证数据
        if(!$shopSel) return returnResponse(1,'请发送订单号');
        // 引入Service逻辑层数据
        $balance = (new OrderService())->OrderSel($shopSel);
        // 返回接口响应数据
        return returnResponse(0,'请求成功',$balance['data']);
    }


    /**
     * 名  称 : OrderUpd()
     * 功  能 : 声明：修改订单号
     * 输  入 : (string) $order => '订单主键';
     * 输  入 : (string) $upl => '订单状态';
     * 输  出 : [ 'msg'=>'success', 'data'=>$user ]
     * 创  建 : 2018/08/11 10:55
     */

    public function OrderUpd(Request $request)
    {
        // 获取传值
        $order = $request->put('order_number');
        $upl = $request->put('order_status');
        // 验证数据
        if(!$order) return returnResponse(1,'请发送订单号');
        if(!$upl) return returnResponse(1,'请发送订单状态');
        // 引入RoleService逻辑
        $res=(new OrderService)->OrderUpd($order,$upl);
        // 验证返回数据
        if($res['msg']=='error') return returnResponse(3,$res['data']);
        // 返回数据
        return returnResponse(0,'修改成功',true);

    }

}