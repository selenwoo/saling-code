<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;//载入新闻订阅列表
use App\Category;//分类 model

class NewsletterController extends Controller
{
    //保存邮件列表
	public function store(Request $request)
	{
		$this->validate($request, [
			'email' => 'required',
		]);

		$newsletter = new Newsletter;
		$newsletter->email = $request->get('email');
		$newsletter->ip= $this->get_real_ip();

		if ($newsletter->save()) {
			return redirect('/newsletter-ok');
		} else {
			return redirect()->back()->withInput()->with(['error'=>'保存失败！',$request->flash()]);
		}
	}
	public function get_real_ip(){
		$ip=false;
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			$ip=$_SERVER['HTTP_CLIENT_IP'];
		}
		if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$ips=explode (', ', $_SERVER['HTTP_X_FORWARDED_FOR']);
			if($ip){ array_unshift($ips, $ip); $ip=FALSE; }
			for ($i=0; $i < count($ips); $i++){
				if(!eregi ('^(10│172.16│192.168).', $ips[$i])){
					$ip=$ips[$i];
					break;
				}
			}
		}
		return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
	}
	public function newsletterok(){
		$categories=Category::where('category_parent_id',0)->get();//查询所有顶级分类
        $data=array(
            "categories"=>$categories,
        );
        return view('newsletter-ok')->with($data);

	}
}
