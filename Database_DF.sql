-- tabel user
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255),
    remember_token VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- tabel resets passsword
CREATE TABLE password_resets (
    email VARCHAR(255),
    token VARCHAR(255),
    created_at TIMESTAMP NULL
);

-- tabel failed Jobs 
CREATE TABLE failed_jobs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    uuid VARCHAR(255) UNIQUE,
    connection TEXT,
    queue TEXT,
    payload LONGTEXT,
    exception LONGTEXT,
    failed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- tabel personal akses token 
CREATE TABLE personal_access_tokens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tokenable_id INT,
    tokenable_type VARCHAR(255),
    name VARCHAR(255),
    token VARCHAR(64) UNIQUE,
    abilities TEXT,
    last_used_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- tabel Item/Aset
CREATE TABLE aset (
    id_aset VARCHAR(255) PRIMARY KEY,
    nama_aset VARCHAR(255),
    kategori ENUM('Alat Kantor', 'Perlengkapan Kantor', 'Kendaraan', 'Tanah', 'Bangunan'),
    kondisi ENUM('Baik', 'Butuh Perbaikan', 'Rusak Total'),
    status ENUM('Ada', 'Dipinjam', 'Hilang'),
    lokasi VARCHAR(255),
    nilai DECIMAL(10, 2),
    tahun_perolehan YEAR,
    deskripsi VARCHAR(255),
    gambar VARCHAR(255)
);

-- tabel penyusutan
CREATE TABLE penyusutan (
    id_penyusutan VARCHAR(10) PRIMARY KEY,
    id_aset VARCHAR(10),
    nilai_residu DECIMAL(11,2),
    umur_manfaat DECIMAL(3,0),
    biaya_perolehanDep DECIMAL(11,2),
    FOREIGN KEY (id_aset) REFERENCES aset(id_aset)
);

-- tabel pemeliharaan
CREATE TABLE pemeliharaan (
    id_pemeliharaan VARCHAR(10) PRIMARY KEY,
    id_aset VARCHAR(10),
    biaya_pemeliharaan DECIMAL(11,2),
    tanggal_pemeliharaan DATE,
    keterangan VARCHAR(225),
    FOREIGN KEY (id_aset) REFERENCES aset(id_aset)
);