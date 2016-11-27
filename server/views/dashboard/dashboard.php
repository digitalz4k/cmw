<?php 
	$User = $_SESSION["user"][0];

?>
<div class="row center">
<?php

	if(!isset($User["activation_key"])) 
	{
	?>
		<p class='flow-text'>
			Hello <span class='blue-text' style='text-transform: capitalize; font-weight: 400;'><?php echo $User["first_name"]; ?></span>, your account is not activated yet.
		</p>
		<p>
			Please check your email to get the activation link or <a href=''>activate your account</a> with your code.
		</p>
	<?php
	}
	else 
	{
	?>
		<h1>Dashboard</h1>
		<pre>
		<?php print_r($_SESSION); ?>
		</pre>

	<?php
	}
	?>
</div>