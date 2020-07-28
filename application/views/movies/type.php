<h1><?php echo $title; ?></h1>
<hr>

<?php foreach ($movies_data as $key => $value): ?>
  <div class="row">
  <div class="well clearfix">
    <div class="col-lg-3 col-md-3 text-center">
      <img class="img-thumbnail" src="<?php echo $value['poster']; ?>" alt="<?php echo $value['name']; ?>">
      <p><?php echo $value['name']; ?></p>
    </div>

    <div class="col-lg-9 col-md-9">
      <p>
       <?php echo $value['descriptions']; ?>
      </p>
    </div>

    <div class="col-lg-12 col-md-12">
      <a href="/movies/view/<?php echo $value['slug']; ?>" class="btn btn-lg btn-warning pull-right">подробнее</a>
    </div> 
  </div>
</div>
<?php endforeach ?>

<?php echo $pagination; ?>