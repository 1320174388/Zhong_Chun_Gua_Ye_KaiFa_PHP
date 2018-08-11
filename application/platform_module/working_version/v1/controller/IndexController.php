<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  IndexController.php
 *  创 建 者 :  Feng TianShui
 *  创建日期 :  2018/08/09 15:57
 *  文件描述 :  分类控制器
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
     * 输    出：{"errNum":0,"retMsg":"添加成功","retData":true
     * 输    出: {"errNum":1,"retMsg":"添加失败","retData":false
     */
    public function addClass()
    {
        //传入分类数据
        $result = (new PlatformService())->addClassService($_POST);

        //返回结果
        if ($result['msg'] == 'success')
        {
            return returnResponse(0,'添加成功',$result['data']);
        }else{
            return returnResponse(1,'添加失败',$result['data']);
        }
    }
    /**
     * 名    称：getClass()
     * 功    能：获取分类
     * 输    入：(string)  $class_name     =>  `分类名称`  【可选】
     * 输    出：{"errNum":0,"retMsg":"获取成功","retData": $data
     * 输    出: {"errNum":1,"retMsg":"获取失败","retData": $data
     */
    public function getClass()
    {
        //接收数据
        $className = isset($_GET['class_name']) ? $_GET['class_name'] : false;
        //传入数据并执行操作
        $result = (new PlatformService())->getClassService($className);
        //返回结果
        if ($result['msg'] == 'success')
        {
            return returnResponse(0,'获取成功',$result['data']);
        }else{
            return returnResponse(1,'获取失败',$result['data']);
        }
    }
    /**
     * 名    称：updateClass()
     * 功    能：更新分类
     * 输    入：(string)  $class_index     =>  `分类标识`
     * 输    入：(string)  $class_name      =>  `分类名称`
     * 输    入：(string)  $class_img_url   =>  `分类图片路径`
     * 输    入：(string)  $class_price     =>  `分类价格`
     * 输    出：{"errNum":0,"retMsg":"更新成功","retData": true
     * 输    出: {"errNum":1,"retMsg":"更新失败","retData": $data
     */
    public function updateClass()
    {
        //  传入数据执行业务逻辑
        $result = (new PlatformService())->updateClassService($_POST);
        //  返回结果
        if ($result['msg'] == 'success')
        {
            return returnResponse(0,'修改成功',true);
        }else{
            return returnResponse(1,'修改失败',$result['data']);
        }
    }
    /**
     * 名    称：delectClass()
     * 功    能：删除分类
     * 输    入：(string)  $class_index     =>  `分类标识`
     * 输    出：{"errNum":0,"retMsg":"删除成功","retData": true
     * 输    出: {"errNum":1,"retMsg":"删除失败","retData":
     */
    public function delectClass()
    {
        // 传入分类主键执行操作
        $result = (new PlatformService())->delectClassService($_GET);
        // 返回结果
        if ($result['msg'] == 'success')
        {
            return returnResponse(0,'删除成功',true);
        }else{
            return returnResponse(1,'删除失败',$result['data']);
        }
    }
}