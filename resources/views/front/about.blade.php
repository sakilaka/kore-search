@extends('theme.master')
@section('title', 'About Us')
@section('content')
@include('admin.message')

<!-- about-home start -->
@if($about['one_enable'] == 1)
<section id="about-home-one" class="about-home-one-main-block" style="background-image: url('{{ asset('images/about/'.$about->one_image) }}')">
    <div class="overlay-bg"></div>
    <div class="container-xl">
        <h1 class="about-home-one-heading text-center">{{ $about->one_heading }}</h1>
    </div>
</section>
<section id="about-blog" class="about-blog-main-block">
    <div class="container-xl">
        <div class="about-blog-block text-center"><a href="{{ $about->link_four }}" title="NextClass Blog"><span>
            {{-- <i class="fa fa-circle rgt-10"></i>{{ $gsetting->project_title }} {{ __('Blog')}}: </span>{{ $about->one_text }}</a> --}}
        </div>
    </div>   
</section>
@endif 
<!-- about-blog end -->
<!-- about-Transforming start -->
@if($about['two_enable'] == 1)
<section id="about-transforming" class="about-transforming-main-block">
    <div class="container-xl">
        <div class="about-transforming-heading-block text-left">
            <div class="row " style="align-items: center">
                <div class="col-lg-12">
                    <h1 class="text-left">{{ $about->two_heading }}</h1> 
                </div>
                <div class="col-lg-8 col-12"> 
                    <p>{{ $about->two_text }}</p>
                </div>
                <div class="col-lg-4 col-12">
                    <h4 class="text-left">Our Mission:</h4>
                    <p>We reduce unemployment through skill development.</p>
                    <h4 class="text-left">Our Vision:</h4>
                    <p>To empower young talents.</p>
                </div>
            </div>
        </div>
    </div> 
</section>
@endif
<!-- about-Transforming end -->
@if($about['five_enable'] == 1)
<section id="about-team" class="py-5 text-center">
    <img class="img-fluid" src="{{ asset('images/about/'. $about->five_imagetwo)}}" alt="">
</section>
@endif
<!-- facts start-->
@if($about['three_enable'] == 1)
<section id="facts" class="facts-main-block about-facts">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                <div class="facts-block text-center btm-40">
                    <h1 class="facts-heading counter">{{ $about->three_countone }}</h1>
                    <div class="facts-dtl">{{ $about->three_txtone }}</div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                <div class="facts-block text-center btm-40">
                    <h1 class="facts-heading counter">{{ $about->three_counttwo }}</h1>
                    <div class="facts-dtl">{{ $about->three_txttwo }}</div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                <div class="facts-block text-center btm-40">
                    <h1 class="facts-heading counter">{{ $about->three_countthree }}</h1>
                    <div class="facts-dtl">{{ $about->three_txtthree }}</div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                <div class="facts-block text-center btm-40">
                    <h1 class="facts-heading counter">{{ $about->three_countfour }}</h1>
                    <div class="facts-dtl">{{ $about->three_txtfour }}</div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                <div class="facts-block text-center btm-40">
                    <h1 class="facts-heading counter">{{ $about->three_countfive }}</h1>
                    <div class="facts-dtl">{{ $about->three_txtfive }}</div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                <div class="facts-block text-center btm-40">
                    <h1 class="facts-heading counter">{{ $about->three_countsix }}</h1>
                    <div class="facts-dtl">{{ $about->three_txtsix }}</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- facts end-->

<!-- about-team start-->
@if($about['five_enable'] == 1)
<section id="about-team" class="about-team-main-block text-center">
    <img class="img-fluid" src="{{ asset('images/about/'. $about->five_imageone)}}" alt="">
</section>
@endif
<!-- about-team start-->
<!-- about-learning-blog start-->
@if($about['six_enable'] == 1)
<section id="about-learning-blog" class="about-learning-blog-main-block">
    <div class="container-xl">
        <h1 class="about-learning-blog-heading text-white text-center btm-40">{{ $about->six_heading }}</h1>
        <div class="about-learning-blog-block">
            <div class="row">
                <div class="col-lg-4">
                    <a href="{{ $about->link_one }}">
                    <div class="about-learning-blog-dtl text-white btm-20">
                        <h3 class="about-learning-blog-dtl-heading text-white">{{ $about->six_txtone }}</h3>
                        <div class="row">
                            <div class="col-lg-10 col-9">
                                <div class="about-learning-blog-paragraph">
                                    <p>{{ str_limit($about->six_deatilone, $limit = 200, $end = '...') }}</p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-3">
                                <div class="about-learning-blog-icon lft-7">
                                    <i class="fa fa-chevron-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="{{ $about->link_two }}">
                    <div class="about-learning-blog-dtl text-white btm-20">
                        <h3 class="about-learning-blog-dtl-heading text-white">{{ $about->six_txttwo }}</h3>
                        <div class="row">
                            <div class="col-lg-10 col-9">
                                <div class="about-learning-blog-paragraph lft-7">
                                    <p>{{ str_limit($about->six_deatiltwo, $limit = 200, $end = '...') }}</p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-3">
                                <div class="about-learning-blog-icon">
                                    <i class="fa fa-chevron-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="{{ $about->link_three }}">
                    <div class="about-learning-blog-dtl text-white">
                        <h3 class="about-learning-blog-dtl-heading text-white">{{ $about->six_txtthree }}</h3>
                        <div class="row">
                            <div class="col-lg-10 col-9">
                                <div class="about-learning-blog-paragraph">
                                    <p>{{ str_limit($about->six_deatilthree, $limit = 200, $end = '...') }}</p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-3">
                                <div class="about-learning-blog-icon lft-7">
                                    <i class="fa fa-chevron-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="about-social-list text-white text-center">
        {{-- <ul>
            <li>Follow Us :</li>
            @if($about->four_btntext == !NULL)
            <li><a href="{{ $about->four_btntext }}" target="_blank" title="facebook"><i class="fab fa-facebook-f"></i></a></li>
            @endif
            @if($about->five_btntext == !NULL)
            <li><a href="{{ $about->five_btntext }}" target="_blank" title="instagram"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
            @endif
            @if($about->linkedin == !NULL)
            <li><a href="{{ $about->linkedin }}" target="_blank" title="linkedin"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
            @endif
            @if($about->twitter == !NULL)
            <li><a href="{{ $about->twitter }}" target="_blank" title="twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
            @endif
        </ul> --}}
    </div>
</section>
@endif
<!-- about-learning-blog end-->
@endsection