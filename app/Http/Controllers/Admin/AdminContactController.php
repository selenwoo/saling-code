<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\contact;//联系我们 model

class AdminContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	return view('admin.contacts')->with('contacts',contact::paginate(15));
    }
    //delete a message
	public function destroy($id)
	{
		contact::find($id)->delete();
		return redirect()->back()->withInput()->withErrors('删除成功！');
	}
}
