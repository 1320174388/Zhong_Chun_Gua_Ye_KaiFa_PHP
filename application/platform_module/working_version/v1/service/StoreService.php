<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  StoreService.php
 *  创 建 者 :  Feng TianShui
 *  创建日期 :  2018/08/11 10:00
 *  文件描述 :  店铺数据验证逻辑层
 *  历史记录 :  -----------------------
 */
namespace app\platform_module\working_version\v1\service;
use app\platform_module\working_version\v1\dao\StoreDao;
use think\Validate;

class StoreService
{
    /**
     * 名    称：setStateService()
     * 功    能：设置店铺开关状态
     * 输    入：(array)  $data        =>  `店铺标识、状态碼`
     * 输    出：[ 'msg' => 'success', 'data' => $data ]
     * 输    出：[ 'msg' => 'error',  'data' => $data ]
     */
    public function setStateService($data)
    {
        //  验证数据
       $validate = new Validate([
           'shop_id'        =>  'require',
           'shop_status'    =>  'require'
       ],[
            'shop_id.require'       =>  '店铺标识shop_id不能为空',
            'shop_status.require'   =>  '状态碼shop_status不能为空'
       ]);
        //  返回数据错误
        if (!$validate->check($data))
        {
           return returnData('error',$validate->getError());
        }
        //  传入数据 执行数据操作
        $result = (new StoreDao())->modifyState($data);
        //  返回结果
        if ($result['msg'] == 'success')
        {
            return returnData('success',$result['data']);
        }else
        {
            return returnData('error',$result['data']);
        }
    }
    /**
     * 名    称：getVendorService()
     * 功    能：获取商家信息
     * 输    入：(string)  $shopName   =>  `商家名称`  默认:false
     * 输    出：[ 'msg' => 'success', 'data' => $data ]
     * 输    出：[ 'msg' => 'error',  'data' => $data ]
     */
    public function getVendorService($num = 0,$shopName = false)
    {
        $storeOpject = new StoreDao();
        //判断商家名称是否存在
        if ($shopName)
        {
            //执行条件查询
            $result = $storeOpject->queryName($shopName);
        }else
        {
            //执行分页查询
            $result = $storeOpject->queryPaging($num);
        }

        //返回结果
        if ($result['msg'] == 'success')
        {
            return returnData('success',$result['data']);
        }else
        {
            return returnData('error',$result['data']);
        }
    }
    /**
     * 名    称：getGoodsListService()
     * 功    能：获取店铺商品列表
     * 输    入：-----------------------------------------
     * 输    出：[ 'msg' => 'success', 'data' => $data ]
     * 输    出：[ 'msg' => 'error',  'data' => $data ]
     */
    public function getGoodsListService()
    {
        //执行操作
        $result = (new StoreDao())->queryGoods();
        //返回结果
        if ($result['msg'] == 'success')
        {
            return returnData('success',$result['data']);
        }else
        {
            return returnData('error',$result['data']);
        }
    }
    /**
     * 名    称：delectGoodsService()
     * 功    能：删除店铺商品
     * 输    入：(string)  $data       => `商品主键`
     * 输    出：[ 'msg' => 'success', 'data' => $data ]
     * 输    出：[ 'msg' => 'error',  'data' => $data ]
     */
    public function delectGoodsService($data)
    {
        //  验证数据
        $validate = new Validate([
            'apple_index'        =>  'require',
        ],[
            'apple_index.require'       =>  '商品主键apple_index不能为空',
        ]);
        //  返回数据错误
        if (!$validate->check($data))
        {
            return returnData('error',$validate->getError());
        }

        //传入数据 执行操作
        $result = (new StoreDao())->delectGoods($data['apple_index']);
        //返回结果
        if ($result['msg'] == 'success')
        {
            return returnData('success',$result['data']);
        }else
        {
            return returnData('error',$result['data']);
        }
    }
}