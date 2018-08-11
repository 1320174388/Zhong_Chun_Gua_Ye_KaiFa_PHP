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
    /**
     * 名    称：getVendor()
     * 功    能：获取商家信息
     * 输    入：(string)  $shop_name    =>  `商家名称`  【可选】
     * 输    入：(string)  $num          =>  `页数`      【可选】
     * 输    出：{"errNum":0,"retMsg":"获取成功","retData": $data
     * 输    出: {"errNum":1,"retMsg":"获取失败","retData":"提示信息"
     */
    public function getVendor()
    {
        //接收数据
        $shopName = isset($_GET['shop_name']) ? $_GET['shop_name'] : false;
        $num = isset($_GET['num']) ? $_GET['num'] : 0;
        //传入数据 执行操作
        $result = (new StoreService())->getVendorService($num,$shopName);
        //返回结果
        if ($result['msg'] == 'success')
        {
            return returnResponse(0,'获取成功',$result['data']);
        }else
        {
            return returnResponse(1,'获取失败',$result['data']);
        }
    }
    /**
     * 名    称：getGoodsList()
     * 功    能：获取店铺商品列表
     * 输    入：---------------------------------------------------
     * 输    出：{"errNum":0,"retMsg":"获取成功","retData": $data
     * 输    出: {"errNum":1,"retMsg":"获取失败","retData":"提示信息"
     */
    public function getGoodsList()
    {
        //执行操作
        $result = (new StoreService())->getGoodsListService();
        //返回结果
        if ($result['msg'] == 'success')
        {
            return returnResponse(0,'获取成功',$result['data']);
        }else
        {
            return returnResponse(1,'获取失败',$result['data']);
        }
    }
    /**
     * 名    称：delectGoods()
     * 功    能：删除商品
     * 输    入：(string)  $apple_index    `商品主键`
     * 输    出：{"errNum":0,"retMsg":"删除成功","retData": true
     * 输    出: {"errNum":1,"retMsg":"删除失败","retData":"提示信息"
     */
    public function delectGoods()
    {
        //  传入数据 执行操作
        $result = (new StoreService())->delectGoodsService($_GET);
        //  返回结果
        if ($result['msg'] == 'success')
        {
            return returnResponse(0,'删除成功',true);
        }else
        {
            return returnResponse(1,'删除失败',$result['data']);
        }
    }
}