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
    <meta property="og:image" content="{{ asset('images/logo/' . $gsetting['logo']) }}">
    <meta itemprop="image" content="{{ asset('images/logo/' . $gsetting['logo']) }}">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="{{ asset('images/logo/' . $gsetting['logo']) }}">
    <meta property="twitter:title" content="{{ $gsetting['project_title'] }} ">
    <meta property="twitter:description" content="{{ $gsetting['meta_data_desc'] }}">
    <meta name="twitter:site" content="{{ url()->full() }}" />
    <link rel="canonical" href="{{ url()->full() }}" />
    <meta name="robots" content="all">
    <meta name="keywords" content="{{ $gsetting->meta_data_keyword }}">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    

    <style>
        
    </style>
@endsection


<!-- home start -->

<section>
    <div class="hero_section">
        <div class="info-container">
            <h1 class="text-white fw-bold font">Let's Start Learning</h1>
            <p class="text-uppercase mt-2 text-white font-p">Explore a variety of fresh topics</p>

            <!-- Search Bar -->
            <div class="search-bar">
                <select>
                    <option>Select</option>
                    <option>Option 1</option>
                    <option>Option 2</option>
                </select>
                <input type="text" placeholder="Keyword">
                <button>
                    <i class="fas fa-search"></i> <span class="searchNone">Search</span>
                </button>
            </div>

            <div class="count-section">
                <div class="count-box">
                    <i class="fas fa-graduation-cap"></i>
                    <div class="count-info">
                        <p>Courses</p>
                        <strong>1245+</strong>
                    </div>
                </div>

                <div class="count-box">
                    <i class="fas fa-briefcase"></i>
                    <div class="count-info">
                        <p>Vacancy</p>
                        <strong>215+</strong>
                    </div>
                </div>

                <div class="count-box">
                    <i class="fas fa-building"></i>
                    <div class="count-info">
                        <p>Company</p>
                        <strong>451+</strong>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="category-section">
    <div class="container-xl">
        <div class="d-flex justify-content-between">
            <h2 class="section-title">Our Category</h2>
            <button class="view-more-btn">View More</button>
        </div>

        <div class="category-grid">
            <div class="category-item" id="finance">
                <i class="category-icon fas fa-coins"></i>
                <span>Finance</span>
            </div>
            <div class="category-item" id="supply-chain">
                <i class="category-icon fas fa-truck"></i>
                <span>Supply Chain</span>
            </div>
            <div class="category-item" id="sales-marketing">
                <i class="category-icon fas fa-users"></i>
                <span>Sales & Marketing</span>
            </div>
            <div class="category-item" id="office-essential">
                <i class="category-icon fas fa-folder"></i>
                <span>Office Essential</span>
            </div>
            <div class="category-item" id="ngo">
                <i class="category-icon fas fa-hands-helping"></i>
                <span>NGO</span>
            </div>
            <div class="category-item" id="hr">
                <i class="category-icon fas fa-user-tie"></i>
                <span>HR</span>
            </div>
            <div class="category-item" id="customer-relation">
                <i class="category-icon fas fa-handshake"></i>
                <span>Customer Relation</span>
            </div>
            <div class="category-item" id="it-software">
                <i class="category-icon fas fa-laptop-code"></i>
                <span>IT & Software</span>
            </div>
            <div class="category-item" id="creative">
                <i class="category-icon fas fa-lightbulb"></i>
                <span>Creative</span>
            </div>
            <div class="category-item" id="soft-skills">
                <i class="category-icon fas fa-brain"></i>
                <span>Soft Skills</span>
            </div>
            <div class="category-item" id="agro">
                <i class="category-icon fas fa-seedling"></i>
                <span>Agro</span>
            </div>
            <div class="category-item" id="pharma">
                <i class="category-icon fas fa-pills"></i>
                <span>Pharma</span>
            </div>
        </div>

    </div>
</section>


