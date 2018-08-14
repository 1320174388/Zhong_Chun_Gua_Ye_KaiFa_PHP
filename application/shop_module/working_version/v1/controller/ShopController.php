<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  BalanceController.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/08/09 15:03
 *  文件描述 :  中春果业-店铺的零钱信息控制器
 *  历史记录 :  -----------------------
 */
namespace app\shop_module\working_version\v1\controller;
use think\Controller;
use think\Request;
use app\shop_module\working_version\v1\service\ShopService;

class ShopController extends Controller
{
    /**
     * 名  称 : ShopSel()
     * 功  能 : 店铺的订单控制器
     * 变  量 : --------------------------------------
     * 输  入 : (string) $profitSel['order_status']     => '订单状态';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":trun}
     * 创  建 : 2018/08/11 10:55
     */
    public function ShopSel(Request $request)
    {
        // 获取数据details_id
        $shopSel = $request->post('order_status');
        $shopId = $request->post('details_id');
        // 验证数据
        if(!$shopSel) return returnResponse(1,'请发送状态');
        if(!$shopSel) return returnResponse(1,'请发送店铺ID');
        // 引入Service逻辑层数据
        $balance = (new ShopService())->ShopSel($shopSel,$shopId);
        // 返回接口响应数据
        return returnResponse(0,'请求成功',$balance['data']);
    }

}