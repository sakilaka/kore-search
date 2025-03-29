@extends('admin.layouts.master')
@section('title', 'Edit Job')
@section('maincontent')
<style>
    .form-control {
        border: 1px solid rgb(191, 189, 189);
    }
    .select2 {
        border: 1px solid rgb(191, 189, 189);
    }
</style>

<?php
$data['heading'] = 'Edit Job';
$data['title'] = 'Job';
$data['title1'] = 'Edit Job';
?>
@include('admin.layouts.topbar', $data)

<div class="contentbar">
    <div class="row">
        <div class="col-lg-12">
            <div class="card dashboard-card m-b-30">
                <div class="card-header">
                    <div>
                        <div class="widgetbar">
                            <a href="{{ route('company.job.index') }}" class="float-right btn btn-dark-rgba mr-2">
                                <i class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}
                            </a>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group my-4">
                            <form method="post" action="{{ route('company.job.update', $job->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $job->name }}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="vacancy">Vacancy</label>
                                        <input type="text" name="vacancy" id="vacancy" class="form-control" value="{{ $job->vacancy }}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="salary">Salary</label>
                                        <input type="text" name="salary" id="salary" class="form-control" value="{{ $job->salary }}" required>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label for="experience">Experience</label>
                                        <input type="text" name="experience" id="experience" class="form-control" value="{{ $job->experience }}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="type">Type</label>
                                        <select name="type" id="type" class="form-control" required>
                                            <option value="Full-Time" {{ $job->type == 'Full-Time' ? 'selected' : '' }}>Full-Time</option>
                                            <option value="Part-Time" {{ $job->type == 'Part-Time' ? 'selected' : '' }}>Part-Time</option>
                                            <option value="Contract" {{ $job->type == 'Contract' ? 'selected' : '' }}>Contract</option>
                                            <option value="Internship" {{ $job->type == 'Internship' ? 'selected' : '' }}>Internship</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="location">Location</label>
                                        <input type="text" name="location" id="location" class="form-control" value="{{ $job->location }}" required>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label for="deadline">Deadline</label>
                                        <input type="date" name="deadline" id="deadline" class="form-control" value="{{ $job->deadline }}" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="skill">Skills</label>
                                        <select name="skill[]" id="skill" class="form-control select2" multiple="multiple" required>
                                            @php
                                                $selectedSkills = json_decode($job->skill, true);
                                            @endphp
                                            <option value="PHP" {{ in_array('PHP', $selectedSkills) ? 'selected' : '' }}>PHP</option>
                                            <option value="JavaScript" {{ in_array('JavaScript', $selectedSkills) ? 'selected' : '' }}>JavaScript</option>
                                            <option value="Python" {{ in_array('Python', $selectedSkills) ? 'selected' : '' }}>Python</option>
                                            <option value="Java" {{ in_array('Java', $selectedSkills) ? 'selected' : '' }}>Java</option>
                                            <option value="React" {{ in_array('React', $selectedSkills) ? 'selected' : '' }}>React</option>
                                            <option value="Angular" {{ in_array('Angular', $selectedSkills) ? 'selected' : '' }}>Angular</option>
                                            <option value="Vue" {{ in_array('Vue', $selectedSkills) ? 'selected' : '' }}>Vue</option>
                                            <option value="Node.js" {{ in_array('Node.js', $selectedSkills) ? 'selected' : '' }}>Node.js</option>
                                            <option value="Laravel" {{ in_array('Laravel', $selectedSkills) ? 'selected' : '' }}>Laravel</option>
                                            <option value="Django" {{ in_array('Django', $selectedSkills) ? 'selected' : '' }}>Django</option>
                                        </select>
                                    </div>
                                </div>

                                @foreach (['description', 'overview', 'key_responsibilities', 'qualification', 'nice_to_have', 'soft_skill'] as $field)
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label for="{{ $field }}">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                                            <textarea name="{{ $field }}" id="{{ $field }}" class="form-control editor">{{ $job->$field }}</textarea>
                                        </div>
                                    </div>
                                @endforeach

                                <br>

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-md col-md-2 btn-primary">{{ __('Update') }}</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    @include('company.components.ckeditor-config')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
