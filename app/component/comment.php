<b>Komentar (<?= $pesan['count'] ?>)</b>
<div id="pesan-id">
    <?php foreach ($komen as $comment) : ?>
        <div class="komentar">
            <p><?=e($comment["pesan"]) ?></p>
            <p class="komentar-time">
            <?php
                $time = $comment['time'];
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
        <div style="padding: 3px;"></div>
    <?php endforeach; ?>
</div>
