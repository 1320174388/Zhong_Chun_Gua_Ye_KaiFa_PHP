<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  classDao.php
 *  创 建 者 :  Feng TianShui
 *  创建日期 :  2018/08/30 15:57
 *  文件描述 :  分类数据访问层
 *  历史记录 :  -----------------------
 */
namespace app\platform_module\working_version\v1\dao;

use app\platform_module\working_version\v1\model\ClassModel;

class ClassDao
{
    /**
     * 名    称：add()
     * 功    能：添加分类
     * 输    入：(array)  $data     =>  `分类数据`
     * 输  出 : [ 'msg' => 'success', 'data' => '提示信息' ]
     * 输  出 : [ 'msg' => 'error',  'data' => '提示信息' ]
     */
    public function add($data)
    {
        //  执行数据模型添加到数据库
       $reult = ClassModel::create($data,true);

        //  返回结果
        if ($reult){
            return returnData('success','添加成功');
        }else{
            return returnData('error','添加失败');
        }
    }
    /**
     * 名    称：query()
     * 功    能：查询分类
     * 输    入：(string)  $class_name     =>  `分类名称`
     * 输  出 : [ 'msg' => 'success', 'data' => $data ]
     * 输  出 : [ 'msg' => 'error',  'data' => '没有数据' ]
     */
    public function query($class_name)
    {
        //执行数据查询
        $reult = (new ClassModel())->where('class_name',$class_name)
                                    ->find();
        //返回结果
        if ($reult)
        {
            return returnData('success',$reult->toArray());
        }else
        {
            return  returnData('error','没有数据');
        }
    }

}