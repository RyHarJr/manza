@extends('main')

@section('title')
    <h1><i class="bi bi-calculator me-2"></i>Point of Sale (Kasir)</h1>
@endsection

@section('content')
<style>
    .pos-product-card {
        border: none;
        border-radius: 12px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        background: #fff;
        cursor: pointer;
        overflow: hidden;
        border: 1px solid #eef0f2;
    }
    .pos-product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.06);
    }
    .pos-product-img {
        width: 100%;
        height: 140px;
        object-fit: cover;
        background: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .pos-product-img i {
        font-size: 3rem;
        color: #d1d5db;
    }
    .pos-product-body {
        padding: 12px;
    }
    .pos-product-title {
        font-size: 0.95rem;
        font-weight: 600;
        margin-bottom: 4px;
        color: #212529;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .pos-product-price {
        font-weight: 700;
        color: #1a1a1a;
        font-size: 1.1rem;
    }
    .stock-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        opacity: 0.9;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .pos-cart-panel {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.04);
        border: 1px solid #eef0f2;
        display: flex;
        flex-direction: column;
        height: calc(100vh - 120px);
    }
    .cart-items-wrapper {
        flex-grow: 1;
        overflow-y: auto;
    }
    .cart-item {
        border-bottom: 1px dashed #e9ecef;
        padding: 12px 16px;
        transition: background 0.2s;
    }
    .cart-item:hover {
        background: #f8f9fa;
    }
    .qty-btn {
        width: 28px;
        height: 28px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
    }
    .payment-section {
        background: #fafbfa;
        border-top: 1px solid #eef0f2;
        padding: 16px;
        border-radius: 0 0 12px 12px;
    }
    .btn-pay {
        background: #1a1a1a;
        color: #fff;
        border-radius: 8px;
        padding: 12px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: background 0.2s;
    }
    .btn-pay:hover {
        background: #333;
        color: #fff;
    }
</style>

