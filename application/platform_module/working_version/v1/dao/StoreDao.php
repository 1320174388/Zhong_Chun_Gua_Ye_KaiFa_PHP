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
use app\platform_module\working_version\v1\model\ShopApplesModel;
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
    /**
     * 名    称：queryName()
     * 功    能：获取指定商家信息
     * 输    入：(string)  $shopName     =>  `商家名称`
     * 输  出 : [ 'msg' => 'success', 'data' => $data ]
     * 输  出 : [ 'msg' => 'error',  'data' => '提示信息' ]
     */
    public function queryName($shopName)
    {
        //执行查询
        $result = (new ShopModel())->where('shop_master',$shopName)->find();
        //返回结果
        if ($result)
        {
            return returnData('success',$result->toArray());
        }else
        {
            return returnData('error','没有数据');
        }
    }
    /**
     * 名    称：queryPaging()
     * 功    能：获取商家信息
     * 输    入：---------------------------------------
     * 输  出 : [ 'msg' => 'success', 'data' => $data ]
     * 输  出 : [ 'msg' => 'error',  'data' => '提示信息' ]
     */
    public function queryPaging($num)
    {
        $shopOpject = new ShopModel();
        //查询前12条数据
        $result = $shopOpject->limit(12*$num,12)->select();
        //返回结果
        if (!count($result) == 0)
        {
            return returnData('success',$result);
        }else
        {
            return returnData('error','没有数据');
        }
    }
    /**
     * 名    称：queryGoods()
     * 功    能：获取店铺商品数据
     * 输    入：---------------------------------------
     * 输  出 : [ 'msg' => 'success', 'data' => $data ]
     * 输  出 : [ 'msg' => 'error',  'data' => '提示信息' ]
     */
    public function queryGoods()
    {
        //执行模型查询
       $result = (new ShopApplesModel())->select();
       //返回结果
       if (!count($result) == 0)
       {
            return returnData('success',$result);
       }else
       {
           return returnData('error','没有数据');
       }
    }
    /**
     * 名    称：delectGoods()
     * 功    能：删除店铺商品数据
     * 输    入：(string)  $data       => `商品主键`
     * 输  出 : [ 'msg' => 'success', 'data' => '删除成功' ]
     * 输  出 : [ 'msg' => 'error',  'data' => '删除失败' ]
     */
    public function delectGoods($data)
    {
        //执行模型删除
        $result = ShopApplesModel::destroy($data);
        //返回结果
        if ($result)
        {
            return returnData('success','删除成功');
        }else
        {
            return returnData('error','删除失败');
        }
    }
    /**
     * 名    称：querySingleGoods()
     * 功    能：查询单个商品数据
     * 输    入：(string)  $data       => `商品主键`
     * 输  出 : [ 'msg' => 'success', 'data' => $data ]
     * 输  出 : [ 'msg' => 'error',  'data' => '没有数据' ]
     */
    public function querySingleGoods($data)
    {
        //执行模型查询
        $result = (new ShopApplesModel())->where('apple_index',$data)->find();
        //返回结果
        if ($result)
        {
            return returnData('success',$result->toArray());
        }else
        {
            return returnData('error','没有数据');
        }
    }

}