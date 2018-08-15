<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  BalanceDao.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/08/09 15:03
 *  文件描述 :  中春果业-店铺的零钱信息接口声明
 *  历史记录 :  -----------------------
 */
namespace app\profit_module\working_version\v1\dao;
use app\profit_module\working_version\v1\model\ProfitModel;

class ProfitDao
{

    /**
     * 名  称 : ProfitSel()
     * 功  能 : 店铺收益数据
     * 输  入 : (string) $profitSel['shop_id']     => '店铺主键';
     * 输  出 : ['msg'=>'success','data'=>true]
     * 创  建 : 2018/08/11 11:43
     */
    public function ProfitSel($profitSel)
    {
        // 实例化model
        $BalanceModel = new ProfitModel;

        $list = $BalanceModel->where('profit_id',$profitSel)->find();
        // 验证
        if(!$list){
            return returnData('error',false);
        }
        // 返回数据
        return returnData('success',$list);
    }
}