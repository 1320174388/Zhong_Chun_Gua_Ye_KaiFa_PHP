<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  BusinessValidate.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/08/10 11:12
 *  文件描述 :  商户创建店铺验证器
 *  历史记录 :  -----------------------
 */
namespace app\business_module\working_version\v1\validator;
use think\Validate;

class BusinessValidate extends Validate
{
    /**
     * 名  称 : $rule => '静态属性'
     * 功  能 : 定义验证规则
     * 输  入 : (string) $post['adminToken'] => '管理员身份标识';
     * 输  入 : (string) $post['shopName']   => '店铺名称';
     * 输  入 : (string) $post['shopMaster'] => '店铺名称';
     * 输  入 : (string) $post['shopPhone']  => '联系电话';
     * 创  建 : 2018/08/10 11:12
     */
    protected $rule = [
        'adminToken'  => 'require|min:32|max:32',
        'shopName'    => 'require|min:2|max:20',
        'shopMaster'  => 'require|min:2|max:20',
        'shopPhone'   => 'require|min:11|max:11',
    ];
    /**
     * 名  称 : $message => '静态属性'
     * 功  能 : 定义错误返回信息
     * 创  建 : 2018/08/10 11:14
     */
    protected $message  =   [
        'adminToken.require' => '请正确输入管理员身份标识',
        'adminToken.min'     => '请正确输入管理员身份标识',
        'adminToken.max'     => '请正确输入管理员身份标识',
        'shopName.require'   => '请输入2~20个字的店铺名称',
        'shopName.min'       => '请输入2~20个字的店铺名称',
        'shopName.max'       => '请输入2~20个字的店铺名称',
        'shopMaster.require' => '请输入2~20个字的店主名称',
        'shopMaster.min'     => '请输入2~20个字的店主名称',
        'shopMaster.max'     => '请输入2~20个字的店主名称',
        'shopPhone.require'  => '请正确输入联系电话',
        'shopPhone.min'      => '请正确输入联系电话',
        'shopPhone.max'      => '请正确输入联系电话',
    ];
}