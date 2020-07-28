<form action="/movies/edit/" method="post">
	
	<input class="form-control input-lg" type="input" name="slug" value="<?php echo $slug?>" placeholder="slug"></br>
	<input class="form-control input-lg" type="input" name="name" value="<?php echo $name?>" placeholder="name"></br>
	<input class="form-control input-lg" type="input" name="description" value="<?php echo $description?>" placeholder="description"></br>
	<input class="form-control input-lg" type="input" name="year" value="<?php echo $year?>" placeholder="year"></br>
	<input class="form-control input-lg" type="input" name="rating" value="<?php echo $rating?>" placeholder="rating"></br>
	<input class="form-control input-lg" type="input" name="producer" value="<?php echo $producer?>" placeholder="producer"></br>
	<input class="form-control input-lg" type="input" name="poster" value="<?php echo $poster?>" placeholder="poster"></br>
	<input class="form-control input-lg" type="input" name="playerCode" value="<?php echo $playerCode?>" placeholder="player code"></br>
	<input class="form-control input-lg" type="input" name="addDate" value="<?php echo $addDate?>" placeholder="add date"></br>
	<input class="form-control input-lg" type="input" name="categoryId" value="<?php echo $categoryId?>" placeholder="category id"></br>
	<input type="submit" class="btn btn-warning pull-right" name="submit" value="edit movie">

</form>