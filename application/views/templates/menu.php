    <!-- MENU start -->
      <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9"> <!-- Меняем блоки местами col-lg-pull-9 -->
          
          <div class="panel panel-info hidden-xs hidden-sm">
            <div class="panel-heading"><div class="sidebar-header">Поиск</div></div>
            <div class="panel-body">
              <form role="search" action="/search/" method="post">
                <div class="form-group">
                  <div class="input-group">
                    <input type="search" name="q_search" class="form-control input-lg" value="<?php echo($value) ?>" placeholder="Ваш запрос">
                    <div class="input-group-btn">
                      <button class="btn btn-default btn-lg" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                  </div>
                </div>
              </form> 
            </div>
          </div>

        <?php if (!$this->dx_auth->is_logged_in()): ?>
         
            <div class="panel panel-info hidden-xs hidden-sm">
              <div class="panel-heading"><div class="sidebar-header">Вход</div></div>
              <div class="panel-body">

                <form role="form" action="/auth/login/" method="post">
                  <div class="form-group">
                    <p class="red"><?php echo $loginError; ?></p>
                    <input type="text"  class="form-control input-lg" placeholder="Логин" name="username"> 
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control input-lg" placeholder="Пароль" name="password">
                  </div>
                    <input type="hidden" name="uri" value="<?php echo($this->uri->uri_string()) ?>">
                    <a href="/auth/register/" class="btn btn-warning pull-right">регистрация</a>
                  <button type="submit" class="hidden-xs visible-sm visible-md visible-lg btn btn-warning btnmargin">вход</button>
                  <button type="submit" class="visible-xs hidden-sm hidden-md hidden-lg btn btn-warning btnmarginXS">вход</button>
                </form>
               </div>
            </div>  

          <?php else: ?>

            <div class="panel panel-info hidden-xs hidden-sm">
              <div class="panel-heading"><div class="sidebar-header">Привет <?php echo ucfirst($this->dx_auth->get_username()); ?></div></div>
               <form role="form" action="/auth/logout/" method="post">
                <div class="panel-body">
                   <input type="hidden" name="uri" value="<?php echo($this->uri->uri_string()) ?>">
                   <button type="submit" class="btn btn-warning pull-right">выход</button>
                    <!-- <a href="/auth/logout" class="btn btn-warning pull-right">выход</a> -->
                </div>
              </form>
            </div>  

          <?php endif ?>

          <div class="panel panel-info hidden-xs hidden-sm">
            <div class="panel-heading"><div class="sidebar-header">Новости</div></div>
            <div class="panel-body">
              
             <?php foreach ($news as $key => $value): ?>
               <p><a href="/news/view/<?php echo $value['slug']; ?>"><?php echo $value['title']; ?></a></p>
             <?php endforeach ?>
              
            </div>
          </div>


          <div class="panel panel-info hidden-xs hidden-sm">
            <div class="panel-heading"><div class="sidebar-header">Рейтинг фильмов</div></div>
            <div class="panel-body">
                
                <ul class="list-group">

                  <?php foreach ($films as $key => $value): ?>
                     <li class="list-group-item list-group-warning">
                    <span class="badge"><?php echo $value['rating']; ?></span>
                    <a href="/movies/view/<?php echo $value['slug']; ?>"><?php echo $value['name']; ?></a>
                  </li>
                  <?php endforeach ?>
                  

                </ul>

            </div>
          </div>

        <?php if ($this->uri->segment(1, 0) === 0): ?> 

           <?php if (!$this->dx_auth->is_logged_in()): ?>
         
            <div class="panel panel-info visible-xs visible-sm hidden-md hidden-lg">
              <div class="panel-heading"><div class="sidebar-header">Вход</div></div>
              <div class="panel-body">

                <form role="form" action="/auth/login/" method="post">
                  <div class="form-group">
                    <p class="red"><?php echo $loginError; ?></p>
                    <input type="text"  class="form-control input-lg" placeholder="Логин" name="username"> 
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control input-lg" placeholder="Пароль" name="password">
                  </div>
                    <input type="hidden" name="uri" value="<?php echo($this->uri->uri_string()) ?>">
                    <a href="auth/register/" class="btn btn-warning pull-right">регистрация</a>
                  <button type="submit" class="hidden-xs visible-sm visible-md visible-lg btn btn-warning btnmargin">вход</button>
                  <button type="submit" class="visible-xs hidden-sm hidden-md hidden-lg btn btn-warning btnmarginXS">вход</button>
                </form>
               </div>
            </div>  

          <?php else: ?>

            <div class="panel panel-info visible-xs visible-sm hidden-md hidden-lg">
              <div class="panel-heading"><div class="sidebar-header">Привет <?php echo $this->dx_auth->get_username(); ?></div></div>
              <form role="form" action="/auth/logout/" method="post">
                <div class="panel-body">
                   <input type="hidden" name="uri" value="<?php echo($this->uri->uri_string()) ?>">
                   <button type="submit" class="btn btn-warning pull-right">выход</button>
                    <!-- <a href="/auth/logout" class="btn btn-warning pull-right">выход</a> -->
                </div>
              </form>
            </div>  

          <?php endif ?>

          <div class="panel panel-info visible-xs visible-sm hidden-md hidden-lg">
            <div class="panel-heading"><div class="sidebar-header">Новости</div></div>
            <div class="panel-body">
              
             <?php foreach ($news as $key => $value): ?>
               <p><a href="/news/view/<?php echo $value['slug']; ?>"><?php echo $value['title']; ?></a></p>
             <?php endforeach ?>
              
            </div>
          </div>


          <div class="panel panel-info visible-xs visible-sm hidden-md hidden-lg">
            <div class="panel-heading"><div class="sidebar-header">Рейтинг фильмов</div></div>
            <div class="panel-body">
                
                <ul class="list-group">

                  <?php foreach ($films as $key => $value): ?>
                     <li class="list-group-item list-group-warning">
                    <span class="badge"><?php echo $value['rating']; ?></span>
                    <a href="/movies/view/<?php echo $value['slug']; ?>"><?php echo $value['name']; ?></a>
                  </li>
                  <?php endforeach ?>
                  

                </ul>

            </div>
          </div> 

        <?php endif ?>

      </div> 

      <!-- MENU end -->
