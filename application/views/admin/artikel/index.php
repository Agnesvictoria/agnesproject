<?php $this->load->view('admin/templates/header', ['title' => 'Manajemen Artikel']); ?>

<h2>Manajemen Artikel</h2>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Daftar Artikel</h4>
    <a href="<?php echo site_url('admin/artikel/tambah'); ?>" class="btn btn-primary">+ Tambah Artikel</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Author</th>
            <th>Kategori</th>
            <th>Tag</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <?php foreach($articles as $a): ?>
        <tr>
            <td><?php echo $a->id; ?></td>
            <td><?php echo $a->title; ?></td>
            <td><?php echo $a->author_name; ?></td>
            <td><?php echo $a->categories; ?></td>
            <td><?php echo $a->tags; ?></td>
            <td>
                <a href="<?php echo site_url('admin/artikel/edit/'.$a->id); ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="<?php echo site_url('admin/artikel/detail/'.$a->id); ?>" class="btn btn-sm btn-info">Detail</a>
                <a href="<?php echo site_url('admin/artikel/delete/'.$a->id); ?>" class="btn btn-sm btn-danger" 
                   onclick="return confirm('Yakin mau hapus artikel ini?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
