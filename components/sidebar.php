 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?page=dashboard">
        <div class="sidebar-brand-icon ">
            <i class="fas fa-hospital-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-2"></div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php?page=dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <li class="nav-item">
        <a class="nav-link" href="index.php?page=doctor_schedule">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Doctor Schedule</span></a>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="index.php?page=supplies">
            <i class="fas fa-fw fa-box-open"></i>
            <span>Medicine/Vaccine</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="index.php?page=patients">
            <i class="fas fa-fw fa-hospital-user"></i>
            <span>Residents</span></a>
    </li>

    <li class="nav-item" <?= $admin_privilege ?>>
        <a class="nav-link" href="index.php?page=posts">
            <i class="fas fa-fw fa-comment"></i>
            <span>Posts</span></a>
    </li>

     <li class="nav-item" <?= $admin_privilege ?>>
        <a class="nav-link" href="index.php?page=services">
            <i class="fas fa-fw fa-list"></i>
            <span>Services</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        Transactions
    </div>

     <li class="nav-item" <?= $admin_and_doctor_privilege ?>>
        <a class="nav-link" href="index.php?page=appointments">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Appointments</span></a>
    </li>

    <li class="nav-item" <?= $admin_and_doctor_privilege ?>>
        <a class="nav-link" href="index.php?page=check_ups">
            <i class="fas fa-fw fa-clipboard-check"></i>
            <span>Checkups</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading" <?= $admin_privilege ?>>
        Report
    </div>

    <li class="nav-item" <?= $admin_privilege ?>>
        <a class="nav-link" href="index.php?page=checkup_per_service_report">
            <i class="fas fa-fw fa-list"></i>
            <span>Checkup per service</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading" <?= $admin_privilege ?>>
        Security
    </div>

    <li class="nav-item" <?= $admin_privilege ?>>
        <a class="nav-link" href="index.php?page=users">
            <i class="fas fa-fw fa-users"></i>
            <span>User Accounts</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>