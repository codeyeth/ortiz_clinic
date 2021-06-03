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
            
            <li class=""><a href="{{ asset ('/home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

            <li class=""><a href="{{ asset ('/client_testimonial') }}"><i class="fa fa-dashboard"></i> <span>Client Testimonial</span></a></li>
            
            <!-- START SIDEBAR REGISTER USER -->
            {{-- @if($sidebar_user == 'active1')
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>User Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="/admin_add_user/add_user"><i class="fa fa-circle-o"></i> Add User </a></li>
                    <li><a href="/admin_add_user/edit_delete_user"><i class="fa fa-circle-o"></i> Edit/Delete User</a></li>
                </ul>
            </li>
            @elseif($sidebar_user == 'active2')
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>User Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/admin_add_user/add_user"><i class="fa fa-circle-o"></i> Add User </a></li>
                    <li class="active"><a href="/admin_add_user/edit_delete_user"><i class="fa fa-circle-o"></i> Edit/Delete User</a></li>
                </ul>
            </li>
            @else
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>User Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="/admin_add_user/add_user"><i class="fa fa-circle-o"></i> Add User </a></li>
                    <li><a href="/admin_add_user/edit_delete_user"><i class="fa fa-circle-o"></i> Edit/Delete User</a></li>
                </ul>
            </li>
            @endif --}}
            <!-- END SIDEBAR REGISTER USER -->
            
            
            
            
            
            
            
            
        </ul>
    </section>
</aside>