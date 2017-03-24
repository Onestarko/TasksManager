<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Project;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Image;

use App\Repositories\ProjectsRepository;

use App\Http\Requests\CreateProjectRequest;

use App\Http\Requests\EditProjectRequest;
use Auth;

class ProjectController extends Controller
{
    protected $repo;

    public function __construct(ProjectsRepository $repo)
    {
        $this->Repo = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
       $this->Repo->newProject($request);

       return Redirect::back();
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $project = Auth::user()->project()->where('name',$name)->first();

        $toDo = $project->tasks()->where('completed',0)->get();

        $projects = Project::lists('name','id');

        $Done = $project->tasks()->where('completed',1)->get();

        return view('projects.show',compact('project','toDo','Done','projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProjectRequest $request, $id)
    {
        $this->Repo->updateProject($request,$id);
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Project::find($id)->delete();
        return Redirect::back();
    }
}
