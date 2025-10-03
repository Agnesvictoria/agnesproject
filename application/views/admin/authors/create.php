<h2><?php echo $title; ?></h2>
<form method="post" action="<?php echo site_url('admin/authors/create'); ?>">
    <label>Nama</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <button type="submit">Simpan</button>
</form>
