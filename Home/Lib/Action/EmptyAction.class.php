<?php

/**
 * 
 * 当用户访问不存在的控制器时，进行处理
 *
 */
class EmptyAction extends Action {
    
    public function index(){
    	$this->assign("msg", "您所访问的控制器不存在");
        $this->display("./Home/Tpl/Public/empty_action.html");
    }

}