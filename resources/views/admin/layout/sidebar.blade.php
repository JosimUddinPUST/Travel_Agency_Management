
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_dashboard') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_dashboard') }}"></a>
        </div>

        <ul class="sidebar-menu">
            <li class="{{ Request::is('admin/profile') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_profile') }}"> <i class="fas fa-hand-point-right"></i><span>Profile</span></a></li>
            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_dashboard') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>
            <li class="{{ Request::is('admin/slider/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_slider_index') }}"><i class="fas fa-hand-point-right"></i><span>Slider</span></a></li>
            <li class="{{ Request::is('admin/welcome-item/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_welcome_item_edit') }}"><i class="fas fa-hand-point-right"></i><span>Welcome</span></a></li>
            <li class="{{ Request::is('admin/feature/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_feature_index') }}"><i class="fas fa-hand-point-right"></i><span>Feature</span></a></li>
            <li class="{{ Request::is('admin/counter-item/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_counter_item_edit') }}"><i class="fas fa-hand-point-right"></i><span>Counter Items</span></a></li>
            <li class="{{ Request::is('admin/testimonial/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_testimonial_index') }}"><i class="fas fa-hand-point-right"></i><span>Testimonials</span></a></li>
            <li class="{{ Request::is('admin/team-member/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_team_member_index') }}"><i class="fas fa-hand-point-right"></i><span>Team Members</span></a></li>
            <li class="{{ Request::is('admin/faq/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_faq_index') }}"><i class="fas fa-hand-point-right"></i><span>Faqs</span></a></li>
            <li class="{{ Request::is('admin/blog-category/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_blog_category_index') }}"><i class="fas fa-hand-point-right"></i><span>Blog Category</span></a></li>
            <li class="{{ Request::is('admin/post/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_post_index') }}"><i class="fas fa-hand-point-right"></i><span>Posts</span></a></li>
            <li class="{{ Request::is('admin/destination/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_destination_index') }}"><i class="fas fa-hand-point-right"></i><span>Destinations</span></a></li>
            <li class="{{ Request::is('admin/package*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_packages_index') }}"><i class="fas fa-hand-point-right"></i><span>Packages</span></a></li>
            <li class="{{ Request::is('admin/tour*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_tour_index') }}"><i class="fas fa-hand-point-right"></i><span>Tours</span></a></li>

            {{-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Dropdown Items</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 1</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 2</a></li>
                </ul>
            </li>

            <li class=""><a class="nav-link" href="setting.html"><i class="fas fa-hand-point-right"></i> <span>Setting</span></a></li>

            <li class=""><a class="nav-link" href="form.html"><i class="fas fa-hand-point-right"></i> <span>Form</span></a></li>

            <li class=""><a class="nav-link" href="table.html"><i class="fas fa-hand-point-right"></i> <span>Table</span></a></li>

            <li class=""><a class="nav-link" href="invoice.html"><i class="fas fa-hand-point-right"></i> <span>Invoice</span></a></li> --}}

        </ul>
    </aside>
</div>