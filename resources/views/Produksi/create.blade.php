@extends('layouts/konten')
@section('content')

<div class="content-header">
    <h1 class="m-0">Tambah Produksi</h1>
</div>

<section class="content">
    <div class="container-fluid">

        {{-- ✅ Form Simpan --}}
        <form action="{{ route('store_produksi') }}" method="POST">
            @csrf

            {{-- Pilih Produk --}}
            <div class="form-group">
                <label for="produk_id">Nama Produk</label>
                <select name="produk_id" class="form-control" id="produk_id">
                    <option value="" disabled selected>- Pilih Produk -</option>
                    @foreach ($produks as $produk)
                        <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Produk dari ESP --}}
            <div class="form-group">
                <label>Produk yang Sedang Dihitung</label>
                <input type="text" class="form-control" id="produk_display" disabled>
                <input type="hidden" name="nama_produk" id="produk">
            </div>

            {{-- Jumlah dari ESP --}}
            <div class="form-group">
                <label>Jumlah Kerupuk (Real-time)</label>
                <input type="text" class="form-control" id="jumlah_display" disabled>
                <input type="hidden" name="jumlah" id="jumlah">
            </div>

            {{-- Status dari ESP --}}
            <div class="form-group">
                <label>Status Produksi (Real-time)</label>
                <input type="text" class="form-control" id="status_display" disabled>
                <input type="hidden" name="status" id="status">
            </div>

            {{-- Simpan --}}
            <button type="submit" class="btn btn-success">Simpan ke DB</button>
        </form>

        {{-- ✅ Form Kontrol Produksi --}}
        <div class="mt-3 d-flex gap-2 flex-wrap">
            {{-- Tombol Mulai --}}
            <form action="{{ route('start_produksi') }}" method="POST">
                @csrf
                <input type="hidden" name="produk_id" id="produk_id_start">
                <button type="submit" class="btn btn-primary">Mulai</button>
            </form>

            {{-- Tombol Selesai --}}
            <form action="{{ route('selesai_produksi') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-secondary">Selesai</button>
            </form>

            {{-- Tombol Reset --}}
            <form action="{{ route('reset_produksi') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Reset</button>
            </form>
        </div>

    </div>
</section>

{{-- ✅ JavaScript --}}
<script>
    const apiUrl = "http://10.94.203.117/TugasAkhir/public/api/nodemcu?token=Kerupuk-Rofagi-Yusuf-123123";

    function updateRealTimeData() {
        fetch(apiUrl)
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    const nodemcu = data.data;

                    // Tampilkan di form
                    document.getElementById('produk_display').value = nodemcu.nama_produk;
                    document.getElementById('jumlah_display').value = nodemcu.jumlah;
                    document.getElementById('status_display').value = nodemcu.status;

                    // Simpan ke hidden input
                    document.getElementById('produk').value = nodemcu.nama_produk;
                    document.getElementById('jumlah').value = nodemcu.jumlah;
                    document.getElementById('status').value = nodemcu.status;
                }
            })
            .catch(err => {
                console.error("❌ Gagal ambil data dari ESP:", err);
            });
    }

    // Sync produk_id saat select berubah
    document.getElementById('produk_id').addEventListener('change', function () {
        const selectedVal = this.value;
        document.getElementById('produk_id_start').value = selectedVal;
    });

    // Set default saat halaman dimuat
    window.onload = () => {
        const select = document.getElementById('produk_id');
        const selectedVal = select.options[select.selectedIndex].value;

        document.getElementById('produk_id_start').value = selectedVal;
        updateRealTimeData();
    };

    // Jalankan polling data setiap detik
    setInterval(updateRealTimeData, 100);
</script>

@endsection
