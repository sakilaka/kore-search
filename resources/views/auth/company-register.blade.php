@extends('theme.master')
@section('title', 'Sign Up')
@section('content')
@include('admin.message')
<!-- Signup start-->
<section id="signup" class="signup-block-main-block register-page">
    <div class="container">
        <div class="login-signup">
            <div class="row no-gutters">
                <div class="col-lg-6 col-md-6">
                    <div class="signup-side-block">
                        <img src="{{ url('images/login/login.png')}}" class="img-fluid" alt="">
                        <div class="login-img">
                            <img src="{{ url('/images/login/'.$gsetting->img) }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="signup-heading">
                        
                        {{ $gsetting->text }}

                        <div class="signup-block">
                            <form class="signup-form" method="POST" action="{{ route('company_register.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <i data-feather="user"></i>
                                            <input type="text" class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}" name="company" value="{{ old('company') }}" id="company" placeholder="Company Name">
                                            @if ($errors->has('company'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('company') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select name="company_type" class="form-control" id="">
                                                <option value="" selected disabled>Select type</option>
                                                <option value="Govt">Govt</option>
                                                <option value="StartUp">StartUp</option>
                                                <option value="Software">Software Development</option>
                                            </select>
                                            @if ($errors->has('company-type'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('company-type') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select name="employee_size" class="form-control" id="">
                                                <option value="" selected disabled>Select Size</option>
                                                <option value="1-14">1-14</option>
                                                <option value="15-30">15-30</option>
                                                <option value="31-50">31-50</option>
                                            </select>
                                            @if ($errors->has('employee_size'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('employee_size') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <select name="industry" class="form-control" id="">
                                                <option value="" selected disabled>Select Industry</option>
                                                <option value="Education">Education</option>
                                                <option value="Engineering">Engineering</option>
                                                <option value="Food_service">Food service</option>
                                            </select>
                                            @if ($errors->has('industry'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('industry') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                            
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <i data-feather="mail"></i>
                                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="email" placeholder="Email">
                                            @if($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        @if($gsetting->mobile_enable == 1)
                                        <div class="form-group">
                                            <i data-feather="phone"></i>
                                            <input type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" id="mobile" placeholder="Mobile">
                                            @if($errors->has('mobile'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('mobile') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <i data-feather="lock"></i>
                                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="Password">
                                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <i data-feather="lock"></i>
                                            <span toggle="#password-confirm" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                        </div>
                                    </div>
                                </div>
                                @if($gsetting->captcha_enable == 1)
                                <div class="{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                    <div class="text-center">
                                        {!! app('captcha')->display() !!}
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <br>
                                @endif
                                
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="term" id="term" required>

                                        <label class="form-check-label" for="term">
                                            <div class="signin-link text-center btm-20">
                                                <b>{{ __('I agree to ') }}<a href="{{url('terms_condition')}}" title="Policy">{{ __('Terms&Condition') }} </a>, <a href="{{url('privacy_policy')}}" title="Policy">{{ __('PrivacyPolicy') }}.</a></b>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" title="Sign Up" class="btn btn-primary">{{ __('Signup') }}</button> 
                                
                            </form>

                            <div class="social-link btm-10">
                                <h2><span>Or Sign Up Using</span></h2>
                                <div class="row">
                                    @if($gsetting->fb_login_enable == 1)
                                    <div class="col-lg-2 col-4">
                                        <a href="{{ url('/auth/facebook') }}" target="_blank" title="facebook" class="social-icon facebook-icon" title="Facebook"><i class="fa fa-facebook"></i></a>
                                    </div>
                                    @endif       
                                    @if($gsetting->google_login_enable == 1)
                                    <div class="col-lg-2 col-4">
                                        <div class="google">
                                            <a href="{{ url('/auth/google') }}" target="_blank" title="google" class="social-icon google-icon" title="google"><i class="fab fa-google-plus-g"></i></a>
                                        </div>
                                    </div>
                                    @endif
                                    @if($gsetting->amazon_enable == 1)
                                    <div class="col-lg-2 col-4">
                                        <div class="signin-link amazon-button">
                                            <a href="{{ url('/auth/amazon') }}" target="_blank" title="amazon" class="social-icon amazon-icon" title="Amazon"><i class="fab fa-amazon"></i></a>
                                        </div>
                                    </div>
                                    @endif

                                    @if($gsetting->linkedin_enable == 1)
                                    <div class="col-lg-2 col-4"> 
                                        <div class="signin-link linkedin-button">
                                            <a href="{{ url('/auth/linkedin') }}" target="_blank" title="linkedin" class="social-icon linkedin-icon" title="Linkedin"><i class="fab fa-linkedin"></i></a>
                                        </div>
                                    </div>
                                    @endif

                                    @if($gsetting->twitter_enable == 1)
                                    <div class="col-lg-2 col-4">
                                        <div class="signin-link twitter-button">
                                            <a href="{{ url('/auth/twitter') }}" target="_blank" title="twitter" class="social-icon twitter-icon" title="Twitter"><i class="fab fa-twitter"></i></a>
                                        </div>
                                    </div>
                                    @endif

                                    @if($gsetting->gitlab_login_enable == 1)
                                    <div class="col-lg-2 col-4">
                                        <div class="signin-link btm-10">
                                            <a href="{{ url('/auth/gitlab') }}" target="_blank" title="gitlab" class="social-icon gitlab-icon" title="gitlab"><i class="fab fa-gitlab"></i></a>
                                        </div>
                                    </div>
                                    @endif
                                </div>  
                            </div>
                            <div class="sign-up text-center">{{ __('Alreadyhaveanaccount') }}?<a href="{{ route('company_login') }}" title="sign-up"> {{ __('Login') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Signup end-->

@endsection
