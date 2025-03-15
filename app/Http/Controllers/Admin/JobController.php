<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class JobController extends Controller
{
    public function __construct() 
    {
        return $this->middleware('auth');
    }
    public function index()
    {
        $jobs = Jobs::all();
        return view('admin.job.index', [
            'jobs' => $jobs,
        ]);
    }

    public function create()
    {
        // abort_if(!auth()->user()->can('jobs.create'), 403, 'User does not have the right permissions.');
        // $data = User::with(['roles'])->select('*');
        
        return view('admin.job.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'company_name' =>'required',
            'job_title' =>'required',
            'job_summary' => 'required',
            'job_description' =>'required',
            'requirment' =>'required',
            'location' =>'required',
            'deadline' => 'required',
            'vacancy' => 'required',
            'min_experience' =>'required',
            'max_experience' =>'required',
            'role' =>'required',
            'industry_type' =>'required',
            'employment_type' =>'required',
            'salary_min' =>'required',
            'salary_max' =>'required',
            'key_skills' =>'required',
            'image' =>'required|file',
        ]);
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $image =$file->move('/images/jobs/company', $filename);
        }
        Jobs::create([
            'company_name' => $request->company_name,
            'job_title' => $request->job_title,
            'summary' => $request->job_summary,
            'company_image' => $image,
            'description' => $request->job_description,
            'requirement' => $request->requirment,
            'location' => $request->location,
            'deadline' => $request->deadline,
            'vacancy' => $request->vacancy,
            'exp_min' => $request->min_experience,
            'exp_max' => $request->max_experience,
            'role' => $request->role,
            'industry_type' => $request->industry_type,
            'employment_type' => $request->employment_type,
            'salary_min' => $request->salary_min,
            'salary_max' => $request->salary_max,
            'key_skills' => $request->key_skills,
        ]);
        return redirect('jobs/all')->with('success' , 'Data Inserted');
    }
}
