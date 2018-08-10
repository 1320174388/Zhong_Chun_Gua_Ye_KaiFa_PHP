<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  BusinessController.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/08/09 15:03
 *  文件描述 :  中春果业-商户店铺管理控制器
 *  历史记录 :  -----------------------
 */
namespace app\business_module\working_version\v1\controller;
use think\Controller;
use think\Request;
use app\business_module\working_version\v3\service\BusinessService;

class BusinessController extends Controller
{
    /**
     * 名  称 : businessIsData()
     * 功  能 : 判断管理员是否有店铺信息，获取店铺信息数据
     * 变  量 : --------------------------------------
     * 输  入 : (string) $get['adminToken'] => '管理员身份标识';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":true}
     * 创  建 : 2018/08/09 15:07
     */
    public function businessIsData(Request $request)
    {
        // 实例化逻辑层代码
        $businessService = new BusinessService();
        // 执行判断管理员是否有店铺操作
        $R = $businessService->businessDataGet($request->get());
        // 验证返回数据
        if($R['msg']=='error') return returnResponse(
            1,$R['data']
        );
        // 返回正确数据
        return returnResponse(0,'请求成功',$R['data']);

    }
}