<section class="course-section">
    <div class="container-xl">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="section-title">Free Courses</h2>
            <button class="view-more-btn">View More</button>
        </div>

        <div class="filter-option d-flex">
            <p>Finance</p>
            <p style="margin-left: 15px">Supply Chain</p>
            <p style="margin-left: 15px">Sales & Marketing</p>
            <p style="margin-left: 15px">Office Essential</p>
            <p style="margin-left: 15px">NGO</p>
            <p style="margin-left: 15px">HR</p>
            <p style="margin-left: 15px">Customer Relation</p>
            <p style="margin-left: 15px">IT & Software</p>
            <p style="margin-left: 15px">Other</p>
        </div>

        <hr class="m-0">


        <div class="filter-btn d-flex my-4">
            <button>2023</button>
            <button style="margin-left: 15px">2024</button>
            <button style="margin-left: 15px">2025</button>
        </div>

        <!-- Swiper Slider -->
        <div class="swiper-container course-slider mt-4">
            <div class="swiper-wrapper row">
                <!-- Course Card 1 -->
                <div class="swiper-slide col-12 col-md-3">
                    <div class="course-card">
                        <img src="{{ asset('images/category/1684926129Asset 15.png') }}" alt="Course Image">
                        <span class="onsale-badge">Onsale</span>
                        <div class="course-content">
                            <h4>Supply Chain Management (2023)</h4>
                            <div class="d-flex justify-content-between mb-2">
                                <p><strong>4500 Tk/M</strong> <del style="font-size: 13px">5500 Tk/M</del></p>
                                <p>3 months</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="enroll-btn">Enroll Now</button>
                                <i style="font-size: 25px" class="fas fa-bell"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Course Card 2 -->
                <div class="swiper-slide col-12 col-md-3">
                    <div class="course-card">
                        <img src="{{ asset('images/category/1684926129Asset 15.png') }}" alt="Course Image">
                        <span class="onsale-badge">Onsale</span>
                        <div class="course-content">
                            <h4>Supply Chain Management (2023)</h4>
                            <div class="d-flex justify-content-between mb-2">
                                <p><strong>4500 Tk/M</strong> <del style="font-size: 13px">5500 Tk/M</del></p>
                                <p>3 months</p>
                            </div>
                             <div class="d-flex justify-content-between">
                                <button class="enroll-btn">Enroll Now</button>
                                <i style="font-size: 25px" class="fas fa-bell"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Course Card 3 -->
                <div class="swiper-slide col-12 col-md-3">
                    <div class="course-card">
                        <img src="{{ asset('images/category/1684926129Asset 15.png') }}" alt="Course Image">
                        <span class="onsale-badge">Onsale</span>
                        <div class="course-content">
                            <h4>Management Accounting Essential</h4>
                            <div class="d-flex justify-content-between mb-2">
                                <p><strong>4500 Tk/M</strong> <del style="font-size: 13px">5500 Tk/M</del></p>
                                <p>3 months</p>
                            </div>
                             <div class="d-flex justify-content-between">
                                <button class="enroll-btn">Enroll Now</button>
                                <i style="font-size: 25px" class="fas fa-bell"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Course Card 4 -->
                <div class="swiper-slide col-12 col-md-3">
                    <div class="course-card">
                        <img src="{{ asset('images/category/1684926129Asset 15.png') }}" alt="Course Image">
                        <span class="onsale-badge">Onsale</span>
                        <div class="course-content">
                            <h4>Management Accounting Essential</h4>
                            <div class="d-flex justify-content-between mb-2">
                                <p><strong>4500 Tk/M</strong> <del style="font-size: 13px">5500 Tk/M</del></p>
                                <p>3 months</p>
                            </div>
                             <div class="d-flex justify-content-between">
                                <button class="enroll-btn">Enroll Now</button>
                                <i style="font-size: 25px" class="fas fa-bell"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slider Navigation -->
            {{-- <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div> --}}
        </div>
    </div>
</section>


