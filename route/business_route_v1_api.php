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

Route::group('v1/business_module/', function(){

});


// +------------------------------------------------------
// : 路由分组：v1/business_module/ 中间件：Right_v3_IsAdmin
// +------------------------------------------------------
Route::group('v1/business_module/', function(){

    // ---- 店铺管理 ----

    /**
     * 传值方式：GET 路由功能：判断管理员是否有店铺信息，获取店铺信息数据
     */
    Route::get(
        'business_route/:token',
        'right_module/v1.controller.BusinessController/businessIsData'
    );

})->middleware('Right_v3_IsAdmin');

