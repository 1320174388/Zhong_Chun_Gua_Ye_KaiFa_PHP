<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  IndexController.php
 *  创 建 者 :  Feng TianShui
 *  创建日期 :  2018/08/30 15:57
 *  文件描述 :  模块控制器
 *  历史记录 :  -----------------------
 */
namespace app\platform_module\working_version\v1\controller;
use think\Controller;
use app\platform_module\working_version\v1\service\PlatformService;
class IndexController extends Controller
{
    /**
     * 名    称：addClass()
     * 功    能：添加分类
     * 输    入：(string)  $class_name     =>  `分类名称`
     * 输    入：(string)  $class_img_url  =>  `分类缩略图`
     * 输    入：(string)  $class_price    =>  `分类价格`
     * 输    出：{"errNum":0,"retMsg":"提示信息","retData":true
     * 输    出: {"errNum":1,"retMsg":"提示信息","retData":false
     */
    public function addClass()
    {
        //传入分类数据
        $reutl = (new PlatformService())->addClassService($_POST);

        //返回结果
        if ($reutl['msg'] == 'success')
        {
            return returnResponse(0,'添加成功',$reutl['data']);
        }else{
            return returnResponse(1,'添加失败',$reutl['data']);
        }
    }
}