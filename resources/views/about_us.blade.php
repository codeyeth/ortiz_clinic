@extends('layouts.public_app')

@section('content')

<div class="home d-flex flex-column align-items-start justify-content-end">
    <!-- <div class="background_image" style="background-image:url(images/about.jpg)"></div> -->
    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ asset ('drpro/images/about_1.jpg') }}" data-speed="0.8"></div>
    <div class="home_overlay"><img src="{{ asset ('drpro/images/home_overlay.png') }}" alt=""></div>
    <div class="home_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="home_content">
                        <div class="home_title">About us</div>
                        <div class="home_text">The Ortiz Medical Skin Clinic</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="intro">
    <div class="container">
        <div class="row">
            
            <!-- Intro Content -->
            <div class="col-lg-8">
                <div class="intro_content">
                    <div class="section_title_container">
                        <div class="section_subtitle">This is Ortiz Medical Skin Clinic</div>
                        <div class="section_title"><h2>Welcome to our Clinic</h2></div>
                    </div>
                    <div class="intro_text">
                        <p>
                            Owned and managed by spouses Doctors Paul Ed and Jennifer Ortiz under SEC Registration number for 11 years now. The clinic specializes in Aesthetic Dermatology and Cosmetic Surgery. 
                            It has 11 branches now and with several branches for expansion in the future. 
                            Number of personnel is around 60-70 now with 34 OJTs rotating in these branches. Its head office is located at Third Floor, Puregold Araneta Center, Quezon City.
                        </p>   
                    </div>
                    
                    <!-- Milestones -->
                    <div class="milestones">
                        <div class="row milestones_row">
                            
                            <!-- Milestone -->
                            <div class="col-md-3 milestone_col">
                                <div class="milestone">
                                    <div class="milestone_counter" data-end-value="10000" data-sign-before="+">0</div>
                                    <div class="milestone_text">Satisfied Patients</div>
                                </div>
                            </div>
                            
                            <!-- Milestone -->
                            <div class="col-md-3 milestone_col">
                                <div class="milestone">
                                    <div class="milestone_counter" data-end-value="50" data-sign-after="+">0</div>
                                    <div class="milestone_text">Services</div>
                                </div>
                            </div>
                            
                            <!-- Milestone -->
                            <div class="col-md-3 milestone_col">
                                <div class="milestone">
                                    <div class="milestone_counter" data-end-value="718">0</div>
                                    <div class="milestone_text">Injectibles</div>
                                </div>
                            </div>
                            
                            <!-- Milestone -->
                            <div class="col-md-3 milestone_col">
                                <div class="milestone">
                                    <div class="milestone_counter" data-end-value="5">0</div>
                                    <div class="milestone_text">Awards Won</div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <!-- Intro Image -->
            <div class="col-lg-3 offset-lg-1">
                <div class="intro_image"><img src="{{ asset ('drpro/images/intro_1.jpg') }}" alt=""></div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonials -->

<div class="testimonials">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <div class="section_subtitle">This is Ortiz</div>
                    <div class="section_title"><h2>Clients Testimonials</h2></div>
                </div>
            </div>
        </div>
        <div class="row testimonials_row">
            <div class="col">
                <div class="quote d-flex flex-column align-items-center justify-content-center ml-auto mr-auto"><img src="{{ asset ('drpro/images/quote.png') }}" alt=""></div>
                
                <!-- Testimonials Slider -->
                <div class="test_slider_container">
                    <div class="owl-carousel owl-theme test_slider">
                        
                        <!-- Slide -->
                        @if( count($testimonialList) > 0 )
                        @foreach($testimonialList as $testimonial_list)
                        <div class="owl-item">
                            <div class="test_item text-center">
                                <div class="test_text">
                                    <p>
                                        {{ Str::title($testimonial_list->testimonial) }}
                                    </p>    
                                </div>
                                <div class="test_info d-flex flex-row align-items-center justify-content-center">
                                    {{-- <div class="test_image"><img src="{{ asset ('drpro/images/test.jpg') }}" alt=""></div> --}}
                                    <div class="test_text">{{ $testimonial_list->client_name }} <span> - {{ $testimonial_list->service_purchased }}</span></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('inc.calling_number')


<!-- Team -->

<div class="team">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <div class="section_subtitle">This is Ortiz Medical Skin Clinic</div>
                    <div class="section_title"><h2>Meet the Doctors</h2></div>
                </div>
            </div>
        </div>
        <div class="row team_row">
            
            <!-- Team Item -->
            <div class="col-lg-6 team_col">
                <div class="team_item text-center d-flex flex-column aling-items-center justify-content-end">
                    <div class="team_image"><img src="{{ asset ('drpro/images/team_1.jpg') }}" alt=""></div>
                    <div class="team_content text-center">
                        <div class="team_name"><a href="#">Dr. Paul Ortiz</a></div>
                        <div class="team_title">Plastic Surgeon</div>
                        <div class="team_text">
                            <p>Odio ultrices ut. Etiam ac erat ut enim maximus accumsan vel ac nisl. Duis feugiat bibendum orci, non elementum urna.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Team Item -->
            <div class="col-lg-6 team_col">
                <div class="team_item text-center d-flex flex-column aling-items-center justify-content-end">
                    <div class="team_image"><img src="{{ asset ('drpro/images/team_2.jpg') }}" alt=""></div>
                    <div class="team_content text-center">
                        <div class="team_name"><a href="#">Dr Jean Ortiz</a></div>
                        <div class="team_title">Plastic Surgeon</div>
                        <div class="team_text">
                            <p>Ultrices ut. Etiam ac erat ut enim maximus accumsan vel ac nisl. Duis feugiat bibendum orci, non elementum urna.</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection