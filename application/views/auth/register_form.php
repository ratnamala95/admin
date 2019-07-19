<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo site_url('bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo site_url('bower_components/font-awesome/css/font-awesome.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo site_url('bower_components/Ionicons/css/ionicons.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo site_url('dist/css/AdminLTE.min.css');?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo site_url('plugins/iCheck/square/blue.css');?>">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="<?php echo site_url('index2.html');?>"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>
		<?php echo form_open($this->uri->uri_string()); ?>
		<div class="form-group has-feedback">
			<?php echo form_label('Username', $username['id']); ?>
			<?php echo form_input($username); ?>
			<?php if ($use_username) { ?>
			<?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?>
			<?php } ?>
		</div>

		<div class="form-group has-feedback">
			<?php echo form_label('Email Address', $email['id']); ?>
			<?php echo form_input($email); ?>
			<?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
		</div>

		<div class="form-group has-feedback">
			<?php echo form_label('Password', $password['id']); ?>
			<?php echo form_password($password); ?>
			<?php echo form_error($password['name']); ?>
		</div>

		<div class="form-group has-feedback">
			<?php echo form_label('Confirm Password', $confirm_password['id']); ?>
			<?php echo form_password($confirm_password); ?>
			<?php echo form_error($confirm_password['name']); ?>
		</div>


	<?php if ($captcha_registration) {
		if ($use_recaptcha) { ?>

			<div class="form-group has-feedback">
				<div id="recaptcha_image"></div>
				<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
				<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
				<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
				<div class="recaptcha_only_if_image">Enter the words above</div>
				<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
			</div>


			<div class="form-group has-feedback">
				<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
					<?php echo form_error('recaptcha_response_field'); ?>
					<?php echo $recaptcha_html; ?>
				<?php } else { ?>

					<p>Enter the code exactly as it appears:</p>
					<?php echo $captcha_html; ?>


					<?php echo form_label('Confirmation Code', $captcha['id']); ?>
					<?php echo form_input($captcha); ?>
					<?php echo form_error($captcha['name']); ?>
				<?php }
					} ?>
					<?php echo form_submit('register', 'Register'); ?>
					<?php echo form_close(); ?>
			</div>

		</div>
	</div>

<script src="<?php echo site_url('bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo site_url('bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- iCheck -->
<script src="<?php echo site_url('plugins/iCheck/icheck.min.js');?>"></script>
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
