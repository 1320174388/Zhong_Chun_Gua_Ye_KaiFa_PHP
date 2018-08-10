<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  BusinessInterface.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/08/09 15:53
 *  文件描述 :  商户店铺管理数据接口声明
 *  历史记录 :  -----------------------
 */
namespace app\business_module\working_version\v1\dao;
use app\business_module\working_version\v1\model\ShopModel;
use app\right_module\working_version\v3\model\UserModel;
use app\right_module\working_version\v3\library\PushLibrary;

class BusinessDao implements BusinessInterface
{
    /**
     * 名  称 : businessDataSel()
     * 功  能 : 获取管理员店铺信息
     * 输  入 : (string) $get['adminToken'] => '管理员身份标识';
     * 输  出 : ['msg'=>'success','data'=>true]
     * 创  建 : 2018/08/09 15:56
     */
    public function businessDataSel($get)
    {
        // 获取管理员店铺信息
        $shop = ShopModel::where(
            'user_token',
            $get['adminToken']
        )->find();
        // 判断是否有店铺信息数据
        if(!$shop) return returnData(
            'error',
            '没有店铺信息'
        );
        // 返回正确数据信息
        return returnData('success',$shop);
    }

    /**
     * 名  称 : businessCreate()
     * 功  能 : 创建管理员店铺信息
     * 输  入 : (string) $post['adminToken'] => '管理员身份标识';
     * 输  入 : (string) $post['shopName']   => '店铺名称';
     * 输  入 : (string) $post['shopMaster'] => '店主名称';
     * 输  入 : (string) $post['shopPhone']  => '联系电话';
     * 输  入 : (string) $post['shopFormid'] => 'FormID';
     * 输  出 : ['msg'=>'success','data'=>true]
     * 创  建 : 2018/08/10 14:28
     */
    public function businessCreate($post)
    {
        // 获取管理员店铺信息
        $shop = ShopModel::where(
            'user_token',
            $post['adminToken']
        )->find();
        // 判断是否有店铺信息数据
        if($shop) return returnData(
            'error',
            '已有店铺不可创建'
        );

        // 实例化店铺模型
        $shopModel = new ShopModel();

        // 处理店铺数据信息
        $shopModel->user_token  = $post['adminToken'];
        $shopModel->shop_name   = $post['shopName'];
        $shopModel->shop_master = $post['shopMaster'];
        $shopModel->shop_phone  = $post['shopPhone'];
        $shopModel->shop_time   = time();
        $shopModel->shop_status = 1;

        // 判断是否有店铺信息数据
        if(!$shopModel->save()) return returnData(
            'error',
            '没有店铺信息'
        );

        // 获取用户openid
        $user = UserModel::where(
            'user_token',
            $post['adminToken']
        )->find();

        // 实例化发送模板消息类库
        $pushLibrary = new PushLibrary();
        // 处理模板消息数据
        $data = [
            'touser'           => $user['user_openid'],
            'template_id'      => config('wx_config.wx_Push_Content'),
            'page'             => '/pages/index/index',
            'form_id'          => $post['shopFormid'],
            'data'             => [
                'keyword1'=>['value'=>'创建中春果业店铺'],
                'keyword2'=>['value'=>$post['shopName']],
                'keyword3'=>['value'=>$post['shopMaster'],
                'keyword4'=>['value'=>date('Y-m-d H:i',time())],
            ],
        ];
        // 发送模板消息
        $pushLibrary->sendTemplate($data);

        // 返回正确数据信息
        return returnData('success','创建成功');
    }
}