<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//本代码使用在 CI框架  http://codeigniter.org.cn
//阅读快速入门手册 http://codeigniter.org.cn/user_guide/
class M extends CI_Controller
{
	function __construct()
	{
		parent::__construct();	
		header('Access-Control-Allow-Origin:*');  //跨域
	} 

	public function login($v=null)
	{
		$body = file_get_contents('php://input');  
		$body = json_decode($body,true); 
		//$body=$this->input->post('id');

		$data=array('code'=>0,'count'=>'99','body'=>$body,'v'=>$v);
	
		echo json_encode($data);
	}
}