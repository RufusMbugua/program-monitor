<div class="row">
    <div id="login-info">

    </div>
    <?php
$formArray = array('id' => 'login');
echo form_open('users/login', $formArray);
    ?>
    <h2>Sign In to Program Monitor</h2>
    <?php

echo form_error('username');
echo form_label('Username','username');
$data = array('name' => 'username', 'value'=>set_value('username'), 'id' => 'username', 'placeholder' => 'John Doe', 'maxlength' => '100');
echo form_input($data);

echo form_error('password');
echo form_label('Password','password');
$data = array('name' => 'password', 'value'=>set_value('password'), 'id' => 'password', 'placeholder' => 'password', 'maxlength' => '100');
echo form_password($data);

$data = array('name' => 'login', 'id' => 'login', 'type' => 'submit', 'content' => '<i class="fa fa-sign-in"></i>Login');
echo form_button($data);

echo form_close(); ?>
</div>

