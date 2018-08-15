<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  BalanceDao.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/08/09 15:03
 *  文件描述 :  中春果业-店铺的零钱信息接口声明
 *  历史记录 :  -----------------------
 */
namespace app\putforward_module\working_version\v1\dao;
use app\putforward_module\working_version\v1\model\PutforwardModel;

class PutforwardDao
{

    /**
     * 名  称 : PutforwardSel()
     * 功  能 : 个人提现数据
     * 输  入 : (string) $PutforwardSel['user_token']     => '提现主键';
     * 输  出 : ['msg'=>'success','data'=>true]
     * 创  建 : 2018/08/11 11:43
     */
    public function PutforwardSel($PutforwardSel)
    {
        // 实例化model
        $PutforwardModel = new PutforwardModel;

        $list = $PutforwardModel->where('user_token',$PutforwardSel)->find();

        $lis  = substr($list,1);
        // 验证
        if(!$lis){
            return returnData('error',false);
        }
        // 返回数据
        return returnData('success',$lis);
    }
}