<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  platform_route_v1_api.php
 *  创 建 者 :  Feng TianShui
 *  创建日期 :  2018/08/09 15:04
 *  文件描述 :  模块路由地址
 *  历史记录 :  -----------------------
 */
// +----------------------------------------------------------------------
// | 功能：添加分类
// | 类型：POST
// +----------------------------------------------------------------------
route::post(
    'v1/platform_module/addClass/:token',
    'platform_module/v1.controller.IndexController/addClass'
)->middleware('Right_v3_IsAdmin');
// +----------------------------------------------------------------------
// | 功能：获取分类
// | 类型：GET
// +----------------------------------------------------------------------
route::get(
    'v1/platform_module/getClass',
    'platform_module/v1.controller.IndexController/getClass'
);
// +----------------------------------------------------------------------
// | 功能：修改分类
// | 类型：POST
// +----------------------------------------------------------------------
route::post(
    'v1/platform_module/updateClass/:token',
    'platform_module/v1.controller.IndexController/updateClass'
)->middleware('Right_v3_IsAdmin');
// +----------------------------------------------------------------------
// | 功能：删除分类
// | 类型：GET
// +----------------------------------------------------------------------
route::get(
    'v1/platform_module/delectClass/:token',
    'platform_module/v1.controller.IndexController/delectClass'
)->middleware('Right_v3_IsAdmin');
// +----------------------------------------------------------------------
// | 功能：设置店铺开关
// | 类型：GET
// +----------------------------------------------------------------------
route::get(
    'v1/platform_module/setState/:token',
    'platform_module/v1.controller.StoreController/setState'
)->middleware('Right_v3_IsAdmin');
// +----------------------------------------------------------------------
// | 功能：查询商家信息
// | 类型：GET
// +----------------------------------------------------------------------
route::get(
    'v1/platform_module/getVendor/:token',
    'platform_module/v1.controller.StoreController/getVendor'
)->middleware('Right_v3_IsAdmin');
// +----------------------------------------------------------------------
// | 功能：获取店铺商品信息
// | 类型：GET
// +----------------------------------------------------------------------
route::get(
    'v1/platform_module/getGoodsList',
    'platform_module/v1.controller.StoreController/getGoodsList'
);
// +----------------------------------------------------------------------
// | 功能：删除店铺商品信息
// | 类型：GET
// +----------------------------------------------------------------------
route::get(
    'v1/platform_module/delectGoods/:token',
    'platform_module/v1.controller.StoreController/delectGoods'
)->middleware('Right_v3_IsAdmin');
