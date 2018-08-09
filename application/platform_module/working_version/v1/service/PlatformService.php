<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  platformService.php
 *  创 建 者 :  Feng TianShui
 *  创建日期 :  2018/08/30 15:57
 *  文件描述 :  模块数据验证逻辑层
 *  历史记录 :  -----------------------
 */
namespace app\platform_module\working_version\v1\service;

use think\Validate;
use app\platform_module\working_version\v1\dao\ClassDao;
class PlatformService
{
    /**
     * 名    称：addClassService()
     * 功    能：验证分类数据并执行数据访问层
     * 输    入：(array)   $data   =>  `名称、图片路径、价格`
     * 输  出 : [ 'msg' => 'success', 'data' => '提示信息' ]
     * 输  出 : [ 'msg' => 'error',  'data' => '提示信息' ]
     */
    public function addClassService($data)
    {
        //验证数据
        $validate = new Validate([
            'class_name'    =>  'require',
            'class_img_url' =>  'require',
            'class_price'   => 'require'
        ],[
            'class_name.require'    =>  '分类名称class_name不能为空',
            'class_img_url.require' =>  '分类图片class_img_url不能为空',
            'class_price.require'   => '分类价格class_price不能为空'
        ]);
        //返回数据错误
        if (!$validate->check($data))
        {
            return returnData('error',$validate->getError());
        }
        //创建数据访问对象
        $classOpject = new ClassDao();
        //验证分类名是否重复
        $isName = $classOpject->query($data['class_name']);
        //返回分类名错误
        if ($isName['msg'] !== 'error')
        {
            return returnData('error','分类名称重复');
        }
        //传入数据执行数据访问层
        $reult = $classOpject->add($data);
        //返回结果
        if ($reult)
        {
            return returnData('success',$reult['data']);
        }else{
            return returnData('error',$reult['data']);
        }
    }
}