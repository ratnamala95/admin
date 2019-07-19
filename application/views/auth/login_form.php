<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class' => 'form-control'
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
	'class' => 'form-control'
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
	'class' => 'form-control'
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
	'class' => 'form-control'
);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('bower_components/font-awesome/css/font-awesome.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('bower_components/Ionicons/css/ionicons.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('dist/css/AdminLTE.min.css');?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/iCheck/square/blue.css');?>">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo site_url('Dashboard'); ?>"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <?php echo form_open($this->uri->uri_string()); ?>
    <div class="form-group has-feedback">
			<?php echo form_label($login_label, $login['id']); ?>
			<?php echo form_input($login); ?>
			<?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
    </div>
		<div class="form-group has-feedback">
			<?php echo form_label('Password', $password['id']); ?>
			<?php echo form_password($password); ?>
			<?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
		</div>
    	</tr>

    	<?php if ($show_captcha) {
    		if ($use_recaptcha) { ?>
					<div class="row">
						<div class="col-xs-8">
							<div id="recaptcha_image"></div>
						</div>
						<div class="col-xs-4">

						</div>
					</div>
    		<td colspan="2">
    		</td>
    			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
    			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
    			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<div class="recaptcha_only_if_image">Enter the words above</div>
    			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
    		</td>
    		<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
    		<td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
    		<?php echo $recaptcha_html; ?>
    	</tr>
    	<?php } else { ?>
    	<tr>
    		<td colspan="3">
    			<p>Enter the code exactly as it appears:</p>
    			<?php echo $captcha_html; ?>
    		</td>
    	</tr>
    	<tr>
    		<td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
    		<td><?php echo form_input($captcha); ?></td>
    		<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
    	</tr>
    	<?php }
    	} ?>

			<div class="form-group has-feedback ">
				<div class="col">
					<?php echo form_checkbox($remember); ?>
					<?php echo form_label('Remember me', $remember['id']); ?>
				</div>
				<div class="col">
					<?php echo form_submit(array('class'=>'btn btn-primary btn-block btn-flat',
					'type'=>'submit'), 'Sign in'); ?>
					<?php echo form_close(); ?>
				</div>
			</div>

			<div class="form-group has-feedback">
				<div class="col">
					<?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?>
				</div>
				<div class="col">
					<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>
				</div>
			</div>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('plugins/iCheck/icheck.min.js');?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
