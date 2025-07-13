<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kerupuk Rumahan</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <script data-cfasync="false" nonce="04366fe2-9d42-48ca-98f3-e50fbe50e5c5">
        try {
            (function(w, d) {
                ! function(fv, fw, fx, fy) {
                    if (fv.zaraz) console.error("zaraz is loaded twice");
                    else {
                        fv[fx] = fv[fx] || {};
                        fv[fx].executed = [];
                        fv.zaraz = {
                            deferred: [],
                            listeners: []
                        };
                        fv.zaraz._v = "5858";
                        fv.zaraz._n = "04366fe2-9d42-48ca-98f3-e50fbe50e5c5";
                        fv.zaraz.q = [];
                        fv.zaraz._f = function(fz) {
                            return async function() {
                                var fA = Array.prototype.slice.call(arguments);
                                fv.zaraz.q.push({
                                    m: fz,
                                    a: fA
                                })
                            }
                        };
                        for (const fB of ["track", "set", "debug"]) fv.zaraz[fB] = fv.zaraz._f(fB);
                        fv.zaraz.init = () => {
                            var fC = fw.getElementsByTagName(fy)[0],
                                fD = fw.createElement(fy),
                                fE = fw.getElementsByTagName("title")[0];
                            fE && (fv[fx].t = fw.getElementsByTagName("title")[0].text);
                            fv[fx].x = Math.random();
                            fv[fx].w = fv.screen.width;
                            fv[fx].h = fv.screen.height;
                            fv[fx].j = fv.innerHeight;
                            fv[fx].e = fv.innerWidth;
                            fv[fx].l = fv.location.href;
                            fv[fx].r = fw.referrer;
                            fv[fx].k = fv.screen.colorDepth;
                            fv[fx].n = fw.characterSet;
                            fv[fx].o = (new Date).getTimezoneOffset();
                            if (fv.dataLayer)
                                for (const fF of Object.entries(Object.entries(dataLayer).reduce(((fG, fH) => ({
                                        ...fG[1],
                                        ...fH[1]
                                    })), {}))) zaraz.set(fF[0], fF[1], {
                                    scope: "page"
                                });
                            fv[fx].q = [];
                            for (; fv.zaraz.q.length;) {
                                const fI = fv.zaraz.q.shift();
                                fv[fx].q.push(fI)
                            }
                            fD.defer = !0;
                            for (const fJ of [localStorage, sessionStorage]) Object.keys(fJ || {}).filter((fL => fL
                                .startsWith("_zaraz_"))).forEach((fK => {
                                try {
                                    fv[fx]["z_" + fK.slice(7)] = JSON.parse(fJ.getItem(fK))
                                } catch {
                                    fv[fx]["z_" + fK.slice(7)] = fJ.getItem(fK)
                                }
                            }));
                            fD.referrerPolicy = "origin";
                            fD.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(fv[fx])));
                            fC.parentNode.insertBefore(fD, fC)
                        };
                        ["complete", "interactive"].includes(fw.readyState) ? zaraz.init() : fv.addEventListener(
                            "DOMContentLoaded", zaraz.init)
                    }
                }(w, d, "zarazData", "script");
                window.zaraz._p = async eC => new Promise((eD => {
                    if (eC) {
                        eC.e && eC.e.forEach((eE => {
                            try {
                                const eF = d.querySelector("script[nonce]"),
                                    eG = eF?.nonce || eF?.getAttribute("nonce"),
                                    eH = d.createElement("script");
                                eG && (eH.nonce = eG);
                                eH.innerHTML = eE;
                                eH.onload = () => {
                                    d.head.removeChild(eH)
                                };
                                d.head.appendChild(eH)
                            } catch (eI) {
                                console.error(`Error executing script: ${eE}\n`, eI)
                            }
                        }));
                        Promise.allSettled((eC.f || []).map((eJ => fetch(eJ[0], eJ[1]))))
                    }
                    eD()
                }));
                zaraz._p({
                    "e": ["(function(w,d){})(window,document)"]
                });
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>
    @stack('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        {{-- <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
                height="60" width="60">
        </div> --}}

        @include('layouts/navbar')

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            @include('layouts/sidebar')
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        @include('layouts/footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('assets/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('assets/js/demo.js') }}"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.jjs') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"951fe6a91dbece22","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.6.2","token":"2437d112162f4ec4b63c3ca0eb38fb20"}'
        crossorigin="anonymous"></script>
    {{-- SweetAlert2 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Custom Script for SweetAlert Notifications --}}
    <script>
        $(function() {
            // Cek jika ada pesan 'success' dari session
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 3000 // Popup akan hilang setelah 3 detik
                });
            @endif

            // Cek jika ada pesan 'error' dari session
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: '{{ session('error') }}',
                    showConfirmButton: false,
                    timer: 3000
                });
            @endif

            // Cek jika ada pesan 'warning' dari session
            @if (session('warning'))
                Swal.fire({
                    icon: 'warning',
                    title: 'Peringatan!',
                    text: '{{ session('warning') }}',
                    showConfirmButton: false,
                    timer: 3000
                });
            @endif

            // Cek jika ada error validasi dari $errors object
            @if ($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Validasi Gagal!',
                    html: `@foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach`,
                    showConfirmButton: true // Biarkan user menutup manual
                });
            @endif
        });
    </script>
    <script>
        $(function() {
            // Event listener untuk semua tombol dengan kelas 'delete-button'
            $('.delete-button').on('click', function() {
                const produkId = $(this).data('id'); // Ambil ID produk dari data-id
                const formId = '#delete-form-' + produkId; // Bentuk ID form yang benar

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data produk ini akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33', // Warna merah untuk tombol konfirmasi
                    cancelButtonColor: '#6c757d', // Warna abu-abu untuk tombol batal
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna mengklik "Ya, hapus!", submit form yang sesuai
                        $(formId).submit();
                    }
                });
            });
        });
    </script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"958fd8ff387409c0","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.6.2","token":"2437d112162f4ec4b63c3ca0eb38fb20"}' crossorigin="anonymous"></script>
<!-- jQuery (pastikan ada) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $('#logout-button').click(function () {
            Swal.fire({
                title: 'Yakin ingin logout?',
                text: "Anda akan keluar dari sesi login.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
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
@stack('scripts')
</body>

</html>