<?php $subs_title = get_field('subs_title'); ?>
<?php $subs_sub_title = get_field('subs_sub_title'); ?>
<?php $list = get_field('list'); ?>
<?php $subs_img = get_field('subs_img'); ?>
<?php $list = get_field('list'); ?>
<?php $email = get_field('email'); ?>
<?php $name = get_field('name'); ?>
<?php $submit_button_name = get_field('submit_button_name'); ?>
<?php $app_store_btn = get_field('app_store_btn'); ?>
<?php $app_store_btn_img = get_field('app_store_btn_img'); ?>

<!-- <pre>
	<?php print_r($app_store_btn) ?>
</pre> -->

<div class="subscription container">
	<div class="subs-text">
		<h2><?php echo $subs_title ?></h2>
		<h4 class="subs-text-h4"><?php echo $subs_sub_title ?></h4>
		<ul>
			<?php foreach ($list as $item): ?>
				<li>
					<img src="<?php echo $item['icon']['url'] ?>" alt="<?php echo $item['icon']['alt'] ?>">
					<div>
						<h4><?php echo $item['list_title'] ?></h4>
						<h6><?php echo $item['list_desc'] ?></h6>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
		<a href="<?php echo $app_store_btn['url'] ?>" target="<?php echo $app_store_btn['target'] ?>">
			<img class="app-store" src="<?php echo $app_store_btn_img['url'] ?>" alt="$app_store_btn_img['alt']">
		</a>
	</div>
	<div class="subs-img">
		<img src="<?php echo $subs_img['url'] ?>" alt="<?php echo $subs_img['alt'] ?>">
		<form action="">
			<input type="text" placeholder="Name" name="name">
			<input type="email" placeholder="Email" name="email">
			<button><?php echo $submit_button_name ?></button>
		</form>
	</div>
</div>