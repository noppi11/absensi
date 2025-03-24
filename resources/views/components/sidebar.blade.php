{{-- @dd($kopentensis) --}}
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
                    <a href="{{ route('kopetensis') }}" class="nav-link">
                        <i class="nav-icon bi bi-building"></i>
                        <p>Kopetensi</p>
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
                        @foreach ($kopetensis as $item)
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-laptop-code nav-icon"></i>
                                    <p>
                                        {{ $item->name }}
                                        <i class="fas fa-angle-left right ml-3"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @forelse ($item->classs as $kls)
                                        <li class="nav-item">
                                            <a href="/kelas/{{ $kls->id }}" class="nav-link">
                                                <i class="fas fa-users nav-icon"></i>
                                                <p>{{ $kls->nama_kelas }}</p>
                                            </a>
                                        </li>
                                    @empty
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" disabled>
                                                <i class="fas fa-users nav-icon"></i>
                                                <p class="text-warning">Kpn yh.</p>
                                            </a>
                                        </li>
                                    @endforelse
                                </ul>
                            </li>
                        @endforeach
                        
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