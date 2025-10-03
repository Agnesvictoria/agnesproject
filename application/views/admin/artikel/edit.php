<!-- application/views/admin/artikel/edit.php -->
<h2><?php echo $title; ?></h2>

<?php echo form_open('admin/artikel/update/'.$artikel->id); ?>

<label>Title</label><br>
<input type="text" name="title" value="<?php echo set_value('title', $artikel->title); ?>" required><br><br>

<label>Content</label><br>
<textarea name="content" rows="5" required><?php echo set_value('content', $artikel->content); ?></textarea><br><br>

<label>Author</label><br>
<select name="author_id" required>
    <?php foreach($authors as $author): ?>
        <option value="<?php echo $author->id; ?>" 
            <?php echo ($author->id == $artikel->author_id) ? 'selected' : ''; ?>>
            <?php echo $author->name; ?>
        </option>
    <?php endforeach; ?>
</select><br><br>

<label>Category</label><br>
<select name="category_id" required>
    <?php foreach($categories as $category): ?>
        <option value="<?php echo $category->id; ?>" 
            <?php echo ($category->id == $artikel->category_id) ? 'selected' : ''; ?>>
            <?php echo $category->name; ?>
        </option>
    <?php endforeach; ?>
</select><br><br>

<label>Tags</label><br>
<?php foreach($tags as $tag): ?>
    <input type="checkbox" name="tags[]" value="<?php echo $tag->id; ?>"
        <?php echo in_array($tag->id, $artikel_tags) ? 'checked' : ''; ?>>
    <?php echo $tag->name; ?><br>
<?php endforeach; ?>
<br>

<input type="submit" value="Update">

<?php echo form_close(); ?>
