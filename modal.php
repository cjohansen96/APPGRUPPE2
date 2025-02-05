<!-- Login modal for siden, brukes i top -->
<div class="modal" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body mx-3">
      <div class="md-form mb-5">
        <form action="includes/login.inc.php" method="post">
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
          <input type="email" id="defaultForm-email" class="form-control validate" name="mail" placeholder="E-mail">
          
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
          <input type="password" id="defaultForm-pass" class="form-control validate" name="pwd" placeholder="Password">
          
        </div>
        <div class="center">
          <a> Not registered?</a> <a class="white-txt" href="registration.php">Create an account </a>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="submit" name="login-submit" class="btn btn-login">Login</button>
        <style>

          .btn-login {
            background-color: black;
            color: white;
            margin-left: 5px;
          }
          .btn-login:hover{
            color: orange;
          }
          .white-txt {
            color:black;
            text-decoration: underline;
          }
        </style>
      </div>
    </form>
    </div>
  </div>
</div>



<!--- 
knapp til login på top.php
<button type="button"  href="" data-toggle="modal" data-target="#modalLoginForm"   class="btn btn-default"> <span class="fas fa-user"></span> LOGIN</button>
  </div>
  ---->
  