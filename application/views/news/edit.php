<form action="/news/edit/" method="post">
	
	<input class="form-control input-lg" type="input" name="slug" value="<?php echo $slug_news; ?>" placeholder="slug"></br>
	<input class="form-control input-lg" type="input" name="title" value="<?php echo $title_news; ?>" placeholder="news title"></br>
	<textarea class="form-control input-lg" name="text" placeholder="news text"><?php echo $content_news; ?></textarea></br>
	<input type="submit" class="btn btn-warning pull-right" name="submit" value="add news">

</form>