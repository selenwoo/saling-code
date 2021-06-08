<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;//Category model
use App\products;//products model
use DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //add a product
    public function create()
    {
    	$category=Category::ShowType();
    	return view('admin.product-create',['categories'=>$category]);
    	//return view('admin.products-create')->with('categories',Category::all());
    }
    //save product
	public function store(Request $request)
	{


		$this->validate($request, [
			'product-name' => 'required',
			'product-name-en' => 'required',
			'proimage_one'=>'required',
			'proimage_multi' => 'required',
			'product-feature' => 'required',
			'product-feature-en' => 'required',
			'product-intro' => 'required',
			'product-intro-en' => 'required',
			'product-parameter' => 'required',
			'product-parameter-en'=>'required',

		]);
		$ifhot=$request->get('ifhot');
		$ifhot=($ifhot) ? $ifhot:0;//是否热销

		$product = new products;
		$product->pro_model = $request->get('product-model');
		$product->pro_name = $request->get('product-name');
		$product->pro_name_en = $request->get('product-name-en');
		$product->pro_category = $request->get('product-category');
		$product->pro_sort = $request->get('product-sort');
		$product->pro_ifhot = $ifhot;
		//$product->pro_img = $imagePath;//字符串形式保存图片路径，各图片之间用|隔开保存到数据库中
		$product->pro_listimg = $request->get('proimage_one');//单张图
		$product->pro_img = $request->get('proimage_multi');//字符串形式保存图片路径，各图片之间用|隔开保存到数据库中
		$product->pro_feature =$request->get('product-feature');
		$product->pro_feature_en = $request->get('product-feature-en');
		$product->pro_intro = $request->get('product-intro');
		$product->pro_intro_en = $request->get('product-intro-en');
		$product->pro_parameter = $request->get('product-parameter');
		$product->pro_parameter_en = $request->get('product-parameter-en');
		$product->pro_manual = $request->get('product-manual');


		if ($product->save()) {
			return redirect('admin/products');
		} else {
			//return redirect()->back()->withInput()->withErrors('保存失败！');
			return redirect()->back()->withInput()->with(['error'=>'保存失败！',$request->flash()]);
		}
	}
	//products list
	public function index()
	{
		//$product=products::ShowType();
    	//$category=$categories->allChildrenCategorys;
    	//return view('admin.products-list')->with('products',products::paginate(2));
    	$products=DB::table('products')
        ->select('products.id as id','products.pro_name','products.pro_name_en','categories.id as category_id','categories.category_name','products.pro_sort','products.created_at')
        ->leftJoin('categories','products.pro_category','=','categories.id')
        //->get()
        ->paginate(10);
        return view('admin.products-list')->withProducts($products);
    	//return view('admin.products-list')->with('products',products::with('hasOneCategory')->paginate(2));

	}
	//点分类列表显示该分类下产品
	public function products_list($id)
	{
		$products=DB::table('products')
        ->select('products.id as id','products.pro_name','products.pro_name_en','categories.id as category_id','categories.category_name','products.pro_sort','products.created_at')
        ->leftJoin('categories','products.pro_category','=','categories.id')
        ->where('categories.id', $id)
        //->get()
        ->paginate(10);
        return view('admin.products-list')->withProducts($products);
	}
	//show a product
	public function show($id)
	{
		return view('product-show')->with('product',products::find($id));
	}
	// upload images view
	public function imageUpload()
    {
        return view('imagesUpload');
    }
	// upload multi images
	public function imageUploadPost(Request $request)
    {
         request()->validate([
             'product-photo' => 'required',
         ]);

         //上传图片
		$filePath =[];  // 定义空数组用来存放图片路径
		$imagePath='';//字符串形式保存图片路径
		foreach ($request->file('product-photo') as $key => $value) {
			$destinationPath = public_path('/uploads/images/'.date('Y-m-d')); // public文件夹下面uploads/images/xxxx-xx-xx 建文件夹
			$destinationPath2 = '/public/uploads/images/'.date('Y-m-d');// public文件夹下面uploads/images/xxxx-xx-xx 建文件夹
            $imageName = $value->getClientOriginalName();
            $value->move($destinationPath, $imageName);
            //$filePath[] = $destinationPath.'/'.$imageName; // 数组形式保存上传图片路径，用于保存到数据库中
            $imagePath=$imagePath.$destinationPath2.'/'.$imageName.'|';//字符串形式保存图片路径，各图片之间用|隔开
        }

        return view('admin/upload_multi_success',['upload_data' => $imagePath]);//传递所有图片的路径到视图upload_multi_success，再从传到父级页面


    }
    // upload a image view
	public function upload_one_form(){
		return view('admin/upload-one-form');
	}
    // upload one images
	public function OneImageUpload(Request $request)
    {    	
         request()->validate([
             'product-photo' => 'required',
         ]);

         //上传图片
		$filePath ='';  // 定义空变量用来存放图片路径
		$imagePath='';//字符串形式保存图片路径
		$file=$request->file('product-photo');
		if (!$file->isValid()) {
		    exit("上传图片出错，请重试，<a href=''>返回上一页！</a>");
		}
		
			$destinationPath = public_path('/uploads/images/'.date('Y-m-d')); // 绝对路径
			$destinationPath2 = '/public/uploads/images/'.date('Y-m-d');// 相对路劲：public文件夹下面uploads/images/xxxx-xx-xx 建文件夹
            $imageName = $file->getClientOriginalName();
            $file->move($destinationPath, $imageName);//将临时文件移到指定目录
            $imagePath=$destinationPath2.'/'.$imageName;//相对路径的字符串形式保存图片路径
        
        return view('admin/upload_one_success',['upload_data' => $imagePath]);//传递所有图片的路径到视图upload_one_success，再从传到父级页面


    }
    // upload a pdf file view
	public function upload_pdf_form(){
		return view('admin/upload-pdf-form');
	}
	// upload pdf file
	public function OnePdfUpload(Request $request)
    {    	
         request()->validate([
             'product-manual' => 'required',
         ]);

         //上传pdf
		$filePath ='';  // 定义空变量用来存放文件路径
		$imagePath='';//字符串形式保存路径
		$file=$request->file('product-manual');
		if (!$file->isValid()) {
		    exit("上传文件出错，请重试，<a href=''>返回上一页！</a>");
		}
		
			$destinationPath = public_path('/uploads/pdf/'.date('Y-m-d')); // 绝对路径
			$destinationPath2 = '/public/uploads/pdf/'.date('Y-m-d');// 相对路劲：public文件夹下面uploads/pdf/xxxx-xx-xx 建文件夹
            $imageName = $file->getClientOriginalName();
            $file->move($destinationPath, $imageName);//将临时文件移到指定目录
            $imagePath=$destinationPath2.'/'.$imageName;//相对路径的字符串形式保存文件路径
        
        return view('admin/upload_pdf_success',['upload_data' => $imagePath]);//传递文件路径到视图upload_pdf_success，再从传到父级页面


    }
    //show edit product
	public function edit($id)
	{
		// $products=DB::table('products')
  //       ->select('products.id as id','products.pro_name','products.pro_name_en','categories.id as category_id','categories.category_name','products.pro_sort','products.created_at')
  //       ->leftJoin('categories','products.pro_category','=','categories.id')
  //       //->where('categories.id', $id)
  //       ->get()
        //->paginate(2);
		$category=Category::ShowType();
		return view('admin/product-edit',['product'=>products::find($id),'categories'=>$category]);
	}
	//update product
	public function update(Request $request,$id)
	{
		$this->validate($request, [
			'product-name' => 'required',
			'product-name-en' => 'required',
			'proimage_one'=>'required',
			'proimage_multi' => 'required',
			'product-feature' => 'required',
			'product-feature-en' => 'required',
			'product-intro' => 'required',
			'product-intro-en' => 'required',
			'product-parameter' => 'required',
			'product-parameter-en'=>'required',

		]);
		$ifhot=$request->get('ifhot');
		$ifhot=($ifhot) ? $ifhot:0;//是否热销

		$product = products::find($id);
		$product->pro_model = $request->get('product-model');
		$product->pro_name = $request->get('product-name');
		$product->pro_name_en = $request->get('product-name-en');
		$product->pro_category = $request->get('product-category');
		$product->pro_sort = $request->get('product-sort');
		$product->pro_ifhot=$ifhot;
		$product->pro_listimg = $request->get('proimage_one');//单张图
		$product->pro_img = $request->get('proimage_multi');//字符串形式保存图片路径，各图片之间用|隔开保存到数据库中
		$product->pro_feature = $request->get('product-feature');
		$product->pro_feature_en = $request->get('product-feature-en');
		$product->pro_intro = $request->get('product-intro');
		$product->pro_intro_en = $request->get('product-intro-en');
		$product->pro_parameter = $request->get('product-parameter');
		$product->pro_parameter_en = $request->get('product-parameter-en');
		$product->pro_manual = $request->get('product-manual');

		if ($product->save()) {
			return redirect('admin/products');
		} else {
			return redirect()->back()->withInput()->withErrors('保存失败！');
		}
	}

	public function upload_multi_form(){
		return view('admin/upload-multi-form');
	}


}
