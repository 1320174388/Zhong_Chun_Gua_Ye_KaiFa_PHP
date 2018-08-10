<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  BusinessService.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/08/09 15:53
 *  文件描述 :  商户店铺管理逻辑处理
 *  历史记录 :  -----------------------
 */
namespace app\business_module\working_version\v1\service;
use app\business_module\working_version\v1\dao\BusinessDao;
use app\business_module\working_version\v1\service\BusinessValidate;

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
        $R = $businessDao->businessDataSel($get);
        // 判断是否有返回值
        if($R['msg']=='error') return returnData(
            'error',$R['data']
        );
        // 返回正确数据
        return returnData('success',$R['data']);
    }

    /**
     * 名  称 : businessAdd()
     * 功  能 : 执行管理员创建个人店铺操作
     * 输  入 : (string) $post['adminToken'] => '管理员身份标识';
     * 输  入 : (string) $post['shopName']   => '店铺名称';
     * 输  入 : (string) $post['shopMaster'] => '店铺名称';
     * 输  入 : (string) $post['shopPhone']  => '联系电话';
     * 输  出 : ['msg'=>'success','data'=>true]
     * 创  建 : 2018/08/10 11:01
     */
    public function businessAdd($post)
    {
        // 实例化验证器，验证数据是否正确
        $validate = new BusinessValidate();
        // 判断数据是否正确,返回错误数据
        if(!$validate->check($post))
        {
            return returnData('error',$validate->getError());
        }
        // 实例化数据处理类
        $businessDao = new BusinessDao();
        // 获取管理员店铺数据
        $R = $businessDao->businessCreate($post);
        // 判断是否有返回值
        if($R['msg']=='error') return returnData(
            'error',$R['data']
        );
        // 返回正确数据
        return returnData('success',$R['data']);
    }
}