<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * 名  称 : returnData()
 * 功  能 : 返回函数数据
 * 变  量 : --------------------------------------
 * 输  入 : (string) $string => 'success'/'error'
 * 输  入 : ( data ) $data   => '任意数据格式内容'
 * 输  出 : [ 'msg' => 'success', 'data' => $data ]
 * 输  出 : [ 'msg' => 'error',  'data' => $data ]
 * 创  建 : 2018/06/12 21:40
 */
function returnData($string,$data = false)
{
    return [ 'msg'=>$string, 'data'=>$data ];
}

/**
 * 名  称 : returnResponse()
 * 功  能 : 返回接口响应数据
 * 变  量 : --------------------------------------
 * 输  入 : (int)    $number  => '返回状态编号';
 * 输  入 : (string) $string  => '提示信息'
 * 输  入 : (data)   $retData => '任意数据格式内容'
 * 输  出 : {"errNum":0,"retMsg":"提示信息","retData":{}
 * 输  出 : {"errNum":1,"retMsg":"提示信息","retData":false
 * 创  建 : 2018/06/12 21:40
 */
function returnResponse($number,$string,$retData = false)
{
    return json_encode([
        'errNum'  => $number,
        'retMsg'  => $string,
        'retData' => $retData
    ], 320);
}

/**
 * 名  称 : uniqidToken()
 * 功  能 : 生成当前时间微妙唯一Token标识字符串
 * 变  量 : --------------------------------------
 * 输  入 : --------------------------------------
 * 输  出 : 单一功能函数，只返回token字符串
 * 创  建 : 2018/08/09 18:33
 */
function uniqidToken()
{
    $str  = 'abcdefghijklmnopqrstuvwxyz';
    $str .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str .= '_123456789';

    $newStr = '';
    for( $i = 0; $i < 32; $i++) {
        $newStr .= $str[mt_rand(0,strlen($str)-1)];
    }
    $newStr .= time().mt_rand(100000,999999);

    return md5(uniqid().$newStr);
}