<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	return view('admin.projects')->with('projects',Project::paginate(5));
    }
    //添加案例
    public function create()
    {
    	return view('admin.project-create');
    }
    //保存案例
	public function store(Request $request)
	{


		$this->validate($request, [
			'project-name' => 'required',
			'project-name-en' => 'required',
			'proimage_one'=>'required',
			'project-intro' => 'required',
			'project-intro-en' => 'required',

		]);

		$project = new project;
		$project->project_title = $request->get('project-name');
		$project->project_title_en = $request->get('project-name-en');
		$project->project_listimg = $request->get('proimage_one');//单张图
		$project->project_img = $request->get('proimage_multi');//字符串形式保存图片路径，各图片之间用|隔开保存到数据库中
		$project->project_content = $request->get('project-intro');
		$project->project_content_en = $request->get('project-intro-en');

		if ($project->save()) {
			return redirect('admin/projects');
		} else {
			//return redirect()->back()->withInput()->withErrors('保存失败！');
			return redirect()->back()->withInput()->with(['error'=>'保存失败！',$request->flash()]);
		}
	}
	//show edit project
	public function edit($id)
	{
		return view('admin/project-edit')->with('project',project::find($id));
	}
	//保存修改案例
	public function update(Request $request,$id)
	{
		$this->validate($request, [
			'project-name' => 'required',
			'project-name-en' => 'required',
			'proimage_one'=>'required',
			'project-intro' => 'required',
			'project-intro-en' => 'required',

		]);


		$project = project::find($id);
		$project->project_title = $request->get('project-name');
		$project->project_title_en = $request->get('project-name-en');
		$project->project_listimg = $request->get('proimage_one');//单张图
		$project->project_img = $request->get('proimage_multi');//字符串形式保存图片路径，各图片之间用|隔开保存到数据库中
		$project->project_content = $request->get('project-intro');
		$project->project_content_en = $request->get('project-intro-en');

		if ($project->save()) {
			return redirect('admin/projects');
		} else {
			return redirect()->back()->withInput()->withErrors('保存失败！');
		}
	}

}
