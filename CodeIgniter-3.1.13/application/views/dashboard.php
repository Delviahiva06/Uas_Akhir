<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Kost</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background: #f4f7fb;
            margin: 0;
            padding: 0;
            color: #2d3a4b;
        }
        .wrapper {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background: #2d3a4b;
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 0 0 30px 0;
        }
        .sidebar-header {
            font-size: 1.5rem;
            font-weight: bold;
            padding: 32px 0 24px 0;
            text-align: center;
            letter-spacing: 1px;
            border-bottom: 1px solid #3e4a5a;
        }
        .sidebar-menu {
            flex: 1;
            margin-top: 24px;
        }
        .sidebar-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .sidebar-menu li {
            padding: 14px 32px;
            font-size: 1.08rem;
            display: flex;
            align-items: center;
            cursor: pointer;
            border-left: 4px solid transparent;
            transition: background 0.2s, border 0.2s;
        }
        .sidebar-menu li:hover {
            background: #3e4a5a;
            border-left: 4px solid #4f8cff;
        }
        .sidebar-menu .icon {
            margin-right: 12px;
            font-size: 1.2rem;
        }
        .main-content {
            flex: 1;
            padding: 0 0 40px 0;
        }
        .header {
            background: #fff;
            padding: 32px 40px 18px 40px;
            border-bottom: 1px solid #e3e8ee;
        }
        .header-title {
            font-size: 2.1rem;
            font-weight: 700;
            letter-spacing: 1px;
            color: #2d3a4b;
        }
        .dashboard-row {
            display: flex;
            gap: 24px;
            margin: 32px 40px 0 40px;
            flex-wrap: wrap;
        }
        .info-card {
            flex: 1 1 260px;
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(79,140,255,0.07);
            padding: 24px 22px 18px 22px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            min-width: 220px;
        }
        .info-card .icon {
            font-size: 2.1rem;
            margin-bottom: 8px;
        }
        .info-card .label {
            font-size: 1.1rem;
            color: #4f8cff;
            font-weight: 600;
        }
        .info-card .value {
            font-size: 1.7rem;
            font-weight: bold;
            margin: 6px 0 2px 0;
        }
        .info-card .desc {
            font-size: 1rem;
            color: #888;
        }
        .section {
            margin: 36px 40px 0 40px;
        }
        .section-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #3b4a5a;
            margin-bottom: 12px;
            border-left: 5px solid #4f8cff;
            padding-left: 10px;
        }
        .stat-box {
            background: #fafdff;
            border-radius: 10px;
            padding: 18px 24px;
            margin-bottom: 18px;
            box-shadow: 0 1px 4px rgba(60,72,88,0.07);
            font-size: 1.08rem;
        }
        .stat-box table {
            width: 100%;
            border-collapse: collapse;
        }
        .stat-box td {
            padding: 6px 12px;
        }
        .log-box {
            background: #f6faff;
            border-radius: 10px;
            padding: 16px 22px;
            font-size: 1.05rem;
            box-shadow: 0 1px 4px rgba(60,72,88,0.07);
        }
        .log-box .log-item {
            margin-bottom: 6px;
            display: flex;
            align-items: center;
        }
        .log-box .log-item .icon {
            margin-right: 8px;
        }
        @media (max-width: 900px) {
            .dashboard-row, .section { margin: 24px 10px 0 10px; }
            .header { padding: 24px 10px 12px 10px; }
        }
        @media (max-width: 700px) {
            .wrapper { flex-direction: column; }
            .sidebar { width: 100%; flex-direction: row; overflow-x: auto; }
            .sidebar-header { display: none; }
            .sidebar-menu ul { display: flex; flex-direction: row; }
            .sidebar-menu li { padding: 10px 16px; font-size: 1rem; }
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <div class="sidebar-header">🔑 Admin Kost</div>
        <div class="sidebar-menu">
            <ul>
                <li><span class="icon">📊</span> Dashboard</li>
                <li><span class="icon">🧑‍🤝‍🧑</span> Data Penghuni</li>
                <li><span class="icon">🛏️</span> Data Kamar</li>
                <li><span class="icon">📦</span> Data Barang</li>
                <li><span class="icon">🏠</span> Kamar Penghuni</li>
                <li><span class="icon">🎒</span> Barang Bawaan</li>
                <li><span class="icon">💸</span> Tagihan</li>
                <li><span class="icon">🧾</span> Pembayaran</li>
                <li><span class="icon">⚙️</span> Generate Tagihan</li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <div class="header">
            <div class="header-title">🏠 Sistem Informasi Pengelolaan Kost</div>
        </div>
        <div class="dashboard-row">
            <div class="info-card">
                <div class="icon">🛏️</div>
                <div class="label">Kamar Kosong</div>
                <div class="value"><?= count($kamar_kosong) ?> kamar kosong</div>
                <div class="desc">Harga mulai: Rp <?= number_format(min(array_map(function($k){return $k->harga;}, $kamar_kosong)),0,',','.') ?></div>
            </div>
            <div class="info-card">
                <div class="icon">⏰</div>
                <div class="label">Akan Jatuh Tempo</div>
                <div class="value"><?= count($kamar_segera_bayar) ?> kamar</div>
                <div class="desc">
                    <?php foreach($kamar_segera_bayar as $row): ?>
                        <?= htmlspecialchars($row->nomor) ?> - <?= htmlspecialchars($row->nama) ?><br>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="info-card">
                <div class="icon">❗</div>
                <div class="label">Terlambat Bayar</div>
                <div class="value"><?= count($kamar_terlambat) ?> kamar</div>
                <div class="desc">
                    <?php foreach($kamar_terlambat as $row): ?>
                        <?= htmlspecialchars($row->nomor) ?> - <?= htmlspecialchars($row->nama) ?><br>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="section-title">📅 Statistik Bulanan</div>
            <div class="stat-box">
                <table>
                    <tr><td>Total Penghuni</td><td>: <?= count($penghuni) ?> orang</td></tr>
                    <tr><td>Total Tagihan</td><td>: Rp <?= number_format(array_sum(array_map(function($t){return $t->jml_tagihan;}, $tagihan)),0,',','.') ?></td></tr>
                    <tr><td>Total Pembayaran</td><td>: Rp 0</td></tr>
                    <tr><td>Status Pembayaran</td><td>: <span style="color:green">0 Lunas</span> | <span style="color:orange">0 Cicil</span> | <span style="color:red">0 Belum Bayar</span></td></tr>
                </table>
            </div>
        </div>
        <div class="section">
            <div class="section-title">📥 Log Terakhir</div>
            <div class="log-box">
                <div class="log-item"><span class="icon">✓</span> Tagihan bulan Juli berhasil dibuat</div>
                <div class="log-item"><span class="icon">✓</span> Pembayaran: Kamar 103 - Rp 500.000 (Cicil)</div>
                <div class="log-item"><span class="icon">✓</span> Penghuni baru masuk: Anisa (Kamar 107)</div>
            </div>
        </div>
    </div>
</div>
</body>
</html> 