<h2><?php echo $title; ?></h2>
<?php echo form_open('admin/artikel/tambah'); ?>

<label>Judul</label><br>
<input type="text" name="title" required><br><br>

<label>Isi Artikel</label><br>
<textarea name="content" required></textarea><br><br>

<label>Author</label><br>
<select name="author_id" required>
        <option value="">--Pilih Author--</option>
    <?php foreach($authors as $author): ?>
        <option value="<?php echo $author->id; ?>"><?php echo $author->name; ?></option>
    <?php endforeach; ?>
</select><br><br>

<label>Kategori</label><br>
<select name="category_id" required>
    <option value="">--Pilih Kategori--</option>
    <?php foreach($categories as $category): ?>
        <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
    <?php endforeach; ?>
</select><br><br>


<label>Tag</label><br>
<?php foreach($tags as $tag): ?>
    <input type="checkbox" name="tags[]" value="<?php echo $tag->id; ?>"> <?php echo $tag->name; ?><br>
<?php endforeach; ?>
<small>Bisa pilih lebih dari satu</small><br><br>

<button type="submit">Simpan</button>
<?php echo form_close(); ?>
