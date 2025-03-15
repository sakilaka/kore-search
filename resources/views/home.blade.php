@extends('theme.master')
@section('title', 'Online Courses')
@section('content')
@include('admin.message')
@include('sweetalert::alert')
@section('meta_tags')
<meta name="title" content="{{ $gsetting['project_title'] }}">
<meta name="description" content="{{ $gsetting['meta_data_desc'] }} ">
<meta property="og:title" content="{{ $gsetting['project_title'] }} ">
<meta property="og:url" content="{{ url()->full() }}">
<meta property="og:description" content="{{ $gsetting['meta_data_desc'] }}">
<meta property="og:image" content="{{ asset('images/logo/'.$gsetting['logo']) }}">
<meta itemprop="image" content="{{ asset('images/logo/'.$gsetting['logo']) }}">
<meta property="og:type" content="website">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="{{ asset('images/logo/'.$gsetting['logo']) }}">
<meta property="twitter:title" content="{{ $gsetting['project_title'] }} ">
<meta property="twitter:description" content="{{ $gsetting['meta_data_desc'] }}">
<meta name="twitter:site" content="{{ url()->full() }}" />
<link rel="canonical" href="{{ url()->full() }}" />
<meta name="robots" content="all">
<meta name="keywords" content="{{ $gsetting->meta_data_keyword }}">
@endsection

@if(isset($sliders))
<section id="home-background-slider" class="background-slider-block owl-carousel">
    <div class="lazy item home-slider-img">
        @foreach($sliders as $slider)
        @if($slider->status == 1)
        <div id="home" class="home-main-block"
            style="background-image: url('{{ asset('images/slider/'.$slider['image']) }}')">
            <div class="container-xl">
                <div class="row">
                    <div
                        class="col-lg-12 {{$slider['left'] == 1 ? 'col-md-offset-6 col-sm-offset-6 col-sm-6 col-md-6 text-right' : ''}}">
                        <div class="home-dtl">
                            <div class="home-heading">{{ $slider['heading'] }}</div>
                            <p class="btm-10">{{ $slider['sub_heading'] }}</p>
                            <p class="btm-20">{{ $slider['detail'] }}
                        </div>

                        @if($slider->search_enable == 1)
                        <div class="home-search">
                            <form method="GET" id="searchform" action="{{ route('search') }}">
                                <div class="search">
                                    <input type="text" name="searchTerm" class="searchTerm"
                                        placeholder="{{ __('Search Courses')}}">
                                    <button type="submit" class="searchButton">{{ __('Search')}}
                                    </button>
                                </div>
                            </form>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    </div>
