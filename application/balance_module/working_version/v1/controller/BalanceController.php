<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  BalanceController.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/08/09 15:03
 *  文件描述 :  中春果业-店铺的零钱信息控制器
 *  历史记录 :  -----------------------
 */
namespace app\balance_module\working_version\v1\controller;
use think\Controller;
use think\Request;
use app\balance_module\working_version\v1\service\BalanceService;

class BalanceController extends Controller
{
    /**
     * 名  称 : BalanceSel()
     * 功  能 : 商铺零钱控制器
     * 变  量 : --------------------------------------
     * 输  入 : (string) $request['shop_id']     => '店铺主键';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":trun}
     * 创  建 : 2018/08/11 10:55
     */
    public function BalanceSel(Request $request)
    {
        // 获取职位数据
        $balanceSel = $request->post('shop_id');
        // 验证数据
        if(!$balanceSel) return returnResponse(1,'请发送标识');
        // 引入Service逻辑层数据
        $balance = (new BalanceService())->BalanceSel($balanceSel);
        // 返回接口响应数据
        return returnResponse(0,'请求成功',$balance['data']);
    }
}