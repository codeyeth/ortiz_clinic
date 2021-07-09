 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset ('admin_template/dist/img/avatar5.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            
            <li class="header">MAIN NAVIGATION</li>
            
            <li class="{{ $sidebar == 'Home' ? 'active' : ''}}"><a href="{{ asset ('/home') }}"><i class="fa fa-home"></i> <span>Home</span></a></li>
            
            <li class="{{ $sidebar == 'User Management' ? 'active' : ''}}"><a href="{{ asset ('/user_management') }}"><i class="fa fa-user"></i> <span>User Management</span></a></li>
            
            <li class="{{ $sidebar == 'Appointment List' ? 'active' : ''}}"><a href="{{ asset ('/appointment_list') }}"><i class="fa fa-book"></i> <span>Appointment List</span></a></li>
            
            <li class="{{ $sidebar == 'Branches' ? 'active' : ''}}"><a href="{{ asset ('/branch') }}"><i class="fa fa-institution"></i> <span>Branches</span></a></li>
            
            <li class="{{ $sidebar == 'Services' ? 'active' : ''}}"><a href="{{ asset ('/services_list') }}"><i class="fa fa-cart-plus"></i> <span>Services</span></a></li>
            
            {{-- <li class="{{ $sidebar == 'Blog/News' ? 'active' : ''}}"><a href="{{ asset ('/admin_blog') }}"><i class="fa fa-newspaper-o"></i> <span>Blog/News</span></a></li> --}}
            
            <li class="{{ $sidebar == 'Client Testimonial' ? 'active' : ''}}"><a href="{{ asset ('/client_testimonial') }}"><i class="fa fa-file"></i> <span>Client Testimonial</span></a></li>
            
            <li class="header">USER ACTION</li>
            
            <li class="{{ $sidebar == 'Change my Password' ? 'active' : ''}}"><a href="{{ asset ('/change_password') }}"><i class="fa fa-lock"></i> <span>Change my Password</span></a></li>
            
        </ul>
    </section>
</aside>