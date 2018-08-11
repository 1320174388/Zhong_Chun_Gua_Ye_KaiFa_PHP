<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  latformService.php
 *  创 建 者 :  Feng TianShui
 *  创建日期 :  2018/08/09 15:57
 *  文件描述 :  分类数据验证逻辑层
 *  历史记录 :  -----------------------
 */
namespace app\platform_module\working_version\v1\service;

use think\Validate;
use app\platform_module\working_version\v1\dao\ClassDao;
use app\platform_module\working_version\v1\validator\ClassValidator;
class PlatformService
{
    /**
     * 名    称：addClassService()
     * 功    能：验证分类数据并执行数据访问层
     * 输    入：(array)   $data   =>  `名称、图片路径、价格`
     * 输    出：[ 'msg' => 'success', 'data' => $data ]
     * 输    出：[ 'msg' => 'error',  'data' => $data ]
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
        $isName = $classOpject->queryName($data['class_name']);
        //返回分类名错误
        if ($isName['msg'] !== 'error')
        {
            return returnData('error','分类名称重复');
        }
        //传入数据执行数据访问层
        $result = $classOpject->add($data);
        //返回结果
        if ($result)
        {
            return returnData('success',$result['data']);
        }else{
            return returnData('error',$result['data']);
        }
    }
    /**
     * 名    称：getClassService()
     * 功    能：获取分类数据
     * 输    入：（string）  $className  =>  `分类名称`  默认：false
     * 输    出：[ 'msg' => 'success', 'data' => $data ]
     * 输    出：[ 'msg' => 'error',  'data' => $data ]
     */
    public function getClassService($className = false)
    {
        //创建分类数据访问对象
        $classOpject = new ClassDao();
        //判断分类名称是否存在
        if ($className)
        {
            //传入条件执行数据访问层
            $result = $classOpject->queryName($className);
            //返回结果
            if ($result['msg'] == 'success')
            {
                return returnData('success',$result['data']);
            }else{
                return returnData('error',$result['data']);
            }
        }else{
            //直接执行查询
            $result = $classOpject->queryAll();
            //返回结果
            if ($result['msg'] == 'success')
            {
                return returnData('success',$result['data']);
            }else{
                return returnData('error',$result['data']);
            }
        }
    }
    /**
     * 名    称：updateClassService()
     * 功    能：更新分类数据
     * 输    入：（array）  $data  =>  `分类数据`
     * 输    出：[ 'msg' => 'success', 'data' => $data ]
     * 输    出：[ 'msg' => 'error',  'data' => $data ]
     */
    public function updateClassService($data)
    {
        //  验证分类数据
        $validator = new ClassValidator();
        //  返回数据错误
        if (!$validator->check($data))
        {
            return returnData('error',$validator->getError());
        }
        // 传入数据执行数据操作层
        $result = (new ClassDao())->modifyClass($data);
        // 返回结果
        if ($result['msg'] == 'success')
        {
            return returnData('success',$result['data']);
        }else{
            return returnData('error',$result['data']);
        }
    }
    /**
     * 名    称：delectClassService()
     * 功    能：删除分类数据
     * 输    入：（array）  $data  =>  `分类主键`
     * 输    出：[ 'msg' => 'success', 'data' => $data ]
     * 输    出：[ 'msg' => 'error',  'data' => $data ]
     */
    public function delectClassService($data)
    {
        // 验证数据
        $classIndex = isset($data['class_index']) ? $data['class_index'] : false;
        //返回数据错误
        if (!$classIndex)
        {
            return returnData('error','分类标识class_index不能为空');
        }
        // 执行操作
        $result = (new ClassDao())->delectClass($data['class_index']);
        // 返回结果
        if ($result['msg'] == 'success')
        {
            return returnData('success',$result['data']);
        }else{
            return returnData('error',$result['data']);
        }
    }
}