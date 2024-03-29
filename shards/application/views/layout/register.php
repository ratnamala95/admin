<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register!</title>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo site_url('/styles/style.css'); ?>">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="row main">
        <div class="panel-heading">
          <div class="panel-title text-center">
            <h3>Register New User!</h3>
          </div>
        </div>
        <div class="main-login main-center">
          <form class="form-horizontal" action="<?php echo site_url('Dashboard/create_user'); ?>" method="post">
            <div class="form-group">
              <!-- <label for="username" class="col-sm-2 control-label">Username</label> -->
              <div class="col">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="uname" id="uname"  placeholder="Enter username"/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <!-- <label for="email" class="col-sm-2 control-label">Email</label> -->
              <div class="col">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="mail" id="mail"  placeholder="Enter email"/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <!-- <label for="password" class="col-sm-2 control-label">Password</label> -->
              <div class="col">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="pass" id="pass"  placeholder="Enter password"/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col">
                <div class="imput-group">
                  <input type="submit" class="btn btn-primary btn-flat btn-block login-button" name="" value="Register">
                </div>
              </div>
            </div>
            <div class="login-register">
              <a href="#">Login</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
