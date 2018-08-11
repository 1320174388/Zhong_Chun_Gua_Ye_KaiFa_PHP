<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  ClassValidator.php
 *  创 建 者 :  Feng TianShui
 *  创建日期 :  2018/08/10 15:57
 *  文件描述 :  分类数据检测
 *  历史记录 :  -----------------------
 */
namespace app\platform_module\working_version\v1\validator;
use think\Validate;
// +----------------------------------------------------------------------
// | (string)  `class_index`     =>  `分类标识`
// | (string)  `class_name`      =>  `分类名称`
// | (string)  `class_img_url`   =>  `分类图片路径`
// | (string)  `class_price`     =>  `分类价格`
// +----------------------------------------------------------------------
class ClassValidator extends Validate
{
    protected $rule = [
        'class_index'   =>  'require',
        'class_name'    =>  'require',
        'class_img_url' =>  'require',
        'class_price'   =>  'require'
    ];
    protected $message = [
        'class_index.require'   =>  '分类标识class_index不能为空',
        'class_name.require'    =>  '分类名称class_name不能为空',
        'class_img_url.require' =>  '分类图片路径class_img_url不能为空',
        'class_price.require'   =>  '分类价格class_price不能为空'
    ];
}