<?php
database_query_prepare('SELECT * FROM pesan WHERE id=?');
database_query_bind("s", $_GET['id']);
database_query_execute();
$data = database_query_result()[0];


?>

<div class="wrapper">
    <div class="pesan-list">
        <div class="pesan">
            <div class="pesan-title">
                <p><b>From: <?= $data['name'] ?></b></p>
                <p><?php
                    $time = $data['time'];
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
                <p><?= $data['pesan'] ?></p>
            </div>
            <?php /**
             * San nanti kalo usernya pencet tombol lihat komentar nanti kirim ajax request ke routes/api/get_comment.php
             * Nanti div dengan class pesan-komentar nya di show terus tombol nya diganti text nya jadi tutup komentar
             * anggap aja require __APP_DIR__."/routes/api/get_comment.php" itu ceritanya lagi kirim ajax request buat ambil komentar
             * nanti kalo user pencet tombol tambah nanti kirim Ajax request buat nambah komentar, kirim request nya ke
             * routes/api/add_comment.php setelah itu di refresh (kirim lagi request buat ambil komentar)
             *  */ ?>
            <div class="pesan-komentar">
                <div id="komen-ajhh"></div>
                <form class="komentar-tambah" id="form-komen">
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <input type="text" placeholder="Masukan Komentar" name="komen-input">
                    <button type="submit">Tambah</button>
                </form>
            </div>
            <div class="pesan-footer">
                <a href="<?= URL_REDIRECT_GET ?>index"><button name="view-komen" style="cursor: pointer;">Kembali</button></a>
            </div>
        </div>
    </div>
    <div style="padding-bottom: 800px;"></div>
</div>
<script>
    function updateComments() {
        var komen = document.getElementById('komen-ajhh');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                komen.innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "<?= URL_REDIRECT_API ?>get_comment&id=<?= $_GET['id'] ?>", true);
        xhttp.send();
    }


    function insertComments() {
        var inp = document.getElementsByName('komen-input')[0].value;
        console.log(inp);
        var id = document.getElementsByName('id')[0].value;
        var komen = document.getElementById('komen-ajhh');
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "<?= URL_REDIRECT_API ?>add_comment");
        xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                komen.innerHTML = this.responseText;
                document.getElementsByName('komen-input')[0].value = '';
            }
        }
        xhttp.send('komen=' + encodeURIComponent(inp) + '&id=' + encodeURIComponent(id));
        setTimeout(updateComments, 1000);
    }
    document.getElementById('form-komen').addEventListener('submit', function(e) {
        e.preventDefault();
        insertComments();
    })
    updateComments();
</script>
