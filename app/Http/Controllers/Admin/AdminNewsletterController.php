<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Newsletter;//载入新闻订阅列表

class AdminNewsletterController extends Controller
{
    //管理员才可以进入的界面
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	return view('admin.newsletter')->with('newsletter',Newsletter::paginate(15));
    }
    //delete a newsletter
	public function destroy($id)
	{
		Newsletter::find($id)->delete();
		return redirect()->back()->withInput()->withErrors('删除成功！');
	}
}
