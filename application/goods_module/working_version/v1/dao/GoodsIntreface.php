<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  GoodsIntreface.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/08/11 11:41
 *  文件描述 :  商品管理数据接口声明
 *  历史记录 :  -----------------------
 */
namespace app\goods_module\working_version\v1\dao;

interface GoodsIntreface
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
    public function goodsAdd($post);

    /**
     * 名  称 : goodsAll()
     * 功  能 : 获取商品列表数据信息
     * 输  入 : (string) $get['shopId']   => '店铺ID';
     * 输  入 : (string) $get['goodsNum'] => '以获取的商品数量';
     * 输  出 : ['msg'=>'success','data'=>"商品列表数据"]
     * 创  建 : 2018/08 12 19:44
     */
    public function goodsAll($get);
}