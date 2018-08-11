<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  GoodsValidate.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/08/11 11:11
 *  文件描述 :  商品添加数据验证器
 *  历史记录 :  -----------------------
 */
namespace app\goods_module\working_version\v1\validator;
use think\Validate;

class GoodsValidate extends Validate
{
    /**
     * 名  称 : $rule => '静态属性'
     * 功  能 : 定义验证规则
     * 输  入 : (string) $post['goodsFile']  => '商品图片资源';
     * 输  入 : (string) $post['classIndex'] => '商品分类标识';
     * 输  入 : (string) $post['goodsStock'] => '商品库存';
     * 输  入 : (string) $post['goodsSales'] => '商品销量';
     * 输  入 : (string) $post['goodsPrice'] => '商品价格';
     * 创  建 : 2018/08/11 11:11
     */
    protected $rule = [
        'classIndex'  => 'require|min:32|max:32',
        'goodsStock'  => 'require|number',
        'goodsSales'  => 'require|number',
        'goodsPrice'  => 'require|number',
    ];
    /**
     * 名  称 : $message => '静态属性'
     * 功  能 : 定义错误返回信息
     * 创  建 : 2018/08/11 11:11
     */
    protected $message  =   [
        'classIndex.require' => '请正确输入分类标识',
        'classIndex.min'     => '请正确输入分类标识',
        'classIndex.max'     => '请正确输入分类标识',
        'goodsStock.require' => '请正确输入商品库存',
        'goodsStock.number'  => '请正确输入商品库存',
        'goodsSales.require' => '请正确输入商品销量',
        'goodsSales.number'  => '请正确输入商品销量',
        'goodsPrice.require' => '请正确输入商品价格',
        'goodsPrice.number'  => '请正确输入商品价格',
    ];
}