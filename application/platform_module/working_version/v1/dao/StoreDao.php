<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  StoreDao.php
 *  创 建 者 :  Feng TianShui
 *  创建日期 :  2018/08/11 10:57
 *  文件描述 :  店铺数据访问层
 *  历史记录 :  -----------------------
 */
namespace app\platform_module\working_version\v1\dao;

use app\business_module\working_version\v1\model\ShopModel;

class StoreDao
{
    /**
     * 名    称：modifyState()
     * 功    能：修改店铺状态
     * 输    入：(array)  $data        =>  `店铺标识、状态碼`
     * 输  出 : [ 'msg' => 'success', 'data' => true ]
     * 输  出 : [ 'msg' => 'error',  'data' => '提示信息' ]
     */
    public function modifyState($data)
    {
        //执行修改
        $result = (new ShopModel())->where('shop_id',$data['shop_id'])
                                   ->update(['shop_status',$data['shop_status']]);
        //返回结果
        if ($result)
        {
            return returnData('success',true);
        }else
        {
            return returnData('error','设置失败');
        }
    }
}