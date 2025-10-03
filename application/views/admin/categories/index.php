<?php $this->load->view('admin/templates/header', ['title' => 'Manajemen Artikel']); ?>

<h2>Manajemen Artikel</h2>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Daftar Kategori</h4>
    <a href="<?php echo site_url('admin/categories/create'); ?>" class="btn btn-primary" >+ Tambah Kategori</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        
    <tr>
        <th>ID</th>
        <th>Nama Kategori</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <?php foreach($categories as $c): ?> 
    <tr>
        <td><?php echo $c->id; ?></td>
        <td><?php echo $c->name; ?></td>
        <td>
    <a href="<?php echo site_url('admin/categories/edit/'.$c->id); ?>" class="btn btn-sm btn-warning">Edit</a> 
    <a href="<?php echo site_url('admin/categories/delete/'.$c->id); ?>" class="btn btn-sm btn-danger" 
       onclick="return confirm('Yakin mau hapus kategori ini?')">Hapus</a>
</td>

    </tr>
    <?php endforeach; ?>
</table>
