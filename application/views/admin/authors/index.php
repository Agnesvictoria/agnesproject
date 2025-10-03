<?php $this->load->view('admin/templates/header', ['title' => 'Manajemen Artikel']); ?>

<h2>Manajemen Artikel</h2>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Daftar Author</h4>
    <a href="<?php echo site_url('admin/authors/create'); ?>" class="btn btn-primary" >+ Tambah Kategori</a>
</div>



<table class="table table-bordered table-striped">
 <thead class="table-dark">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>
</thead>

    <?php foreach($authors as $a): ?>
    <tr>
        <td><?php echo $a->id; ?></td>
        <td><?php echo $a->name; ?></td>
        <td><?php echo $a->email; ?></td> 
        <td>
            <a href="<?php echo site_url('admin/authors/edit/'.$a->id); ?>" class="btn btn-sm btn-warning" >Edit</a> 
            <a href="<?php echo site_url('admin/authors/delete/'.$a->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus author ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
