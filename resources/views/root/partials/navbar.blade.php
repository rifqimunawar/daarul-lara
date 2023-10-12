
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-light navbar-light shadow sticky-top p-0">
      <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
          <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Daarul Ilmi</h2>
      </a>
      <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav ms-auto p-4 p-lg-0">
              <a href="/" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
              <a href="/about" class="nav-item nav-link {{ request()->is('/about') ? 'active' : '' }}">About</a>
              <a href="/cources" class="nav-item nav-link {{ request()->is('/cources') ? 'active' : '' }}">Courses</a>
              {{-- <a href="/biaya" class="nav-item nav-link {{ request()->is('/biaya') ? 'active' : '' }}">Pendaftaran</a> --}}
              {{-- <div class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                  <div class="dropdown-menu fade-down m-0">
                      <a href="" class="dropdown-item">Our Team</a>
                      <a href="" class="dropdown-item">Testimonial</a>
                      <a href="" class="dropdown-item">404 Page</a>
                  </div>
              </div> --}}
              <a href="/contact" class="nav-item nav-link {{ request()->is('/contact') ? 'active' : '' }}">Contact</a>
          </div>
          <a href="/biaya" class="btn btn-primary py-2 px-lg-4 d-none d-lg-block">Daftar Sekarang</a>
      </div>
  </nav>
  <!-- Navbar End -->
