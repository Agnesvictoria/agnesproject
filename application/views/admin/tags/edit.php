<h2><?php echo $title; ?></h2>
<form method="post" action="<?php echo site_url('admin/tags/edit/'.$tag->id); ?>">
    <label>Nama Tag</label><br>
    <input type="text" name="name" value="<?php echo $tag->name; ?>" required><br><br>
    <button type="submit">Update</button>
</form>
