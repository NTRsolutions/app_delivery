<div class="container text-center col-lg-4 col-lg-offset-4 col-md-8 col-md-offset-2" style="margin-top: 10%">

  <form class="form-signin" action="../admins/login" controller="admins" id="AdminLoginForm" method="post" accept-charset="utf-8">

    <h2 class="form-signin-heading">Login</h2>
    
    <label for="inputEmail" class="sr-only">Login</label>
    <input name="data[Admin][login]" type="text" id="AdminEmail" class="form-control" placeholder="Login" required autofocus>
    
    <label for="inputPassword" class="sr-only">Senha</label>
    <input name="data[Admin][senha]" type="password" id="AdminSenha" class="form-control" placeholder="Senha" required>
    
    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>

    <br>
    <?php 
    	echo $this->Html->link(__('Esqueceu a senha?'), 
              array('action' => 'recuperar_senha'), 
              array('escape' => false));
    ?>
  </form>

</div>