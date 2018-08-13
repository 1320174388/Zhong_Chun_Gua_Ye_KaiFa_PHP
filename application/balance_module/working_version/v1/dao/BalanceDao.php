<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  BalanceDao.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/08/09 15:03
 *  文件描述 :  中春果业-店铺的零钱信息接口声明
 *  历史记录 :  -----------------------
 */
namespace app\balance_module\working_version\v1\dao;
use app\balance_module\working_version\v1\model\BalanceModel;

class BalanceDao
{

    public function BalanceSel($balanceSel)
    {
        // 实例化model
        $BalanceModel = new BalanceModel;

        $list = $BalanceModel->where('shop_id',$balanceSel)->find();
        // 验证
        if(!$list){
            return returnData('error',false);
        }
        // 返回数据
        return returnData('success',$list);

    }
}