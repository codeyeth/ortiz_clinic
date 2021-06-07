@extends('layouts.public_app')

@section('content')

<div class="home">
    
    <!-- Home Slider -->
    <div class="home_slider_container">
        <div class="owl-carousel owl-theme home_slider">
            
            <!-- Slide -->
            <div class="owl-item">
                <div class="background_image" style="background-image:url({{ asset ('drpro/images/slider_1.jpeg')}})"></div>
                <div class="home_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_content">
                                    <div class="home_subtitle">First in the Philippines in</div>
                                    <div class="home_title">Aesthetic <small>Medicine</small></div>
                                    <div class="home_text">
                                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p> --}}
                                    </div>
                                    <div class="home_buttons d-flex flex-row align-items-center justify-content-start">
                                        <div class="button button_1 trans_200"><a href="{{ asset ('services') }}">read more</a></div>
                                        <div class="button button_2 trans_200"><a href="{{ asset ('/contact') }}">make an appointment</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide -->
            <div class="owl-item">
                <div class="background_image" style="background-image:url({{ asset ('drpro/images/slider_3.jpg')}})"></div>
                <div class="home_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_content">
                                    <div class="home_subtitle">Services</div>
                                    <div class="home_title">Signature Facial</div>
                                    <div class="home_text">
                                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p> --}}
                                    </div>
                                    <div class="home_buttons d-flex flex-row align-items-center justify-content-start">
                                        <div class="button button_1 trans_200"><a href="{{ asset ('services') }}">read more</a></div>
                                        <div class="button button_2 trans_200"><a href="{{ asset ('/contact') }}">make an appointment</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide -->
            <div class="owl-item">
                <div class="background_image" style="background-image:url({{ asset ('drpro/images/slider_4.jpg')}})"></div>
                <div class="home_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_content">
                                    <div class="home_subtitle">Services</div>
                                    <div class="home_title">Eyebrow Tattoo</div>
                                    <div class="home_text">
                                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p> --}}
                                    </div>
                                    <div class="home_buttons d-flex flex-row align-items-center justify-content-start">
                                        <div class="button button_1 trans_200"><a href="{{ asset ('services') }}">read more</a></div>
                                        <div class="button button_2 trans_200"><a href="{{ asset ('/contact') }}">make an appointment</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <!-- Home Slider Dots -->
        
        <div class="home_slider_dots">
            <ul id="home_slider_custom_dots" class="home_slider_custom_dots d-flex flex-row align-items-center justify-content-start">
                <li class="home_slider_custom_dot trans_200 active"></li>
                <li class="home_slider_custom_dot trans_200"></li>
                <li class="home_slider_custom_dot trans_200"></li>
            </ul>
        </div>
        
    </div>
</div>

<!-- Intro -->

<div class="intro">
    <div class="container">
        <div class="row">
            
            <!-- Intro Content -->
            <div class="col-lg-6 intro_col">
                <div class="intro_content">
                    <div class="section_title_container">
                        <div class="section_subtitle">This is Ortiz Medical Skin Clinic</div>
                        <div class="section_title"><h2>Welcome to our Clinic</h2></div>
                    </div>
                    <div class="intro_text">
                        <p>
                            Owned and managed by spouses Doctors Paul Ed and Jennifer Ortiz under SEC Registration number for 11 years now. The clinic specializes in Aesthetic Dermatology and Cosmetic Surgery. It has 11 branches now and with several branches for expansion in the future. Number of personnel is around 60-70 now with 34 OJTs rotating in these branches. Its head office is located at Third Floor, Puregold Araneta Center, Quezon City.
                        </p>
                    </div>
                    <div class="milestones">
                        <div class="row milestones_row">
                            
                            <!-- Milestone -->
                            <div class="col-md-4 milestone_col">
                                <div class="milestone">
                                    <div class="milestone_counter" data-end-value="10000" data-sign-before="+">0</div>
                                    <div class="milestone_text">Satisfied Patients</div>
                                </div>
                            </div>
                            
                            <!-- Milestone -->
                            <div class="col-md-5 milestone_col">
                                <div class="milestone">
                                    <div class="milestone_counter" data-end-value="50" data-sign-after="+">0</div>
                                    <div class="milestone_text">Services Available</div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Make Appointment -->
            <div class="col-lg-6 intro_col">
                <div class="intro_form_container">
                    <div class="intro_form_title">Make an Appointment</div>
                    
                    @livewire('public-make-appointment')
                    
                </div>
            </div>
        </div>
        
    </div>
</div>

<!-- Why Choose Us -->

