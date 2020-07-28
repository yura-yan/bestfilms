<h1><?php echo $title; ?></h1>
<hr>

  <table class="table table-striped">
    <thead>
      <tr>
        <th></th>
        <th>Фильм</th>
        <th class="text-center">Год</th>
        <th class="text-center">Рейтинг</th>
      </tr>
    </thead>
    <?php foreach ($films_rating as $key => $value): ?>
    <tbody> 

      <tr>
        <td class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
          <img class="img-responsive img-thumbnail" src="<?php echo $value['poster']; ?>" alt="<?php echo $value['name']; ?>">
        </td>
        <td class="vert-align"><a href="/movies/view/<?php echo $value['slug']; ?>"><?php echo $value['name']; ?></a></td>
        <td class="vert-align text-center"><?php echo $value['year']; ?></td>
        <td class="vert-align text-center"><span class="badge"><?php echo $value['rating']; ?></span></td>
      </tr>
      
    </tbody>
    <?php endforeach ?>
  </table>


<?php echo $pagination; ?>