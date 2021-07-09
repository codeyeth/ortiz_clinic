<div class="menu_overlay trans_400"></div>
	<div class="menu trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<nav class="menu_nav">
			<ul>
				{{-- <li><a href="index.html">Home</a></li>
				<li><a href="about.html">About us</a></li>
				<li><a href="services.html">Services</a></li>
				<li><a href="blog.html">News</a></li>
				<li><a href="contact.html">Contact</a></li> --}}

				<li class="{{ $publicHeader == 'Home' ?  'active' : ''}}"><a href="{{ asset ('/') }}">Home</a></li>
                <li class="{{ $publicHeader == 'About Us' ?  'active' : ''}}"><a href="{{ asset ('about_us') }}">About us</a></li>
                <li class="{{ $publicHeader == 'Services' ?  'active' : ''}}"><a href="{{ asset ('services') }}">Services</a></li>
                {{-- <li class="{{ $publicHeader == 'News' ?  'active' : ''}}"><a href="{{ asset ('news') }}" >News</a></li> --}}
                <li class="{{ $publicHeader == 'Contact' ?  'active' : ''}}"><a href="{{ asset ('contact') }}">Contact</a></li>
			</ul>
		</nav>
		<div class="menu_extra">
			<div class="menu_link">Mo - Sun: 10:00am - 7:00pm</div>
			<div class="menu_link">(02) 546 7861</div>
			<div class="menu_link"><a href="{{ route('login') }}">Login</a></div>
		</div>
		<div class="social menu_social">
			<ul class="d-flex flex-row align-items-center justify-content-start">
				<li><a href="https://www.instagram.com/ortizskinclinic_official/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				<li><a href="https://www.facebook.com/holykingortizzonavskinclinic" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="https://www.youtube.com/channel/UCDaDe3YVGNDHb36yzfp0vPA" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>
