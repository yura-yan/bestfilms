<h2><?php echo $title; ?></h2>
<hr>

<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="<?php echo $playerCode; ?>" frameborder="0" allowfullscreen></iframe>
</div>
<div class="well info-block text-center">
  Год: <span class="badge"><?php echo $year; ?></span>
  Рейтинг: <span class="badge"><?php echo $rating; ?></span>
  Режиссер: <span class="badge"><?php echo $producer; ?></span>
</div>

<div class="margin-8"></div>

<h2>Описание <?php echo $title; ?></h2>
<hr>

<div class="well">
  <?php echo $descriptions; ?>
</div>

<div class="margin-8"></div>

<h2>Отзывы об <?php echo $title; ?></h2>
<hr>

<?php foreach ($comments as $key => $value): ?>
  <div class="panel panel-info">
    <div class="panel-heading"><i class="glyphicon glyphicon-user"></i> <span><?php echo get_user_by_id($value['user_id'])->username; ?></span> </div>
    <div class="panel-body">
     <?php echo $value['comment_text']; ?>
    </div>
</div>
<?php endforeach ?>


<form action="/movies/createComment/<?php echo($slug) ?>" method="post">
  <!-- <div class="form-group">
    <input type="text" placeholder="ваше имя" class="form-control input-lg">
  </div> -->
  <div class="form-group">
    <input type="hidden" name="user_id" value="<?php echo $this->dx_auth->get_user_id(); ?>">
    <input type="hidden" name="movie_id" value="<?php echo $movie_id; ?>">
    <textarea class="form-control" name="comment_text" placeholder="<?php echo $commentError; ?>"></textarea>
  </div>
  <input type="submit" class="btn btn-warning pull-right" name="submit" value="отправить">
  <!-- <button class="btn btn-lg btn-warning pull-right">отправить</button> -->
</form>