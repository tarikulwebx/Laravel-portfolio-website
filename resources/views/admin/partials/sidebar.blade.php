<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon">
            <img width="44" src="{{ asset('images/tarikul.png') }}" alt="">
        </div>
        <div class="sidebar-brand-text mx-2">TARIKUL</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin') }}"><i class="fas fa-fw fa-tachometer-alt"></i><span> Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Users Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
            <i class="fas fa-fw fa-user"></i>
            <span>Users</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Users:</h6>
                <a class="collapse-item" href="{{ route('users.create') }}">Create User</a>
                <a class="collapse-item" href="{{ route('users.index') }}">All Users</a>
            </div>
        </div>
        
    </li>

    <!-- Nav Item - Posts Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePosts" aria-expanded="true" aria-controls="collapsePosts">
            <i class="fas fa-newspaper    "></i>
            <span>Posts</span>
        </a>
        <div id="collapsePosts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Posts:</h6>
                <a class="collapse-item" href="{{ route('posts.create') }}">New Post</a>
                <a class="collapse-item" href="{{ route('posts.index') }}">All Posts</a>
                <a class="collapse-item" href="{{ route('categories.index') }}">Categories</a>
            </div>
        </div>
        
    </li>

    <!-- Nav Item - Comments Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComments" aria-expanded="true" aria-controls="collapseComments">
            <i class="fas fa-comments    "></i>
            <span>Comments</span>
        </a>
        <div id="collapseComments" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Comments:</h6>
                <a class="collapse-item" href="{{ route('comments.index') }}">All Comments</a>
                <a class="collapse-item" href="{{ route('replies.index') }}">Replies</a>
            </div>
        </div>
        
    </li>

    

    <!-- Nav Item - File Manager -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMedia" aria-expanded="true" aria-controls="collapseMedia">
            <i class="fas fa-images    "></i>
            <span>Media</span>
        </a>
        <div id="collapseMedia" class="collapse" aria-labelledby="headingTwo" data-parent="#collapseMedia">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">File Manager:</h6>
                <a class="collapse-item" href="{{ url('/media/images') }}">Images</a>
                <a class="collapse-item" href="{{ url('/media/files') }}">Files</a>
            </div>
        </div>
        
    </li>

    <!-- Nav Item - Projects -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProjects" aria-expanded="true" aria-controls="collapseProjects">
            <i class="fas fa-puzzle-piece    "></i>
            <span>Projects</span>
        </a>
        <div id="collapseProjects" class="collapse" aria-labelledby="headingTwo" data-parent="#collapseProjects">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Projects</h6>
                <a class="collapse-item" href="{{ route('projects.create') }}">New Project</a>
                <a class="collapse-item" href="{{ route('projects.index') }}">All Projects</a>
            </div>
        </div>
        
    </li>

    <!-- Nav Item - Services -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseServices" aria-expanded="true" aria-controls="collapseServices">
            <i class="fas fa-briefcase"></i>
            <span>Services</span>
        </a>
        <div id="collapseServices" class="collapse" aria-labelledby="headingTwo" data-parent="#collapseServices">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Services</h6>
                <a class="collapse-item" href="{{ route('services.create') }}">New Service</a>
                <a class="collapse-item" href="{{ route('services.index') }}">All Services</a>
            </div>
        </div>
        
    </li>

    <!-- Nav Item - Skills -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSkills" aria-expanded="true" aria-controls="collapseSkills">
            <i class="fas fa-graduation-cap"></i>
            <span>Skills</span>
        </a>
        <div id="collapseSkills" class="collapse" aria-labelledby="headingTwo" data-parent="#collapseSkills">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Skills</h6>
                <a class="collapse-item" href="{{ route('skills.create') }}">New Skill</a>
                <a class="collapse-item" href="{{ route('skills.index') }}">All Skills</a>
            </div>
        </div>
        
    </li>

    <!-- Nav Item - About -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAbout" aria-expanded="true" aria-controls="collapseAbout">
            <i class="fas fa-graduation-cap"></i>
            <span>About</span>
        </a>
        <div id="collapseAbout" class="collapse" aria-labelledby="headingTwo" data-parent="#collapseAbout">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Edit About</h6>
                <a class="collapse-item" href="{{ route('about.index') }}">About Info</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - sliders -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSliders" aria-expanded="true" aria-controls="collapseSliders">
            <i class="fas fa-images    "></i>
            <span>Intro Slider</span>
        </a>
        <div id="collapseSliders" class="collapse" aria-labelledby="headingTwo" data-parent="#collapseSliders">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Slider</h6>
                <a class="collapse-item" href="{{ route('sliders.create') }}">New Slide</a>
                <a class="collapse-item" href="{{ route('sliders.index') }}">All Slides</a>
            </div>
        </div>
    </li>

    
    
    


    <!-- Nav Item - Contacts -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContacts" aria-expanded="true" aria-controls="collapseContacts">
            <i class="fas fa-envelope    "></i>
            <span>Contacts</span>
        </a>
        <div id="collapseContacts" class="collapse" aria-labelledby="headingTwo" data-parent="#collapseContacts">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Contact Messages</h6>
                <a class="collapse-item" href="{{ route('contacts.index') }}">All Messages</a>
                <a class="collapse-item" href="{{ route('unreadContacts') }}">Unread Messages</a>
            </div>
        </div>
        
    </li>


    
    

    

    <!-- Divider -->
    <hr class="sidebar-divider">
    


    <!-- Heading -->
    <div class="sidebar-heading">
        Widgets
    </div>

    <!-- Nav Item - Widgets Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFooterWidgets"
            aria-expanded="true" aria-controls="collapseFooterWidgets">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Footer Widgets</span>
        </a>
        <div id="collapseFooterWidgets" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage:</h6>
                <a class="collapse-item" href="{{ route('widgets.index') }}">Footer widgets</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        {{-- Add show class to expand --}}
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item active" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>