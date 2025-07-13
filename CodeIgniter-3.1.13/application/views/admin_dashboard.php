<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard Kost</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 1100px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #f0f0f0; }
        .section-title { margin-top: 30px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard Kost</h1>
        <h2 class="section-title">Kamar Kosong</h2>
        <table>
            <tr><th>No. Kamar</th><th>Harga Sewa</th></tr>
            <?php foreach($kamar_kosong as $kamar): ?>
                <tr>
                    <td><?= htmlspecialchars($kamar->no_kamar) ?></td>
                    <td>Rp <?= number_format($kamar->harga_sewa,0,',','.') ?></td>
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

        <h2 class="section-title">Data Kamar</h2>
        <table>
            <tr><th>No. Kamar</th><th>Harga Sewa</th><th>Status</th></tr>
            <?php foreach($kamar as $k): ?>
                <tr>
                    <td><?= htmlspecialchars($k->no_kamar) ?></td>
                    <td>Rp <?= number_format($k->harga_sewa,0,',','.') ?></td>
                    <td><?= htmlspecialchars($k->status) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2 class="section-title">Data Penghuni</h2>
        <table>
            <tr><th>Nama</th><th>No. Kamar</th><th>Tanggal Masuk</th><th>Tanggal Bayar Terakhir</th></tr>
            <?php foreach($penghuni as $p): ?>
                <tr>
                    <td><?= htmlspecialchars($p->nama) ?></td>
                    <td><?= htmlspecialchars($p->id_kamar) ?></td>
                    <td><?= htmlspecialchars($p->tgl_masuk) ?></td>
                    <td><?= htmlspecialchars($p->tgl_bayar_terakhir) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2 class="section-title">Data Tagihan</h2>
        <table>
            <tr><th>ID Tagihan</th><th>ID Penghuni</th><th>Periode</th><th>Status</th></tr>
            <?php foreach($tagihan as $t): ?>
                <tr>
                    <td><?= htmlspecialchars($t->id_tagihan) ?></td>
                    <td><?= htmlspecialchars($t->id_penghuni) ?></td>
                    <td><?= htmlspecialchars($t->periode) ?></td>
                    <td><?= htmlspecialchars($t->status) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html> 