<form action="/posts/edit/" method="post">
	<input class="form-control input-lg" type="input" name="slug" value="<?php echo $slug_posts; ?>" placeholder="slug"><br>
	<input class="form-control input-lg" type="input" name="title" value="<?php echo $title_posts; ?>" placeholder="title"><br>
	<textarea class="form-control input-lg" name="text" placeholder="post_content"><?php echo $content_posts; ?></textarea><br>
	<input type="submit" class="btn btn-warning pull-right" name="submit" value="add posts">

</form>