</section>
@endif
<!-- home end -->
<!-- learning-work start -->
<!--@if(isset($facts))
<section id="learning-work" class="learning-work-main-block">
    <div class="container-xl">
        <div class="row">
            @foreach($facts as $fact)
            <div class="col-lg-4 col-md-4">
                <div class="learning-work-block">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="learning-work-icon">
                                <i class="fa {{ $fact['icon'] }}"></i>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="learning-work-dtl">
                                <div class="work-heading">{{ $fact['heading'] }}</div>
                                <p>{{ $fact['sub_heading'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif-->
<!-- learning-work end -->
<!-- fact start -->
<!--@if($hsetting->fact_enable == 1 && isset($factsetting))
<section id="facts" class="fact-main-block">
    <div class="container-xl">
        <div class="row">
            @foreach($factsetting as $factset)
            <div class="col-lg-3 col-md-6 col-12"> 
                <div class="facts-block text-center">
                    <div class="facts-block-one">
                        <div class="facts-block-img">
                            @if($factset['image'] !== NULL && $factset['image'] !== '')
                            <img src="{{ url('/images/facts/'.$factset->image) }}" class="img-fluid" alt="" />
                            @else
                            <img src="{{ Avatar::create($factset->title)->toBase64() }}" alt="course"
                                class="img-fluid">
                            @endif
                            <div class="facts-count">{{ $factset->number }}</div>
                        </div>                        
                        <h5 class="facts-title"><a href="#" title="">{{ $factset->title }}</a></h5>
                        <p>{{ $factset->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif-->
<!-- fact end -->
<!-- Advertisement -->
@if(isset($advs))
@foreach($advs as $adv)
@if($adv->position == 'belowslider')
<br>
<section id="student" class="student-main-block top-40">
    <div class="container-xl">
        <a href="{{ $adv->url1 }}" title="{{ __('Click to visit') }}">

        </a>
    </div>
</section>
@endif
@endforeach
@endif
<!-- Advertisement -->

<!-- Student start -->
@if(Auth::check())
@if($hsetting->recentcourse_enable   == 1 && isset($recent_course_id) && isset($recent_course) && optional($recent_course)->status == 1)
<section id="student" class="student-main-block top-40">
    <div class="container-xl">

        @if($total_count >= '0')
        <h4 class="student-heading">{{ __('Recently Viewed Courses') }}</h4>
        <div id="recent-courses-slider" class="student-view-slider-main-block owl-carousel">
            @foreach($recent_course_id as $view)
            @php

            $recent_course = App\Course::where('id', $view)->with('user')->first();

            @endphp
            @if(isset($recent_course))

            @if($recent_course->status == 1)
            <div class="item student-view-block student-view-block-1">
                <div class="genre-slide-image">
                    <div class="view-block">
                        <div class="view-img">
                            @if($recent_course['preview_image'] !== NULL && $recent_course['preview_image'] !== '')
                            <a
                                href="{{ route('user.course.show',['id' => $recent_course->id, 'slug' => $recent_course->slug ]) }}"><img
                                    data-src="{{ asset('images/course/'.$recent_course['preview_image']) }}"
                                    alt="course" class="img-fluid owl-lazy"></a>
                            @else
                            <a
                                href="{{ route('user.course.show',['id' => $recent_course->id, 'slug' => $recent_course->slug ]) }}"><img
                                    data-src="{{ Avatar::create($recent_course->title)->toBase64() }}" alt="course"
                                    class="img-fluid owl-lazy"></a>
                            @endif
                        </div>
                        @if($recent_course['level_tags'] == 'trending')
                        <div class="advance-badge">
                            <span class="badge bg-warning">{{__('Trending')}}</span>
                        </div>
                        @endif
                        @if($recent_course['level_tags'] == 'featured')

                        <div class="advance-badge">
                            <span class="badge bg-danger">{{__('Featured')}}</span>
                        </div>
                        @endif
                        @if($recent_course['level_tags'] == 'new')

                        <div class="advance-badge">
                            <span class="badge bg-success">{{__('New')}}</span>
                        </div>
                        @endif
                        @if($recent_course['level_tags'] == 'onsale')

                        <div class="advance-badge">
                            <span class="badge bg-info">{{__('On-sale')}}</span>
                        </div>
                        @endif
                        @if($recent_course['level_tags'] == 'bestseller')

                        <div class="advance-badge">
                            <span class="badge bg-success">{{__('Bestseller')}}</span>
                        </div>
                        @endif
                        @if($recent_course['level_tags'] == 'beginner')

                        <div class="advance-badge">
                            <span class="badge bg-primary">{{__('Beginner')}}</span>
                        </div>
                        @endif
                        @if($recent_course['level_tags'] == 'intermediate')

                        <div class="advance-badge">
                            <span class="badge bg-secondary">{{__('Intermediate')}}</span>
                        </div>
                        @endif
                       
                        <div class="view-user-img">

                            @if($recent_course->user['user_img'] !== NULL && $recent_course->user['user_img'] !== '')
                            <a href="{{ route('all/profile',$recent_course->user->id) }}" title=""><img
                                    src="{{ asset('images/user_img/'.$recent_course->user['user_img']) }}"
                                    class="img-fluid user-img-one" alt=""></a>
                            @else
                            <a href="{{ route('all/profile',$recent_course->user->id) }}" title=""><img src="{{ asset('images/default/user.png') }}"
                                    class="img-fluid user-img-one" alt=""></a>
                            @endif
                        </div>
                        <div class="view-dtl">
                            <div class="view-heading"><a
                                    href="{{ route('user.course.show',['id' => $recent_course->id, 'slug' => $recent_course->slug ]) }}">{{ str_limit($recent_course->title, $limit = 30, $end = '...') }}</a>
                            </div>
                            <div class="user-name">
                                <h6>By <span><a href="{{ route('all/profile',$recent_course->user->id) }}"> {{ optional($recent_course->user)['fname'] }}</a></span></h6>
                            </div>
                            <div class="rating">
                                <ul>
                                    <li>
                                        <?php 
                                            $learn = 0;
                                            $price = 0;
                                            $value = 0;
                                            $sub_total = 0;
                                            $sub_total = 0;
                                            $reviews = App\ReviewRating::where('course_id',$recent_course->id)->get();
                                            ?>
                                        @if(!empty($reviews[0]))
                                        <?php
                                            $count =  App\ReviewRating::where('course_id',$recent_course->id)->count();

                                            foreach($reviews as $review){
                                                $learn = $review->price*5;
                                                $price = $review->price*5;
                                                $value = $review->value*5;
                                                $sub_total = $sub_total + $learn + $price + $value;
                                            }

                                            $count = ($count*3) * 5;
                                            $rat = $sub_total/$count;
                                            $ratings_var = ($rat*100)/5;
                                            ?>

                                        <div class="pull-left">
                                            <div class="star-ratings-sprite"><span
                                                    style="width:<?php echo $ratings_var; ?>%"
                                                    class="star-ratings-sprite-rating"></span>
                                            </div>
                                        </div>


                                        @else
                                        <div class="pull-left">{{ __('No Rating') }}</div>
                                        @endif
                                    </li>
                                    <!-- overall rating-->
                                    <?php 
                                        $learn = 0;
                                        $price = 0;
                                        $value = 0;
                                        $sub_total = 0;
                                        $count =  count($reviews);
                                        $onlyrev = array();

                                        $reviewcount = App\ReviewRating::where('course_id', $recent_course->id)->WhereNotNull('review')->get();

                                        foreach($reviews as $review){

                                            $learn = $review->learn*5;
                                            $price = $review->price*5;
                                            $value = $review->value*5;
                                            $sub_total = $sub_total + $learn + $price + $value;
                                        }

                                        $count = ($count*3) * 5;
                                         
                                        if($count != "" && $count != '0')
                                        {
                                            $rat = $sub_total/$count;
                                     
                                            $ratings_var = ($rat*100)/5;
                                   
                                            $overallrating = ($ratings_var/2)/10;
                                        }
                                         
                                        ?>

                                    @php
                                    $reviewsrating = App\ReviewRating::where('course_id', $recent_course->id)->first();
                                    @endphp
                                    <!-- @if(!empty($reviewsrating))
                                        <li>
                                            <b>{{ round($overallrating, 1) }}</b>
                                        </li>
                                        @endif -->

                                    <li class="reviews">
                                        (@php
                                        $data = App\ReviewRating::where('course_id', $recent_course->id)->count();
                                        if($data>0){

                                        echo $data;
                                        }
                                        else{

                                        echo "0";
                                        }
                                        @endphp Reviews)
                                    </li>
                                </ul>
                            </div>
                            <div class="view-footer">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="count-user">
                                            <i data-feather="user"></i><span>
                                                @php
                                                $data = App\Order::where('course_id', $recent_course->id)->count();
                                                if(($data)>0){

                                                echo $data;
                                                }
                                                else{

                                                echo "0";
                                                }
                                                @endphp</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        @if( $recent_course->type == 1)
                                        <div class="rate text-right">
                                            <ul>

                                                @if($recent_course->discount_price == !NULL)

                                                <li><a><b>
                                                    {{ currency($recent_course->discount_price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = true) }}
                                                </b></a>
                                                </li>

                                                <li><a><b><strike>{{ currency($recent_course->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = true) }}</strike></b></a>
                                                </li>


                                                @else
                                                <li><a><b>
                                                            {{ currency($recent_course->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = true) }}</b></a>
                                                </li>


                                                @endif
                                            </ul>
                                        </div>
                                        @else
                                        <div class="rate text-right">
                                            <ul>
                                                <li><a><b>{{ __('Free') }}</b></a></li>
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="img-wishlist">
                                <div class="protip-wishlist">
                                    <ul>
                                        @if(Auth::check())
                                        @php
                                        $wish = App\Wishlist::where('user_id', auth()->user()->id)->where('course_id',
                                        $recent_course->id)->first();
                                        @endphp
                                        @if ($wish == NULL)
                                        <li class="protip-wish-btn">
                                            <form id="demo-form2" method="post"
                                                action="{{ url('show/wishlist', $recent_course->id) }}"
                                                data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}" />
                                                <input type="hidden" name="course_id" value="{{$recent_course->id}}" />

                                                <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i
                                                        data-feather="heart" class="rgt-10"></i></button>
                                            </form>
                                        </li>
                                        @else
                                        <li class="protip-wish-btn-two">
                                            <form id="demo-form2" method="post"
                                                action="{{ url('remove/wishlist', $recent_course->id) }}"
                                                data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}" />
                                                <input type="hidden" name="course_id" value="{{$recent_course->id}}" />

                                                <button class="wishlisht-btn heart-fill" title="Remove from Wishlist"
                                                    type="submit"><i data-feather="heart" class="rgt-10"></i></button>
                                            </form>
                                        </li>
                                        @endif
                                        @else
                                        <li class="protip-wish-btn"><a href="{{ route('login') }}" title="heart"><i
                                                    data-feather="heart" class="rgt-10"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endif
            @endif
            @endforeach
        </div>
        @endif

    </div>
</section>
@endif
@endif
<!-- Students end -->

<!-- Student start -->
@if(Auth::check())
@php
if(Schema::hasColumn('orders', 'refunded')){
$enroll = App\Order::where('refunded', '0')->where('user_id', auth()->user()->id)->where('status',
'1')->with('courses')->with(['user','courses.user'] )->get();
}
else{
$enroll = NULL;
}
@endphp
@if($hsetting->purchase_enable == 1 && isset($enroll))
<section id="student" class="student-main-block top-40">
    <div class="container-xl">
         @if(count($enroll) > 0)
        <h4 class="student-heading">{{ __('My Purchased Courses') }}</h4>
        <div id="my-courses-slider" class="student-view-slider-main-block owl-carousel">
            @foreach($enroll as $enrol)
            @if(isset($enrol->courses) && $enrol->courses['status'] == 1 )
            <div class="item student-view-block student-view-block-1">
                <div class="genre-slide-image">
                    <div class="view-block">
                        <div class="view-img">
                            @if($enrol->courses['preview_image'] !== NULL && $enrol->courses['preview_image'] !== '')
                            <a
                                href="{{ route('course.content',['id' => $enrol->courses->id, 'slug' => $enrol->courses->slug ]) }}"><img
                                    data-src="{{ asset('images/course/'.$enrol->courses['preview_image']) }}"
                                    alt="course" class="img-fluid owl-lazy"></a>
                            @else
                            <a
                                href="{{ route('course.content',['id' => $enrol->courses->id, 'slug' => $enrol->courses->slug ]) }}"><img
                                    data-src="{{ Avatar::create($enrol->courses->title)->toBase64() }}" alt="course"
                                    class="img-fluid owl-lazy"></a>
                            @endif
                        </div>
                        <div class="view-user-img">

                            @if($enrol->user['user_img'] !== NULL && $enrol->user['user_img'] !== '')
                            <a href="{{ route('all/profile',$enrol->user->id) }}" title=""><img src="{{ asset('images/user_img/'.$enrol->user['user_img']) }}"
                                    class="img-fluid user-img-one" alt=""></a>
                            @else
                            <a href="{{ route('all/profile',$enrol->user->id) }}" title=""><img src="{{ asset('images/default/user.png') }}"
                                    class="img-fluid user-img-one" alt=""></a>
                            @endif
                        </div>
                        <div class="view-dtl">
                            <div class="view-heading"><a
                                    href="{{ route('course.content',['id' => $enrol->courses->id, 'slug' => $enrol->courses->slug ]) }}">{{ str_limit($enrol->courses->title, $limit = 30, $end = '...') }}</a>
                            </div>
                            <div class="user-name">
                                <h6>By <span><a href="{{ route('all/profile',$enrol->user->id) }}"> {{ optional($enrol->user)['fname'] }}</a></span></h6>
                            </div>
                            <div class="rating">
                                <ul>
                                    <li>
                                        <?php 
                                            $learn = 0;
                                            $price = 0;
                                            $value = 0;
                                            $sub_total = 0;
                                            $sub_total = 0;
                                            $reviews = App\ReviewRating::where('course_id',$enrol->courses->id)->get();
                                            ?>
                                        @if(!empty($reviews[0]))
                                        <?php
                                            $count =  App\ReviewRating::where('course_id',$enrol->courses->id)->count();

                                            foreach($reviews as $review){
                                                $learn = $review->price*5;
                                                $price = $review->price*5;
                                                $value = $review->value*5;
                                                $sub_total = $sub_total + $learn + $price + $value;
                                            }

                                            $count = ($count*3) * 5;
                                            $rat = $sub_total/$count;
                                            $ratings_var = ($rat*100)/5;
                                            ?>

                                        <div class="pull-left">
                                            <div class="star-ratings-sprite"><span
                                                    style="width:<?php echo $ratings_var; ?>%"
                                                    class="star-ratings-sprite-rating"></span>
                                            </div>
                                        </div>


                                        @else
                                        <div class="pull-left">{{ __('No Rating') }}</div>
                                        @endif
                                    </li>
                                    <!-- overall rating-->
                                    <?php 
                                        $learn = 0;
                                        $price = 0;
                                        $value = 0;
                                        $sub_total = 0;
                                        $count =  count($reviews);
                                        $onlyrev = array();

                                        $reviewcount = App\ReviewRating::where('course_id', $enrol->courses->id)->WhereNotNull('review')->get();

                                        foreach($reviews as $review){

                                            $learn = $review->learn*5;
                                            $price = $review->price*5;
                                            $value = $review->value*5;
                                            $sub_total = $sub_total + $learn + $price + $value;
                                        }

                                        $count = ($count*3) * 5;
                                         
                                        if($count != "" && $count != '0')
                                        {
                                            $rat = $sub_total/$count;
                                     
                                            $ratings_var = ($rat*100)/5;
                                   
                                            $overallrating = ($ratings_var/2)/10;
                                        }
                                         
                                        ?>

                                    @php
                                    $reviewsrating = App\ReviewRating::where('course_id', $enrol->courses->id)->first();
                                    @endphp

                                    <li class="reviews">
                                        (@php
                                        $data = App\ReviewRating::where('course_id', $enrol->courses->id)->count();
                                        if($data>0){

                                        echo $data;
                                        }
                                        else{

                                        echo "0";
                                        }
                                        @endphp Reviews)
                                    </li>
                                </ul>
                            </div>
                            <div class="view-footer">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="count-user">
                                            <i data-feather="user"></i><span>
                                                @php
                                                $data = App\Order::where('course_id', $enrol->courses->id)->count();
                                                if(($data)>0){

                                                echo $data;
                                                }
                                                else{

                                                echo "0";
                                                }
                                                @endphp</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        @if( $enrol->courses->type == 1)
                                        <div class="rate text-right">
                                            <ul>


                                                @if($enrol->courses->discount_price == !NULL)

                                                <li><a><b>{{ activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :'' }} {{ price_format( currency($enrol->courses->discount_price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false)) }} {{ activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :'' }}</b></a>
                                                </li>

                                                <li><a><b><strike>{{ activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :'' }} {{ price_format( currency($enrol->courses->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false)) }} {{ activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :'' }}</strike></b></a>
                                                </li>




                                                @else

                                                <li><a><b>
                                                    {{ activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :'' }} {{ price_format( currency($enrol->courses->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false)) }} {{ activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :'' }}</b></a>
                                                </li>

                                                @endif
                                            </ul>
                                        </div>
                                        @else
                                        <div class="rate text-right">
                                            <ul>
                                                <li><a><b>{{ __('Free') }}</b></a></li>
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            @endif
            @endforeach
        </div>
        @endif

    </div>
</section>
@endif
@endif
<!-- Students end -->
<!-- categories start -->
@if($hsetting->featuredcategories_enable == 1 && !$category->isEmpty())
<section id="categories" class="categories-main-block">
    <div class="container-xl">
        @if( count($category->where('featured', '1')) > 0)

        <h3 class="categories-heading">{{ __('') }}</h3>
        <div class="row">
            @foreach($category as $t)
            @if($t->status == 1 && $t->featured == 1)

            <div class="col-lg-2 col-md-4 col-sm-4 col-6">

                <div class="cat-container btm-20 text-center">
                    <a href="{{ route('category.page',['id' => $t->id, 'category' => str_slug(str_replace('-','&',$t->slug))]) }}">
                        <div class="cat-img">
                            @if($t['cat_image'] == !NULL)
                                <img src="{{ asset('images/category/'.$t['cat_image']) }}">
                            @else
                                <img src="{{ Avatar::create($t->title)->toBase64() }}">
                            @endif
                        </div>
                        <div class="cat-dtl">
                            <div>
                                <span>
                                    <h5 class="cat-name"><i class="fa {{ $t['icon'] }} mr-2"></i>{{ $t['title'] }}</h5>
                                    <div class="cat-img-count">{{ $t->courses->count() }} {{ __('Courses')}}</div>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            @endif
            @endforeach
        </div>

        @endif
    </div>
</section>
@endif
<!-- categories end -->
<!-- learning-courses start -->
<!-- @if($hsetting->recentcourse_enable  == 1 && isset($categories))
<section id="learning-courses" class="learning-courses-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <h4 class="student-heading">{{ __('Recent Courses') }}</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="btn_more float-right">

                </div>
            </div>
        </div>

        <div class="row">



            <div class="col-lg-12">
                <div class="learning-courses">
                    @if(isset($categories))
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach($categories as $cats)

                        <li class="btn nav-item"><a class="nav-item nav-link" id="home-tab" data-toggle="tab"
                                href="#content-tabs" role="tab" aria-controls="home"
                                onclick="showtab('{{ $cats->id }}')" aria-selected="true">{{ $cats['title'] }}</a></li>

                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="tab-content" id="myTabContent">
                    @if(!empty($categories))


                    @foreach($categories as $cate)
                    <div class="tab-pane fade show active" id="content-tabs" role="tabpanel" aria-labelledby="home-tab">

                        <div id="tabShow">

                        </div>

                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif -->
<!-- learning-courses end -->

<!-- Free Course Start -->

@if( !$cors->isEmpty() && $hsetting->featured_enable)
<section id="student" class="student-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-7">
                <h4 class="student-heading">{{ __('Open Access Courses') }}</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-5">
                <div class="view-button txt-rgt">
                    <a href="{{ url('featuredcourse/view') }}" class="btn btn-secondary" title="View More">{{__('View More')}}<i data-feather="chevrons-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div id="free-view-slider" class="student-view-slider-main-block owl-carousel">
            @foreach($cors->where('type', '0') as $c)
             @if($c->status == 1 && $c->featured == 1)   
            <div class="item student-view-block student-view-block-1">
                <div class="genre-slide-image @if($gsetting['course_hover'] == 1) protip @endif"
                    data-pt-placement="outside" data-pt-interactive="false"
                    data-pt-title="#prime-next-item-description-block{{$c->id}}">
                    <div class="view-block">
                        <div class="view-img">
                            @if($c['preview_image'] !== NULL && $c['preview_image'] !== '')
                            <a href="{{ route('user.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}"><img
                                    data-src="{{ asset('images/course/'.$c['preview_image']) }}" alt="course"
                                    class="img-fluid owl-lazy"></a>
                            @else
                            <a href="{{ route('user.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}"><img
                                    data-src="{{ Avatar::create($c->title)->toBase64() }}" alt="course"
                                    class="img-fluid owl-lazy"></a>
                            @endif
                        </div>
                        @if(isset($c->discount_price))
                        <div class="badges bg-priamry offer-badge"><span>OFF<span><?php echo round((($c->price - $c->discount_price) * 100) / $c->price) . '%'; ?></span></span></div>
                        @endif
                        @if($c['level_tags'] == 'trending')
                        <div class="advance-badge">
                            <span class="badge bg-warning">{{__('Trending')}}</span>
                        </div>
                        @endif
                        @if($c['level_tags'] == 'featured')

                        <div class="advance-badge">
                            <span class="badge bg-danger">{{__('Featured')}}</span>
                        </div>
                        @endif
                        @if($c['level_tags'] == 'new')

                        <div class="advance-badge">
                            <span class="badge bg-success">{{__('New')}}</span>
                        </div>
                        @endif
                        @if($c['level_tags'] == 'onsale')

                        <div class="advance-badge">
                            <span class="badge bg-info">{{__('Onsale')}}</span>
                        </div>
                        @endif
                        @if($c['level_tags'] == 'bestseller')

                        <div class="advance-badge">
                            <span class="badge bg-success">{{__('Bestseller')}}</span>
                        </div>
                        @endif
                        @if($c['level_tags'] == 'beginner')

                        <div class="advance-badge">
                            <span class="badge bg-primary">{{__('Beginner')}}</span>
                        </div>
                        @endif
                        @if($c['level_tags'] == 'intermediate')

                        <div class="advance-badge">
                            <span class="badge bg-secondary">{{__('Intermediate')}}</span>
                        </div>
                        @endif
                        

                        <div class="view-dtl">
                            <div class="view-heading"><a
                                    href="{{ route('user.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}">{{ str_limit($c->title, $limit = 30, $end = '...') }}</a>
                            </div>
                            <div class="user-name">
                                <h6>By <span><a href="{{ route('all/profile',$c->user->id) }}"> {{ optional($c->user)['fname'] }}</a></span></h6>
                            </div>
                            <div class="rating">
                                <ul>
                                    <li>
                                        <?php 
                                            $learn = 0;
                                            $price = 0;
                                            $value = 0;
                                            $sub_total = 0;
                                            $sub_total = 0;
                                            $reviews = App\ReviewRating::where('course_id',$c->id)->get();
                                            ?>
                                        @if(!empty($reviews[0]))
                                        <?php
                                            $count =  App\ReviewRating::where('course_id',$c->id)->count();

                                            foreach($reviews as $review){
                                                $learn = $review->price*5;
                                                $price = $review->price*5;
                                                $value = $review->value*5;
                                                $sub_total = $sub_total + $learn + $price + $value;
                                            }

                                            $count = ($count*3) * 5;
                                            $rat = $sub_total/$count;
                                            $ratings_var = ($rat*100)/5;
                                            ?>

                                        <div class="pull-left">
                                            <div class="star-ratings-sprite"><span
                                                    style="width:<?php echo $ratings_var; ?>%"
                                                    class="star-ratings-sprite-rating"></span>
                                            </div>
                                        </div>


                                        @else
                                        <div class="pull-left">{{ __('No Rating') }}</div>
                                        @endif
                                    </li>
                                    <!-- overall rating-->
                                    <?php 
                                        $learn = 0;
                                        $price = 0;
                                        $value = 0;
                                        $sub_total = 0;
                                        $count =  count($reviews);
                                        $onlyrev = array();

                                        $reviewcount = App\ReviewRating::where('course_id', $c->id)->WhereNotNull('review')->get();

                                        foreach($reviews as $review){

                                            $learn = $review->learn*5;
                                            $price = $review->price*5;
                                            $value = $review->value*5;
                                            $sub_total = $sub_total + $learn + $price + $value;
                                        }

                                        $count = ($count*3) * 5;
                                         
                                        if($count != "" && $count != '0')
                                        {
                                            $rat = $sub_total/$count;
                                     
                                            $ratings_var = ($rat*100)/5;
                                   
                                            $overallrating = ($ratings_var/2)/10;
                                        }
                                         
                                        ?>

                                    @php
                                    $reviewsrating = App\ReviewRating::where('course_id', $c->id)->first();
                                    @endphp
                                    @if(!empty($reviewsrating))
                                    <!-- <li>
                                            <b>{{ round($overallrating, 1) }}</b>
                                        </li> -->
                                    @endif
                                    <li class="reviews">
                                        (@php
                                        $data = App\ReviewRating::where('course_id', $c->id)->count();
                                        if($data>0){

                                        echo $data;
                                        }
                                        else{

                                        echo "0";
                                        }
                                        @endphp Reviews)
                                    </li>

                                </ul>
                            </div>
                            <div class="view-footer">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="count-user">
                                            <i data-feather="user"></i><span>
                                                @php
                                                $data = App\Order::where('course_id', $c->id)->count();
                                                if(($data)>0){

                                                echo $data;
                                                }
                                                else{

                                                echo "0";
                                                }
                                                @endphp</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        @if( $c->type == 1)
                                        <div class="rate text-right">
                                            <ul>

                                                @if($c->discount_price == !NULL)

                                                <li><a><b>{{ activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :'' }}{{ price_format( currency($c['discount_price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false)) }}{{ activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :'' }}</b></a>
                                                </li>

                                                <li><a><b><strike>{{ activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :'' }}{{ price_format( currency($c['price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false) ) }}{{ activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :'' }}</strike></b></a>
                                                </li>


                                                @else

                                                @if($c->price == !NULL)
                                                <li><a><b>{{ activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :'' }}{{ price_format( currency($c['price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false) ) }}{{ activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :'' }}</b></a>
                                                </li>
                                                @endif

                                                @endif
                                            </ul>
                                        </div>
                                        @else
                                        <div class="rate text-right">
                                            <ul>
                                                <li><a><b>{{ __('Free') }}</b></a></li>
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>



                            <div class="img-wishlist">
                                <div class="protip-wishlist">
                                    <ul>

                                        <li class="protip-wish-btn"><a
                                                href="https://calendar.google.com/calendar/r/eventedit?text={{ $c['title'] }}"
                                                target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                        @if(Auth::check())

                                        <li class="protip-wish-btn"><a class="compare" data-id="{{filter_var($c->id)}}"
                                                title="compare"><i data-feather="bar-chart"></i></a></li>

                                        @php
                                        $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id',
                                        $c->id)->first();
                                        @endphp
                                        @if ($wish == NULL)
                                        <li class="protip-wish-btn">
                                            <form id="demo-form2" method="post"
                                                action="{{ url('show/wishlist', $c->id) }}" data-parsley-validate
                                                class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                <input type="hidden" name="course_id" value="{{$c->id}}" />

                                                <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i
                                                        data-feather="heart"></i></button>
                                            </form>
                                        </li>
                                        @else
                                        <li class="protip-wish-btn-two">
                                            <form id="demo-form2" method="post"
                                                action="{{ url('remove/wishlist', $c->id) }}" data-parsley-validate
                                                class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                <input type="hidden" name="course_id" value="{{$c->id}}" />

                                                <button class="wishlisht-btn heart-fill" title="Remove from Wishlist"
                                                    type="submit"><i data-feather="heart"></i></button>
                                            </form>
                                        </li>
                                        @endif
                                        @else
                                        <li class="protip-wish-btn"><a href="{{ route('login') }}" title="heart"><i
                                                    data-feather="heart"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div id="prime-next-item-description-block{{$c->id}}" class="prime-description-block">
                    <div class="prime-description-under-block">
                        <div class="prime-description-under-block">
                            <h5 class="description-heading">{{ $c['title'] }}</h5>
                            <div class="main-des">
                                <p>Last Updated: {{ date('jS F Y', strtotime($c->updated_at)) }}</p>
                            </div>

                            <ul class="description-list">
                                <li>
                                    <i data-feather="play-circle"></i>
                                    <div class="class-des">
                                        {{ __('Classes') }}:
                                        @php
                                        $data = App\CourseClass::where('course_id', $c->id)->count();
                                        if($data > 0){

                                        echo $data;
                                        }
                                        else{

                                        echo "0";
                                        }
                                        @endphp
                                    </div>
                                </li>
                                &nbsp;
                                <li>
                                    <div>
                                        <div class="time-des">
                                            <span class="">
                                                <i data-feather="clock"></i>
                                                @php

                                                $classtwo = App\CourseClass::where('course_id',
                                                $c->id)->sum("duration");

                                                @endphp
                                                {{ $classtwo }} Minutes
                                            </span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="lang-des">
                                        @if($c['language_id'] == !NULL)
                                        @if(isset($c->language))
                                        <i data-feather="globe"></i> {{ $c->language['name'] }}
                                        @endif
                                        @endif
                                    </div>
                                </li>

                            </ul>

                            <div class="product-main-des">
                                <p>{{ $c->short_detail }}</p>
                            </div>
                            <div>
                                @if($c->whatlearns->isNotEmpty())
                                @foreach($c->whatlearns as $wl)
                                @if($wl->status ==1)
                                <div class="product-learn-dtl">
                                    <ul>
                                        <li><i
                                                data-feather="check-circle"></i>{{ str_limit($wl['detail'], $limit = 120, $end = '...') }}
                                        </li>
                                    </ul>
                                </div>
                                @endif
                                @endforeach
                                @endif
                            </div>
                            <div class="des-btn-block">
                                <div class="row">
                                    <div class="col-lg-8">
                                        @if($c->type == 1)
                                        @if(Auth::check())
                                        @if(Auth::User()->role == "admin")
                                        <div class="protip-btn">
                                            <a href="{{ route('course.content',['id' => $c->id, 'slug' => $c->slug ]) }}"
                                                class="btn btn-secondary"
                                                title="course">{{ __('Go To Course') }}</a>
                                        </div>
                                        @else
                                        @php
                                        $order = App\Order::where('user_id', Auth::User()->id)->where('course_id',
                                        $c->id)->first();
                                        @endphp
                                        @if(!empty($order) && $order->status == 1)
                                        <div class="protip-btn">
                                            <a href="{{ route('course.content',['id' => $c->id, 'slug' => $c->slug ]) }}"
                                                class="btn btn-secondary"
                                                title="course">{{ __('Go To Course') }}</a>
                                        </div>
                                        @else
                                        @php
                                        $cart = App\Cart::where('user_id', Auth::User()->id)->where('course_id',
                                        $c->id)->first();
                                        @endphp
                                        @if(!empty($cart))
                                        <div class="protip-btn">
                                            <form id="demo-form2" method="post"
                                                action="{{ route('remove.item.cart',$cart->id) }}">
                                                {{ csrf_field() }}

                                                <div class="box-footer">
                                                    <button type="submit"
                                                        class="btn btn-primary">{{ __('Remove From Cart') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                        @else
                                        <div class="protip-btn">
                                            <form id="demo-form2" method="post"
                                                action="{{ route('addtocart',['course_id' => $c->id, 'price' => $c->price, 'discount_price' => $c->discount_price ]) }}"
                                                data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="category_id"
                                                    value="{{$c->category['id'] ?? '-'}}" />

                                                <div class="box-footer">
                                                    <button type="submit"
                                                        class="btn btn-primary"><i data-feather="shopping-cart"></i>{{ __('Add To Cart') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                        @endif
                                        @endif
                                        @endif
                                        @else
                                        @if($gsetting->guest_enable == 1)
                                        <form id="demo-form2" method="post"
                                            action="{{ route('guest.addtocart', $c->id) }}" data-parsley-validate
                                            class="form-horizontal form-label-left">
                                            {{ csrf_field() }}


                                            <div class="box-footer">
                                                <button type="submit" class="btn btn-primary"><i data-feather="shopping-cart"></i>&nbsp;{{ __('Add To Cart') }}</button>
                                            </div>
                                        </form>

                                        @else

                                        <div class="protip-btn">
                                            <a href="{{ route('login') }}" class="btn btn-primary"><i data-feather="shopping-cart"></i>&nbsp;{{ __('Add To Cart') }}</a>
                                        </div>
                                        @endif
                                        @endif
                                        @else
                                        @if(Auth::check())
                                        @if(Auth::User()->role == "admin")
                                        <div class="protip-btn">
                                            <a href="{{ route('course.content',['id' => $c->id, 'slug' => $c->slug ]) }}"
                                                class="btn btn-secondary"
                                                title="course">{{ __('Go To Course') }}</a>
                                        </div>
                                        @else
                                        @php
                                        $enroll = App\Order::where('user_id', Auth::User()->id)->where('course_id',
                                        $c->id)->first();
                                        @endphp
                                        @if($enroll == NULL)
                                        <div class="protip-btn">
                                            <a href="{{url('enroll/show',$c->id)}}" class="btn btn-primary"
                                                title="Enroll Now"><i data-feather="shopping-cart"></i>{{ __('Enroll Now') }}</a>
                                        </div>
                                        @else
                                        <div class="protip-btn">
                                            <a href="{{ route('course.content',['id' => $c->id, 'slug' => $c->slug ]) }}"
                                                class="btn btn-secondary"
                                                title="Cart">{{ __('Go To Course') }}</a>
                                        </div>
                                        @endif
                                        @endif
                                        @else
                                        <div class="protip-btn">
                                            <a href="{{ route('login') }}" class="btn btn-primary"
                                                title="Enroll Now"><i data-feather="shopping-cart"></i>{{ __('Enroll Now') }}</a>
                                        </div>
                                        @endif
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="img-wishlist">
                                            <div class="protip-wishlist">
                                                <ul>
                                                    @if(Auth::check())

                                                    @php
                                                    $wish = App\Wishlist::where('user_id',
                                                    Auth::User()->id)->where('course_id', $c->id)->first();
                                                    @endphp
                                                    @if ($wish == NULL)
                                                    <li class="protip-wish-btn">
                                                        <form id="demo-form2" method="post"
                                                            action="{{ url('show/wishlist', $c->id) }}"
                                                            data-parsley-validate
                                                            class="form-horizontal form-label-left">
                                                            {{ csrf_field() }}

                                                            <input type="hidden" name="user_id"
                                                                value="{{Auth::User()->id}}" />
                                                            <input type="hidden" name="course_id" value="{{$c->id}}" />

                                                            <button class="wishlisht-btn" title="Add to wishlist"
                                                                type="submit"><i data-feather="heart"></i></button>
                                                        </form>
                                                    </li>
                                                    @else
                                                    <li class="protip-wish-btn-two">
                                                        <form id="demo-form2" method="post"
                                                            action="{{ url('remove/wishlist', $c->id) }}"
                                                            data-parsley-validate
                                                            class="form-horizontal form-label-left">
                                                            {{ csrf_field() }}

                                                            <input type="hidden" name="user_id"
                                                                value="{{Auth::User()->id}}" />
                                                            <input type="hidden" name="course_id" value="{{$c->id}}" />

                                                            <button class="wishlisht-btn heart-fill" title="Remove from Wishlist"
                                                                type="submit"><i data-feather="heart"></i></button>
                                                        </form>
                                                    </li>
                                                    @endif
                                                    @else
                                                    <li class="protip-wish-btn"><a href="{{ route('login') }}"
                                                            title="heart"><i data-feather="heart"></i></a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>

    </div>
</section>
@endif
<!-- Free Course End -->


<!-- Student start -->

@if( !$cors->isEmpty() && $hsetting->featured_enable)
<section id="student" class="student-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-7">
                <h4 class="student-heading">{{ __('Highlighted Courses') }}</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-5">
                <div class="view-button txt-rgt">
                    <a href="{{ url('featuredcourse/view') }}" class="btn btn-secondary" title="View More">{{__('View More')}}<i data-feather="chevrons-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div id="student-view-slider" class="student-view-slider-main-block owl-carousel">
            @foreach($cors as $c)
             @if($c->status == 1 && $c->featured == 1)   
            <div class="item student-view-block student-view-block-1">
                <div class="genre-slide-image @if($gsetting['course_hover'] == 1) protip @endif"
                    data-pt-placement="outside" data-pt-interactive="false"
                    data-pt-title="#prime-next-item-description-block{{$c->id}}">
                    <div class="view-block">
                        <div class="view-img">
                            @if($c['preview_image'] !== NULL && $c['preview_image'] !== '')
                            <a href="{{ route('user.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}"><img
                                    data-src="{{ asset('images/course/'.$c['preview_image']) }}" alt="course"
                                    class="img-fluid owl-lazy"></a>
                            @else
                            <a href="{{ route('user.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}"><img
                                    data-src="{{ Avatar::create($c->title)->toBase64() }}" alt="course"
                                    class="img-fluid owl-lazy"></a>
                            @endif
                        </div>
                        @if(isset($c->discount_price))
                        <div class="badges bg-priamry offer-badge"><span>OFF<span><?php echo round((($c->price - $c->discount_price) * 100) / $c->price) . '%'; ?></span></span></div>
                        @endif
                        @if($c['level_tags'] == 'trending')
                        <div class="advance-badge">
                            <span class="badge bg-warning">{{__('Trending')}}</span>
                        </div>
                        @endif
                        @if($c['level_tags'] == 'featured')

                        <div class="advance-badge">
                            <span class="badge bg-danger">{{__('Featured')}}</span>
                        </div>
                        @endif
                        @if($c['level_tags'] == 'new')

                        <div class="advance-badge">
                            <span class="badge bg-success">{{__('New')}}</span>
                        </div>
                        @endif
                        @if($c['level_tags'] == 'onsale')

                        <div class="advance-badge">
                            <span class="badge bg-info">{{__('Onsale')}}</span>
                        </div>
                        @endif
                        @if($c['level_tags'] == 'bestseller')

                        <div class="advance-badge">
                            <span class="badge bg-success">{{__('Bestseller')}}</span>
                        </div>
                        @endif
                        @if($c['level_tags'] == 'beginner')

                        <div class="advance-badge">
                            <span class="badge bg-primary">{{__('Beginner')}}</span>
                        </div>
                        @endif
                        @if($c['level_tags'] == 'intermediate')

                        <div class="advance-badge">
                            <span class="badge bg-secondary">{{__('Intermediate')}}</span>
                        </div>
                        @endif
                        

                        <div class="view-dtl">
                            <div class="view-heading"><a
                                    href="{{ route('user.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}">{{ str_limit($c->title, $limit = 30, $end = '...') }}</a>
                            </div>
                            <div class="user-name">
                                <h6>By <span><a href="{{ route('all/profile',$c->user->id) }}"> {{ optional($c->user)['fname'] }}</a></span></h6>
                            </div>
                            <div class="rating">
                                <ul>
                                    <li>
                                        <?php 
                                            $learn = 0;
                                            $price = 0;
                                            $value = 0;
                                            $sub_total = 0;
                                            $sub_total = 0;
                                            $reviews = App\ReviewRating::where('course_id',$c->id)->get();
                                            ?>
                                        @if(!empty($reviews[0]))
                                        <?php
                                            $count =  App\ReviewRating::where('course_id',$c->id)->count();

                                            foreach($reviews as $review){
                                                $learn = $review->price*5;
                                                $price = $review->price*5;
                                                $value = $review->value*5;
                                                $sub_total = $sub_total + $learn + $price + $value;
                                            }

                                            $count = ($count*3) * 5;
                                            $rat = $sub_total/$count;
                                            $ratings_var = ($rat*100)/5;
                                            ?>

                                        <div class="pull-left">
                                            <div class="star-ratings-sprite"><span
                                                    style="width:<?php echo $ratings_var; ?>%"
                                                    class="star-ratings-sprite-rating"></span>
                                            </div>
                                        </div>


                                        @else
                                        <div class="pull-left">{{ __('No Rating') }}</div>
                                        @endif
                                    </li>
                                    <!-- overall rating-->
                                    <?php 
                                        $learn = 0;
                                        $price = 0;
                                        $value = 0;
                                        $sub_total = 0;
                                        $count =  count($reviews);
                                        $onlyrev = array();

                                        $reviewcount = App\ReviewRating::where('course_id', $c->id)->WhereNotNull('review')->get();

                                        foreach($reviews as $review){

                                            $learn = $review->learn*5;
                                            $price = $review->price*5;
                                            $value = $review->value*5;
                                            $sub_total = $sub_total + $learn + $price + $value;
                                        }

                                        $count = ($count*3) * 5;
                                         
                                        if($count != "" && $count != '0')
                                        {
                                            $rat = $sub_total/$count;
                                     
                                            $ratings_var = ($rat*100)/5;
                                   
                                            $overallrating = ($ratings_var/2)/10;
                                        }
                                         
                                        ?>

                                    @php
                                    $reviewsrating = App\ReviewRating::where('course_id', $c->id)->first();
                                    @endphp
                                    @if(!empty($reviewsrating))
                                    <!-- <li>
                                            <b>{{ round($overallrating, 1) }}</b>
                                        </li> -->
                                    @endif
                                    <li class="reviews">
                                        (@php
                                        $data = App\ReviewRating::where('course_id', $c->id)->count();
                                        if($data>0){

                                        echo $data;
                                        }
                                        else{

                                        echo "0";
                                        }
                                        @endphp Reviews)
                                    </li>

                                </ul>
                            </div>
                            <div class="view-footer">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="count-user">
                                            <i data-feather="user"></i><span>
                                                @php
                                                $data = App\Order::where('course_id', $c->id)->count();
                                                if(($data)>0){

                                                echo $data;
                                                }
                                                else{

                                                echo "0";
                                                }
                                                @endphp</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        @if( $c->type == 1)
                                        <div class="rate text-right">
                                            <ul>

                                                @if($c->discount_price == !NULL)

                                                <li><a><b>{{ activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :'' }}{{ price_format( currency($c['discount_price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false)) }}{{ activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :'' }}</b></a>
                                                </li>

                                                <li><a><b><strike>{{ activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :'' }}{{ price_format( currency($c['price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false) ) }}{{ activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :'' }}</strike></b></a>
                                                </li>


                                                @else

                                                @if($c->price == !NULL)
                                                <li><a><b>{{ activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :'' }}{{ price_format( currency($c['price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false) ) }}{{ activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :'' }}</b></a>
                                                </li>
                                                @endif

                                                @endif
                                            </ul>
                                        </div>
                                        @else
                                        <div class="rate text-right">
                                            <ul>
                                                <li><a><b>{{ __('Free') }}</b></a></li>
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>



                            <div class="img-wishlist">
                                <div class="protip-wishlist">
                                    <ul>

                                        <li class="protip-wish-btn"><a
                                                href="https://calendar.google.com/calendar/r/eventedit?text={{ $c['title'] }}"
                                                target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                        @if(Auth::check())

                                        <li class="protip-wish-btn"><a class="compare" data-id="{{filter_var($c->id)}}"
                                                title="compare"><i data-feather="bar-chart"></i></a></li>

                                        @php
                                        $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id',
                                        $c->id)->first();
                                        @endphp
                                        @if ($wish == NULL)
                                        <li class="protip-wish-btn">
                                            <form id="demo-form2" method="post"
                                                action="{{ url('show/wishlist', $c->id) }}" data-parsley-validate
                                                class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                <input type="hidden" name="course_id" value="{{$c->id}}" />

                                                <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i
                                                        data-feather="heart"></i></button>
                                            </form>
                                        </li>
                                        @else
                                        <li class="protip-wish-btn-two">
                                            <form id="demo-form2" method="post"
                                                action="{{ url('remove/wishlist', $c->id) }}" data-parsley-validate
                                                class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                <input type="hidden" name="course_id" value="{{$c->id}}" />

                                                <button class="wishlisht-btn heart-fill" title="Remove from Wishlist"
                                                    type="submit"><i data-feather="heart"></i></button>
                                            </form>
                                        </li>
                                        @endif
                                        @else
                                        <li class="protip-wish-btn"><a href="{{ route('login') }}" title="heart"><i
                                                    data-feather="heart"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div id="prime-next-item-description-block{{$c->id}}" class="prime-description-block">
                    <div class="prime-description-under-block">
                        <div class="prime-description-under-block">
                            <h5 class="description-heading">{{ $c['title'] }}</h5>
                            <div class="main-des">
                                <p>Last Updated: {{ date('jS F Y', strtotime($c->updated_at)) }}</p>
                            </div>

                            <ul class="description-list">
                                <li>
                                    <i data-feather="play-circle"></i>
                                    <div class="class-des">
                                        {{ __('Classes') }}:
                                        @php
                                        $data = App\CourseClass::where('course_id', $c->id)->count();
                                        if($data > 0){

                                        echo $data;
                                        }
                                        else{

                                        echo "0";
                                        }
                                        @endphp
                                    </div>
                                </li>
                                &nbsp;
                                <li>
                                    <div>
                                        <div class="time-des">
                                            <span class="">
                                                <i data-feather="clock"></i>
                                                @php

                                                $classtwo = App\CourseClass::where('course_id',
                                                $c->id)->sum("duration");

                                                @endphp
                                                {{ $classtwo }} Minutes
                                            </span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="lang-des">
                                        @if($c['language_id'] == !NULL)
                                        @if(isset($c->language))
                                        <i data-feather="globe"></i> {{ $c->language['name'] }}
                                        @endif
                                        @endif
                                    </div>
                                </li>

                            </ul>

                            <div class="product-main-des">
                                <p>{{ $c->short_detail }}</p>
                            </div>
                            <div>
                                @if($c->whatlearns->isNotEmpty())
                                @foreach($c->whatlearns as $wl)
                                @if($wl->status ==1)
                                <div class="product-learn-dtl">
                                    <ul>
                                        <li><i
                                                data-feather="check-circle"></i>{{ str_limit($wl['detail'], $limit = 120, $end = '...') }}
                                        </li>
                                    </ul>
                                </div>
                                @endif
                                @endforeach
                                @endif
                            </div>
                            <div class="des-btn-block">
                                <div class="row">
                                    <div class="col-lg-8">
                                        @if($c->type == 1)
                                        @if(Auth::check())
                                        @if(Auth::User()->role == "admin")
                                        <div class="protip-btn">
                                            <a href="{{ route('course.content',['id' => $c->id, 'slug' => $c->slug ]) }}"
                                                class="btn btn-secondary"
                                                title="course">{{ __('Go To Course') }}</a>
                                        </div>
                                        @else
                                        @php
                                        $order = App\Order::where('user_id', Auth::User()->id)->where('course_id',
                                        $c->id)->first();
                                        @endphp
                                        @if(!empty($order) && $order->status == 1)
                                        <div class="protip-btn">
                                            <a href="{{ route('course.content',['id' => $c->id, 'slug' => $c->slug ]) }}"
                                                class="btn btn-secondary"
                                                title="course">{{ __('Go To Course') }}</a>
                                        </div>
                                        @else
                                        @php
                                        $cart = App\Cart::where('user_id', Auth::User()->id)->where('course_id',
                                        $c->id)->first();
                                        @endphp
                                        @if(!empty($cart))
                                        <div class="protip-btn">
                                            <form id="demo-form2" method="post"
                                                action="{{ route('remove.item.cart',$cart->id) }}">
                                                {{ csrf_field() }}

                                                <div class="box-footer">
                                                    <button type="submit"
                                                        class="btn btn-primary">{{ __('Remove From Cart') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                        @else
                                        <div class="protip-btn">
                                            <form id="demo-form2" method="post"
                                                action="{{ route('addtocart',['course_id' => $c->id, 'price' => $c->price, 'discount_price' => $c->discount_price ]) }}"
                                                data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="category_id"
                                                    value="{{$c->category['id'] ?? '-'}}" />

                                                <div class="box-footer">
                                                    <button type="submit"
                                                        class="btn btn-primary"><i data-feather="shopping-cart"></i>{{ __('Add To Cart') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                        @endif
                                        @endif
                                        @endif
                                        @else
                                        @if($gsetting->guest_enable == 1)
                                        <form id="demo-form2" method="post"
                                            action="{{ route('guest.addtocart', $c->id) }}" data-parsley-validate
                                            class="form-horizontal form-label-left">
                                            {{ csrf_field() }}


                                            <div class="box-footer">
                                                <button type="submit" class="btn btn-primary"><i data-feather="shopping-cart"></i>&nbsp;{{ __('Add To Cart') }}</button>
                                            </div>
                                        </form>

                                        @else

                                        <div class="protip-btn">
                                            <a href="{{ route('login') }}" class="btn btn-primary"><i data-feather="shopping-cart"></i>&nbsp;{{ __('Add To Cart') }}</a>
                                        </div>
                                        @endif
                                        @endif
                                        @else
                                        @if(Auth::check())
                                        @if(Auth::User()->role == "admin")
                                        <div class="protip-btn">
                                            <a href="{{ route('course.content',['id' => $c->id, 'slug' => $c->slug ]) }}"
                                                class="btn btn-secondary"
                                                title="course">{{ __('Go To Course') }}</a>
                                        </div>
                                        @else
                                        @php
                                        $enroll = App\Order::where('user_id', Auth::User()->id)->where('course_id',
                                        $c->id)->first();
                                        @endphp
                                        @if($enroll == NULL)
                                        <div class="protip-btn">
                                            <a href="{{url('enroll/show',$c->id)}}" class="btn btn-primary"
                                                title="Enroll Now"><i data-feather="shopping-cart"></i>{{ __('Enroll Now') }}</a>
                                        </div>
                                        @else
                                        <div class="protip-btn">
                                            <a href="{{ route('course.content',['id' => $c->id, 'slug' => $c->slug ]) }}"
                                                class="btn btn-secondary"
                                                title="Cart">{{ __('Go To Course') }}</a>
                                        </div>
                                        @endif
                                        @endif
                                        @else
                                        <div class="protip-btn">
                                            <a href="{{ route('login') }}" class="btn btn-primary"
                                                title="Enroll Now"><i data-feather="shopping-cart"></i>{{ __('Enroll Now') }}</a>
                                        </div>
                                        @endif
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="img-wishlist">
                                            <div class="protip-wishlist">
                                                <ul>
                                                    @if(Auth::check())

                                                    @php
                                                    $wish = App\Wishlist::where('user_id',
                                                    Auth::User()->id)->where('course_id', $c->id)->first();
                                                    @endphp
                                                    @if ($wish == NULL)
                                                    <li class="protip-wish-btn">
                                                        <form id="demo-form2" method="post"
                                                            action="{{ url('show/wishlist', $c->id) }}"
                                                            data-parsley-validate
                                                            class="form-horizontal form-label-left">
                                                            {{ csrf_field() }}

                                                            <input type="hidden" name="user_id"
                                                                value="{{Auth::User()->id}}" />
                                                            <input type="hidden" name="course_id" value="{{$c->id}}" />

                                                            <button class="wishlisht-btn" title="Add to wishlist"
                                                                type="submit"><i data-feather="heart"></i></button>
                                                        </form>
                                                    </li>
                                                    @else
                                                    <li class="protip-wish-btn-two">
                                                        <form id="demo-form2" method="post"
                                                            action="{{ url('remove/wishlist', $c->id) }}"
                                                            data-parsley-validate
                                                            class="form-horizontal form-label-left">
                                                            {{ csrf_field() }}

                                                            <input type="hidden" name="user_id"
                                                                value="{{Auth::User()->id}}" />
                                                            <input type="hidden" name="course_id" value="{{$c->id}}" />

                                                            <button class="wishlisht-btn heart-fill" title="Remove from Wishlist"
                                                                type="submit"><i data-feather="heart"></i></button>
                                                        </form>
                                                    </li>
                                                    @endif
                                                    @else
                                                    <li class="protip-wish-btn"><a href="{{ route('login') }}"
                                                            title="heart"><i data-feather="heart"></i></a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>

    </div>
</section>
@endif
<!-- Students end -->

<!-- Jobs Portal Start -->
@if( !$cors->isEmpty() && $hsetting->featured_enable)
<section id="student" class="student-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-7">
                <h4 class="student-heading">{{ __('Jobs') }}</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-5">
                <div class="view-button txt-rgt">
                    <a href="https://jobs.koresearch.net" class="btn btn-secondary" title="All Jobs">{{__('All Jobs')}}<i data-feather="chevrons-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div id="jobs-view-slider" class="student-view-slider-main-block owl-carousel">
            @foreach($jobs as $job)
            {{-- @if($c->status == 1 && $c->featured == 1) --}}
            <div class="item student-view-block student-view-block-1 border shadow">
                <div class="genre-slide-image @if($gsetting['course_hover'] == 1) protip @endif"
                    data-pt-placement="outside" data-pt-interactive="false"
                    data-pt-title="#prime-next-item-description-block">
                    <div class="view-block">
                        <div class="view-dtl">
                            <div class="row ">
                                <div class="col-12 basis-50 pl-3">
                                    <div class="view-heading">
                                        <a href="{{ route('job.show',['id' => $job->id]) }}" style="font-size: 16px; font-weight: bold"><i class="fa fa-briefcase" style="font-size:15px; margin-right:11px; " ></i>{{ str_limit($job->job_title, $limit = 25, $end = '...') }}</a>
                                    </div>
                                    <div class="user-name">
                                        <h6 style="font-weight: 500; font-size:12px;"><i class="fa fa-building" style="font-size: 16px; margin-right: 10px;"></i> <span><a href="#"> {{ $job->company_name }}</a></span></h6>
                                    </div>
                                    <div class="user-name">
                                        {{-- <h6 style="font-weight: 500; font-size:12px;"><i class="fa fa-map-marker rgt-10" style="font-size: 16px;"></i> <span><a href="#"> {!! str_limit($job->location, 30, "...") !!}</a></span></h6> --}}
                                        <h6 class="d-flex" style="font-weight: 500; font-size:12px;"><img  style="width: 12px; margin-right:15px" src="{{ asset('images/icons/lo.png') }}" height="14px" alt=""> <span><a href="#"> {!! str_limit($job->location, 30, "...") !!}</a></span></h6>
                                    </div>
                                    <div class="user-name">
                                        <h6 style="font-weight: 500; font-size:12px;"><i class="fa fa-list" style="font-size: 15px; margin-right: 8px;"></i> <span><a href="#"> {!! str_limit($job->employment_type, 30, "...") !!}</a></span></h6>
                                    </div>
                                </div>
                                <div class="basis-50 d-flex justify-content-center">
                                    <img class="ml-2 " style="width: 60px; height:60px;" src="https://jobs.koresearch.net/public/storage/{{ $job->company_image}}"class="bg_img img-fluid"/>
                                    
                                </div>
                                <div class="col-12">
                                    <ul class="border-top pt-2" style="overflow:hidden;">
                                        <li class="pr-2">{!! str_limit(strip_tags($job->description), 70, "...") !!}</li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="view-footer mb-3">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <div class="protip-btn">
                                            <a href="https://jobs.koresearch.net/job/{{ $job->id}}" class="btn btn-primary"
                                                title="Apply Now"><i class="fa fa-eye rgt-10"></i>{{ __('View Job') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @endif --}}
            @endforeach
        </div>

    </div>
</section>
@endif
<!-- Jobs Portal End -->


<!-- Advertisement -->
@if(isset($advs))
@foreach($advs as $adv)
@if($adv->position == 'belowrecent')
<br>
<section id="student" class="student-main-block btm-40">
    <div class="container-xl">
        <a href="{{ $adv->url1 }}" title="{{ __('Click to visit') }}">
            <img class="lazy img-fluid advertisement-img-one" data-src="{{ url('images/advertisement/'.$adv->image1) }}"
                alt="{{ $adv->image1 }}">
        </a>
    </div>
</section>
@endif

@endforeach

@endif
<!-- Advertisement -->

<!-- testimonial start -->
@if($hsetting->testimonial_enable == 1 && ! $testi->isEmpty() )
<section id="testimonial" class="testimonial-main-block ">
    <div class="container-xl">
        <h4>{{ __('Testimonial') }}</h4>
        <div id="testimonial-slider" class="testimonial-slider-main-block owl-carousel">
            @foreach($testi as $tes)
            <div class="item testi-block text-center">
                <div class="testi-block-images">
                    <img src="{{ url('images/testimonial/testimonial.png') }}" class="img-fluid" alt=""> 
                </div>
                <div class="testi-block-one">
                    <div class="testi-img text-center ">
                        <img data-src="{{ asset('images/testimonial/'.$tes['image']) }}" alt="blog" class="img-fluid owl-lazy">
                    </div>
                    <div class="testi-dtl text-center">
                        <div class="testi-name">
                            <h5 class="testi-heading mb-1">{{ $tes['client_name'] }}</h5>
                            <p class="testi-para p-0">{{ $tes['designation'] }}</p>
                        </div>
                        <div class="testi-rating mb-2">
                            @for($i = 1; $i <= 5; $i++) @if($i<=$tes->rating)
                                <i class='fa fa-star' style='color:orange'></i>
                                @else
                                <i class='fa fa-star' style='color:#ccc'></i>
                                @endif
                            @endfor
                        </div>
                        <p>{{ str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($tes->details))) , $limit = 300, $end = '...') }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@if($hsetting->service_enable == 1 && ! $services->isEmpty() && isset($servicesetting) )
<section id="services" class="services-main-block">
    <div class="container-xl">
        <h4>{{ __('Our Service') }}</h4>
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="service-side-img">
                    @if($servicesetting['image'] == !NULL)
                    <img src="{{ asset('images/services/'.$servicesetting['image']) }}" class="img-fluid" alt="">
                    @else
                    <img src="{{ Avatar::create($servicesetting->title)->toBase64() }}" class="img-fluid" alt="">
                    @endif
                    <div class="overlay-bg"></div>
                </div>
                <div class="service-side-dtl text-center">
                    <h3 class="service-heading mb-4">{{ $servicesetting->title }}</h3>
                    <p class="mb-4">{{ str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($servicesetting->detail))) , $limit = 300, $end = '...') }}</p>
                    <a href="{{ route('front.service') }}" type="button" class="btn btn-primary mt-2" title="View More">{{ __('View More') }} <i data-feather="chevrons-right"></i></a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="row">
                    @foreach($services as $ser)
                    <div class="col-lg-4 col-md-6">
                        <div class="service-block">
                            <div class="service-img text-center">
                                @if($ser['image'] == !NULL)
                                    <img src="{{ asset('images/services/'.$ser['image']) }}" class="img-fluid" alt="">
                                @else
                                    <img src="{{ Avatar::create($ser->title)->toBase64() }}" class="img-fluid" alt="">
                                @endif
                            </div>
                            <div class="service-dtl text-center">
                                <h5 class="service-heading mb-2">{{ $ser->title }}</h5>
                                <p>{{ str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($ser->detail))) , $limit = 80, $end = '...') }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- testimonial end -->
<!-- Advertisement -->
@if(isset($advs))
@foreach($advs as $adv)
@if($adv->position == 'belowtestimonial')
<br>
<section id="student" class="student-main-block btm-40">
    <div class="container-xl">
        <a href="{{ $adv->url1 }}" title="{{ __('Click to visit') }}">
            <img class="lazy img-fluid advertisement-img-one" data-src="{{ url('images/advertisement/'.$adv->image1) }}"
                alt="{{ $adv->image1 }}">
        </a>
    </div>
</section>
@endif
@endforeach
@endif



<section id="student" class="student-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-7">
                <h4 class="student-heading">{{ __('Trusted By') }}</h4>
            </div>
        </div>
        <div id="brands-images" class="student-view-slider-main-block owl-carousel">
            <div class="brand-img">
                <img src={{ asset('images/brandlist/d21.jpg')}} alt="Image">
            </div>
            <div class="brand-img">
                <img src={{ asset('images/brandlist/ict-division.png')}} alt="Image">
            </div>
            <div class="brand-img">
                <img src={{ asset('images/brandlist/Shwapno.jpg')}} alt="Image">
            </div>
            <div class="brand-img">
                <img src={{ asset('images/brandlist/Jago_FM_94.4.png')}} alt="Image">
            </div>
            <div class="brand-img">
                <img src={{ asset('images/brandlist/aci.jpg')}} alt="Image">
            </div>
            <div class="brand-img">
                <img src={{ asset('images/brandlist/Maasranga_Television.jpg')}} alt="Image">
            </div>
            <div class="brand-img">
                <img src={{ asset('images/brandlist/Six_Seasons.png')}} alt="Image">
            </div>
            <div class="brand-img">
                <img src={{ asset('images/brandlist/reserve_it.png')}} alt="Image">
            </div>
        </div>
    </div>
</section>
<!-- Free Course End -->

{{-- <section id="trusted">
    <div class="container-xl">
        <h6 class="patners-heading btm-40">{{ __('Trusted By') }}</h6>
        <div class="brand-image">
            <div id="brands" class="owl-carousel">
                <div class="brand-img">
                    <img src={{ asset('images/brandlist/ks_brands_logos.png')}} alt="Image">
                </div>
            </div>
        </div>
    </div>
</section> --}}

<section id="trusted" class="trusted-main-block">
    <!-- google adsense code -->
    <div class="container-fluid" id="adsense">
        @php
        $ad = App\Adsense::first();
        @endphp
        <?php
            if (isset($ad) ) {
             if ($ad->ishome==1 && $ad->status==1) {
                $code = $ad->code;
                echo html_entity_decode($code);
             }
            }
        ?>
    </div>
</section>


@endsection

@section('custom-script')

    

<script>
    (function ($) {
        "use strict";
        $(function () {
            $("#home-tab").trigger("click");
        });
    })(jQuery);

    function showtab(id) {
        $.ajax({
            type: 'GET',
            url:'{{ url('/tabcontent') }}/' + id,
            dataType: 'json',
            success: function (data) {

                $('.btn_more').html(data.btn_view);
                $('#tabShow').html(data.tabview);

            }
        });
    }
</script>

<script src="{{ url('js/colorbox-script.js')}}"></script>


<script>
    "use Strict";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function () {
        $('.compare').on('click', function (e) {
            var id = $(this).data('id');
            $.ajax({
                type: "POST",
                dataType: "json",
                url: 'compare/dataput',
                data: {
                    id: id
                },
                success: function (data) {}
            });
        });
    });
</script>

<script>
    $(document).ready(function(){
        /* Get iframe src attribute value i.e. YouTube video url
        and store it in a variable */
        var url = $("#elearningVideo").attr('src');
        
        /* Assign empty url value to the iframe src attribute when
        modal hide, which stop the video playing */
        $("#video_modal").on('hide.bs.modal', function(){
            $("#elearningVideo").attr('src', '');
        });
        
        /* Assign the initially stored url back to the iframe src
        attribute when modal is displayed again */
        $("#video_modal").on('show.bs.modal', function(){
            $("#elearningVideo").attr('src', url);
        });
    });
    </script>

@endsection