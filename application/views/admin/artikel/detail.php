<?php $this->load->view('admin/templates/header', ['title' => $title]); ?>

<div class="container mt-4">
    <h2>Judul: <?php echo $artikel->title; ?></h2>
    <hr>

    <p><strong>Author:</strong> <?php echo $artikel->author_name; ?></p>
    <p><strong>Category:</strong> <?php echo $artikel->category_name; ?></p>
    <p><strong>Tags:</strong> 
        <?php 
        $tag_list = array_column($tags, 'name'); 
        echo !empty($tag_list) ? implode(', ', $tag_list) : '-';
        ?>
    </p>
    <hr>
    <h3><?php echo nl2br($artikel->content); ?></h3>
    <p><small>Dibuat: <?php echo $artikel->created_at; ?></small></p>

    <a href="<?php echo site_url('admin/artikel'); ?>" class="btn btn-secondary mt-3">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

