<header class="header trans_400">
    <div class="header_content d-flex flex-row align-items-center jusity-content-start trans_400">
        
        <!-- Logo -->
        <div class="logo">
            <a href="#">
                <div>Ortiz<span>MEDICAL</span></div>
                <div>Skin Clinic</div>
            </a>
        </div>
        
        <!-- Main Navigation -->
        <nav class="main_nav">
            <ul class="d-flex flex-row align-items-center justify-content-start">
                <li class="{{ $publicHeader == 'Home' ?  'active' : ''}}"><a href="{{ asset ('/') }}">Home</a></li>
                <li class="{{ $publicHeader == 'About Us' ?  'active' : ''}}"><a href="{{ asset ('about_us') }}">About us</a></li>
                <li class="{{ $publicHeader == 'Services' ?  'active' : ''}}"><a href="{{ asset ('services') }}">Services</a></li>
                <li class="{{ $publicHeader == 'News' ?  'active' : ''}}"><a href="{{ asset ('news') }}" >News</a></li>
                <li class="{{ $publicHeader == 'Contact' ?  'active' : ''}}"><a href="{{ asset ('contact') }}">Contact</a></li>
            </ul>
        </nav>
        <div class="header_extra d-flex flex-row align-items-center justify-content-end ml-auto">
            
            <!-- Work Hourse -->
            <div class="work_hours">Mo - Sun: 10:00am - 7:00pm</div>
            
            <!-- Header Phone -->
            <div class="header_phone">(02) 546 7861</div>
            
            <!-- Appointment Button -->
            <div class="button button_1 header_button"><a href="{{ route('login') }}">Login</a></div>
            
            <!-- Header Social -->
            <div class="social header_social">
                <ul class="d-flex flex-row align-items-center justify-content-start">
                    <li><a href="https://www.instagram.com/ortizskinclinic_official/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.facebook.com/holykingortizzonavskinclinic" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCDaDe3YVGNDHb36yzfp0vPA" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            
            <!-- Hamburger -->
            <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
        </div>
    </div>
</header>