<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  BalanceDao.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/08/09 15:03
 *  文件描述 :  中春果业-店铺的零钱信息接口声明
 *  历史记录 :  -----------------------
 */
namespace app\shop_module\working_version\v1\dao;
use app\shop_module\working_version\v1\model\ShopModel;

class ShopDao
{
    /**
     * 名  称 : ShopSel()
     * 功  能 : 店铺的订单
     * 变  量 : --------------------------------------
     * 输  入 : (string) $profitSel['order_status']     => '订单状态';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":trun}
     * 创  建 : 2018/08/11 10:55
     */
    public function ShopSel($shopSel,$shopId)
    {
        // 实例化model
        $ShopModel = new ShopModel;
        $list = $ShopModel->where('order_status',$shopSel and details_id,$shopId)->find();
        // 验证
        if(!$list){
            return returnData('error',false);
        }
        // 返回数据
        return returnData('success',$list);
    }
}