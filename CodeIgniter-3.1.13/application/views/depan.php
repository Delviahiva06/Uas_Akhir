<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman Depan Kost</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 900px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #f0f0f0; }
        .section-title { margin-top: 30px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Kost</h1>
        <h2 class="section-title">Kamar Kosong</h2>
        <table>
            <tr><th>No. Kamar</th><th>Harga Sewa</th></tr>
            <?php foreach($kamar_kosong as $kamar): ?>
                <tr>
                    <td><?= htmlspecialchars($kamar->nomor) ?></td>
                    <td>Rp <?= number_format($kamar->harga,0,',','.') ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2 class="section-title">Kamar yang Sebentar Lagi Harus Bayar</h2>
        <table>
            <tr><th>No. Kamar</th><th>Nama Penghuni</th><th>Tanggal Bayar Terakhir</th></tr>
            <?php foreach($kamar_segera_bayar as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row->no_kamar) ?></td>
                    <td><?= htmlspecialchars($row->nama) ?></td>
                    <td><?= htmlspecialchars($row->tgl_bayar_terakhir) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2 class="section-title">Kamar Terlambat Bayar</h2>
        <table>
            <tr><th>No. Kamar</th><th>Nama Penghuni</th><th>Tanggal Bayar Terakhir</th></tr>
            <?php foreach($kamar_terlambat as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row->no_kamar) ?></td>
                    <td><?= htmlspecialchars($row->nama) ?></td>
                    <td><?= htmlspecialchars($row->tgl_bayar_terakhir) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html> 