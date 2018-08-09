<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  BusinessService.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/08/09 15:53
 *  文件描述 :  商户店铺管理逻辑处理
 *  历史记录 :  -----------------------
 */
namespace app\business_module\working_version\v3\service;
use app\business_module\working_version\v3\dao\BusinessDao;

class BusinessService
{
    /**
     * 名  称 : businessDataGet()
     * 功  能 : 获取管理员店铺信息
     * 输  入 : (string) $get['adminToken'] => '管理员身份标识';
     * 输  出 : ['msg'=>'success','data'=>true]
     * 创  建 : 2018/08/09 15:56
     */
    public function businessDataGet($get)
    {
        // 判断是否发送管理员身份标识数据
        if(empty($get['adminToken'])) return returnData(
            'error','请发送管理员身份标识'
        );
        // 实例化数据处理类
        $businessDao = new BusinessDao();
        // 获取管理员店铺数据
        $businessDao->businessDataSel();

    }
}