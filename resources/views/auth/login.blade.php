<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Ortiz Skin Clinic V.2 Website">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset ('drpro/styles/bootstrap-4.1.2/bootstrap.min.css') }}">
    <link href="{{ asset ('drpro/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('drpro/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('drpro/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('drpro/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link href="{{ asset ('drpro/plugins/jquery-datepicker/jquery-ui.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset ('drpro/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('drpro/styles/responsive.css') }}">
</head>
<body>
    <div class="super_container">
        
        <div class="intro">
            <div class="container">
                <div class="row">
                    
                    <!-- Intro Content -->
                    <div class="col-lg-6 intro_col">
                        <div class="intro_content">
                            <div class="section_title_container">
                                <div class="section_subtitle"><a href="{{ asset ('/') }}"> This is Ortiz Medical Skin Clinic </a> </div>
                                <div class="section_title"><h2>Welcome to our Clinic</h2></div>
                            </div>
                            <div class="intro_text">
                                <p>
                                    Owned and managed by spouses Doctors Paul Ed and Jennifer Ortiz under SEC Registration number for 11 years now. The clinic specializes in Aesthetic Dermatology and Cosmetic Surgery. It has 11 branches now and with several branches for expansion in the future. Number of personnel is around 60-70 now with 34 OJTs rotating in these branches. Its head office is located at Third Floor, Puregold Araneta Center, Quezon City.
                                </p>
                            </div>
                            
                        </div>
                    </div>
                    
                    <!-- Intro Form -->
                    <div class="col-lg-6 intro_col">
                        <div class="intro_form_container">
                            <div class="intro_form_title">Login | 
                                <a href="{{ asset ('/') }}" style="color: white;" title="Home"><i class="fa fa-home"></i></a> 
                            </div>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                
                                <div class="d-flex flex-row align-items-start justify-content-between flex-wrap">
                                    
                                    @if ($errors->has('email'))
                                    <strong>{{ $errors->first('email') }}</strong>
                                    @endif
                                    
                                    @if ($errors->has('password'))
                                    <strong>{{ $errors->first('password') }}</strong>
                                    @endif
                                    
                                    <input id="email" type="email" id="email" class="intro_input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email/Username" value="{{ old('email') }}" required autofocus>
                                    
                                    <input id="password" type="password" class="intro_input{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>
                                    
                                </div>
                                <button class="button button_1 intro_button trans_200">Continue</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>
    
    <script src="{{ asset ('drpro/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset ('drpro/styles/bootstrap-4.1.2/popper.js') }}"></script>
    <script src="{{ asset ('drpro/styles/bootstrap-4.1.2/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('drpro/plugins/greensock/TweenMax.min.js') }}"></script>
    <script src="{{ asset ('drpro/plugins/greensock/TimelineMax.min.js') }}"></script>
    <script src="{{ asset ('drpro/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset ('drpro/plugins/greensock/animation.gsap.min.js') }}"></script>
    <script src="{{ asset ('drpro/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset ('drpro/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset ('drpro/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset ('drpro/plugins/parallax-js-master/parallax.min.js') }}"></script>
    <script src="{{ asset ('drpro/plugins/jquery-datepicker/jquery-ui.js') }}"></script>
    <script src="{{ asset ('drpro/js/custom.js') }}"></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        
        gtag('config', 'UA-23581568-13');
    </script>
    
    <script>
        window.onload = function(){
            $('#modalPromptOnLoad').modal('show');
        }
    </script>
    
</body>
</html>