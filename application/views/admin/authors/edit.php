<h2><?php echo $title; ?></h2>
<form method="post" action="<?php echo site_url('admin/authors/edit/'.$author->id); ?>">
    <label>Nama</label><br>
    <input type="text" name="name" value="<?php echo $author->name; ?>" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email" value="<?php echo $author->email; ?>" required><br><br>

    <button type="submit">Update</button>
</form>
