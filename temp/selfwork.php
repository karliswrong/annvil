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

      <div class="selfwork-item">
        <a href="<?php echo get_the_permalink($p_id); ?>" class="p-item-title"><?php echo get_the_title($p_id); ?></a>
        <a href="<?php echo get_the_permalink($p_id); ?>" class="picture lazy" data-bg="<?php echo $pic['sizes']['large']; ?>"></a>
        <a href="<?php echo get_the_permalink($p_id); ?>" class="more no-borders">
          <span>Learn More</span>
          <?php echo $icons['arrow']; ?>
        </a>
      </div>

    <?php endforeach; ?>

  </div>

<?php endif; ?>
