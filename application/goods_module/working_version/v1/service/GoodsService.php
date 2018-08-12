<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  GoodsService.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/08/11 11:05
 *  文件描述 :  商品添加逻辑代码
 *  历史记录 :  -----------------------
 */
namespace app\goods_module\working_version\v1\service;
use app\goods_module\working_version\v1\validator\GoodsValidate;
use app\goods_module\working_version\v1\dao\GoodsDao;

class GoodsService
{
    /**
     * 名  称 : goodsAdd()
     * 功  能 : 执行添加商品信息逻辑
     * 输  入 : (string) $post['shopId']     => '店铺ID';
     * 输  入 : (string) $post['goodsFile']  => '商品图片资源';
     * 输  入 : (string) $post['classIndex'] => '商品分类标识';
     * 输  入 : (string) $post['goodsStock'] => '商品库存';
     * 输  入 : (string) $post['goodsSales'] => '商品销量';
     * 输  入 : (string) $post['goodsPrice'] => '商品价格';
     * 输  出 : ['msg'=>'success','data'=>true]
     * 创  建 : 2018/08/11 11:07
     */
    public function goodsAdd($post)
    {
        // 实例化数据验证器
        $goodsValidate = new GoodsValidate();
        // 返回错误信息
        if(!$goodsValidate->check($post))
            return returnData(
            'error',
            $goodsValidate->getError()
        );

        // 处理文件上传资源信息
        $image = imageUploads(
            'goodsFile',
            './uploads/goods/',
            '/uploads/goods/'
        );
        // 验证文件是否上传
        if($image['msg']=='error') return returnData(
            'error',
            $image['data']
        );
        // 获取正确文件URL地址
        $post['goodsFile'] = $image['data'];

        // 实例化数据层代码
        $goodsDao = new GoodsDao();
        // 写入数据
        $goodsSave = $goodsDao->goodsAdd($post);
        // 判断是否保存成功
        if($goodsSave['msg']=='error') return returnData(
            'error',
            $goodsSave['data']
        );
        // 返回正确数据
        return returnData('success',$goodsSave['data']);
    }

    /**
     * 名  称 : goodsList()
     * 功  能 : 获取商品列表数据信息
     * 输  入 : (string) $get['shopId']   => '店铺ID';
     * 输  入 : (string) $get['goodsNum'] => '以获取的商品数量';
     * 输  出 : ['msg'=>'success','data'=>"商品列表数据"]
     * 创  建 : 2018/08 12 19:44
     */
    public function goodsList($get)
    {
        // 验证店铺ID是否上传
        if(empty($get['shopId'])) return returnData(
            'error',
            '请发送店铺ID'
        );
        // 验证店铺ID是否上传
        if(empty($get['goodsNum'])){
            $get['goodsNum'] = 0;
        }
        // 实例化数据层代码
        $goodsDao = new GoodsDao();
        // 获取数据
        $goodsSave = $goodsDao->goodsAll($get);
        // 判断是否保存成功
        if($goodsSave['msg']=='error') return returnData(
            'error',
            $goodsSave['data']
        );
        // 返回正确数据
        return returnData('error',$goodsSave['data']);
    }

    /**
     * 名  称 : goodsEdit()
     * 功  能 : 执行修改商品信息逻辑
     * 输  入 : (string) $put['goodsIndex'] => '商品标识';
     * 输  入 : (string) $put['shopId']     => '店铺ID';
     * 输  入 : (string) $put['goodsFile']  => '商品图片资源';
     * 输  入 : (string) $put['classIndex'] => '商品分类标识';
     * 输  入 : (string) $put['goodsStock'] => '商品库存';
     * 输  入 : (string) $put['goodsSales'] => '商品销量';
     * 输  入 : (string) $put['goodsPrice'] => '商品价格';
     * 输  出 : ['msg'=>'success','data'=>true]
     * 创  建 : 2018/08/13 00:23
     */
    public function goodsEdit($put)
    {
        // 实例化数据验证器
        $goodsValidate = new GoodsValidate();
        // 返回错误信息
        if(!$goodsValidate->check($put))
            return returnData(
                'error',
                $goodsValidate->getError()
            );
        // 验证是否发送商品标识
        if(empty($put['goodsIndex']))return returnData(
            'error','请发送商品标识'
        );
        // 处理文件上传资源信息
        $image = imageUploads(
            'goodsFile',
            './uploads/goods/',
            '/uploads/goods/'
        );
        // 验证文件是否上传
        if($image['msg']=='success') {
            if(unlink('.'.$put['goodsFile']));
            $put['goodsFile'] = $image['data'];
        }else{
            // 判断是否发送URL路径地址信息
            if(empty($put['goodsFile'])) return returnData(
                'error','请发送原图片URL路径地址'
            );
        }
        // 实例化数据层代码
        $goodsDao = new GoodsDao();
        // 写入数据
        $goodsSave = $goodsDao->goodsEdits($put);
        // 判断是否保存成功
        if($goodsSave['msg']=='error') return returnData(
            'error',
            $goodsSave['data']
        );
        // 返回正确数据
        return returnData('success',$goodsSave['data']);
    }
}