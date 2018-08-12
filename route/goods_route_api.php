<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  business_route_v1_api.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/08/09 10:25
 *  文件描述 :  管理员店铺管理路由
 *  历史记录 :  -----------------------
 */

// -------------------------------------------
// : 前台接口，用于前台请求商品数据
// -------------------------------------------

Route::group('v1/goods_module/', function(){

});


// +------------------------------------------------------
// : 路由分组：v1/goods_module/ 中间件：Right_v3_IsAdmin
// +------------------------------------------------------
Route::group('v1/goods_module/', function(){

    // ---- 商品管理 ----

    /**
     * 传值方式：POST 路由功能：执行添加商品操作
     */
    Route::post(
        'goods_route/:token',
        'goods_module/v1.controller.GoodsController/goodsPost'
    );
    /**
     * 传值方式：GET 路由功能：获取商品列表数据信息
     */
    Route::get(
        'goods_route/:token',
        'goods_module/v1.controller.GoodsController/goodsGet'
    );
    /**
     * 传值方式：PUT 路由功能：执行修改商品操作
     */
    Route::post(
        'goods_route/:token',
        'goods_module/v1.controller.GoodsController/goodsPut'
    );

})->middleware('Right_v3_IsAdmin');

