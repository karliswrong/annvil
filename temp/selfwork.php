<?php

include("vars.php");

$selfwork_args = array (
    'post_type'              => 'selfwork',
    'post_status'            => 'publish',
    'posts_per_page'         => -1
);

$selfwork = new WP_Query( $selfwork_args );

console_log($selfwork);

?>

<div class="page-title self">
  <h1><?php echo $fields_options['self_work_intro']; ?></h1>
</div>

<?php if ($selfwork->posts): ?>

  <div class="selfwork-items">

    <?php foreach ($selfwork->posts as $p):
      $p_id = $p->ID;
      $pic = get_field('main_picture', $p_id);
    ?>

      <a href="<?php echo get_the_permalink($p_id); ?>" class="selfwork-item">

        <div class="picture">
          <div class="picture-wrapper">
              <img class="lazy" data-src="<?php echo $pic['sizes']['large']; ?>">
          </div>
        </div>

        <div class="p-item-title"><?php echo get_the_title($p_id); ?></div>
        <div class="more no-borders">
          <span>Learn More</span>
          <?php echo $icons['arrow']; ?>
        </div>

      </a>

    <?php endforeach; ?>

  </div>

<?php endif; ?>
