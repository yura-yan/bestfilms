<h1>Все новости</h1>

<h2><p><a href="create">Add news</a></p></h2>

<?php foreach ($news as $key => $value): ?>
	<p><a href="view/<?php echo $value['slug']; ?>"><?php echo $value['title']; ?></a> | <a href="edit/<?php echo $value['slug']; ?>">edit</a> | <a href="delete/<?php echo $value['slug']; ?>">X</a></p>
<?php endforeach ?>
