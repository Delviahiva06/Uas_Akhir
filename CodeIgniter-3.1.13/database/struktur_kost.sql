-- Struktur tabel tb_kamar
CREATE TABLE IF NOT EXISTS tb_kamar (
    id_kamar INT AUTO_INCREMENT PRIMARY KEY,
    no_kamar VARCHAR(10) NOT NULL,
    harga_sewa INT NOT NULL,
    status ENUM('kosong','isi') DEFAULT 'kosong'
);

-- Struktur tabel tb_penghuni
CREATE TABLE IF NOT EXISTS tb_penghuni (
    id_penghuni INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    id_kamar INT NOT NULL,
    tgl_masuk DATE NOT NULL,
    tgl_bayar_terakhir DATE NOT NULL,
    FOREIGN KEY (id_kamar) REFERENCES tb_kamar(id_kamar)
);

-- Struktur tabel tb_tagihan
CREATE TABLE IF NOT EXISTS tb_tagihan (
    id_tagihan INT AUTO_INCREMENT PRIMARY KEY,
    id_penghuni INT NOT NULL,
    periode DATE NOT NULL,
    status ENUM('lunas','belum') DEFAULT 'belum',
    FOREIGN KEY (id_penghuni) REFERENCES tb_penghuni(id_penghuni)
); 