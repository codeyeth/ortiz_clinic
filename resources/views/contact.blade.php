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
                        <div class="home_text">Reach us now! For the Better and Beautiful you.</div>
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
                                <div>{{ $branchMain[0]->branch_name }}
                                    {{ Str::title($branchMain[0]->branch_address) }}
                                </div>
                                {{-- 3F Puregold Araneta Cubao, Quezon City Landmark: Across Farmers Plaza --}}
                            </li>
                            <li class="d-flex flex-row align-items-start justify-content-start">
                                <div>Contacts</div>
                                <div>
                                    {{-- (0921) 519-3724 --}}
                                    @foreach ($branchesContacts as $branch_contacts)
                                    @if( $branch_contacts->branch_id == $branchMain[0]->branch_contact  )
                                    {{ $branch_contacts->contact_number }} <br>
                                    @endif
                                    @endforeach
                                </div>
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
        
        <br>
        <br>
        
        <div class="contact">
            <div class="container">
                <div class="row">
                    
                    @if( count($branchesAllList) > 0)
                    @foreach ($branchesAllList as $branches_all_list)
                    
                    <!-- Price -->
                    <div class="col-lg-6 price_col">
                        <div class="price">
                            <div class="price_title">{{ $branches_all_list->branch_name }}</div>
                            <div class="price_text">
                                <p>
                                    {{ Str::limit($branches_all_list->branch_address, 100) }}
                                   
                                    @foreach ($branchesContacts as $branch_contacts)
                                    @if( $branch_contacts->branch_id == $branches_all_list->branch_contact  )
                                    <li> {{ $branch_contacts->contact_number }} </li>
                                    @endif
                                    @endforeach
                                </p>
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

@endsection