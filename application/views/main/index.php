<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">

 <h2>Новые фильмы</h2>
          <hr>
          <div class="row">

            <?php foreach ($movies as $key => $value): ?>

              <div class="films_block col-lg-3 col-md-3 col-sm-3 col-xs-6">
                <a href="/movies/view/<?php echo $value['slug'] ?>"><img src="<?php echo $value['poster'] ?>" alt="<?php echo $value['name'] ?>"></a> 
                <div class="film_label"><a href="/movies/view/<?php echo $value['slug'] ?>"><?php echo $value['name'] ?></a></div>
              </div>

            <?php endforeach ?>

          </div>

          <div class="margin-8"></div>

 <h2>Новые сериалы</h2>
           <hr>
            <div class="row">

              <?php foreach ($serials as $key => $value): ?>

                <div class="films_block col-lg-3 col-md-3 col-sm-3 col-xs-6">
                  <a href="/movies/view/<?php echo $value['slug']; ?>"><img src="<?php echo $value['poster']; ?>" alt="<?php echo $value['name']; ?>"></a>
                  <div class="film_label"><a href="/movies/view/<?php echo $value['slug']; ?>"><?php echo $value['name']; ?></a></div>
              </div>
              
              <?php endforeach ?>

            </div>

          <div class="margin-8"></div>

        

          <?php foreach ($posts as $key => $value): ?>

              <a href="/posts/<?php echo $value['slug']; ?>"><h3><?php echo $value['title']; ?></h3></a>
              <hr>
              <p><?php echo $value['text']; ?></p>
              <a href="/posts/<?php echo $value['slug']; ?>" class="btn btn-warning pull-right">читать</a>
           
              <div class="marg"></div>

          <?php endforeach ?>

      
   
        
