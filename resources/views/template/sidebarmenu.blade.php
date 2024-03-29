<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item {{ ($title === "Dashboard") ? 'cmsmenu-active' : '' }}">
            <a href="/cms/dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item {{ ($title === "Kelas") ? 'cmsmenu-active' : '' }}">
            <a href="/cms/kelas" class="nav-link">
                <i class="nav-icon fas fa-copy bi bi-door-closed-fill"></i>
                <p>
                    Kelas
                </p>
            </a>
        </li>
        <li class="nav-item {{ ($title === "Mahasiswa") ? 'cmsmenu-active' : '' }}">
            <a href="/cms/mahasiswa" class="nav-link">
                <i class="nav-icon fas fa-copy bi bi-person-vcard"></i>
                <p>
                    Mahasiswa
                </p>
            </a>
        </li>
        <li class="nav-item {{ ($title === "Dosen") ? 'cmsmenu-active' : '' }}">
            <a href="/cms/dosen" class="nav-link">
                <i class="nav-icon fas fa-copy bi bi-person-lines-fill"></i>
                <p>
                    Dosen
                </p>
            </a>
        </li>
        <li class="nav-item {{ ($title === "Mata Kuliah") ? 'cmsmenu-active' : '' }}">
            <a href="/cms/matakuliah" class="nav-link">
                <i class="nav-icon fas fa-copy bi bi-book-fill"></i>
                <p>
                    Mata Kuliah
                </p>
            </a>
        </li>
    </ul>
</nav>
