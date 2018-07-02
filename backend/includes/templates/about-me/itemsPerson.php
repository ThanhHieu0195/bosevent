<?php
/**
 * @var $post_id integer
 * @var $person array : 'name', 'postion', 'avatar'
 */
$people = get_field('info', $post_id);
?>
<?php foreach ($people as $person):  ?>
	<?php
	$avatar = isset($person['avatar']['url']) ? $person['avatar']['url'] : '';
	$name = isset($person['name']) ? $person['name'] : '';
	$position = isset($person['position']) ? $person['position'] : '';
	?>
<div class="col-team col-xs-6 col-md-4">
	<div class="team-profile">
		<img alt="<?php echo esc_attr(str_replace(' ', '-', $name)) ?>" src="<?php echo esc_url($avatar) ?>">
		<div class="team-hover">
			<div class="team-content">
				<div class="team-name">
					<h6><?php echo esc_html($name) ?></h6>
					<div class="team-spec"><?php echo esc_html($position) ?></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>
