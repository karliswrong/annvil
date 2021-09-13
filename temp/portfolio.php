<?php

include("vars.php");

$portfolio_args = array (
    'post_type'              => 'portfolio',
    'meta_query' => array(),
    'post_status'            => 'publish',
    'posts_per_page'         => -1
);

$portfolio = new WP_Query( $portfolio_args );

$featured_portfolio = get_field('featured_portfolio');

if(isMobile()){
  $columns  = 2;
}
else {
  $columns = 3;
}

console_log($columns);

?>

<div class="page-title">
  <h1><?php echo $fields_options['portfolio_intro']; ?></h1>
</div>

<div class="filters">
  <p>Filter By:</p>

  <?php if ($all_portfolio_terms): ?>
    <ul>
      <li class="active"><a href="/our-portfolio">all projects</a></li>
      <?php foreach ($all_portfolio_terms as $p):
      ?>
        <li><a href="<?php echo get_term_link($p->slug, 'type'); ?>"><?php echo $p->name; ?></a></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</div>

<?php if ($portfolio->posts): ?>

  <div class="portfolio-items">

    <?php if ($featured_portfolio):
      $main_pic = get_field('main_picture', $featured_portfolio);
      // console_log($main_pic);
    ?>

    <div class="portfolio-item featured">
      <a href="<?php echo get_the_permalink($featured_portfolio); ?>" class="picture lazy" data-bg="<?php echo $main_pic['sizes']['large']; ?>"></a>
      <div class="title">
        <a href="<?php echo get_the_permalink($featured_portfolio); ?>" class="p-item-title"><?php echo get_the_title($featured_portfolio); ?></a>
        <a href="#" class="more no-borders">
          <span>Learn More</span>
          <?php echo $icons['arrow']; ?>
        </a>
      </div>
    </div>

    <?php endif; ?>

    <div class="small-items">

      <?php

       $count = 0;

        foreach ($portfolio->posts as $p):
          $p_id = $p->ID;
          $pic = get_field('vertical_picture', $p_id);
          ?>

          <?php if ($p_id != $featured_portfolio): ?>

            <?php if ($count % $columns == 0) { ?>
              <div class="group">
                <div class="group-wrapper">

                  <div class="items-wrapper">


            <?php } ?>

              <div class="portfolio-item animate">

                <a href="<?php echo get_the_permalink($p_id); ?>" class="p-item-title">
                  <div class="table">
                    <div class="cell bottom">
                        <?php echo get_the_title($p_id); ?>
                    </div>
                  </div>
                </a>

                <a href="<?php echo get_the_permalink($p_id); ?>" class="picture lazy" data-bg="<?php echo $pic['sizes']['large']; ?>"></a>

                <a href="<?php echo get_the_permalink($p_id); ?>" class="more no-borders">
                  <span>Learn More</span>
                  <?php echo $icons['arrow']; ?>
                </a>

              </div>

              <?php $count++; ?>

            <?php if ($count % $columns == 0) { ?>
              </div>
              </div>
              </div>
            <?php } ?>


          <?php endif; ?>

      <?php endforeach; ?>

    </div>

    </div>
    </div>
    </div>

  </div>

<?php endif; ?>
