<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="../index.html" class="brand-link">
            <img src="../../../dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">AdminLTE 4</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Dashboard</li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">Data Master</li>
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kelas.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-building"></i>
                        <p>Kelas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Siswa
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Mesin -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="fas fa-cogs nav-icon"></i>
                                <p>
                                    Mesin
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-tag nav-icon"></i>
                                        <p>Kelas X Mesin A</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-tag nav-icon"></i>
                                        <p>Kelas X Mesin B</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-tag nav-icon"></i>
                                        <p>Kelas X Mesin C</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-tag nav-icon"></i>
                                        <p>Kelas XI Mesin A</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-tag nav-icon"></i>
                                        <p>Kelas XI Mesin B</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-tag nav-icon"></i>
                                        <p>Kelas XI Mesin C</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-tag nav-icon"></i>
                                        <p>Kelas XII Mesin A</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-tag nav-icon"></i>
                                        <p>Kelas XII Mesin B</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-tag nav-icon"></i>
                                        <p>Kelas XII Mesin C</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Tekstil -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                            <i class="fas fa-tshirt nav-icon"></i> 
                                <p>
                                    Tekstil
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-tag nav-icon"></i>
                                        <p>Kelas 10</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-tag nav-icon"></i>
                                        <p>Kelas 11</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-tag nav-icon"></i>
                                        <p>Kelas 12</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Ototronik -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="fas fa-car nav-icon"></i>
                                <p>
                                    Ototronik
                                   <span class="right"> <i class="fas fa-angle-left right ml-3"></i></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-tag nav-icon"></i>
                                        <p>Kelas X OTOTRONIK A</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-tag nav-icon"></i>
                                        <p>Kelas X OTOTRONIK B</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-tag nav-icon"></i>
                                        <p>Kelas X OTOTRONIK C</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- RPL -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="fas fa-laptop-code nav-icon"></i>
                                <p>
                                    Rekayasa Perangkat Lunak
                                    <i class="fas fa-angle-left right ml-3"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-tag nav-icon"></i>
                                        <p>Kelas X RPL A</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-tag nav-icon"></i>

                                        <p>Kelas X RPL B</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-tag nav-icon"></i>

                                        <p>Kelas X RPL C</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-tag nav-icon"></i>

                                        <p>Kelas XI RPL A</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-tag nav-icon"></i>

                                        <p>Kelas XI RPL B</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-tag nav-icon"></i>

                                        <p>Kelas XI RPL C</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>

                <li class="nav-header">Etc</li>
                <li class="nav-item">
                    <a href="{{ route('login.create') }}" class="nav-link">
                        <i class="nav-icon bi bi-box-arrow-right"></i>
                        <p>Log Out</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>