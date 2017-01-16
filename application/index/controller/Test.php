<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\User;
use think\Request;
use think\Session;

class Test extends Controller
{
    public function index()
    {
        return 'Hello World';
    }

    public function tt($name='tt')
    {
        $this->assign('name',$name);
        return $this->fetch();
    }

    public function hello($name = 'World'){
        // 获取当前URL地址 不含域名
        echo 'url: ' . $this->request->url() . '<br/>'; //结果：/index/test/hello
//        return 'Hello,' . $name . '！';
    }

    /**
     *  绑定对象测试
     */
    public function bind_test(){
        $user = User::get(Session::get('user_id'));
        Request::instance()->bind('user',$user);
    }

    /** 使用绑定对象
     * @param Request $request
     */
    public function use_bind(Request $request){
        echo $request->user->id;
        echo $request->user->name;
    }
}
