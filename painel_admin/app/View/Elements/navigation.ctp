    <div class="navbar navbar-inverse navbar-fixed-top nav-deliverall">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">DeliverAll</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><?php
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
            ?></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>