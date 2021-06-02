@extends('layouts.public_app')

@section('content')

<!-- Home -->

<div class="home d-flex flex-column align-items-start justify-content-end">
    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ asset ('drpro/images/contact_1.jpg') }}" data-speed="0.8"></div>
    <div class="home_overlay"><img src="{{ asset ('drpro/images/home_overlay.png') }}" alt=""></div>
    <div class="home_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="home_content">
                        <div class="home_title">Contact</div>
                        <div class="home_text">Reach us now! For the Better and Glowing you.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact -->

<div class="contact">
    <div class="container">
        <div class="row">
            
            <!-- Contact Form -->
            <div class="col-lg-6">
                <div class="contact_form_container">
                    <div class="contact_form_title">Make an Appointment</div>
                    @livewire('public-make-appointment')
                    
                </div>
            </div>
            
            <!-- Contact Content -->
            <div class="col-lg-5 offset-lg-1 contact_col">
                <div class="contact_content">
                    <div class="contact_content_title">Get in touch with us</div>
                    <div class="contact_content_text">
                        <p>Contact us through the Following lines below.</p>
                    </div>
                    <div class="direct_line d-flex flex-row align-items-center justify-content-start">
                        <div class="direct_line_title text-center">Direct Line</div>
                        <div class="direct_line_num text-center">(02) 546 7861</div>
                    </div>
                    <div class="contact_info">
                        <ul>
                            <li class="d-flex flex-row align-items-start justify-content-start">
                                <div>Main Office</div>
                                <div>3F Puregold Araneta Cubao, Quezon City Landmark: Across Farmers Plaza</div>
                            </li>
                            <li class="d-flex flex-row align-items-start justify-content-start">
                                <div>Phone</div>
                                <div>(0921) 519-3724</div>
                            </li>
                            <li class="d-flex flex-row align-items-start justify-content-start">
                                <div>E-mail</div>
                                <div>pauledortiz@yahoo.com</div>
                            </li>
                        </ul>
                    </div>
                    <div class="contact_social">
                        <ul class="d-flex flex-row align-items-center justify-content-start">
                            <li><a href="https://www.facebook.com/holykingortizzonavskinclinic" target="_blank" ><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.instagram.com/ortizskinclinic_official/" target="_blank" ><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UCDaDe3YVGNDHb36yzfp0vPA" target="_blank" ><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- <div class="row google_map_row">
            <div class="col">
                
                <!-- Contact Map -->
                
                <div class="contact_map">
                    
                    <!-- Google Map -->
                    
                    <div class="map">
                        <div id="google_map" class="google_map">
                            <div class="map_container">
                                <div id="map"></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div> --}}
        
    </div>
</div>

@endsection