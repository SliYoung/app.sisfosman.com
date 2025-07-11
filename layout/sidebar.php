<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
       
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="./" class="logo">
                <img src="assets/assets/img/logosman.png" alt="navbar brand" class="navbar-brand img-fluid" style="max-height: 180px; margin-top: 12px;" />
            </a>
            
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item active">
                    <a href="./">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">MENU</h4>
                </li>
                <?php if ($_SESSION['role'] == 'admin') { ?>
                    <li class="nav-item">
                        <a href="?page=user/index">
                            <i class="fas fa-user-tie"></i>
                            <p>User</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="?page=mapel/index">
                            <i class="fas fa-book"></i>
                            <p>Mata pelajaran</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=kelas/index">
                            <i class="fas fa-door-closed"></i>
                            <p>Kelas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=guru/index">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <p>Guru</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=siswa/index">
                            <i class="fas fa-child"></i>
                            <p>Siswa</p>
                        </a>
                    </li>
                    
                    <!-- <li class="nav-item">
                    <a href="?page=absensi/index">
                        <i class="fas fa-clipboard-check"></i>
                        <p>Absensi</p>
                    </a>
                </li> -->
                    <li class="nav-item">
                        <a href="?page=jadwal_pelajaran/index">
                            <i class="fas fa-clipboard-list"></i>
                            <p>Jadwal Pelajaran</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=absen_session/index">
                            <i class="fas fa-clipboard-check"></i>
                            <p>Absensi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=tugas/index">
                            <i class="fas fa-file-upload"></i>
                            <p>Tugas</p>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($_SESSION['role'] == 'siswa') { ?>
                    <li class="nav-item">
                        <a href="?page=absensi/absensi_session">
                            <i class="fas fa-clipboard-check"></i>
                            <p>Absensi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=jadwal_pelajaran/jadwal_siswa">
                            <i class="fas fa-book"></i>
                            <p>Mata pelajaran</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=tugas/tugas_session">
                            <i class="fas fa-file-upload"></i>
                            <p>Pegumpulan Tugas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=nilai/nilai_siswa">
                            <i class="fas fa-user-graduate"></i>
                            <p>Nilai</p>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->