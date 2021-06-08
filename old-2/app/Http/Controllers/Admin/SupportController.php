<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\support;//load support model

class SupportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	return view('admin.support')->with('support',support::paginate(5));
    }
    //添加技术支持
    public function create()
    {
    	return view('admin.support-create');
    }
    //保存技术支持
	public function store(Request $request)
	{


		$this->validate($request, [
			'support-title' => 'required',
			'support-title-en' => 'required',
			'support-content'=>'required',
			'support-content-en' => 'required',

		]);

		$support = new support;
		$support->support_title = $request->get('support-title');
		$support->support_title_en = $request->get('support-title-en');
		$support->support_content = $request->get('support-content');
		$support->support_content_en = $request->get('support-content-en');

		if ($support->save()) {
			return redirect('admin/support');
		} else {
			//return redirect()->back()->withInput()->withErrors('保存失败！');
			return redirect()->back()->withInput()->with(['error'=>'保存失败！',$request->flash()]);
		}
	}
	//show edit support info
	public function edit($id)
	{
		return view('admin/support-edit')->with('support',support::find($id));
	}
	//保存修改技术支持
	public function update(Request $request,$id)
	{
		$this->validate($request, [
			'support-title' => 'required',
			'support-title-en' => 'required',
			'support-content'=>'required',
			'support-content-en' => 'required',

		]);


		$support = support::find($id);
		$support->support_title = $request->get('support-title');
		$support->support_title_en = $request->get('support-title-en');
		$support->support_content = $request->get('support-content');
		$support->support_content_en = $request->get('support-content-en');

		if ($support->save()) {
			return redirect('admin/support');
		} else {
			return redirect()->back()->withInput()->withErrors('保存失败！');
		}
	}
}
