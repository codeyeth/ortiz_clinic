<footer class="footer">
    <div class="footer_content">
        <div class="container">
            <div class="row">
                
                <!-- Footer About -->
                <div class="col-lg-3 footer_col">
                    <div class="footer_about">
                        <div class="footer_logo">
                            <a href="#">
                                <div>Ortiz<span>MEDICAL</span></div>
                                <div>Skin Clinic</div>
                            </a>
                        </div>
                        <div class="footer_about_text">
                            <p>
                                Owned and managed by spouses Doctors Paul Ed and Jennifer Ortiz under SEC Registration number for 11 years now. 
                                The clinic specializes in Aesthetic Dermatology and Cosmetic Surgery. It has 11 branches now and with several branches for expansion in the future. 
                                Number of personnel is around 60-70 now with 34 OJTs rotating in these branches. 
                                Its head office is located at Third Floor, Puregold Araneta Center, Quezon City.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Footer Contact Info -->
                <div class="col-lg-3 footer_col">
                    <div class="footer_contact">
                        <div class="footer_title">Contact Info</div>
                        <ul class="contact_list">
                            <li>(02) 546 7861</li>
                            <li>pauledortiz@yahoo.com</li>
                            <li>ortiz.inquire@gmail.com</li>
                        </ul>
                    </div>
                </div>
                
                <!-- Footer Locations -->
                <div class="col-lg-3 footer_col">
                    <div class="footer_location">
                        <div class="footer_title">Our Locations</div>
                        <ul class="locations_list">
                            @if(count($branchesList) > 0)
                            @foreach ($branchesList as $branch_list)
                            <li>
                                <div class="location_title">{{ $branch_list->branch_name }}</div>
                                <div class="location_text">{!! $branch_list->branch_address !!}</div>
                            </li>
                            @endforeach
                            @endif
                        </ul>

                    </div>
                    <br>
                    <a href="#" target="_blank">
                        <div class="location_title">See All Locations</div>
                    </a>

                </div>
                
                <!-- Footer Opening Hours -->
                <div class="col-lg-3 footer_col">
                    <div class="opening_hours">
                        <div class="footer_title">Opening Hours</div>
                        <ul class="opening_hours_list">
                            <li class="d-flex flex-row align-items-start justify-content-start">
                                <div>Monday:</div>
                                <div class="ml-auto">10:00am - 7:00pm</div>
                            </li>
                            <li class="d-flex flex-row align-items-start justify-content-start">
                                <div>Thuesday:</div>
                                <div class="ml-auto">10:00am - 7:00pm</div>
                            </li>
                            <li class="d-flex flex-row align-items-start justify-content-start">
                                <div>Wednesday:</div>
                                <div class="ml-auto">10:00am - 7:00pm</div>
                            </li>
                            <li class="d-flex flex-row align-items-start justify-content-start">
                                <div>Thursday:</div>
                                <div class="ml-auto">10:00am - 7:00pm</div>
                            </li>
                            <li class="d-flex flex-row align-items-start justify-content-start">
                                <div>Friday:</div>
                                <div class="ml-auto">10:00am - 7:00pm</div>
                            </li>
                            <li class="d-flex flex-row align-items-start justify-content-start">
                                <div>Saturday:</div>
                                <div class="ml-auto">10:00am - 7:00pm</div>
                            </li>
                            <li class="d-flex flex-row align-items-start justify-content-start">
                                <div>Sunday:</div>
                                <div class="ml-auto">10:00am - 7:00pm</div>
                            </li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="footer_bar">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer_bar_content  d-flex flex-md-row flex-column align-items-md-center justify-content-start">
                        <div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <nav class="footer_nav ml-md-auto">
                            <ul class="d-flex flex-row align-items-center justify-content-start">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About us</a></li>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="blog.html">News</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>			
    </div>
</footer>