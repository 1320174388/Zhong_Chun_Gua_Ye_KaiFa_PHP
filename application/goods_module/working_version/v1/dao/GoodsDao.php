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
}