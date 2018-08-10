<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  BusinessInterface.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/08/09 15:53
 *  文件描述 :  商户店铺管理数据接口声明
 *  历史记录 :  -----------------------
 */
namespace app\business_module\working_version\v1\dao;

interface BusinessInterface
{
    /**
     * 名  称 : businessDataSel()
     * 功  能 : 获取管理员店铺信息
     * 输  入 : (string) $get['adminToken'] => '管理员身份标识';
     * 输  出 : ['msg'=>'success','data'=>true]
     * 创  建 : 2018/08/09 15:56
     */
    public function businessDataSel($get);
}