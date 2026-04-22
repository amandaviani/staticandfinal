<?php

class Produk {
    public static $jumlahProduk = 0;
    public static $totalHarga = 0; // Properti static untuk menampung total uang
    public $nama;
    public $harga;

    public function __construct($nama, $harga) {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->tambahProduk();
       
        self::$totalHarga += $harga; 
    }

    public function tambahProduk() {
        self::$jumlahProduk++;
    }
}

class Transaksi {
    final public function prosesTransaksi($produk) {
        return "Pembayaran produk <strong>" . $produk->nama . "</strong> senilai <strong>Rp " . number_format($produk->harga, 0, ',', '.') . "</strong>";
    }
}


$p1 = new Produk("Flicka Bags - Wans Shoulder Bag", 95000);
$p2 = new Produk("MBostanten - Women's Leather Wallet", 135000);
$p3 = new Produk("Povilo - Micro Sling Bag", 299000);

$transaksi = new Transaksi();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Produk</title>
    <style>
        /* STYLE TAMPILAN */
        body { 
            font-family: 'Inter', -apple-system, sans-serif; 
            background-color: #f8fafc; 
            color: #1e293b;
            margin: 0;
            padding: 40px 20px;
        }
        .wrapper { 
            max-width: 700px; 
            margin: auto; 
        }
        .header { 
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%); 
            color: white; 
            padding: 30px; 
            border-radius: 16px 16px 0 0; 
            text-align: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        .header h1 { margin: 0; font-size: 24px; letter-spacing: -0.5px; }
        
        .main-card { 
            background: white; 
            padding: 30px; 
            border-radius: 0 0 16px 16px; 
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .stats-grid {
            background: #f1f5f9;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            margin-bottom: 30px;
        }
        .stats-label { font-size: 14px; color: #64748b; text-transform: uppercase; font-weight: 600; }
        .stats-value { font-size: 32px; font-weight: 800; color: #4f46e5; margin: 5px 0; }

        h3 { font-size: 18px; margin-bottom: 15px; display: flex; align-items: center; }
        h3::before { content: ''; width: 4px; height: 18px; background: #6366f1; margin-right: 10px; border-radius: 2px; }
        
        .table-res { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        .table-res th { text-align: left; background: #f8fafc; padding: 12px; color: #64748b; font-size: 13px; border-bottom: 2px solid #e2e8f0; }
        .table-res td { padding: 12px; border-bottom: 1px solid #f1f5f9; font-size: 15px; }

        .trx-list { display: flex; flex-direction: column; gap: 12px; margin-bottom: 30px;}
        .trx-item { 
            display: flex; 
            align-items: center; 
            padding: 15px; 
            background: #fff; 
            border: 1px solid #e2e8f0; 
            border-radius: 10px;
            transition: all 0.2s;
        }
        .trx-item:hover { border-color: #6366f1; background: #f5f3ff; }
        
        .badge {
            background: #dcfce7;
            color: #166534;
            padding: 5px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 700;
            margin-right: 15px;
        }
        .trx-text { font-size: 14px; color: #475569; line-height: 1.5; }

        .total-box {
            background: #fdf2ff;
            border: 2px dashed #d8b4fe;
            padding: 20px;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .total-label { font-weight: 700; color: #7e22ce; font-size: 16px; }
        .total-price { font-size: 24px; font-weight: 800; color: #9333ea; }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="header">
        <h1>Dashboard Penjualan</h1>
    </div>
    
    <div class="main-card">
        <div class="stats-grid">
            <div class="stats-label">Total Inventaris Produk</div>
            <div class="stats-value"><?php echo Produk::$jumlahProduk; ?></div>
            <div class="stats-label" style="font-size: 11px;">Unit Tersedia</div>
        </div>

        <h3>Inventaris Produk</h3>
        <table class="table-res">
            <thead>
                <tr>
                    <th>NAMA BARANG</th>
                    <th>HARGA SATUAN</th>
                </tr>
            </thead>
            <tbody>
                <tr><td><?php echo $p1->nama; ?></td><td>Rp <?php echo number_format($p1->harga, 0, ',', '.'); ?></td></tr>
                <tr><td><?php echo $p2->nama; ?></td><td>Rp <?php echo number_format($p2->harga, 0, ',', '.'); ?></td></tr>
                <tr><td><?php echo $p3->nama; ?></td><td>Rp <?php echo number_format($p3->harga, 0, ',', '.'); ?></td></tr>
            </tbody>
        </table>

        <h3>Riwayat Transaksi</h3>
        <div class="trx-list">
            <div class="trx-item">
                <span class="badge">SUKSES</span>
                <div class="trx-text"><?php echo $transaksi->prosesTransaksi($p1); ?> telah berhasil.</div>
            </div>
            <div class="trx-item">
                <span class="badge">SUKSES</span>
                <div class="trx-text"><?php echo $transaksi->prosesTransaksi($p2); ?> telah berhasil.</div>
            </div>
            <div class="trx-item">
                <span class="badge">SUKSES</span>
                <div class="trx-text"><?php echo $transaksi->prosesTransaksi($p3); ?> telah berhasil.</div>
            </div>
        </div>

        <div class="total-box">
            <div class="total-label">Total Yang Harus Dibayar:</div>
            <div class="total-price">Rp <?php echo number_format(Produk::$totalHarga, 0, ',', '.'); ?></div>
        </div>
    </div>
</div>

</body>
</html>