
<b>Komentar (3)</b>

<?php foreach($_ENV["comments"] as $comment): ?>
    <div class="komentar">
        <p><?=e( $comment["comment"] )?></p>
        <p class="komentar-time">30 detik yang lalu</p>
    </div>
<?php endforeach; ?>
