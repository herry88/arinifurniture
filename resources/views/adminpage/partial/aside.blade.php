 <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
     <!--begin::Sidebar Brand-->
     <div class="sidebar-brand">
         <!--begin::Brand Link-->
         <a href="{{ route('admin.dashboard') }}" class="brand-link">
             <!--begin::Brand Image-->
             <img src="{{ asset('admin/assets/img/AdminLTELogo.png') }}" alt="Arini Furniture Logo"
                 class="brand-image opacity-75 shadow" />
             <!--end::Brand Image-->
             <!--begin::Brand Text-->
             <span class="brand-text fw-light">Arini Admin</span>
             <!--end::Brand Text-->
         </a>
         <!--end::Brand Link-->
     </div>
     <!--end::Sidebar Brand-->
     <!--begin::Sidebar Wrapper-->
     <div class="sidebar-wrapper">
         <nav class="mt-2">
             <!--begin::Sidebar Menu-->
             <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                 aria-label="Main navigation" data-accordion="false" id="navigation">
                 <li class="nav-item">
                     <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                         <i class="nav-icon bi bi-speedometer"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>
                 <li class="nav-header">MASTER DATA</li>
                 <li class="nav-item">
                     <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                         <i class="nav-icon bi bi-tags"></i>
                         <p>Kategori</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                         <i class="nav-icon bi bi-box-seam"></i>
                         <p>Produk</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('admin.banners.index') }}" class="nav-link {{ request()->routeIs('admin.banners.*') ? 'active' : '' }}">
                         <i class="nav-icon bi bi-images"></i>
                         <p>Banner</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('admin.brands.index') }}" class="nav-link {{ request()->routeIs('admin.brands.*') ? 'active' : '' }}">
                         <i class="nav-icon bi bi-star"></i>
                         <p>Brand</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                         <i class="nav-icon bi bi-gear"></i>
                         <p>Pengaturan Web</p>
                     </a>
                 </li>

                 <li class="nav-header">TRANSAKSI</li>
                 <li class="nav-item">
                     <a href="{{ route('admin.orders.index') }}" class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                         <i class="nav-icon bi bi-cart-check"></i>
                         <p>Pesanan (Orders)</p>
                     </a>
                 </li>

                 <li class="nav-header">PENGATURAN</li>
                 <li class="nav-item">
                     <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                         <i class="nav-icon bi bi-people"></i>
                         <p>Pengguna (Users)</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('admin.roles.index') }}" class="nav-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                         <i class="nav-icon bi bi-shield-lock"></i>
                         <p>Hak Akses (Roles)</p>
                     </a>
                 </li>
             </ul>
             <!--end::Sidebar Menu-->
         </nav>
     </div>
     <!--end::Sidebar Wrapper-->
 </aside>
