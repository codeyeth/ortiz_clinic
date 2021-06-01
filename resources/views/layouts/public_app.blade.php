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

    @livewireStyles
</head>
<body>
    <div class="super_container">
        
        {{-- HEADER --}}
        @include('inc.header')
        
        
        {{-- MENU --}}
        @include('inc.menu')
        
        
        {{-- PAGE CONTENT --}}
        @yield('content')
        
        
        
        {{-- NEWSLETTER --}}
        @include('inc.newsletter')
        
        
        {{-- FOOTER --}}
        @include('inc.footer')
        
        {{-- MODAL FULL BALLOT DETAILS --}}
        <div class="modal fade" id="modalPromptOnLoad" tabindex="-1" role="dialog" aria-labelledby="modalPromptOnLoad" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Website Greetings!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <h5 style="text-align: center;">Ortiz Medical Skin Clinic is Redesigning its Website.</h6>
                        <h6 style="text-align: center;">Some Content you see is not yet Available or will be Removed in the upcoming Updates.</h6>

                        <br>

                        <h6 style="text-align: center;">If you wish to view the old Website please follow this Link <a href="https://ortizskinclinic.com/ortizproj/public/" target="_blank">Ortiz Skin Clinic</a></h6>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>

    

    @livewireScripts

    <script>
        Livewire.on('appointmentSuccess', e => {
            $('#confirmAppointmentModal').modal('show')
        })
    </script>
    
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