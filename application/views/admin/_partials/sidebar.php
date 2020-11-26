<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo ($this->uri->segment(2) == '' || $this->uri->segment(2) == 'cycle') ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Roadmap ILC</span>
        </a>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == 'pelatihan' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/pelatihan') ?>">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Data Pelatihan</span>
        </a>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == 'peserta' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/peserta') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Peserta</span>
        </a>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == 'monitoring' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/monitoring') ?>">
            <i class="fas fa-fw fa-desktop"></i>
            <span>Data Monitoring</span>
        </a>
    </li>
    <!-- <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'peserta' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Data Peserta</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/peserta/new') ?>">New Peserta</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/peserta') ?>">List Peserta</a>
        </div>
    </li> -->
        <!--
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span></a>
    </li>
    -->


    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span></a>
    </li>
</ul>
