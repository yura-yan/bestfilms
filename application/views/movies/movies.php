<h1>All Movies</h1>

<h2><p><a href="create">Add movies</a></p></h2>

<?php foreach ($movies as $key => $value): ?>
	<p><a href="view/<?php echo $value['slug']; ?>"><?php echo $value['name']; ?></a> | <a href="edit/<?php echo $value['slug']; ?>">edit</a> | <a href="delete/<?php echo $value['slug']; ?>">X</a></p>
<?php endforeach ?>
