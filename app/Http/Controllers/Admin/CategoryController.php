<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;//Category model
use Illuminate\Support\Facades\DB;//DB 门面

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index00()
    {
        return view('admin.category')->with('categories',Category::all());
    }
    public function index11(){
    	//$category=DB::table('categories')->get();
    	//$sql='SELECT p.type_id,p.type_name,s.type_name FROM tdb_goods_types AS p LEFT JOIN tdb_goods_type AS s ON s.parent_id=p.type_id';
    	$category=DB::table('categories as b')
    	->leftJoin('categories as s','b.id','=','s.category_parent_id')
    	->get();
    	return view('admin.category',['categories'=>$category]);
    }
    public function index()
    {
    	$category=Category::ShowType();
    	//$category=$categories->allChildrenCategorys;
    	return view('admin.category',['categories'=>$category]);

    }
    //获取“新增分类”的页面
	public function create()
	{
		return view('admin/category-create');
	}
    //保存新增分类
	public function store(Request $request)
	{
		$this->validate($request, [
			'category-name' => 'required',
			'category-name-en' => 'required',
		]);

		$category = new Category;
		$category->category_name = $request->get('category-name');
		$category->categorynameen = $request->get('category-name-en');
		$category->category_parent_id = $request->get('category-parent');
		$category->category_path = $request->get('category-path');
		$category->category_sort = $request->get('category-sort');
		if ($category->save()) {
			return redirect('admin/category');
		} else {
			return redirect()->back()->withInput()->withErrors('保存失败！');
		}
	}
	//add small category
	public function add($id)
	{
			return view('admin/category-add')->with('category',Category::find($id));
	}
	//show edit category
	public function edit($id)
	{
		return view('admin/category-edit')->with('category',Category::find($id));
	}
		//update category
	public function update(Request $request,$id)
	{
		$this->validate($request, [
			'category-name' => 'required',
			'category-name-en' => 'required',
		]);

		$category = Category::find($id);
		$category->category_name = $request->get('category-name');
		$category->categorynameen = $request->get('category-name-en');
		$category->category_sort = $request->get('category-sort');
		$category->category_path = $request->get('category-path');

		if ($category->save()) {
			return redirect('admin/category');
		} else {
			return redirect()->back()->withInput()->withErrors('保存失败！');
		}
	}


}
