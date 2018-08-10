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
use app\business_module\working_version\v1\service\BusinessService;

class BusinessController extends Controller
{
    /**
     * 名  称 : businessIsData()
     * 功  能 : 判断管理员是否有店铺信息，获取店铺信息数据
     * 变  量 : --------------------------------------
     * 输  入 : (string) $get['adminToken'] => '管理员身份标识';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":"数据"}
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

    /**
     * 名  称 : businessPost()
     * 功  能 : 执行管理员创建个人店铺操作接口
     * 变  量 : --------------------------------------
     * 输  入 : (string) $post['adminToken'] => '管理员身份标识';
     * 输  入 : (string) $post['shopName']   => '店铺名称';
     * 输  入 : (string) $post['shopMaster'] => '店铺名称';
     * 输  入 : (string) $post['shopPhone']  => '联系电话';
     * 输  入 : (string) $post['shopFormid'] => 'FormID';
     * 输  出 : {"errNum":0,"retMsg":"创建成功","retData":true}
     * 创  建 : 2018/08/10 11:01
     */
    public function businessPost(Request $request)
    {
        // 实例化逻辑层代码
        $businessService = new BusinessService();
        // 执行判断管理员是否有店铺操作
        $R = $businessService->businessAdd($request->post());
        // 验证返回数据
        if($R['msg']=='error') return returnResponse(
            1,$R['data']
        );
        // 返回正确数据
        return returnResponse(0,$R['data'],true);
    }

    /**
     * 名  称 : businessPut()
     * 功  能 : 执行管理员修改个人店铺操作接口
     * 变  量 : --------------------------------------
     * 输  入 : (string) $put['shopId']     => '店铺标识';
     * 输  入 : (string) $put['adminToken'] => '管理员身份标识';
     * 输  入 : (string) $put['shopName']   => '店铺名称';
     * 输  入 : (string) $put['shopMaster'] => '店铺名称';
     * 输  入 : (string) $put['shopPhone']  => '联系电话';
     * 输  入 : (string) $put['shopFormid'] => 'FormID';
     * 输  出 : {"errNum":0,"retMsg":"创建成功","retData":true}
     * 创  建 : 2018/08/10 16:12
     */
    public function businessPut(Request $request)
    {
        // 实例化逻辑层代码
        $businessService = new BusinessService();
        // 执行判断管理员是否有店铺操作
        $R = $businessService->businessEdit($request->put());
        // 验证返回数据
        if($R['msg']=='error') return returnResponse(
            1,$R['data']
        );
        // 返回正确数据
        return returnResponse(0,$R['data'],true);
    }
}