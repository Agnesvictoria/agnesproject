<h2><?php echo $title; ?></h2>
<?php echo form_open('admin/categories/create'); ?>


<form method="post" action="<?php echo site_url('admin/categories/create'); ?>">
    <label>Nama Kategori</label><br>
    <input type="text" name="name" required><br><br>
    <button type="submit">Simpan</button>
</form>
 