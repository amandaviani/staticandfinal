<?php

class Matematika {
    public static function tambah($a, $b) {
        return $a + $b;
    }

    public static function kurang($a, $b) {
        return $a - $b;
    }

    public static function kali($a, $b) {
        return $a * $b;
    }

    public static function bagi($a, $b) {
        if ($b == 0) return "Error (Bagi Nol)";
        return $a / $b;
    }

    public static function luasPersegi($sisi) {
        return $sisi * $sisi;
    }
}


$hasil = null;
if (isset($_POST['proses'])) {
    $n1 = $_POST['n1'] ?? 0;
    $n2 = $_POST['n2'] ?? 0;
    $op = $_POST['op'];

    switch ($op) {
        case '+': $hasil = Matematika::tambah($n1, $n2); break;
        case '-': $hasil = Matematika::kurang($n1, $n2); break;
        case 'x': $hasil = Matematika::kali($n1, $n2); break;
        case '/': $hasil = Matematika::bagi($n1, $n2); break;
        case 'lp': $hasil = Matematika::luasPersegi($n1); break;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Praktikum 2 - Static Method</title>
    <style>
        
        body { font-family: 'Segoe UI', sans-serif; background: #eceff1; display: flex; justify-content: center; padding-top: 50px; }
        .container { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 350px; }
        h3 { text-align: center; color: #2c3e50; margin-bottom: 20px; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        label { font-size: 13px; color: #7f8c8d; font-weight: bold; }
        input, select { width: 100%; padding: 10px; margin: 8px 0 15px; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
        button { width: 100%; background: #3498db; color: white; border: none; padding: 12px; border-radius: 8px; font-weight: bold; cursor: pointer; transition: 0.3s; }
        button:hover { background: #2980b9; }
        .result-box { margin-top: 20px; padding: 15px; background: #e8f8f5; border-radius: 8px; text-align: center; border: 1px solid #2ecc71; }
        .result-box span { font-size: 20px; font-weight: bold; color: #27ae60; }
        .info { font-size: 11px; color: #95a5a6; font-style: italic; }
    </style>
</head>
<body>

<div class="container">
    <h3>KALKULATOR</h3>
   
    <form method="POST">
        <label>Input 1 (Angka / Sisi)</label>
        <input type="number" name="n1" required step="any" placeholder="Masukkan angka...">

        <label>Input 2</label>
        <input type="number" name="n2" step="any" placeholder="Masukkan angka...">
        <p class="info">*Input 2 abaikan jika menghitung Luas Persegi</p>

        <label>Pilih Operasi</label>
        <select name="op">
            <option value="+">Tambah (+)</option>
            <option value="-">Kurang (-)</option>
            <option value="x">Kali (x)</option>
            <option value="/">Bagi (/)</option>
            <option value="lp">Luas Persegi (sisi * sisi)</option>
        </select>

        <button type="submit" name="proses">Hitung Sekarang</button>
    </form>

    <?php if ($hasil !== null): ?>
        <div class="result-box">
            Hasil: <br>
            <span><?= $hasil ?></span>
        </div>
    <?php endif; ?>
</div>

</body>
</html>