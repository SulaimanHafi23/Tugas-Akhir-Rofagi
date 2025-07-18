  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="{{ route('beranda') }}" class="nav-link">Home</a>
          </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          @auth
              <li class="nav-item">
                  <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display:inline;">
                      @csrf
                      <button type="button" class="btn btn-danger btn-sm logout-button">
                          <i class="fas fa-sign-out-alt"></i> Logout
                      </button>
                  </form>
              </li>
          @endauth

      </ul>
  </nav>

  @push('scripts')
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
          $(function() {
              // Script untuk logout
              $('.logout-button').on('click', function() {
                  Swal.fire({
                      title: 'Yakin ingin logout?',
                      text: "Anda akan keluar dari sesi login.",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#6c757d',
                      confirmButtonText: 'Ya, logout',
                      cancelButtonText: 'Batal'
                  }).then((result) => {
                      if (result.isConfirmed) {
                          $('#logout-form').submit();
                      }
                  });
              });
          });
      </script>
  @endpush
