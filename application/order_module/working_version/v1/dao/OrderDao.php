<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  BalanceDao.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/08/09 15:03
 *  文件描述 :  中春果业-店铺的零钱信息接口声明
 *  历史记录 :  -----------------------
 */
namespace app\order_module\working_version\v1\dao;
use app\order_module\working_version\v1\model\OrderModel;
use app\order_module\working_version\v1\model\ShopModel;

class OrderDao
{
    /**
     * 名  称 : OrderSel()
     * 功  能 : 订单详情
     * 变  量 : --------------------------------------
     * 输  入 : (string) $profitSel['order_number']     => '订单';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":trun}
     * 创  建 : 2018/08/11 10:55
     */
    public function OrderSel($shopSel)
    {
        // 实例化model
        $ShopModel = new OrderModel;

        $list = $ShopModel->where('order_number',$shopSel)->find();
        // 验证
        if(!$list){
            return returnData('error',false);
        }
        // 返回数据
        return returnData('success',$list);
    }

    /**
     * 名  称 : OrderUpd()
     * 功  能 : 声明：修改订单号
     * 输  入 : (string) $order => '订单主键';
     * 输  入 : (string) $upl => '订单状态';
     * 输  出 : [ 'msg'=>'success', 'data'=>$user ]
     * 创  建 : 2018/08/11 10:55
     */
    public function OrderUpd($order,$upl)
    {
        // 实例化模型
        $rightModel = ShopModel::where('order_number', $order)->find();
        // 处理数据
        $rightModel->order_status = $upl;
        // 保存数据
        $res = $rightModel->save();
        if(!$res) return returnData('error');
        // 返回数据
        return returnData('success',true);

    }
}