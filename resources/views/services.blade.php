@extends('layouts.public_app')

@section('content')

<div class="home d-flex flex-column align-items-start justify-content-end">
    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ asset ('drpro/images/services_1.jpg') }}" data-speed="0.8"></div>
    <div class="home_overlay"><img src="{{ asset ('drpro/images/home_overlay.png') }}" alt=""></div>
    <div class="home_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="home_content">
                        <div class="home_title">Services</div>
                        <div class="home_text">Wide Choices of Services available only at Ortiz Medical Skin Clinic</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                                {!! Str::limit($services_list->description, 200) !!}
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


<div class="before_and_after">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <div class="section_subtitle">This is Dr Pro</div>
                    <div class="section_title"><h2>Before & After Gallery</h2></div>
                </div>
            </div>
        </div>
        <div class="row before_and_after_row">
            <div class="col">
                <div class="ba_container">
                    <figure class="cd-image-container">
                        <img src="{{ asset ('drpro/images/before.jpg') }}" alt="Original Image">
                        <span class="cd-image-label" data-type="original"></span>
                        
                        <div class="cd-resize-img">
                            <img src="{{ asset ('drpro/images/after.jpg') }}" alt="Modified Image">
                            <span class="cd-image-label" data-type="modified"></span>
                        </div>
                        
                        <span class="cd-handle"></span>
                    </figure>
                </div>
                <div class="ba_text text-center"><p>Nulla facilisi. Nulla egestas vel lacus sed interdum. Sed mollis, orci elementum eleifend tempor, nunc libero porttitor tellus.</p></div>
                <div class="ba_button_container text-center">
                    <div class="button button_1 ba_button"><a href="#">see gallery</a></div>
                </div>
                
            </div>
        </div>
    </div>
</div>


<!-- Prices -->

<div class="prices">
    <div class="container">
        <div class="row">
            
            <!-- Price -->
            <div class="col-lg-6 price_col">
                <div class="price">
                    <div class="price_title">Breast Augmentation</div>
                    <div class="price_text">
                        <p>Integer aliquet congue libero, eu gravida odio ultrces ut. Etiam ac erat ut enim maximus accumsan vel ac nisl.</p>
                    </div>
                    <div class="price_panel">From $3500</div>
                </div>
            </div>
            
            <!-- Price -->
            <div class="col-lg-6 price_col">
                <div class="price">
                    <div class="price_title">Otoplasty</div>
                    <div class="price_text">
                        <p>Integer aliquet congue libero, eu gravida odio ultrces ut. Etiam ac erat ut enim maximus accumsan vel ac nisl.</p>
                    </div>
                    <div class="price_panel">From $2000</div>
                </div>
            </div>
            
            <!-- Price -->
            <div class="col-lg-6 price_col">
                <div class="price">
                    <div class="price_title">Eyelid Surgery</div>
                    <div class="price_text">
                        <p>Integer aliquet congue libero, eu gravida odio ultrces ut. Etiam ac erat ut enim maximus accumsan vel ac nisl.</p>
                    </div>
                    <div class="price_panel">From $1500</div>
                </div>
            </div>
            
            <!-- Price -->
            <div class="col-lg-6 price_col">
                <div class="price">
                    <div class="price_title">Botox</div>
                    <div class="price_text">
                        <p>Integer aliquet congue libero, eu gravida odio ultrces ut. Etiam ac erat ut enim maximus accumsan vel ac nisl.</p>
                    </div>
                    <div class="price_panel">From $200</div>
                </div>
            </div>
            
            <!-- Price -->
            <div class="col-lg-6 price_col">
                <div class="price">
                    <div class="price_title">Liposuction</div>
                    <div class="price_text">
                        <p>Integer aliquet congue libero, eu gravida odio ultrces ut. Etiam ac erat ut enim maximus accumsan vel ac nisl.</p>
                    </div>
                    <div class="price_panel">From $5500</div>
                </div>
            </div>
            
            <!-- Price -->
            <div class="col-lg-6 price_col">
                <div class="price">
                    <div class="price_title">Hyaluronic Acid</div>
                    <div class="price_text">
                        <p>Integer aliquet congue libero, eu gravida odio ultrces ut. Etiam ac erat ut enim maximus accumsan vel ac nisl.</p>
                    </div>
                    <div class="price_panel">From $350</div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection