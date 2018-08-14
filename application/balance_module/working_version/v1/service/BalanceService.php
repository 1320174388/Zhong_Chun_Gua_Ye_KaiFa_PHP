<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  BalanceService.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/08/09 15:03
 *  文件描述 :  中春果业-店铺的零钱信息逻辑处理
 *  历史记录 :  -----------------------
 */
namespace app\balance_module\working_version\v1\service;
use app\balance_module\working_version\v1\dao\BalanceDao;

class BalanceService
{

    /**
     * 名  称 : BalanceSel()
     * 功  能 : 商铺零钱信息逻辑
     * 变  量 : --------------------------------------
     * 输  入 : (string) $balanceSel['shop_id']     => '店铺主键';
     * 输  出 : ['msg'=>'success','data'=>true]
     * 创  建 : 2018/08/11 11:07
     */
    public function BalanceSel($balanceSel)
    {
        // 引入BalanceDao层
        $balance = (new BalanceDao())->BalanceSel($balanceSel);
        // 判断是否有数据
        if($balance['msg']=='error') return returnData('error');
        // 返回数据格式
        return returnData('success',$balance['data']);

    }
}