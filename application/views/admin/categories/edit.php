<h2><?php echo $title; ?></h2>
<form method="post" action="<?php echo site_url('admin/categories/update/'.$category['id']); ?>">
    <label>Nama Kategori</label><br>
    <input type="text" name="name" value="<?php echo $category['name']; ?>" required><br><br>
    <button type="submit">Update</button>
</form>