<section class="jobs-section">
    <div class="container-xl">
        <div class="d-flex job_btn justify-content-between align-items-center mb-3">
            <h2 class="section-title">Recent Job</h2>
            <div>
                <button class="view-more-btn">Remote</button>
                <button class="view-more-btn">Hybrid</button>
                <button class="view-more-btn">On site</button>
            </div>
        </div>

        <div class="row gap-3 mt-4">
            <div class="col-12 col-md-4">
                <div class="job-card p-3">
                    <p class="job-title">Performance Design & Analytics Expert Research Medical Officer</p>
                    <div class="d-flex mt-3">
                        <img width="50" height="55" src="{{ asset('images/home/job1.png') }}" alt="">
                        <div style="margin-left: 20px;">
                            <p style="margin-left: 10px;" class="fw-bold">Galaxy Industry</p>
                            <p>BY Kore Search</p>
                        </div>
                    </div>

                    <hr>

                    <p class="job-des">Key Responsibilities: Develop and maintain web applications using Laravel, ensuring...</p>

                    <div class="d-flex mt-4">
                        <i class="fas fa-money"></i> 
                        <p class="job-salary"><span class="fw-bold">Salary :</span> 50000৳-60000৳ </p>
                    </div>

                    <div class="d-flex mt-3">
                        <div class="d-flex">
                            <i class="fas fa-briefcase"></i> 
                            <p class="ms-2" style="margin-left: 10px;">Full time</p>
                        </div>
                        <div class="d-flex" style="margin-left: 20px;">
                            <i class="fas fa-location-arrow"></i> 
                            <p class="ms-2" style="margin-left: 10px;">Dhaka</p>
                        </div>
                        <div class="d-flex" style="margin-left: 20px;">
                             <i class="fas fa-graduation-cap"></i> 
                            <p class="ms-2" style="margin-left: 10px;">Bachelor</p>
                        </div>
                    </div>

                    <hr>

                    <div class="mt-4 d-flex justify-content-between">
                        <div class="d-flex mt-2">
                            <i class="fas fa-clock-o"></i> 
                            <p class="job-salary"><span class="fw-bold">Deadline :</span> 24 Apr, 25 </p>
                        </div>
                        <button class="view-detailsBtn">View details</button>
                    </div>

                </div>

            </div>
            <div class="col-12 col-md-4">
                <div class="job-card p-3">
                    <p class="job-title">Performance Design & Analytics Expert Research Medical Officer</p>
                    <div class="d-flex mt-3">
                        <img width="50" height="55" src="{{ asset('images/home/job1.png') }}" alt="">
                        <div style="margin-left: 20px;">
                            <p style="margin-left: 10px;" class="fw-bold">Galaxy Industry</p>
                            <p>BY Kore Search</p>
                        </div>
                    </div>

                    <hr>

                    <p class="job-des">Key Responsibilities: Develop and maintain web applications using Laravel, ensuring...</p>

                    <div class="d-flex mt-4">
                        <i class="fas fa-money"></i> 
                        <p class="job-salary"><span class="fw-bold">Salary :</span> 50000৳-60000৳ </p>
                    </div>

                    <div class="d-flex mt-3">
                        <div class="d-flex">
                            <i class="fas fa-briefcase"></i> 
                            <p class="ms-2" style="margin-left: 10px;">Full time</p>
                        </div>
                        <div class="d-flex" style="margin-left: 20px;">
                            <i class="fas fa-location-arrow"></i> 
                            <p class="ms-2" style="margin-left: 10px;">Dhaka</p>
                        </div>
                        <div class="d-flex" style="margin-left: 20px;">
                             <i class="fas fa-graduation-cap"></i> 
                            <p class="ms-2" style="margin-left: 10px;">Bachelor</p>
                        </div>
                    </div>

                    <hr>

                    <div class="mt-4 d-flex justify-content-between">
                        <div class="d-flex mt-2">
                            <i class="fas fa-clock-o"></i> 
                            <p class="job-salary"><span class="fw-bold">Deadline :</span> 24 Apr, 25 </p>
                        </div>
                        <button class="view-detailsBtn">View details</button>
                    </div>

                </div>

            </div>
            <div class="col-12 col-md-4">
                <div class="job-card p-3">
                    <p class="job-title">Performance Design & Analytics Expert Research Medical Officer</p>
                    <div class="d-flex mt-3">
                        <img width="50" height="55" src="{{ asset('images/home/job1.png') }}" alt="">
                        <div style="margin-left: 20px;">
                            <p style="margin-left: 10px;" class="fw-bold">Galaxy Industry</p>
                            <p>BY Kore Search</p>
                        </div>
                    </div>

                    <hr>

                    <p class="job-des">Key Responsibilities: Develop and maintain web applications using Laravel, ensuring...</p>

                    <div class="d-flex mt-4">
                        <i class="fas fa-money"></i> 
                        <p class="job-salary"><span class="fw-bold">Salary :</span> 50000৳-60000৳ </p>
                    </div>

                    <div class="d-flex mt-3">
                        <div class="d-flex">
                            <i class="fas fa-briefcase"></i> 
                            <p class="ms-2" style="margin-left: 10px;">Full time</p>
                        </div>
                        <div class="d-flex" style="margin-left: 20px;">
                            <i class="fas fa-location-arrow"></i> 
                            <p class="ms-2" style="margin-left: 10px;">Dhaka</p>
                        </div>
                        <div class="d-flex" style="margin-left: 20px;">
                             <i class="fas fa-graduation-cap"></i> 
                            <p class="ms-2" style="margin-left: 10px;">Bachelor</p>
                        </div>
                    </div>

                    <hr>

                    <div class="mt-4 d-flex justify-content-between">
                        <div class="d-flex mt-2">
                            <i class="fas fa-clock-o"></i> 
                            <p class="job-salary"><span class="fw-bold">Deadline :</span> 24 Apr, 25 </p>
                        </div>
                        <button class="view-detailsBtn">View details</button>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>

