<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  putforward_route_v1_api.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/08/10 15:39
 *  文件描述 :  用户提现记录路由地址
 *  历史记录 :  -----------------------
 */


Route::group('v1/business_module/', function(){

    Route::post(
        'v1/putforward_module/putforwardsel/:token',
        'putforward_module/v1.controller.PutforwardController/PutforwardSel'
    );


})->middleware('Right_v3_IsAdmin');