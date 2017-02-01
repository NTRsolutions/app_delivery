    <div class="navbar navbar-default navbar-fixed-top nav_admin">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> 
        <?php echo $this->Html->link(
                              $this->Html->image('logo_semEscrita_branca.png', array('class' => 'logo-min')),
                              array('controller' => 'homes', 'action' => 'index'), 
                              array('escape' => false, 'class' => 'navbar-brand min'));
        ?>
      </div>
      
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <?php
              if ($this->Session->read('Admin')) {
                echo $this->Html->link(__(
                  '<span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Sair'), 
                  array('controller' => 'admins', 'action' => 'logout'), 
                  array('escape' => false));  
              } else {
                echo $this->Html->link(__(
                  '<span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Login'), 
                  array('controller' => 'admins', 'action' => 'index_login'), 
                  array('escape' => false));
              }
            ?>
          </li>
        </ul>   
      </div><!--/.nav-collapse -->
    </div>