<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;//公司 model
use App\Category;//分类 model
use App\products;//产品 model
use DB;

class TypesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {

        $categories=$this->types();//获取分类数据

        //查询所有顶级分类
        //$types=DB::table('categories')->where('category_parent_id',0)->get();
        $types=Category::where('category_parent_id',0)->get();
        //查询当前分类
        $type=DB::table('categories')->where('id',$id)->first();
        //将path路径处理成数组
        $arr=explode(',', $type->category_path);
        $size=count($arr)-1;
        switch ($size) {
            case '1':
                $erClass=DB::table('categories')->where("category_path","like","%,$id,%")->get();
                $newArr=array();
                foreach ($erClass as $key => $value) {
                    $newArr[]=$value->id;
                }
                $products=DB::table("products")->whereIn("pro_category",$newArr)->get();

                break;
            case '2'://二级分类时直接查询当前分类下所有产品
                $products=DB::table('products')->where('pro_category',$id)->get();

                break;
            case '3':
                # code...
                break;
            default:
                # code...
                break;
        }
        $ding=$arr[1]?$arr[1]:$id;
        $topproducts=products::where('pro_ifhot',1)->take(10)->get();//查询热销产品
        //分配数据
        $data=array(
            "topproducts"=>$topproducts,
            "types"=>$types,
            "type"=>$type,
            "ding"=>$ding,
            "products"=>$products,
            "categories"=>$categories,
        );
        return view('products-list')->with($data);
    }
 
        //递归函数获取无限分类
    public function checkTypeData($data,$pid=0){
        //new data
        $newArr=array();
        foreach ($data as $key => $value) {
            if ($value->category_parent_id==$pid) {
                $newArr[$value->id]=$value;
                $newArr[$value->id]->zi=$this->checkTypeData($data,$value->id);
            }
        }
        //返回数据
        return $newArr;
    }
    public function ShowAllProducts()
    {
        $types=DB::table('categories')->get();
        //递归处理数据
        $categories=$this->checkTypeData($types);

        foreach ($categories as $key => $value) {
            foreach ($value->zi as $key => $value) {
                $value->myproducts=DB::table('products')->where('pro_category', '=', $value->id)->get(); //查询出二级分类下的所有产品
                // var_dump ($value->myproducts);
            }
                
        }        

        return view('ShowAllProducts')->with('categories',$categories);

    }
    //返回二级分类数据
    public function types()
    {
        $types=DB::table('categories')->get();
        //递归处理数据
        $categories=$this->checkTypeData($types);

        foreach ($categories as $key => $value) {
            foreach ($value->zi as $key => $value) {
                $value->myproducts=DB::table('products')->where('pro_category', '=', $value->id)->get(); //查询出二级分类下的所有产品
            }
                
        }
        return $categories;
    }


}
