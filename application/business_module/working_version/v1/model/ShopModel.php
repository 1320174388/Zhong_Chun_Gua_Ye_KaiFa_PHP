<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  ShopModel.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/08/09 19:10
 *  文件描述 :  管理员表数据模型
 *  历史记录 :  -----------------------
 */
namespace app\business_module\working_version\v3\model;
use think\Model;

class ShopModel extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = '';

    // 设置当前模型对应数据表的主键
    protected $pk = 'shop_id';

    // 加载配置数据表名
    protected function initialize()
    {
        $this->table = config('v1_tableName.ShopTable');
    }
}