<section class="success-section">
    <div class="container-xl">
        <h2 class="section-title">Success Story</h2>
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="testimonial-card">
                    <div class="d-flex">
                        <img src="{{ asset('images/home/user1.png') }}" alt="Shorif" class="testimonial-img">
                        <div style="margin-left: 20px;">
                            <h3 class="name">Shorif Molla</h3>
                            <p style="font-size: 13px; margin-top: -10px;">Head of Corporate HR, Admin & Legal Affairs-Expo Group Bangladesh</p>
                        </div>
                    </div>
                    <p class="message mt-2">"In the current competitive job market, any student/fresher needs to stand out from the crowd by coaching, mentoring and gaining knowledge from the Industries' Subject Matter Experts to be successful.."</p>
                    <img src="{{ asset('images/home/company1.png') }}" alt="Razorpay" class="company-logo">
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="testimonial-card">
                    <div class="d-flex">
                        <img src="{{ asset('images/home/user1.png') }}" alt="Shorif" class="testimonial-img">
                        <div style="margin-left: 20px;">
                            <h3 class="name">Shorif Molla</h3>
                            <p style="font-size: 13px; margin-top: -10px;">Head of Corporate HR, Admin & Legal Affairs-Expo Group Bangladesh</p>
                        </div>
                    </div>
                    <p class="message mt-2">"In the current competitive job market, any student/fresher needs to stand out from the crowd by coaching, mentoring and gaining knowledge from the Industries' Subject Matter Experts to be successful.."</p>
                    <img src="{{ asset('images/home/company1.png') }}" alt="Razorpay" class="company-logo">
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="testimonial-card">
                    <div class="d-flex">
                        <img src="{{ asset('images/home/user1.png') }}" alt="Shorif" class="testimonial-img">
                        <div style="margin-left: 20px;">
                            <h3 class="name">Shorif Molla</h3>
                            <p style="font-size: 13px; margin-top: -10px;">Head of Corporate HR, Admin & Legal Affairs-Expo Group Bangladesh</p>
                        </div>
                    </div>
                    <p class="message mt-2">"In the current competitive job market, any student/fresher needs to stand out from the crowd by coaching, mentoring and gaining knowledge from the Industries' Subject Matter Experts to be successful.."</p>
                    <img src="{{ asset('images/home/company1.png') }}" alt="Razorpay" class="company-logo">
                </div>
            </div>
        </div>
    </div>
</section>


<!-- home end -->

<!-- testimonial start -->