<div class="row g-3">

    <div class="col-lg-8">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0 fw-bold">Pilih Produk</h5>
            <input type="text" id="searchProduk" class="form-control form-control-sm" placeholder="Cari nama atau kategori..." style="max-width:300px; border-radius:8px;">
        </div>
        
        <div class="row g-3" id="produkGrid">
            @foreach($produks as $p)
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 produk-item">
                <div class="pos-product-card position-relative {{ $p->total_stok <= 0 ? 'opacity-50' : '' }}" 
                     onclick="{{ $p->total_stok > 0 ? 'addToCart('.$p->id.', \''.addslashes($p->NamaProduk).'\', '.$p->Harga.', \''.$p->Satuan.'\', '.$p->total_stok.')' : 'showEmptyStock()' }}">
                    
                    @if($p->total_stok > 0)
                        <span class="badge bg-success stock-badge">Sisa: {{ $p->total_stok }}</span>
                    @else
                        <span class="badge bg-danger stock-badge">Habis</span>
                    @endif

                    <div class="pos-product-img">
                        @if($p->Foto)
                            <img src="{{ asset('storage/' . $p->Foto) }}" alt="{{ $p->NamaProduk }}" style="width:100%; height:100%; object-fit:cover;">
                        @else
                            <i class="bi bi-box-seam"></i>
                        @endif
                    </div>
                    
                    <div class="pos-product-body">
                        <small class="text-muted d-block mb-1 kategori-text" style="font-size:0.75rem;">{{ $p->KategoriProduk }}</small>
                        <div class="pos-product-title nama-text">{{ $p->NamaProduk }}</div>
                        <div class="pos-product-price mt-2">Rp {{ number_format($p->Harga, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="col-lg-4">
        <div class="pos-cart-panel sticky-top" style="top:20px;">
            <div class="p-3 border-bottom d-flex align-items-center justify-content-between" style="background: #1a1a1a; color:#fff; border-radius: 12px 12px 0 0;">
                <h5 class="mb-0 fw-bold"><i class="bi bi-cart3 me-2"></i>Keranjang</h5>
                <span class="badge bg-light text-dark rounded-pill" id="cartCount">0 Item</span>
            </div>
            
            <div class="cart-items-wrapper" id="cartItemsContainer">
                <div id="keranjangKosong" class="h-100 d-flex flex-column align-items-center justify-content-center text-muted p-4">
                    <i class="bi bi-cart-x mb-2" style="font-size: 3rem; opacity:0.3;"></i>
                    <p class="mb-0">Belum ada item di keranjang.</p>
                </div>
            </div>

            <div class="payment-section border-top">
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted fw-bold">Total Tagihan</span>
                    <h3 class="mb-0 fw-bold text-success" id="totalHarga">Rp 0</h3>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-6">
                        <select id="pelangganId" class="form-select border-0 shadow-sm" style="font-size:0.9rem;">
                            <option value="">+ Pelanggan (Opsional)</option>
                            @foreach($pelanggans as $pl)
                                <option value="{{ $pl->id }}">{{ $pl->NamaPelanggan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <select id="karyawanId" class="form-select border-0 shadow-sm" style="font-size:0.9rem;">
                            <option value="">+ Karyawan</option>
                            @foreach($karyawans as $k)
                                <option value="{{ $k->id }}">{{ $k->NamaKaryawan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <select id="metodePembayaran" class="form-select border-0 shadow-sm fw-bold">
                        <option value="Cash">Tunai / Cash</option>
                        <option value="Transfer">Transfer Bank</option>
                        <option value="QRIS">QRIS</option>
                        <option value="Debit">Kartu Debit</option>
                    </select>
                </div>

                <button class="btn btn-pay w-100 d-flex justify-content-between align-items-center" id="btnBayar" disabled>
                    <span>Bayar Sekarang</span>
                    <i class="bi bi-arrow-right-circle-fill fs-5"></i>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let keranjang = [];

function showEmptyStock() {
    Swal.fire('Stok Habis', 'Mohon maaf, stok untuk produk ini sedang kosong.', 'error');
}

function formatRupiah(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
}

function addToCart(id, nama, harga, satuan, stok) {
    if (stok <= 0) {
        showEmptyStock();
        return;
    }

    let existing = keranjang.find(item => item.id === id);
    if (existing) {
        if (existing.jumlah + 1 > stok) {
            Swal.fire('Peringatan', 'Maksimal pembelian untuk produk ini adalah ' + stok + ' ' + satuan, 'warning');
            return;
        }
        existing.jumlah++;
    } else {
        keranjang.push({ id, nama, harga, satuan, jumlah: 1, max_stok: stok });
    }
    renderKeranjang();
}

function updateQty(index, act) {
    let item = keranjang[index];
    if (act === 'plus') {
        if (item.jumlah + 1 > item.max_stok) {
            Swal.fire('Peringatan', 'Maksimal pembelian adalah ' + item.max_stok, 'warning');
            return;
        }
        item.jumlah++;
    } else if (act === 'minus') {
        item.jumlah--;
        if (item.jumlah <= 0) {
            keranjang.splice(index, 1);
        }
    }
    renderKeranjang();
}

function renderKeranjang() {
    let container = $('#cartItemsContainer');
    container.empty();

    if (keranjang.length === 0) {
        container.append(`
            <div id="keranjangKosong" class="h-100 d-flex flex-column align-items-center justify-content-center text-muted p-4">
                <i class="bi bi-cart-x mb-2" style="font-size: 3rem; opacity:0.3;"></i>
                <p class="mb-0">Belum ada item di keranjang.</p>
            </div>
        `);
        $('#totalHarga').text('Rp 0');
        $('#cartCount').text('0 Item');
        $('#btnBayar').prop('disabled', true);
        return;
    }

    let total = 0;
    keranjang.forEach((item, index) => {
        let subtotal = item.harga * item.jumlah;
        total += subtotal;
        
        container.append(`
            <div class="cart-item">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div class="fw-bold text-dark w-75 lh-sm">${item.nama}</div>
                    <div class="fw-bold text-success text-end w-25">Rp ${formatRupiah(subtotal)}</div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">Rp ${formatRupiah(item.harga)} / ${item.satuan}</small>
                    <div class="d-flex align-items-center border rounded p-1 bg-white">
                        <button class="btn btn-light qty-btn border-0 shadow-sm" onclick="updateQty(${index}, 'minus')"><i class="bi bi-dash"></i></button>
                        <span class="mx-3 fw-bold">${item.jumlah}</span>
                        <button class="btn btn-light qty-btn border-0 shadow-sm" onclick="updateQty(${index}, 'plus')"><i class="bi bi-plus"></i></button>
                    </div>
                </div>
            </div>
        `);
    });

    $('#totalHarga').text('Rp ' + formatRupiah(total));
    
    // hitung total jumlah items
    let totalItems = keranjang.reduce((sum, current) => sum + current.jumlah, 0);
    $('#cartCount').text(totalItems + ' Item');
    
    $('#btnBayar').prop('disabled', false);
}

$(document).ready(function() {
    // Cari produk (Live Search)
    $('#searchProduk').on('keyup', function() {
        let val = $(this).val().toLowerCase();
        $('.produk-item').filter(function() {
            let nama = $(this).find('.nama-text').text().toLowerCase();
            let kat = $(this).find('.kategori-text').text().toLowerCase();
            $(this).toggle(nama.includes(val) || kat.includes(val));
        });
    });

    // Proses bayar
    $('#btnBayar').on('click', function() {
        let pelangganId = $('#pelangganId').val();
        let karyawanId = $('#karyawanId').val();
        let metode = $('#metodePembayaran').val();

        if (!karyawanId) { Swal.fire('Oops!', 'Pilih karyawan yang merangkap kasir terlebih dahulu.', 'warning'); return; }

        let items = keranjang.map(item => ({
            produk_id: item.id,
            jumlah: item.jumlah
        }));

        Swal.fire({
            title: 'Konfirmasi Pembayaran',
            html: `<div class="text-left mt-3">
                    <p class="mb-1">Total Tagihan: <b>${$('#totalHarga').text()}</b></p>
                    <p class="mb-0">Metode: <b>${metode}</b></p>
                   </div>`,
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#1a1a1a',
            cancelButtonColor: '#e0e0e0',
            confirmButtonText: 'Proses Transaksi',
            cancelButtonText: '<span class="text-dark">Batal</span>',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading
                let btn = $('#btnBayar');
                let originalText = btn.html();
                btn.html('<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Memproses...').prop('disabled', true);

                $.ajax({
                    url: '{{ route("kasir.store") }}',
                    type: 'POST',
                    data: JSON.stringify({
                        _token: '{{ csrf_token() }}',
                        pelanggan_id: pelangganId ? pelangganId : null,
                        karyawan_id: karyawanId,
                        MetodePembayaran: metode,
                        items: items
                    }),
                    contentType: 'application/json',
                    success: function(res) {
                        Swal.fire('Berhasil!', res.message, 'success').then(() => {
                            // Reload page to refresh stock
                            window.location.reload();
                        });
                    },
                    error: function(xhr) {
                        let msg = xhr.responseJSON ? xhr.responseJSON.message : 'Terjadi kesalahan pada server.';
                        Swal.fire('Gagal!', msg, 'error');
                        btn.html(originalText).prop('disabled', false);
                    }
                });
            }
        });
    });
});
</script>
@endpush
