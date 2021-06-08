<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;//company model

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.company');
    }
    //show edit company info
	public function edit($id)
	{
		return view('admin/company')->with('companies',Company::find($id));
	}
	//update company info
	public function update(Request $request,$id)
	{
		$this->validate($request, [
			
			'company-intro' => 'required',
			'company-intro-en' => 'required',
		]);

		$company = Company::find($id);
		$company->company_add = $request->get('company-add');
		$company->company_add_en = $request->get('company-add-en');
		$company->company_tel = $request->get('company-tel');
		$company->company_phone = $request->get('company-phone');
		$company->company_fax = $request->get('company-fax');
		$company->company_email = $request->get('company-email');
		$company->company_intro = $request->get('company-intro');
		$company->company_intro_en = $request->get('company-intro-en');
		if ($company->save()) {
			return redirect('admin/');
		} else {
			return redirect()->back()->withInput()->withErrors('保存失败！');
		}
	}
}
