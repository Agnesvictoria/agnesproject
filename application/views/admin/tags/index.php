<?php $this->load->view('admin/templates/header', ['title' => 'Manajemen Artikel']); ?>

<h2>Manajemen Artikel</h2>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Daftar Tag</h4>
    <a href="<?php echo site_url('admin/tags/create'); ?>" class="btn btn-primary" >+ Tambah Tag</a>
</div>


<table class="table table-bordered table-striped">
    <thead class="table-dark">
    <tr>
        <th>No</th>
        <th>Nama Tag</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <?php $no=1; foreach($tags as $t): ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $t->name; ?></td>
        <td>
            <a href="<?php echo site_url('admin/tags/edit/'.$t->id); ?>" class="btn btn-sm btn-warning" >Edit</a> 
            <a href="<?php echo site_url('admin/tags/delete/'.$t->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
 