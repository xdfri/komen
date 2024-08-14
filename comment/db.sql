
gawe o database jeneng e komen

CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255),
    komentar TEXT NOT NULL,
    waktu_komen TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
