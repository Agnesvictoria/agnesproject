<div class="row">
<?php foreach($articles as $artikel): ?>
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <h5 class="card-title"><?= $artikel->title ?></h5>
                <p class="card-text">
                    <strong>Author:</strong> <?= $artikel->author_name ?><br>
                    <strong>Category:</strong> <?= $artikel->categories ?><br>
                    <strong>Tags:</strong> <?= $artikel->tags ?>
                </p>
                <a href="<?= site_url('web/detail/'.$artikel->id) ?>" class="btn btn-primary">Detail</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>
