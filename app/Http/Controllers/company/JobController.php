<?php

namespace App\Http\Controllers\company;

use App\CompanyJob;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function allJob(){
        $myJob = CompanyJob::all();
        return view('company.pages.job.all-job', compact('myJob'));
    }

    public function pendingJob(){
        $pendingJob = CompanyJob::where('status', '0')->get();
        return view('company.pages.job.pending-job', compact('pendingJob'));
    }

    public function activeJob(){
        $activeJob = CompanyJob::where('status', '1')->get();
        return view('company.pages.job.active-job', compact('activeJob'));
    }

    public function index(){
        $myJob = CompanyJob::where('user_id', Auth::id())->where('status', '1')->get();
        return view('company.pages.job.index', compact('myJob'));
    }

    public function create(){
        return view('company.pages.job.create');
    }

    public function store(Request $request)
    {
        try {
            // Validate request
            $request->validate([
                'vacancy' => 'required|string|max:255',
                'salary' => 'required|string|max:255',
                'experience' => 'required|string|max:255',
                'type' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'deadline' => 'required|date',
                'skill' => 'required|array',
                'description' => 'nullable|string',
                'overview' => 'nullable|string',
                'key_responsibilities' => 'nullable|string',
                'qualification' => 'nullable|string',
                'nice_to_have' => 'nullable|string',
                'soft_skill' => 'nullable|string',
            ]);

            // Create a new CompanyJob record
            $job = new CompanyJob();
            $job->user_id = Auth::id();
            $job->name = $request->name;
            $job->vacancy = $request->vacancy;
            $job->salary = $request->salary;
            $job->experience = $request->experience;
            $job->type = $request->type;
            $job->location = $request->location;
            $job->deadline = $request->deadline;
            $job->skill = json_encode($request->skill); // Store skills as JSON
            $job->description = $request->description;
            $job->overview = $request->overview;
            $job->key_responsibilities = $request->key_responsibilities;
            $job->qualification = $request->qualification;
            $job->nice_to_have = $request->nice_to_have;
            $job->soft_skill = $request->soft_skill;
            $job->save();

            return redirect()->route('company.job.index')->with('success', 'Job created successfully.');
        } catch (\Exception $e) {
            // return $e->getMessage();
            return redirect()->back()->with('error', 'Failed to create job. Error: ' . $e->getMessage());
        }
    }



    public function edit($id)
    {
        $job = CompanyJob::findOrFail($id);
        return view('company.pages.job.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Validate request
            $request->validate([
                'vacancy' => 'required|string|max:255',
                'salary' => 'required|string|max:255',
                'experience' => 'required|string|max:255',
                'type' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'deadline' => 'required|date',
                'skill' => 'required|array',
                'description' => 'nullable|string',
                'overview' => 'nullable|string',
                'key_responsibilities' => 'nullable|string',
                'qualification' => 'nullable|string',
                'nice_to_have' => 'nullable|string',
                'soft_skill' => 'nullable|string',
            ]);

            // Find job record
            $job = CompanyJob::findOrFail($id);
            $job->name = $request->name;
            $job->vacancy = $request->vacancy;
            $job->salary = $request->salary;
            $job->experience = $request->experience;
            $job->type = $request->type;
            $job->location = $request->location;
            $job->deadline = $request->deadline;
            $job->skill = json_encode($request->skill);
            $job->description = $request->description;
            $job->overview = $request->overview;
            $job->key_responsibilities = $request->key_responsibilities;
            $job->qualification = $request->qualification;
            $job->nice_to_have = $request->nice_to_have;
            $job->soft_skill = $request->soft_skill;
            $job->save();

            return redirect()->route('company.job.index')->with('success', 'Job updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update job. Error: ' . $e->getMessage());
        }
    }


    public function delete($id)
    {
        $job = CompanyJob::findOrFail($id);
        $job->delete();

        return redirect()->route('company.job.index')->with('success', 'Job deleted successfully.');
    }


    public function updateStatus(Request $request)
    {
        $item = CompanyJob::find($request->id);
        if ($item) {
            $item->status = $item->status === 0 ? 1 : 0;
            $item->save();

            return response()->json(['success' => true, 'status' => $item->status]);
        }
        return response()->json(['success' => false]);
    }

    public function activate($id)
    {
        $item = CompanyJob::findOrFail($id);
        $item->status = '1'; 
        $item->save();

        return redirect()->back()->with('success', 'Status changed to Active.');
    }

    public function deactivate($id)
    {
        $item = CompanyJob::findOrFail($id);
        $item->status = '0'; // Change status to Pending
        $item->save();

        return redirect()->back()->with('success', 'Status changed to Pending.');
    }
}
