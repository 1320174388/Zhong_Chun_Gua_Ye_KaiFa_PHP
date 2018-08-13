<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  ClassDao.php
 *  创 建 者 :  Feng TianShui
 *  创建日期 :  2018/08/09 15:57
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
        $data['class_index'] = uniqidToken();
        $result = ClassModel::create($data,true);

        //  返回结果
        if ($result){
            return returnData('success','添加成功');
        }else{
            return returnData('error','添加失败');
        }
    }
    /**
     * 名    称：queryName()
     * 功    能：查询指定分类数据
     * 输    入：(string)  $class_name     =>  `分类名称`
     * 输  出 : [ 'msg' => 'success', 'data' => $data ]
     * 输  出 : [ 'msg' => 'error',  'data' => '没有数据' ]
     */
    public function queryName($class_name)
    {
        //执行数据查询
        $result = (new ClassModel())->where('class_name',$class_name)
                                    ->find();
        //返回结果
        if ($result)
        {
            return returnData('success',$result->toArray());
        }else
        {
            return  returnData('error','没有数据');
        }
    }
    /**
     * 名    称：queryIndex()
     * 功    能：查询指定分类数据
     * 输    入：(string)  $class_Index     =>  `分类主键`
     * 输  出 : [ 'msg' => 'success', 'data' => $data ]
     * 输  出 : [ 'msg' => 'error',  'data' => '没有数据' ]
     */
    public function queryIndex($class_index)
    {
        //执行数据查询
        $result = (new ClassModel())->where('class_index',$class_index)
            ->find();
        //返回结果
        if ($result)
        {
            return returnData('success',$result->toArray());
        }else
        {
            return  returnData('error','没有数据');
        }
    }
    /**
     * 名    称：queryAll()
     * 功    能：查询所有分类
     * 输  出 : [ 'msg' => 'success', 'data' => $data ]
     * 输  出 : [ 'msg' => 'error',  'data' => '没有数据' ]
     */
    public function queryAll()
    {
        //执行数据模型查询
        $result = ClassModel::all();
        //返回结果
        if(count($result) !== 0)
        {
            return returnData('success',$result);
        }else
        {
            return returnData('error','没有数据');
        }
    }
    /**
     * 名    称：modifyClass()
     * 功    能：修改分类
     * 输    入：(array)  $data    =>  `分类数据`
     * 输  出 : [ 'msg' => 'success', 'data' => '修改成功' ]
     * 输  出 : [ 'msg' => 'error',  'data' => '修改失败' ]
     */
    public function modifyClass($data)
    {
        //修改条件为分类主键
        $result = (new ClassModel())->where('class_index',$data['class_index'])
                                    ->update($data);
        //返回结果
        if ($result)
        {
            return returnData('success','修改成功');
        }else{
            return returnData('error','修改失败');
        }
    }
    /**
     * 名    称：delectClass()
     * 功    能：删除分类
     * 输    入：(string)  $data    =>  `分类主键`
     * 输  出 : [ 'msg' => 'success', 'data' => '删除成功' ]
     * 输  出 : [ 'msg' => 'error',  'data' => '删除失败' ]
     */
    public function delectClass($data)
    {
        //执行数据模型
        $result = (new ClassModel())->where('class_index',$data)
                                    ->delete();
        if ($result)
        {
            return returnData('success','删除成功');
        }else
        {
            return returnData('error','删除失败');
        }
    }
}