<h2><a href="create">Add post</a></h2>

<?php foreach ($posts as $key => $value): ?>
	<p><a href="/posts/<?php echo $value['slug'] ?>"><?php echo $value['title']; ?></a> | <a href="edit/<?php echo $value['slug'] ?>">edit</a> | <a href="delete/<?php echo $value['slug'] ?>">X</a></p>
<?php endforeach ?>