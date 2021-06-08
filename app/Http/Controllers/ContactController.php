<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;//分类 model
use App\contact;//联系我们 model
use App\Company;//公司 model

class ContactController extends Controller
{
    public function index()
    {
        $categories=Category::where('category_parent_id',0)->get();//查询所有顶级分类
        $company=Company::find(1);//获取第一条公司介绍
        $data=array(
            "categories"=>$categories,
            "company"=>$company,
        );
        return view('contact')->with($data);
    }
    //保存留言
	public function store(Request $request)
	{


		$this->validate($request, [
			'name' => 'required',
			'email' => 'required',
			'message'=>'required',
		]);

		$contact = new contact;
		$contact->contact_fullname = $request->get('name');
		$contact->contact_email = $request->get('email');
		$contact->contact_content = $request->get('message');
		// $contact->ip=$request->getClientIp();
		$contact->ip=$this->get_real_ip();

		if ($contact->save()) {
			return redirect('/contact-ok');
		} else {
			//return redirect()->back()->withInput()->withErrors('保存失败！');
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
	public function contactok(){
		$categories=Category::where('category_parent_id',0)->get();//查询所有顶级分类
        $company=Company::find(1);//获取第一条公司介绍
        $data=array(
            "categories"=>$categories,
            "company"=>$company,
        );
        return view('contact-ok')->with($data);

	}
}
