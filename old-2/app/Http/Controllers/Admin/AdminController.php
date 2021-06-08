<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;//用户模型
use App\products;//产品模型

class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {

        $user_count=count(User::all());
        $products_count=count(products::all());

        $data=array(
            "user_count"=>$user_count,
            "products_count"=>$products_count,
        );
        return view('admin.index')->with($data);
    }
    public function index()
    {
        $user=User::all();

        $data=array(
            "user"=>$user,
        );
        return view('admin.user')->with($data);
    }
    //show edit user info
    public function edit($id)
    {
        return view('admin/useredit')->with('user',User::find($id));
    }
    //update user info
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            
            'user-name' => 'required',
            'user-email' => 'required',

        ]);

        $user = User::find($id);
        $user->name = $request->get('user-name');
        $user->email = $request->get('user-email');

        
        if ($user->save()) {
            return redirect('admin/user');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }

}
