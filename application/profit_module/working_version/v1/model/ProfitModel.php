<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  BalanceModel.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/08/09 15:03
 *  文件描述 :  中春果业-店铺的零钱信息表数据模型
 *  历史记录 :  -----------------------
 */
namespace app\profit_module\working_version\v1\model;
use think\Model;

class ProfitModel extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = '';

    // 设置当前模型对应数据表的主键
    protected $pk = 'profit_id';

    // 加载配置数据表名
    protected function initialize()
    {
        $this->table = config('v1_tableName.ProfitTable');
    }
}