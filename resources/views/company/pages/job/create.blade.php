@extends('admin.layouts.master')
@section('title', 'Create Job')
@section('maincontent')
<style>
    .form-control{
        border: 1px solid rgb(191, 189, 189);
    }
    .select2{
        border: 1px solid rgb(191, 189, 189);
    }
</style>
    <?php
    $data['heading'] = 'Create Job';
    $data['title'] = 'Job';
    $data['title1'] = 'Create Job';
    ?>
    @include('admin.layouts.topbar', $data)
    <div class="contentbar">
        <div class="row">
            <div class="col-lg-12">
                <div class="card dashboard-card m-b-30">
                    <div class="card-header">
                        <div>
                            <div class="widgetbar">
                                <a href="{{ url('order') }}" class="float-right btn btn-dark-rgba mr-2"><i
                                        class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group my-4">
                                <form id="demo-form2" method="post" action="{{ route('company.job.store') }}"
                                    data-parsley-validate class="form-horizontal form-label-left"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" required>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <label for="vacancy">Vacancy</label>
                                            <input type="text" name="vacancy" id="vacancy" class="form-control" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="salary">Salary</label>
                                            <input type="text" name="salary" id="salary" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <label for="experience">Experience</label>
                                            <input type="text" name="experience" id="experience" class="form-control" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="type">Type</label>
                                            <select name="type" id="type" class="form-control" required>
                                                <option value="Full-Time">Full-Time</option>
                                                <option value="Part-Time">Part-Time</option>
                                                <option value="Contract">Contract</option>
                                                <option value="Internship">Internship</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="location">Location</label>
                                            <input type="text" name="location" id="location" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        
                                        <div class="col-md-4">
                                            <label for="deadline">Deadline</label>
                                            <input type="date" name="deadline" id="deadline" class="form-control" required>
                                        </div>

                                         <div class="col-md-4">
                                            <label for="skill">Skills</label>
                                            <select name="skill[]" id="skill" class="form-control select2" multiple="multiple" required>
                                                <option value="PHP">PHP</option>
                                                <option value="JavaScript">JavaScript</option>
                                                <option value="Python">Python</option>
                                                <option value="Java">Java</option>
                                                <option value="React">React</option>
                                                <option value="Angular">Angular</option>
                                                <option value="Vue">Vue</option>
                                                <option value="Node.js">Node.js</option>
                                                <option value="Laravel">Laravel</option>
                                                <option value="Django">Django</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control editor"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label for="overview">Overview</label>
                                            <textarea name="overview" id="overview" class="form-control editor"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label for="key_responsibilities">Key Responsibilities</label>
                                            <textarea name="key_responsibilities" id="key_responsibilities" class="form-control editor"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label for="qualification">Qualification</label>
                                            <textarea name="qualification" id="qualification" class="form-control editor"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label for="nice_to_have">Nice to Have</label>
                                            <textarea name="nice_to_have" id="nice_to_have" class="form-control editor"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label for="soft_skill">Soft Skills</label>
                                            <textarea name="soft_skill" id="soft_skill" class="form-control editor"></textarea>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="box-footer">
                                        <button type="submit" value="Add Slider"
                                            class="btn btn-md col-md-2 btn-primary">{{ __('Submit') }}</button>
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