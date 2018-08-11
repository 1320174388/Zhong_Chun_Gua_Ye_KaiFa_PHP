<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  StoreController.php
 *  创 建 者 :  Feng TianShui
 *  创建日期 :  2018/08/11 09:20
 *  文件描述 :  商家店铺控制器
 *  历史记录 :  -----------------------
 */
namespace app\platform_module\working_version\v1\controller;

use app\platform_module\working_version\v1\service\StoreService;
use think\Controller;

class StoreController extends Controller
{
    /**
     * 名    称：setState()
     * 功    能：设置店铺开关状态
     * 输    入：(string)  $shop_id        =>  `店铺标识`
     * 输    入：(string)  $shop_status    =>  `状态碼`
     * 输    出：{"errNum":0,"retMsg":"设置成功","retData":true
     * 输    出: {"errNum":1,"retMsg":"设置失败","retData":"提示信息"
     */
    public function setState()
    {
        //  传入数据 执行操作
        $result = (new StoreService())->setStateService($_GET);
        //  返回结果
        if ($result['msg'] == 'success')
        {
            return returnResponse(0,'设置成功',true);
        }else
        {
            return returnResponse(1,'设置失败',$result['data']);
        }
    }
}