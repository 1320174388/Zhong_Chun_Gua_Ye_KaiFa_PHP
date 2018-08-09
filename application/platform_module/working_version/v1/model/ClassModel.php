<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  classModel.php
 *  创 建 者 :  Feng TianShui
 *  创建日期 :  2018/08/30 15:57
 *  文件描述 :  分类模型
 *  历史记录 :  -----------------------
 */
namespace app\platform_module\working_version\v1\model;

use think\Model;

class ClassModel extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = '';

    // 设置当前模型对应数据表的主键
    protected $pk = 'class_index';

    // 开启时间戳自动写入
    protected $autoWriteTimestamp = true;

    // 定义时间戳字段名
    protected $createTime = 'class_time';

    // 加载配置数据表名
    public function initialize()
    {
        parent::initialize();
        $this->table = config('tableName.AppleClass');
    }
}