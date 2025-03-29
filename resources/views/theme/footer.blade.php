<footer id="footer" class="footer-main-block">

    <div class="container-xl">
        <div class="footer-block">
            <div class="row">
                @php
                    $widgets = App\WidgetSetting::first();
                @endphp
                <!-- <div class="col-lg-4 col-md-4 col-12">                   
                    <div class="footer-logo">
                        @if($gsetting->logo_type == 'L')
                            @if($gsetting->footer_logo != NULL)
                            <a href="{{ url('/') }}" title="logo"><img src="{{ asset('images/logo/'.$gsetting->footer_logo) }}" alt="logo" class="img-fluid" ></a>
                            @endif;
                        @else()
                            <a href="{{ url('/') }}"><b>{{ $gsetting->project_title }}</b></a>
                        @endif
                    </div>

                    <div class="mobile-btn">
                        @if($gsetting->play_download == '1')
                            <a href="{{ $gsetting->play_link }}" title=""><img src="{{ url('images/icons/download-google-play.png') }}" alt="logo"></a>
                        @endif
                        @if($gsetting->app_download == '1')
                            <a href="{{ $gsetting->app_link }}" title=""><img src="{{ url('images/icons/app-download-ios.png') }}" alt="logo"></a>
                        @endif
                    </div>
                </div> -->
                @if(isset($widgets) && $widgets->widget_enable == 1)

                <div class="col-lg-3 col-md-3 col-4">
                    
                    <div class="widget"><b>{{ $widgets->widget_one }}</b></div>
                    <div class="footer-link">
                        <ul>
                            @if($gsetting->instructor_enable == 1)
                                @if(Auth::check())
                                    @if(Auth::User()->role == "user")
                                    <li><a href="#" data-toggle="modal" data-target="#myModalinstructor" title="{{ __('Become An Instructor')}}">{{ __('Become An Instructor') }}</a></li>
                                    @endif
                                @else
                                    <li><a href="{{ route('login') }}" title="{{ __('Become An Instructor') }}">{{ __('Become An Instructor') }}</a></li>
                                @endif
                            @endif
                            @if(isset($widgets) && $widgets->about_enable == 1)
                            <li><a href="{{ route('about.show') }}" title="{{ __('About us') }}">{{ __('About us') }}</a></li>
                            @endif
                            @if(isset($widgets) && $widgets->career_enable == 1)
                            <li><a href="{{ route('careers.show') }}" title="{{ __('Careers') }}">{{ __('Careers') }}</a></li>
                            @endif
                            <li><a href="#" title="Become a Instractor">Become a Instractor</a></li>
                            <li><a href="#" title="Enterprise Solutions">Enterprise Solutions</a></li>
                            <li><a href="#" title="For Campus">For Campus</a></li>
                            <li><a href="#" title="Become a Partner">Become a Partner</a></li>
                            <li><a href="#" title="CSR">CSR</a></li>
                            <li><a href="#" title="Career Consultation">Career Consultation</a></li>
                            <li><a href="#" title="Resume Writing">Resume Writing</a></li>
                            <li><a href="#" title="Job Placement">Job Placement</a></li>
                            
                            @php
                            $menus = App\Menu::get();
                            $pages = App\Page::get();
                            @endphp
                            <li>
                                <ul>
                                    @foreach($menus as $menu)
                                    @if($menu->footer == 'widget2')
                                    @if($menu->link_by == 'url')
                                    <li><a href="{{ $menu->url }}">{{ $menu->title }}</a></li>
                                    @endif
                                    @if($menu->link_by == 'page')
                                    <li><a href="{{ route('page.show', $menu->page->slug) }}">{{ $menu->title }}</a></li>
                                    @endif
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-4">
                    <div class="widget"><b>{{ $widgets->widget_two }}</b></div>
                    <div class="footer-link">
                        <ul>
                            <li><a href="{{ route('footer.alumini') }}" title="{{ __('Our Alumini') }}">{{ __('Aluminis') }}</a></li>
                            @if(isset($widgets) && $widgets->blog_enable == 1)
                            <li><a href="{{ route('blog.all') }}" title="{{ __('Blog') }}">{{ __('Blog') }}</a></li>
                            @endif
                            <li><a href="#" title="Recruitment Partners">Recruitment Partners</a></li>
                            <li><a href="#" title="Youtube">Youtube</a></li>
                            <li><a href="#" title="Apprentice Program">Apprentice Program</a></li>
                            <li><a href="#" title="Industry Tour">Industry Tour</a></li>
                            <li><a href="#" title="TOT">TOT</a></li>
                            

                            {{-- @if(isset($widgets) && $widgets->help_enable == 1)
                            <li><a href="{{ route('help.show') }}" title="{{ __('Help&Support') }}">{{ __('Help&Support') }}</a></li>
                            @endif --}}
                            @php
                            $menus = App\Menu::get();
                            $pages = App\Page::get();
                            @endphp
                            <li>
                                <ul>
                                    @foreach($menus as $menu)
                                    @if($menu->footer == 'widget3')
                                    {{-- @if($menu->link_by == 'url')
                                    <li><a href="{{ $menu->url }}">{{ $menu->title }}</a></li>
                                    @endif
                                    @if($menu->link_by == 'page')
                                    <li><a href="{{ route('page.show', $menu->page->slug) }}">{{ $menu->title }}</a></li>
                                    @endif --}}
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-4">
                    <div class="widget"><b>{{ $widgets->widget_three }}</b></div>
                    <div class="footer-link">
                        <ul>
                            @if(isset($widgets) && $widgets->contact_enable == 1)
                            <li><a href="{{url('user_contact')}}" title="{{ __('Contact us') }}">{{ __('Contact us') }}</a></li>
                            @endif
                            {{-- <li><a href="{{ route('front.service') }}" title="{{ __('Our Services') }}">{{ __('Our Services') }}</a></li> --}}
                            {{-- <li><a href="{{ route('front.feature') }}" title="{{ __('Our Feature') }}">{{ __('Our Feature') }}</a></li> --}}
                            
                            <li><a href="#" title="Press">Press</a></li>
                            <li><a href="#" title="Privacy">Privacy</a></li>
                            <li><a href="#" title="Terms">Terms</a></li>
                            <li><a href="#" title="Financial Aid">Financial Aid</a></li>
                            <li><a href="#" title="Affiliate">Affiliate</a></li>
                            <li><a href="#" title="Affiliate">International Course</a></li>
                            @php
                                $pages = App\Page::get();
                            @endphp
                            
                            @if(isset($pages))
                            @foreach($pages as $page)
                                @if($page->status == 1)
                                {{-- <li><a href="{{ route('page.show', $page->slug) }}" title="{{ $page->title }}">{{ $page->title }}</a></li> --}}
                                @endif
                            @endforeach
                            @endif
                            @php
                            $menus = App\Menu::get();
                            $pages = App\Page::get();
                            @endphp
                            <li>
                                <ul>
                                    {{-- @foreach($menus as $menu)
                                    @if($menu->footer == 'widget4')
                                    @if($menu->link_by == 'url')
                                    <li><a href="{{ $menu->url }}">{{ $menu->title }}</a></li>
                                    @endif
                                    @if($menu->link_by == 'page')
                                    <li><a href="{{ route('page.show', $menu->page->slug) }}">{{ $menu->title }}</a></li>
                                    @endif
                                    @endif
                                    @endforeach --}}
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="col-lg-3 col-md-3 col-4">
                    <div class="widget"><b>Subscribe for our latest update</b></div>
                    <p class="mt-4" style="font-size: 13px;">Leave your email to get all service & news which benefit you most</p>

                    <div class="d-flex mt-4">
                        <input class="sub-email" type="email" placeholder="Enter email">
                        <button class="sub_btn">Subscribe</button>
                    </div>

                    <div class="d-flex gap-4 mt-5 social">
                        <i style="font-size: 20px;" class="text-white fab fa-facebook"></i>
                        <i style="font-size: 20px; margin-left: 20px" class="text-white fab fa-instagram"></i>
                        <i style="font-size: 20px; margin-left: 20px" class="text-white fab fa-linkedin"></i>
                        <i style="font-size: 20px; margin-left: 20px" class="text-white fab fa-twitter"></i>
                    </div>
                </div>

                @endif
                
            </div>
        </div>
    </div>

    <style>
        @media (max-width: 575.98px) { /* Extra Small (XS) */
            .img-sm-hide { display: none !important; }
            .social{
                margin-top: 2rem !important;
                margin-bottom: 1rem;
            }
        }

        @media (min-width: 576px) { /* Small (SM) and above */
            .img-lg-hide { display: none !important; }
        }
    </style>

    <div style="margin-left: 20px;">
        <img class="img-sm-hide" src="{{ asset('images/home/payment1.png') }}" alt="bkash">
        <img class="img-lg-hide" src="{{ asset('images/home/small payment.png') }}" alt="bkash">
    </div>

    <hr class="m-0">
    <div class="tiny-footer" style="background-color: #201448; height: 72px;">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-6">
                    <div class="logo-footer">
                        <ul>
                            <li>Copyright © 2023 <span class="fw-bold">KoreSearch</span> All Rights Reserved.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="copyright-social">
                        <ul>
                           
                            <li>
                                @if(isset($terms->terms) && $terms->terms != NULL && $terms->terms != '')
                                <a href="{{url('terms_condition')}}" title="{{ __('Terms & Condition') }}">{{ __('Terms & Condition') }}</a>
                                @endif
                            </li> 
                            <li>
                                @if(isset($terms->policy) && $terms->policy != NULL && $terms->policy != '')
                                <a href="{{url('privacy_policy')}}" title="{{ __('Privacy Policy') }}">{{ __('Privacy Policy') }}</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
@include('instructormodel')