<section id="testimonial" class="testimonial-main-block">
    <div class="container-xl">
        <p class="text-center">{{ __('Testimonial') }}</p>
        <h2 class="text-center my-3">Trusted by Industry Leaders</h2>
        <div id="testimonial-slider" class="testimonial-slider-main-block owl-carousel">
            @foreach ($testi as $tes)
                <div class="item testi-block text-center">
                    <div class="testi-block-images">
                        <img src="{{ url('images/testimonial/testimonial.png') }}" class="img-fluid"
                            alt="">
                    </div>
                    <div class="testi-block-one">
                        <div class="testi-img text-center ">
                            <img data-src="{{ asset('images/testimonial/' . $tes['image']) }}" alt="blog"
                                class="img-fluid owl-lazy">
                        </div>
                        <div class="testi-dtl text-center">
                            <div class="testi-name">
                                <h5 class="testi-heading mb-1">{{ $tes['client_name'] }}</h5>
                                <p class="testi-para p-0">{{ $tes['designation'] }}</p>
                            </div>
                            <div class="testi-rating mb-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $tes->rating)
                                        <i class='fa fa-star' style='color:orange'></i>
                                    @else
                                        <i class='fa fa-star' style='color:#ccc'></i>
                                    @endif
                                @endfor
                            </div>
                            <p>{{ str_limit(preg_replace("/\r\n|\r|\n/", '', strip_tags(html_entity_decode($tes->details))), $limit = 300, $end = '...') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- testimonial end -->


<section id="" class="trusted-section">
    <div class="container-xl">
        <div class="">
            <h4 class="text-center">{{ __('Trusted By') }}</h4>
        </div>
        <p class="mt-4 text-center">Lorem ipsum dolor sit amet consectetur. Convallis dolor sem diam enim. Habitasse nunc tortor viverra turpis. Bibendum nulla.</p>
        <div class="brand-image-wrapper mt-3">
            <div class="brand-img">
                <img src="{{ asset('images/brandlist/d21.jpg') }}" alt="Image">
            </div>
            <div class="brand-img">
                <img src="{{ asset('images/brandlist/ict-division.png') }}" alt="Image">
            </div>
            <div class="brand-img">
                <img src="{{ asset('images/brandlist/Shwapno.jpg') }}" alt="Image">
            </div>
            <div class="brand-img">
                <img src="{{ asset('images/brandlist/Jago_FM_94.4.png') }}" alt="Image">
            </div>
            <div class="brand-img">
                <img src="{{ asset('images/brandlist/aci.jpg') }}" alt="Image">
            </div>
            <div class="brand-img">
                <img src="{{ asset('images/brandlist/Maasranga_Television.jpg') }}" alt="Image">
            </div>
            <div class="brand-img">
                <img src="{{ asset('images/brandlist/Six_Seasons.png') }}" alt="Image">
            </div>
            <div class="brand-img">
                <img src="{{ asset('images/brandlist/reserve_it.png') }}" alt="Image">
            </div>
            <div class="brand-img">
                <img src="{{ asset('images/brandlist/aci.jpg') }}" alt="Image">
            </div>
            <div class="brand-img">
                <img src="{{ asset('images/brandlist/reserve_it.png') }}" alt="Image">
            </div>
             <div class="brand-img">
                <img src="{{ asset('images/brandlist/ict-division.png') }}" alt="Image">
            </div>
            <div class="brand-img">
                <img src="{{ asset('images/brandlist/Shwapno.jpg') }}" alt="Image">
            </div>
            <div class="brand-img">
                <img src="{{ asset('images/brandlist/reserve_it.png') }}" alt="Image">
            </div>
           
        </div>
    </div>
</section>



@endsection

@section('custom-script')

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<script>
document.addEventListener("DOMContentLoaded", function () {
    var swiper = new Swiper(".course-slider", {
        slidesPerView: 4,
        // spaceBetween: 0,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            1024: { slidesPerView: 4 },
            768: { slidesPerView: 1 },
            480: { slidesPerView: 1 }
        }
    });
});
</script>


<script>
    (function($) {
        "use strict";
        $(function() {
            $("#home-tab").trigger("click");
        });
    })(jQuery);

    function showtab(id) {
        $.ajax({
            type: 'GET',
            url: '{{ url('/tabcontent') }}/' + id,
            dataType: 'json',
            success: function(data) {

                $('.btn_more').html(data.btn_view);
                $('#tabShow').html(data.tabview);

            }
        });
    }
</script>

<script src="{{ url('js/colorbox-script.js') }}"></script>


<script>
    "use Strict";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function() {
        $('.compare').on('click', function(e) {
            var id = $(this).data('id');
            $.ajax({
                type: "POST",
                dataType: "json",
                url: 'compare/dataput',
                data: {
                    id: id
                },
                success: function(data) {}
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        /* Get iframe src attribute value i.e. YouTube video url
        and store it in a variable */
        var url = $("#elearningVideo").attr('src');

        /* Assign empty url value to the iframe src attribute when
        modal hide, which stop the video playing */
        $("#video_modal").on('hide.bs.modal', function() {
            $("#elearningVideo").attr('src', '');
        });

        /* Assign the initially stored url back to the iframe src
        attribute when modal is displayed again */
        $("#video_modal").on('show.bs.modal', function() {
            $("#elearningVideo").attr('src', url);
        });
    });
</script>

@endsection
