<?php

include("vars.php");

$term_id = get_queried_object()->term_id;

$portfolio_args = array (
    'post_type'              => 'portfolio',
    'tax_query' => array(
        array (
            'taxonomy' => 'type',
            'field' => 'term_id',
            'terms' =>  $term_id
        )
    ),
    'meta_query' => array(),
    'post_status'            => 'publish',
    'posts_per_page'         => -1
);

$portfolio = new WP_Query( $portfolio_args );

if(isMobile()){
  $columns  = 2;
}
else {
  $columns = 3;
}

console_log($portfolio->posts);

?>

<div class="page-title">
  <h1><?php echo $fields_options['portfolio_intro']; ?></h1>
</div>

<div class="filters">

  <?php if ($all_portfolio_terms): ?>
    <ul>
      <li><a href="/our-portfolio">all projects</a></li>
      <?php foreach ($all_portfolio_terms as $p):
        if ($p->term_id == $term_id) {
          $klass = "active";
        } else {
          $klass = "";
        }
      ?>
        <li class="<?php echo $klass; ?>"><a href="<?php echo get_term_link($p->slug, 'type'); ?>"><?php echo $p->name; ?></a></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</div>

<?php if ($portfolio->posts) { ?>

  <div class="portfolio-items">

    <div class="small-items">

      <?php

       $count = 0;

        foreach ($portfolio->posts as $p):
          $p_id = $p->ID;
          $picture = get_field('main_picture', $p_id);
          ?>

          <?php if ($p_id != $featured_portfolio): ?>

            <?php if ($count % $columns == 0) { ?>
              <div class="group">
                <div class="group-wrapper">

                  <div class="items-wrapper">


            <?php } ?>

              <div class="portfolio-item animate">

                <a href="<?php echo get_the_permalink($p_id); ?>" >

                  <div class="p-item-title">
                    <div class="table">
                      <div class="cell bottom">
                          <?php echo get_the_title($p_id); ?>
                      </div>
                    </div>
                  </div>

                  <div class="picture">
                    <div class="picture-wrapper">
                      <img class="lazy" data-src="<?php echo $picture['sizes']['medium']; ?>">
                    </div>
                  </div>

                  <div class="more no-borders">
                    <span>Learn More</span>
                    <?php echo $icons['arrow']; ?>
                  </div>

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

<?php } else { ?>
  <div class="no-posts-found">
    <p>Sorry. This portfolio category is under CONSTRUCTION...</p>
  </div>
<?php } ?>
