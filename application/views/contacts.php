<h1>Контакты</h1>
<hr>
<p>Отправьте ваш отзыв о портале КиноМонстр</p>

<form action="/contacts/" method="post">
  <div class="form-group">
    <input type="text" name="name" class="form-control input-lg" placeholder="ваше имя">
  </div>
  <div class="form-group">
    <input type="email" name="email" class="form-control input-lg" placeholder="ваш e-mail">
  </div>
  <div class="form-group">
    <textarea class="form-control" name="text"></textarea>
  </div>
  <div class="form-group">
    <?php echo $formResult; ?>
    <button class="btn btn-warning btn-lg pull-right" type="submit" name="submit">отправить</button>
  </div>
</form>
