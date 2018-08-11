<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  platform_route_v3_api.php
 *  创 建 者 :  Feng TianShui
 *  创建日期 :  2018/08/09 15:04
 *  文件描述 :  模块路由地址
 *  历史记录 :  -----------------------
 */
route::post(
    'v1/platform_module/addClass',
    'platform_module/v1.controller.IndexController/addClass'
);
route::get(
    'v1/platform_module/getClass',
    'platform_module/v1.controller.IndexController/getClass'
);