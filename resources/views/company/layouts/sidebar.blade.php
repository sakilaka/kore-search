<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Navigationbar -->

        <div class="navigationbar">

            <div class="vertical-menu-detail">

                <div class="tab-content" id="v-pills-tabContent">

                    <div class="tab-pane fade active show" id="v-pills-dashboard" role="tabpanel"
                        aria-labelledby="v-pills-dashboard">
                        @if (Auth::User()->role == 'company')
                            <ul class="vertical-menu">
                                <div class="logobar">
                                    <a href="{{ url('/') }}" class="logo logo-large">
                                        <img style="object-fit:scale-down;"
                                            src="{{ url('images/logo/' . $gsetting->logo) }}" class="img-fluid"
                                            alt="logo">
                                    </a>
                                </div>


                                <li class="{{ Nav::isRoute('company_dashboard') }}">
                                    <a class="nav-link" href="{{ route('company_dashboard') }}">
                                        <i class="feather icon-box text-secondary"></i>
                                        <span>{{ __('Dashboard') }}</span>
                                    </a>
                                </li>
                                <!-- dashboard end -->
                                {{-- <li class="header">{{ __('JOB') }}</li> --}}

                                <!-- Course start  -->

                                <li
                                    class="{{ Nav::isResource('category') }} {{ Nav::isResource('subcategory') }} {{ Nav::isResource('childcategory') }} {{ Nav::isResource('course') }} {{ Nav::isResource('courselang') }}">
                                    <a href="javaScript:void();">
                                        <i class="feather icon-book text-secondary"></i>
                                        <span>{{ __('Job') }}</span><i class="feather icon-chevron-right"></i>
                                    </a>

                                    <ul class="vertical-submenu">
                                        <li class="{{ Nav::isResource('course') }}">
                                            <a href="{{ url('company/job_index') }}">{{ __('Index') }}</a>
                                        </li>
                                        <li class="{{ Nav::isResource('course') }}">
                                            <a href="{{ url('company/job-create') }}">{{ __('Create') }}</a>
                                        </li>
                                    </ul> 

                                </li>
                                {{-- <li
                                    class="{{ Nav::isResource('category') }} {{ Nav::isResource('subcategory') }} {{ Nav::isResource('childcategory') }} {{ Nav::isResource('course') }} {{ Nav::isResource('courselang') }}">
                                    <a href="javaScript:void();">
                                        <i class="feather icon-book text-secondary"></i>
                                        <span>{{ __('Course') }}</span><i class="feather icon-chevron-right"></i>
                                    </a>
                                    <ul class="vertical-submenu">

                                        <li
                                            class="{{ Nav::isResource('category') }} {{ Nav::isResource('subcategory') }} {{ Nav::isResource('childcategory') }} {{ Nav::isResource('course') }} {{ Nav::isResource('courselang') }} {{ Nav::isRoute('assignment.view') }}">
                                            @if ($gsetting->cat_enable == 1)
                                                <a href="javaScript:void();">
                                                    <i class=""></i> <span>{{ __('Category') }}</span><i
                                                        class="feather icon-chevron-right"></i>
                                                </a>
                                                <ul class="vertical-submenu">

                                                    <li class="{{ Nav::isResource('category') }}">
                                                        <a href="{{ url('category') }}">{{ __('Category') }}</a>
                                                    </li>

                                                    <li class="{{ Nav::isResource('subcategory') }}">
                                                        <a href="{{ url('subcategory') }}">{{ __('SubCategory') }}</a>
                                                    </li>

                                                    <li class="{{ Nav::isResource('childcategory') }}">
                                                        <a
                                                            href="{{ url('childcategory') }}">{{ __('ChildCategory') }}</a>
                                                    </li>

                                                </ul>
                                            @endif
                                        <li class="{{ Nav::isResource('course') }}">
                                            <a href="{{ url('course') }}">{{ __('Course') }}</a>
                                        </li>
                                        <li class="{{ Nav::isRoute('courses.reject') }}">
                                            <a href="{{ route('courses.reject') }}">{{ __('RejectedCourses') }}</a>
                                        </li>
                                        <li class="{{ Nav::isResource('courselang') }}">
                                            <a href="{{ url('courselang') }}">{{ __('Course') }}
                                                {{ __('Language') }}</a>
                                        </li>
                                        @if ($gsetting->assignment_enable == 1)
                                            <li class="{{ Nav::isRoute('assignment.view') }}">
                                                <a href="{{ route('assignment.view') }}">{{ __('Assignment') }}</a>
                                            </li>
                                        @endif

                                        <li class="{{ Nav::isRoute('quiz.review') }}"><a
                                                href="{{ route('quiz.review') }}"><span>{{ __('QuizReview') }}</span></a>
                                        </li>


                                </li> --}}
                        @endif
                    </div>

                </div>

            </div>
        </div>
        <!-- End Navigation-bar -->
    </div>
    <!-- End Sidebar -->
</div>
