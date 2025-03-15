@extends('theme.master')
@section('title', $job->job_title)
@section('content')

@include('admin.message')

@section('meta_tags')

@php
    $url =  URL::current();
@endphp

<meta name="title" content="{{ $job->job_title }}">
<meta name="description" content="{{ $job->description }} ">
<meta property="og:title" content="{{ $job->job_title }} ">
<meta property="og:url" content="{{ $url }}">
<meta property="og:description" content="{{ $job->description }}">
<meta property="og:image" content="{{ asset($job->company_image) }}">
<meta itemprop="image" content="{{ asset($job->company_image) }}">
<meta property="og:type" content="website">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="{{ asset($job->company_image) }}">
<meta property="twitter:title" content="{{ $job->job_title }} ">
<meta property="twitter:description" content="{{ $job->description }}">
<meta name="twitter:site" content="{{ url()->full() }}" />
<link rel="canonical" href="{{ url()->full() }}"/>
<meta name="robots" content="all">
<meta name="keywords" content="{{ $gsetting->meta_data_keyword }}">
    
@endsection

<!-- Job Portal Start -->
<section class="job-details">
    <div class="container-xl">
        <div class="job-head">
            <div class="job-head-inner">
                <div class="job-img">
                    @if (!$job->company_image)
                        {{-- <img src="{{ asset($job->company_image) }}" alt=""> --}}
                    @else
                        <img src="{{ Avatar::create($job->company_name)->toBase64() }}" alt="">
                    @endif
                </div>
                <div class="job-header-content">
                    <div class="job-title">
                        <span>{{ $job->company_name }}</span>
                        <h1 class="pt-2 pb-3">{{ $job->job_title }}</h1>
                        <p>Application Deadline: {{ date('jS F Y', strtotime($job->deadline)) }}</p>
                    </div>
                </div>
            </div>

            <div class="row m-3 bg-light">
                <div class="col-lg-6">
                    <div class="job-content">
                        <div class="my-2">
                            <ul class="mx-md-2">
                                <li><i class="fa fa-graduation-cap rgt-5 px-2"></i><span>Experience: {{ $job->exp_max ." ". $job->exp_type }}</span></li>
                                <li><i class="fa fa-money-bill rgt-5 px-2"></i><span>Salary: {{ number_format($job->salary_min) }} - {{ number_format($job->salary_max) }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="job-content">
                        <div class="my-2">
                            <ul>
                                <li><i class="fa fa-building-o rgt-5 px-2"></i><span>Vacancy: {{ $job->vacancy }}</span></li>
                                <li><i class="fa fa-map-marker rgt-5 px-2"></i><span>Location: {{ $job->location }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="job-summary">
                <h4>Summary:</h4>
                <p>{{ $job->summary }}</p>
            </div>
            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="header-svg" viewBox="0 0 1440 320">
                <path  fill="#fff" fill-opacity="1" d="M0,224L48,208C96,192,192,160,288,165.3C384,171,480,213,576,229.3C672,245,768,235,864,218.7C960,203,1056,181,1152,181.3C1248,181,1344,203,1392,213.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg> --}}
        </div>
        <div class="job-desc">
            <div class="job-desc-left">
                <div class="job-requir">
                    <h4>Requirments:</h4>
                    <p>{!! $job->requirement !!}</p>
                </div>
                <div class="job-respon">
                    <h4>Responsibility:</h4>
                    <p>{!! $job->description !!}</p>
                </div>
            </div>
            <div class="job-apply-right pt-3">
                <ul class="py-2">
                    <li>{{ __("Applied") }} : 0 </li>
                    <li>{{ __("Job Published")}}: {{ date('jS F Y', strtotime($job->created_at)) }} </li>
                    <li>{{__("Last Date")}} : {{ date('jS F Y', strtotime($job->deadline)) }}</li>
                </ul>
                @auth
                    <a href="{{ route('apply.job', ['user_id' => auth()->user()->id, 'job_id' => $job->id ]) }}" class="btn btn-primary"><i class="fa fa-location-arrow rgt-5"></i> {{__("Apply")}}</a>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="btn btn-primary"><i class="fa fa-location-arrow rgt-5"></i> {{__("Login")}}</a>
                @endguest
            </div>
        </div>
    </div>
</section>

<!-- Job Portal End -->

@endsection


@section('custom-script')
<script type="text/javascript">
    $(document).ready(function() {
     

    });
</script>

@endsection

