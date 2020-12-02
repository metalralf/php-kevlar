<?php foreach($model as $m): ?>
	<article class="home">
		<h2><?= $m['title'] ?></h2>
		<p><?= $m['intro'] ?></p>
		<img src="<?= $m['image'] ?>" alt="">
		<p><?= $m['body'] ?></p>
	</article>
<?php endforeach; ?>