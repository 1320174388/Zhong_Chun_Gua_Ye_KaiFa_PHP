<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  GoodsDao.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/08/11 11:41
 *  文件描述 :  商品管理数据接口
 *  历史记录 :  -----------------------
 */
namespace app\goods_module\working_version\v1\dao;
use app\goods_module\working_version\v1\model\GoodsModel;

class GoodsDao implements GoodsIntreface
{
    /**
     * 名  称 : goodsAdd()
     * 功  能 : 添加商品信息数据
     * 输  入 : (string) $post['shopId']     => '店铺ID';
     * 输  入 : (string) $post['goodsFile']  => '商品图片资源';
     * 输  入 : (string) $post['classIndex'] => '商品分类标识';
     * 输  入 : (string) $post['goodsStock'] => '商品库存';
     * 输  入 : (string) $post['goodsSales'] => '商品销量';
     * 输  入 : (string) $post['goodsPrice'] => '商品价格';
     * 输  出 : ['msg'=>'success','data'=>true]
     * 创  建 : 2018/08/11 11:43
     */
    public function goodsAdd($post)
    {
        // 实例化数据库模型
        $goodsModel = new GoodsModel();
        // 处理数据
        $goodsModel->apple_index  = uniqidToken();
        $goodsModel->shop_id      = $post['shopId'];
        $goodsModel->apple_image  = $post['goodsFile'];
        $goodsModel->class_index  = $post['classIndex'];
        $goodsModel->apple_stock  = $post['goodsStock'];
        $goodsModel->apple_sales  = $post['goodsSales'];
        $goodsModel->apple_price  = $post['goodsPrice'];
        $goodsModel->create_time  = time();
        $goodsModel->update_time  = time();
        $goodsModel->apple_status = 1;
        // 保存数据、
        if(!$goodsModel->save()) return returnData(
            'error',
            '添加失败'
        );
        // 返回正确数据
        return returnData('success','添加成功');
    }

    /**
     * 名  称 : goodsAll()
     * 功  能 : 获取商品列表数据信息
     * 输  入 : (string) $get['shopId']   => '店铺ID';
     * 输  入 : (string) $get['goodsNum'] => '以获取的商品数量';
     * 输  出 : ['msg'=>'success','data'=>"商品列表数据"]
     * 创  建 : 2018/08 12 19:44
     */
    public function goodsAll($get)
    {
        // 获取商品列表数据
        $goodlist = GoodsModel::where(
            'shop_id',
            $get['shopId']
        )->limit(
            $get['goodsNum'],12
        )->select()->toArray();
        // 判断店铺是否有商品
        if(!$goodlist) return returnData(
            'error',
            '当前还没有商品，请添加商品'
        );
        // 返回正确商品列表数据
        return returnData('success',$goodlist);
    }

    /**
     * 名  称 : goodsEdits()
     * 功  能 : 修改商品信息数据
     * 输  入 : (string) $put['goodsIndex'] => '商品标识';
     * 输  入 : (string) $put['shopId']     => '店铺ID';
     * 输  入 : (string) $put['goodsFile']  => '商品图片资源';
     * 输  入 : (string) $put['classIndex'] => '商品分类标识';
     * 输  入 : (string) $put['goodsStock'] => '商品库存';
     * 输  入 : (string) $put['goodsSales'] => '商品销量';
     * 输  入 : (string) $put['goodsPrice'] => '商品价格';
     * 输  出 : ['msg'=>'success','data'=>true]
     * 创  建 : 2018/08/13 00:34
     */
    public function goodsEdits($put)
    {
        // 实例化数据库模型
        $goodsModel = GoodsModel::where(
            'apple_index',
            $put['goodsIndex']
        )->find();
        // 处理数据
        $goodsModel->shop_id      = $put['shopId'];
        $goodsModel->apple_image  = $put['goodsFile'];
        $goodsModel->class_index  = $put['classIndex'];
        $goodsModel->apple_stock  = $put['goodsStock'];
        $goodsModel->apple_sales  = $put['goodsSales'];
        $goodsModel->apple_price  = $put['goodsPrice'];
        $goodsModel->update_time  = time();
        // 保存数据、
        if(!$goodsModel->save()) return returnData(
            'error',
            '修改失败'
        );
        // 返回正确数据
        return returnData('success','修改成功');
    }

    /**
     * 名  称 : goodsDelete()
     * 功  能 : 执行删除商品数据逻辑
     * 输  入 : (string) $delete['goodsIndex'] => '商品标识';
     * 输  出 : ['msg'=>'success','data'=>true]
     * 创  建 : 2018/08/13 00:58
     */
    public function goodsDelete($delete)
    {
        // 实例化数据库模型
        $goodsModel = GoodsModel::where(
            'apple_index',
            $delete['goodsIndex']
        )->find();
        // 删除图片文件
        if(@unlink('.'.$goodsModel['apple_image']));
        // 删除数据
        $del = $goodsModel->delete();
        // 判断是否删除成功
        if(!$del) return returnData(
            'error','删除失败'
        );
        // 返回正确数据
        return returnData('success','删除成功');
    }
}