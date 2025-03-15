<?php

namespace App\Http\Controllers;

use App\Course;
use App\Jobs;
use App\User;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index($id) {
        $job = Jobs::findOrFail($id);
        $course = Course::find(32);
        
        return view('front.job_detail', [
            'job' => $job,
            'course' => $course,
        ]);
    }

    public function applyJobs($user_id, $job_id)
    {
        $user = User::findOrFail($user_id);

        $user->jobs()->syncWithoutDetaching($job_id);

        return response()->json(['success' => 'Your Application is Placed']);
    }
}
