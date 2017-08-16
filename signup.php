<?php
	include_once 'header.php';
?>
	<!-- signup.css included -->
	<link rel="stylesheet" type="text/css" href="css/signup.css">

	<section class="main-container">
		<div class="main-wrapper">
			<h2>Sign Up</h2>
			
			<form class="signup-form" action="includes/signup-inc.php" method="POST">
				<input type="text" name="first" placeholder="First Name">
				<input type="text" name="last" placeholder="Last Name">
				<input type="text" name="email" placeholder="E-Mail">
				<input type="text" name="userid" placeholder="User Name">
				<input type="password" name="password" placeholder="Password">
				<button type="submit" name="submit">Sign Up</button>
			</form>
		</div>
	</section>

<?php
	include_once 'footer.php';
?>