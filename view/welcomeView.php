<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>

<h1>Bienvenue sur mon Blog !</h1>

<div id="welcome_section">

	<section id="welcome_explication">

		<h3>Blablabla</h3>

		<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce rutrum iaculis felis, eu tempus tortor luctus et. Aenean ante dui, fringilla non velit ac, ullamcorper vehicula magna. Nulla facilisi. Aliquam erat volutpat. Morbi posuere tortor turpis, a maximus nibh sodales eu. Mauris vitae mollis purus. Ut tempus dolor eu luctus pellentesque.</p>

		<p> Aenean convallis mauris eu arcu iaculis, vitae tempus massa iaculis. Duis dictum quis mi ac faucibus. Nunc sit amet orci et est commodo interdum vitae a dui. Nam mollis libero sit amet rutrum hendrerit. Donec ultrices sed purus eu fermentum. Morbi sit amet risus placerat, volutpat sem nec, congue ligula. Curabitur et efficitur nunc. </p>

		<p> Donec pharetra lacus sed ex cursus blandit. Ut a sapien ullamcorper, ultrices metus in, aliquet felis. Nam vehicula ullamcorper metus, non placerat nunc mollis ac. Suspendisse id libero convallis, iaculis ex eu, gravida eros. Cras et erat rhoncus, ultrices ligula facilisis, aliquam nibh. Nunc a volutpat sem. Sed ac nisi metus. Duis erat lectus, commodo sit amet auctor sit amet, commodo sit amet lectus. Vivamus nec dui id turpis euismod porta ac et justo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur metus dolor, cursus a eleifend sit amet, hendrerit et nulla. Vivamus a massa mollis, lobortis metus vel, dapibus lacus. Maecenas ac finibus leo. Nulla maximus, massa a lobortis suscipit, elit purus interdum orci, eu luctus metus risus ornare mi.</p>

	</section>

	<section id="welcome_lastPosts">

	</section>

	</div>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>