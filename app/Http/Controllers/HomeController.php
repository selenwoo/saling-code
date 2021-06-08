<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;//公司 model
use App\Category;//分类 model
use App\products;//产品 model
use App\Project;//案例模型
use App\support;//技术支持模型
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
        
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //查询所有顶级分类
        //$categories=DB::table('categories')->where('category_parent_id',0)->get();
        $categories=Category::where('category_parent_id',0)->get();
        $topproducts=products::where('pro_ifhot',1)->take(10)->get();//查询热销产品
        //分配数据
        $data=array(
            "topproducts"=>$topproducts,
            "categories"=>$categories,
        );
        return view('index')->with($data);//以对象数组形式传给首页
    }
    //显示一个产品 为了SEO，而不在用产品ID
    public function show($slug)
    {
        //查询所有顶级分类
        //$categories=DB::table('categories')->where('category_parent_id',0)->get();
        $categories=Category::where('category_parent_id',0)->get();
        //$product=products::find($id);
        $product=products::leftJoin('categories','products.pro_category','categories.id')
        ->select('products.*','categories.id as category_id','categories.slug as category_slug','categories.category_name','categories.categorynameen','categories.category_parent_id')
        ->where('products.slug',$slug)
        ->first();


        $category=Category::where('id',$product->category_parent_id)->first();//查询顶级目录


        $related=products::where('pro_category',$product->pro_category)->get();//查询相关产品

        $data=array(
            "categories"=>$categories,
            "category"=>$category,
            "product"=>$product,
            "related"=>$related,
        );
        return view('product-show')->with($data);
    }
    //show a product
    public function show00($id)
    {
        //查询所有顶级分类
        //$categories=DB::table('categories')->where('category_parent_id',0)->get();
        $categories=Category::where('category_parent_id',0)->get();
        //$product=products::find($id);
        $product=products::leftJoin('categories','products.pro_category','categories.id')
        ->select('products.*','categories.id as category_id','categories.category_name','categories.categorynameen','categories.category_parent_id')
        ->where('products.id',$id)
        ->first();


        $category=Category::where('id',$product->category_parent_id)->first();//查询顶级目录


        $related=products::where('pro_category',$product->pro_category)->get();//查询相关产品

        $data=array(
            "categories"=>$categories,
            "category"=>$category,
            "product"=>$product,
            "related"=>$related,
        );
        return view('product-show')->with($data);
        //return view('product-show')->with('product',products::find($id));
    }
    public function show0($id)
    {
        $categories=DB::table('categories')->where('category_parent_id',0)->get();
        $product=DB::table('products')->where('id',$id)->first();;
        $category=DB::table('categories')->where('id',$product->pro_category)->get();
        $related=DB::table('products')->where('pro_category',$product->pro_category)->get();
        $data= array('categories' =>$categories ,'product'=>$product,'category'=>$category,'related'=>$related, );
        return view('product-show')->with($data);
    }
    //前台显示一个案例
    public function ShowProject($id)
    {
        //查询所有顶级分类
        //$categories=DB::table('categories')->where('category_parent_id',0)->get();
        $categories=Category::where('category_parent_id',0)->get();
        $projects=project::all();
        $project=project::find($id);


        $data=array(
            "categories"=>$categories,
            "project"=>$project,
            "projects"=>$projects,
        );
        return view('project-show')->with($data);
    }
        //前台显示一个技术支持
    public function ShowSupport($id)
    {
        //查询所有顶级分类
        //$categories=DB::table('categories')->where('category_parent_id',0)->get();
        $categories=Category::where('category_parent_id',0)->get();
        $support=support::find($id);


        $data=array(
            "categories"=>$categories,
            "support"=>$support,
        );
        return view('support')->with($data);
    }
    //前台显示技术支持
    public function ShowSupports()
    {
        //查询所有顶级分类
        //$categories=DB::table('categories')->where('category_parent_id',0)->get();
        $categories=Category::where('category_parent_id',0)->get();
        $support=support::find(1);


        $data=array(
            "categories"=>$categories,
            "support"=>$support,
        );
        return view('support')->with($data);
    }
    //show about
    public function about()
    {
        $company=Company::find(1);//获取第一条公司介绍

        //查询所有顶级分类
        //$categories=DB::table('categories')->where('category_parent_id',0)->get();
        $categories=Category::where('category_parent_id',0)->get();

        //分配数据
        $data=array(
            "company"=>$company,
            "categories"=>$categories,
        );
        return view('about')->with($data);
    }


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
    //products前台显示所有产品
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

        $topproducts=products::where('pro_ifhot',1)->take(10)->get();//查询热销产品
        //分配数据
        $data=array(
            "topproducts"=>$topproducts,
            "categories"=>$categories,
        );
        //return view('ShowAllProducts')->with('categories',$categories);
        return view('ShowAllProducts')->with($data);


    }
    public function ShowAllProjects()
    {
        //查询所有顶级分类
        //$categories=DB::table('categories')->where('category_parent_id',0)->get();
        $categories=Category::where('category_parent_id',0)->get();
        $projects=project::all();
        $data=array(
            "categories"=>$categories,
            "projects"=>$projects,
        );
        return view('projects-list')->with($data);

    }
}
