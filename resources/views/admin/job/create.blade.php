@extends('admin.layouts.master')
@section('title','Create a New Job')
@section('maincontent')
<?php
$data['heading'] = 'New Job';
$data['title'] = 'New Job';
?>
@include('admin.layouts.topbar',$data)
<div class="contentbar">
    <div class="row">
        <div class="col-lg-12">
            <div class="card dashboard-card m-b-30">
                <div class="card-header all-user-card-header">
                    <div class="col-lg-4 col-md-12 col-12">
                    <h5 class="box-title"> {{ __('Create a New Job') }}</h5>
                </div>
                </div>
                <div class="row px-5">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <div class="col-12">
                    <form action="{{ url('jobs/store') }}" class="py-3" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row pb-4">
                        <div class="col-md-12">
                            <label for="jobTitle" class="form-label">Job Title<span class="text-danger">*</span></label>
                            <input required type="text" name="job_title" placeholder="Enter Job Title" class="form-control border-secondary">
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-md-12">
                            <label for="companyName" class="form-label">Company Name <span class="text-danger">*</span></label>
                            <input required type="text" name="company_name" placeholder="Enter Company Name" class="border-secondary form-control">
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-md-6">
                            <label for="industryType" class="form-label">Application Deadline<span class="text-danger">*</span></label>
                            <input required type="date" name="deadline" placeholder="Industry Type" class="border-secondary form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="companyName" class="form-label">Vacancy <span class="text-danger">*</span></label>
                            <input class="form-control border-secondary" required type="number" name="vacancy" placeholder="No of Vacancy">
                        </div>
                    </div>

                    <div class="row pb-4">
                        <div class="col-md-12">
                            <label class="form-label">Job Summary<span class="text-danger">*</span></label>
                            <textarea type="text" name="job_summary" rows="3" placeholder="Job Summary" class="border-secondary form-control"></textarea>
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-md-12">
                            <label class="form-label">Job Description<span class="text-danger">*</span></label>
                            <textarea id="detail2" type="text" name="job_description" placeholder="Job Description" class="border-secondary form-control"></textarea>
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-md-12">
                            <label class="form-label">Job Requirement<span class="text-danger">*</span></label>
                            <textarea id="detail" type="text" name="requirment" placeholder="Job Requiremnt" class="border-secondary form-control"></textarea>
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-md-12">
                            <label  class="form-label">Location <span class="text-danger">*</span></label>
                            <input required type="text" name="location" placeholder="Enter Location" class="border-secondary form-control">
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-md-4">
                            <label for="experience" class="form-label">Experience <span class="text-danger">*</span></label>
                            <input required type="text" name="min_experience" placeholder="Minimum" class="border-secondary form-control">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label  class="form-label"> </label>
                            <input required type="text" name="max_experience" placeholder="Maximum" class="border-secondary form-control">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label  class="form-label"> </label>
                            <select required name="exp_type" class="border-secondary form-control">
                                <option>Exprience Type</option>
                                <option value="month">Month</option>
                                <option value="year">Year</option>
                            </select>
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-md-6">
                            <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                            <input required type="text" name="role" placeholder="Role" class="border-secondary form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="industryType" class="form-label">Industry Type <span class="text-danger">*</span></label>
                            <input required type="text" name="industry_type" placeholder="Industry Type" class="border-secondary form-control">
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-md-6">
                            <label for="imploymentType" class="form-label">Employment Type <span class="text-danger">*</span></label>
                            <input required type="text" name="employment_type" placeholder="Employment Type" class="border-secondary form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="image" class="border-secondary form-label">Image <span class="text-danger">*</span></label>
                            <input required type="file" name="image" class="form-control border-secondary">
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-md-6">
                            <label for="min_salary" class="form-label">Salary <span class="text-danger">*</span></label>
                            <input required type="text" name="salary_min" placeholder="Minimum" class="border-secondary form-control">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label  class="form-label"> </label>
                            <input required type="text" name="salary_max" placeholder="Maximum" class="border-secondary form-control">
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-md-12">
                            <label for="keySkills" class="form-label">Key Skills <span class="border-secondary text-danger">*</span></label>
                            <input required type="text" name="key_skills" placeholder="Skills" class="form-control border-secondary">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="bg-primary btn text-white" type="submit" >Submit</button>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>

@endsection
@section('script')
<script>
    
</script>
@endsection