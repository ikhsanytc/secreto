<?php
database_query_prepare("SELECT * FROM pesan ORDER BY time DESC");
database_query_execute();
$data = database_query_result();
?>
<div class="wrapper">
    <div class="head">
        <h1 class="title">Maafan Cuy</h1>
        <p>Sekarang lebaran cuy mari kita ber maaf-maafan <br> 🙏🙏🙏</p>
    </div>
    <div class="tambah">
        <form action="<?= URL_REDIRECT_POST ?>add" method="post" id="komen-form">
            <h2>Tambah Pesan Maaf</h2>
            <label for="nama">Masukan Nama</label>
            <input type="text" name="nama" id="nama" maxlength="50" placeholder="Masukan Nama" required>
            <label for="pesan">Masukan Pesan</label>
            <textarea name="pesan" id="pesan" placeholder="Masukan pesan maaf" maxlength="400"></textarea>
            <button type="submit" style="cursor: pointer;">Tambah</button>
        </form>
    </div>
    <div class="about">
        <h2>About</h2>
        <p>
            Website ini dibuat untuk senang-senang oleh <a target="_blank" href="https://github.com/AdityaWs">@AdityaWs</a> dan <a target="_blank" href="https://github.com/ikhsanytc">@ikhsanytc</a>
            atau (link Instagram: <a target="_blank" href="https://www.instagram.com/adityawahyu0116/">@adityawahyu0116</a> dan <a target="_blank" href="https://www.instagram.com/ikhsan.ajhh/">@ikhsan.ajhh</a>)
        </p>
    </div>
    <?php foreach ($data as $pesan) : ?>
        <div class="pesan-list">
            <div class="pesan" id="<?= $pesan["id"] ?>">
                <div class="pesan-title">
                    <p><b>From: <?=htmlspecialchars( $pesan['name'] )?></b></p>
                    <p><?php
                        $time = $pesan['time'];
                        $time_current = time();
                        $timee = $time_current - $time;
                        if ($timee < 60) {
                            echo $timee . ' Detik Yang Lalu';
                        } elseif ($timee < 3600) {
                            $minute = floor($timee / 60);
                            echo $minute . ' Menit Yang Lalu';
                        } elseif ($timee < 86400) {
                            $hour = floor($timee / 3600);
                            echo $hour . ' Jam Yang Lalu';
                        } else {
                            $day = floor($timee / 86400);
                            echo $day . ' Hari Yang Lalu';
                        }
                        ?></p>
                </div>
                <div class="pesan-content">
                    <p><?=htmlspecialchars( $pesan['pesan'] )?></p>
                </div>
                <?php /**
                 * San nanti kalo usernya pencet tombol lihat komentar nanti kirim ajax request ke routes/api/get_comment.php
                 * Nanti div dengan class pesan-komentar nya di show terus tombol nya diganti text nya jadi tutup komentar
                 * anggap aja require __APP_DIR__."/routes/api/get_comment.php" itu ceritanya lagi kirim ajax request buat ambil komentar
                 * nanti kalo user pencet tombol tambah nanti kirim Ajax request buat nambah komentar, kirim request nya ke
                 * routes/api/add_comment.php setelah itu di refresh (kirim lagi request buat ambil komentar)
                 *  */ ?>
                <div class="pesan-komentar">
                    <b>Komentar (<?= $pesan['count'] ?>)</b>
                    <!-- <div class="komentar-tambah">
                        <input type="text" placeholder="Masukan Komentar">
                        <button type="button">Tambah</button>
                    </div> -->
                </div>
                <div class="pesan-footer">
                    <a href="<?= URL_REDIRECT_GET ?>maaf&id=<?= $pesan['id'] ?>"><button name="view-komen" style="cursor: pointer;">Lihat Komentar</button></a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="about" style="text-align: center; font-size: 0.875rem;">
        <p>Copyright &copy; 2023 Aditya Wahyu Santoso & Muhammad Ikhsan</p>
    </div>
</div>
