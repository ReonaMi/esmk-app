@extends('shared.dashboard.dashboard')

@section('title', 'Detail Guru - '.$data["nama_guru"])

@section('sidebar-dashboard')
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon">
                <i class="fas fa-cubes"></i>
            </div>
            <div class="sidebar-brand-text mx-3">E-SMK V<sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('get.dashboardSuperadmin') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSiswa"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-users"></i>
                <span>Manajemen Siswa</span>
            </a>
            <div id="collapseSiswa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kelas:</h6>
                    <a class="collapse-item" href="{{ route('get.semuaKelasSuperadmin') }}">Semua Kelas</a>
                    @foreach($tingkat as $item)
                        <a class="collapse-item" href="{{ route('get.indexKelasSuperadmin', $item->tingkat) }}">Kelas {{ $item->tingkat }}</a>
                    @endforeach
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item active">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGuru"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-chalkboard-teacher"></i>
                <span>Manajemen Guru</span>
            </a>
            <div id="collapseGuru" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manajemen Guru:</h6>
                    <a class="collapse-item" href="{{ route('get.indexGuruSuperadmin') }}">Guru</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-users-cog"></i>
                <span>Manajemen Admin</span>
            </a>
            <div id="collapseAdmin" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manajemen Admin:</h6>
                    <a class="collapse-item" href="{{ route('get.indexAdminSuperadmin') }}">Admin</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
@endsection

@section('content-dashboard')
    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <form
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                           aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                         aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                       placeholder="Search for..." aria-label="Search"
                                       aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger badge-counter">3+</span>
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                         aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Alerts Center
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 12, 2019</div>
                                <span class="font-weight-bold">A new monthly report is ready to download!</span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-success">
                                    <i class="fas fa-donate text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 7, 2019</div>
                                $290.29 has been deposited into your account!
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 2, 2019</div>
                                Spending Alert: We've noticed unusually high spending for your account.
                            </div>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                    </div>
                </li>

                <!-- Nav Item - Messages -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-envelope fa-fw"></i>
                        <!-- Counter - Messages -->
                        <span class="badge badge-danger badge-counter">7</span>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                         aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">
                            Message Center
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                     alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                    problem I've been having.</div>
                                <div class="small text-gray-500">Emily Fowler · 58m</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                     alt="">
                                <div class="status-indicator"></div>
                            </div>
                            <div>
                                <div class="text-truncate">I have the photos that you ordered last month, how
                                    would you like them sent to you?</div>
                                <div class="small text-gray-500">Jae Chun · 1d</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                     alt="">
                                <div class="status-indicator bg-warning"></div>
                            </div>
                            <div>
                                <div class="text-truncate">Last month's report looks great, I am very happy with
                                    the progress so far, keep up the good work!</div>
                                <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                     alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div>
                                <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                    told me that people say this to all dogs, even if they aren't good...</div>
                                <div class="small text-gray-500">Chicken the Dog · 2w</div>
                            </div>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ \Auth::user()->nama_admin }}</span>
                        <img class="img-profile rounded-circle"
                             src="img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                         aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Activity Log
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Detail Guru - {{ $data["nama_guru"] }}</h1>
            </div>

            <div class="row">
                <div class="col-xl-4">
                    <div class="card mb-4">
                        <div class="card-header text-primary font-weight-bold">
                            Foto Guru
                        </div>
                        <div class="card-body text-center">
                            <!-- Profile Picture Image -->
                            @if(empty($data["foto_profil"]))
                                <img src="{{ asset('images/sb-admin-2/undraw_profile_4.svg') }}" alt=""
                                     class="img-fluid rounded-circle mb-2" width="250" height="250">
                            @else
                                <img src="{{ asset('images/guru/profil/'.$data["foto_profil"]) }}" alt=""
                                     class="img-fluid rounded-circle mb-2" width="250" height="250">
                            @endif
                            <div class="small font-italic text-muted mb-4">Ukuran Maksimal 5MB dan berformat PNG/JPG</div>
                            <button class="btn btn-primary" type="button">Ubah Foto</button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Card Detail Guru-->
                    <div class="card mb-4">
                        <div class="card-header text-primary font-weight-bold">Detail Guru</div>
                        <div class="card-body">
                            <form>
                                <!-- Form Row-->
                                <div class="form-row">
                                    <!-- Form Group (first name)-->
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1" for="namaLengkap">Nama Lengkap</label>
                                        <input class="form-control" id="namaLengkap" type="text" placeholder="Masukkan Nama Lengkap" value="{{ $data["nama_guru"] }}">
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1" for="Gelar">Gelar</label>
                                        <input class="form-control" id="Gelar" type="text" placeholder="Masukkan Gelar" value="{{ $data["gelar"] }}">
                                    </div>
                                </div>
                                <!-- Form Row        -->
                                <div class="form-row">
                                    <!-- Form Group (organization name)-->
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1" for="NIK">NIK</label>
                                        <input class="form-control" id="NIK" type="number" placeholder="Masukkan NIK" value="{{ $data["NIK"] }}">
                                    </div>
                                    <!-- Form Group (location)-->
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1" for="nomorPonsel">Nomor Ponsel</label>
                                        <input class="form-control" id="nomorPonsel" type="tel" placeholder="Masukkan Nomor Ponsel" value="{{ $data["no_ponsel"] }}">
                                    </div>
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="form-group">
                                    <label class="small mb-1" for="email">Email</label>
                                    <input class="form-control" id="email" type="email" placeholder="Masukkan Email" value="{{ $data["email"] }}">
                                </div>
                                <!-- Form Row-->
                                <div class="form-row">
                                    <!-- Form Group (phone number)-->
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1" for="alamat">Alamat</label>
                                        <textarea class="form-control" id="alamat">{{ $data["alamat"] }}</textarea>
                                    </div>
                                    <!-- Form Group (birthday)-->
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1" for="kodePos">Kode Pos</label>
                                        <input class="form-control" id="kodePos" type="text" name="kodePos" placeholder="Masukkan Kode Pos" value="{{ $data["kode_pos"] }}">
                                    </div>
                                </div>
                                <!-- Save changes button-->
                                <button class="btn btn-primary" type="button">Simpan Perubahan</button>
                                <button class="btn btn-danger" type="button">Ubah Password</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header text-primary font-weight-bold">Mapel</div>
                        <div class="card-body">
                            <ul>
                                @foreach($mapel as $item)
                                    <li>{{ $item->nama_pelajaran }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
