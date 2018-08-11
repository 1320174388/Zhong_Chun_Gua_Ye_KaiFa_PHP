<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  v3_tableName.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/16 22:51
 *  文件描述 :  模块数据表配置文件
 *  历史记录 :  -----------------------
 */
// +------------------------------------------------------
// : v3_版本:数据库表模型对应表明配置
// +------------------------------------------------------
return [
    // 用户表
    'UserTable' => 'data_home_users',
    // 管理员申请表
    'ApplyTable' => 'data_admin_applys',
    // 管理员表
    'AdminTable' => 'data_admin_lists',
    // 权限表
    'RightTable' => 'data_right_lists',
    // 职位表
    'RoleTable'  => 'data_role_lists',
    // 职位权限关联表
    'RoleRight'  => 'index_role_rights',
    // 管理员职位关联表
    'AdminRole'  => 'index_admin_roles'
];