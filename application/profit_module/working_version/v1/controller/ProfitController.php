<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  BalanceController.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/08/09 15:03
 *  文件描述 :  中春果业-店铺的零钱信息控制器
 *  历史记录 :  -----------------------
 */
namespace app\profit_module\working_version\v1\controller;
use think\Controller;
use think\Request;
use app\profit_module\working_version\v1\service\ProfitService;

class ProfitController extends Controller
{
    /**
     * 名  称 : ProfitSel()
     * 功  能 : 店铺收益控制器
     * 变  量 : --------------------------------------
     * 输  入 : (string) $profitSel['profit_id']     => '收益主键';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":trun}
     * 创  建 : 2018/08/11 10:55
     */
    public function ProfitSel(Request $request)
    {
        // 获取数据
        $profitSel = $request->post('profit_id');
        // 验证数据
        if(!$profitSel) return returnResponse(1,'请发送标识');
        // 引入Service逻辑层数据
        $balance = (new ProfitService())->ProfitSel($profitSel);
        // 返回接口响应数据
        return returnResponse(0,'请求成功',$balance['data']);
    }
}