<h2><?php echo $title; ?></h2>
<form method="post" action="<?php echo site_url('admin/tags/create'); ?>">
    <label>Nama Tag</label><br>
    <input type="text" name="name" required><br><br>
    <button type="submit">Simpan</button>
</form>
