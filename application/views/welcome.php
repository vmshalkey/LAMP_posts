<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="/assets/styles.css">
	<meta charset="utf-8">
	<title>Welcome</title>
</head>
<body>
	<h1>Welcome <?= $user['first_name'] ?></h1>
	<div>
		<div>
			<?php $poke_count = 0;
			foreach($my_pokes as $my_poke) {
				$poke_count++;
        	} ?>
			<h2>You've poked other users <?= $poke_count ?> times!</h2>
        </div>
		<div>
			<?php $count = 0;
			foreach($pokers as $poker) {
				$count++;
        	} ?>
			<h2>You have <?= $count ?> pokes!</h2>
			<? foreach($pokers as $poker) { ?>
				<div class="post">
					<p><?= $poker['first_name'] ?> poked you at <?= $poker['created_at'] ?></p>
					<form action="/logins/poke_someone_back" method="post">
			        	<input type="hidden" value="<?= $poker['poker'] ?>" name="getting_poked">
			        	<input type="hidden" value="<?= $poker['poke'] ?>" name="remove_poke">
			        	<input type="hidden" value="<?= $poke_count ?>" name="add_history">
			        	<input type="submit" value="Poke Back!">
			        </form>
			        <form action="/logins/ignore_poke" method="post">
			        	<input type="hidden" value="<?= $poker['poke'] ?>" name="remove_poke">
			        	<input type="submit" value="Ignore :/">
			        </form>
        		</div>
        	<?php } ?>
        </div>
	</div>

	<div>
		<h3>People you may want to poke</h3>
		<div>
			<?php foreach($friends as $friend) { ?>
				<div class="post">
					<p>Name: <?= $friend['first_name'] ?> <?= $friend['last_name'] ?></p>
					<p>Alias: <?= $friend['alias'] ?></p>
					<p>Email: <?= $friend['email'] ?></p>
					<p>Email: <?= $friend['poke_history'] ?></p>
        			<form action="/logins/poke_someone" method="post">
			        	<input type="hidden" value="<?= $friend['id'] ?>" name="getting_poked">
			        	<input type="hidden" value="<?= $poke_count ?>" name="add_history">
			        	<input type="submit" value="Poke!">
			        </form>
        		</div>
        	<?php } ?>
        </div>
	</div>
	<a href="logins/logoff_user"><button>Log Off</button></a>
</body>
</html>