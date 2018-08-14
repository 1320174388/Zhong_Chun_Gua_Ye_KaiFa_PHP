<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  login_route_api.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/12 15:04
 *  文件描述 :  模块路由地址
 *  历史记录 :  -----------------------
 */




Route::group('v1/business_module/', function(){

    Route::post(
        'v1/shop_model/shop_sel/:token',
        'shop_module/v1.controller.ShopController/ShopSel'
    );

})->middleware('Right_v3_IsAdmin');