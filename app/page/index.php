
<div class="wrapper">
    <div class="head">
        <h1 class="title">Maafan Cuy</h1>
        <p>Sekarang lebaran cuy mari kita ber maaf-maafan <br> 🙏🙏🙏</p>
    </div>
    <div class="tambah">
        <form action="<?= URL_REDIRECT_POST ?>add" method="post">
            <h2>Tambah Pesan Maaf</h2>
            <label for="nama">Masukan Nama</label>
            <input type="text" name="nama" id="nama" maxlength="50" placeholder="Masukan Nama" required>
            <label for="pesan">Masukan Pesan</label>
            <textarea name="pesan" id="pesan" placeholder="Masukan pesan maaf" maxlength="400"></textarea>
            <input type="hidden" name="token" value="<?= TOKEN ?>">
            <button type="submit">Tambah</button>
        </form>
    </div>
    <div class="about">
        <h2>About</h2>
        <p>
            Website ini dibuat untuk senang-senang oleh <a href="https://github.com/AdityaWs">@AdityaWs</a> dan <a href="https://github.com/ikhsanytc">@ikhsanytc</a>
            atau (link Instagram: <a href="https://www.instagram.com/adityawahyu0116/">@adityawahyu0116</a> dan <a href="https://www.instagram.com/mhmdikhsns/">@mhmdikhsns</a>)
        </p>
    </div>
    <div class="pesan-list">
        <div class="pesan">
            <div class="pesan-title">
                <p><b>From: Aditya</b></p>
                <p>30 detik yang lalu</p>
            </div>
            <div class="pesan-content">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis vitae, doloribus enim, quas velit veritatis repudiandae quae eveniet obcaecati aliquid atque voluptatibus minima at reiciendis minus sit tempora reprehenderit! Delectus.</p>
            </div>
            <?php /**
             * San nanti kalo usernya pencet tombol lihat komentar nanti kirim ajax request ke routes/api/get_comment.php
             * Nanti div dengan class pesan-komentar nya di show terus tombol nya diganti text nya jadi tutup komentar
             * anggap aja require __APP_DIR__."/routes/api/get_comment.php" itu ceritanya lagi kirim ajax request buat ambil komentar
             * nanti kalo user pencet tombol tambah nanti kirim Ajax request buat nambah komentar, kirim request nya ke
             * routes/api/add_comment.php setelah itu di refresh (kirim lagi request buat ambil komentar)
             *  */ ?>
            <div class="pesan-komentar">
                <?php require __APP_DIR__."/routes/api/get_comment.php" ?>
                <div class="komentar-tambah">
                    <input type="text" placeholder="Masukan Komentar">
                    <button>Tambah</button>
                </div>
            </div>
            <div class="pesan-footer">
                <button>Lihat Komentar</button>
            </div>
        </div>
    </div>
</div>
