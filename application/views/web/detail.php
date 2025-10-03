<div class="card shadow mb-4">
    <div class="card-body">
        <h2><?= $artikel->title ?></h2>
        <p><strong>Author:</strong> <?= $artikel->author_name ?></p>
        <p><strong>Category:</strong> <?= $artikel->category_name ?></p>
        <p><strong>Tags:</strong> 
            <?php 
            $tag_list = array_column($tags, 'name'); 
            echo !empty($tag_list) ? implode(', ', $tag_list) : '-';
            ?>
        </p>
        <hr>
        <p><?= nl2br($artikel->content) ?></p>
        <a href="<?= site_url('web') ?>" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
