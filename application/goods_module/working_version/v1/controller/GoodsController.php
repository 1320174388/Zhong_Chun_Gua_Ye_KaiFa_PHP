<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  GoodsController.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/08/11 10:48
 *  文件描述 :  中春果业-商品管理控制器
 *  历史记录 :  -----------------------
 */
namespace app\goods_module\working_version\v1\controller;
use think\Controller;
use think\Request;
use app\goods_module\working_version\v1\service\GoodsService;

class GoodsController extends Controller
{
    /**
     * 名  称 : goodsPost()
     * 功  能 : 执行添加商品操作
     * 变  量 : --------------------------------------
     * 输  入 : (string) $post['goodsFile']  => '商品图片资源';
     * 输  入 : (string) $post['classIndex'] => '商品分类标识';
     * 输  入 : (string) $post['goodsStock'] => '商品库存';
     * 输  入 : (string) $post['goodsSales'] => '商品销量';
     * 输  入 : (string) $post['goodsPrice'] => '商品价格';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":"数据"}
     * 创  建 : 2018/08/11 10:55
     */
    public function goodsPost(Request $request)
    {
        // 实例化逻辑层代码
        $goodsService = new GoodsService();
        // 执行判断管理员是否有店铺操作
        $R = $goodsService->goodsAdd($request->post());
        // 验证返回数据
        if($R['msg']=='error') return returnResponse(
            1,$R['data']
        );
        // 返回正确数据
        return returnResponse(0,'请求成功',$R['data']);

    }
}