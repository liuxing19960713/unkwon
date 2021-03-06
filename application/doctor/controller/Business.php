<?php
/**
 * Created by PhpStorm.
 * User: Airon
 * Date: 2016/11/15
 * Time: 23:02
 */
namespace app\doctor\controller;
use think\Controller;
use app\index\controller\Base;
use app\doctor\model\User as UserModel;
use think\Db;
class Business extends Base
{
    public $UserModel;
    public function __construct()
    {
        parent::__construct(); // TODO: Change the autogenerated stub
        $this->UserModel = new UserModel();
    }
    //患者列表
    public function getCustomerList(){
        $token = get_token();
        $type = $_POST['type'];
        if (empty($token)||empty($type)) {
            return $this->private_result("10001");
        }
        if($type != "图文咨询" && $type != "视频咨询"&&$type != "电话咨询"){
            return $this->private_result("10002");
        }
        $d_id = $this->UserModel->valiToken($token);
        if (!$d_id) {
            return $this->private_result('10003');
        }
        $where = "a.d_id = ".$d_id;
        if($type){
            $where .= " AND a.type = '".$type."'";
        }
        $page = empty($_POST['page'])? 1 : $_POST['page'];
        $CustomerList = Db::table('yyb_consultation')->alias('a')->where($where)->order('a.create_time DESC')->group("a.c_id")->join('yyb_customer c','a.c_id = c.c_id')
            ->field("c.c_id as c_id,c.avatar as avatar,c.nick_name as nick_name,c.gender as gender,c.age as age,a.create_time as create_time")->page($page,20)->select();
        if($CustomerList) {
            return $this->private_result("0001", $CustomerList);
        }else{
            return $this->private_result(RESPONSE_FAIL_RESOURCE_NOT_FOUND);
        }
    }
    //粉丝列表
    public function followerList(){
        $token = get_token();
        if (empty($token)) {
            return $this->private_result("10001");
        }
        $d_id = $this->UserModel->valiToken($token);
        if (!$d_id) {
            return $this->private_result('10003');
        }
        $page = empty($_POST['page'])? 1 : $_POST['page'];
        $Count = Db::name('follow')->alias('f')->where("f.d_id = $d_id")->order("create_time DESC")->join('yyb_customer c','f.c_id = c.c_id')->field("c.c_id as c_id,c.avatar as avatar,c.nick_name as nick_name,c.gender as gender,c.age as age,f.create_time as create_time")->page($page,20)->select();
        if (!empty($Count) || $Count === array()) {
            return $this->private_result('0001',$Count);
        } else {
            return $this->private_result('10006');
        }
    }
}