<div class="why">
    <!-- <div class="background_image" style="background-image:url(images/why.jpg)"></div> -->
    <div class="container">
        <div class="row row-eq-height">
            
            <!-- Why Choose Us Image -->
            <div class="col-lg-6 order-lg-1 order-2">
                <div class="why_image_container">
                    <div class="why_image"><img src="{{ asset ('drpro/images/why_1.jpg') }}" alt=""></div>
                </div>
            </div>
            
            <!-- Why Choose Us Content -->
            <div class="col-lg-6 order-lg-2 order-1">
                <div class="why_content">
                    <div class="section_title_container">
                        <div class="section_subtitle">This is Ortiz</div>
                        <div class="section_title"><h2>Why choose us?</h2></div>
                    </div>
                    <div class="why_text">
                        <p>
                            We offer affordable and quality medical dermatology to the public.
                            Quality and affordable dermatological services and products readily available to the public in aesthetic clinics manned by service oriented trained personnel.
                        </p>
                    </div>
                    <div class="why_list">
                        <ul>
                            
                            <!-- Why List Item -->
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="icon_container d-flex flex-column align-items-center justify-content-center">
                                    <div class="icon"><img src="{{ asset ('drpro/images/icon_1.svg') }}" alt="https://www.flaticon.com/authors/prosymbols"></div>
                                </div>
                                <div class="why_list_content">
                                    <div class="why_list_title">Only Top Products</div>
                                    <div class="why_list_text">Only Offers the Effective and Reliable Skin Products</div>
                                </div>
                            </li>
                            
                            <!-- Why List Item -->
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="icon_container d-flex flex-column align-items-center justify-content-center">
                                    <div class="icon"><img src="{{ asset ('drpro/images/icon_2.svg') }}" alt="https://www.flaticon.com/authors/prosymbols"></div>
                                </div>
                                <div class="why_list_content">
                                    <div class="why_list_title">The best Doctors</div>
                                    <div class="why_list_text">Managed and Manned by Professional Doctors</div>
                                </div>
                            </li>
                            
                            <!-- Why List Item -->
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="icon_container d-flex flex-column align-items-center justify-content-center">
                                    <div class="icon"><img src="{{ asset ('drpro/images/icon_2.svg') }}" alt="https://www.flaticon.com/authors/prosymbols"></div>
                                </div>
                                <div class="why_list_content">
                                    <div class="why_list_title">Trained Personnel</div>
                                    <div class="why_list_text">You will be handled by Trained Personnel that Excels in the task</div>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Call to action -->

@include('inc.calling_number')


<!-- Services -->

<div class="services">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title_container">
                    <div class="section_subtitle">This is Ortiz</div>
                    <div class="section_title"><h2>Most Availed Services</h2></div>
                </div>
            </div>
        </div>
        <div class="row services_row">
            
            @if( count($servicesList) > 0)
            @foreach ($servicesList as $services_list)
            
            <div class="col-xl-4 col-md-6 service_col">
                <div class="service text-center">
                    <div class="service">
                        <div class="icon_container d-flex flex-column align-items-center justify-content-center ml-auto mr-auto">
                            <div class="icon"><img src="{{ asset ('drpro/images/icon_4.svg')}}" alt="https://www.flaticon.com/authors/prosymbols"></div>
                        </div>
                        <div class="service_title">{{ $services_list->service_name }}</div>
                        <div class="service_text">
                            <p> 
                                {!! Str::limit($services_list->description, 50) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            @endforeach
            @endif
            
        </div>
    </div>
</div>

<!-- Extra -->

<div class="extra">
    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ asset ('drpro/images/extra_1.jpeg') }}" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="extra_container d-flex flex-row align-items-start justify-content-end">
                    <div class="extra_content">
                        <div class="extra_disc d-flex flex-row align-items-end justify-content-start">
                            <div>30<span>%</span></div>
                            <div>Discount</div>
                        </div>
                        <div class="extra_title">Only in August</div>
                        <div class="extra_text">
                            <p>Nulla facilisi. Nulla egestas vel lacus sed interdum. Sed mollis, orci elementum eleifend tempor, nunc libero porttitor tellus.</p>
                        </div>
                        <div class="button button_1 extra_link trans_200"><a href="#">read more</a></div>
                    </div>
                    <div style="padding-right: 10px;"></div>
                    <div class="extra_content">
                        <div class="extra_disc d-flex flex-row align-items-end justify-content-start">
                            <div>40<span>%</span></div>
                            <div>Discount</div>
                        </div>
                        <div class="extra_title">Only in August</div>
                        <div class="extra_text">
                            <p>Nulla facilisi. Nulla egestas vel lacus sed interdum. Sed mollis, orci elementum eleifend tempor, nunc libero porttitor tellus.</p>
                        </div>
                        <div class="button button_1 extra_link trans_200"><a href="#">read more</a></div>
                    </div>
                    <div style="padding-right: 10px;"></div>
                    
                    <div class="extra_content">
                        <div class="extra_disc d-flex flex-row align-items-end justify-content-start">
                            <div>50<span>%</span></div>
                            <div>Discount</div>
                        </div>
                        <div class="extra_title">Only in August</div>
                        <div class="extra_text">
                            <p>Nulla facilisi. Nulla egestas vel lacus sed interdum. Sed mollis, orci elementum eleifend tempor, nunc libero porttitor tellus.</p>
                        </div>
                        <div class="button button_1 extra_link trans_200"><a href="#">read more</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection