<?php


  include("vars.php");

  if(isMobile()){
    $columns  = 2;
  }
  else {
    $columns = 3;
  }

  $id = get_the_ID();

  $fields = get_fields();

  $terms = get_the_terms($id,'type');

  $type = get_post_type();

  $main_pic = get_field('main_picture');

  $post_content = get_field('post_content');

  $slug = get_post_field( 'post_name', get_post() );

  if ( $type == "selfwork" ) {
      $tax_link = "/selfwork";

      $related_args = array (
          'post_type'              => 'selfwork',
          'post_status'            => 'publish',
          'post__not_in' => array($id),
          'order'            => 'RAND',
          'posts_per_page'         => $columns
      );

  } else {
    $tax_link = get_term_link($terms[0]->term_id);

    $related_args = array (
        'post_type'              => 'portfolio',
        'post_status'            => 'publish',
        'post__not_in' => array($id),
        'order'            => 'RAND',
        'posts_per_page'         => $columns,
        'tax_query' => array(
            array (
                'taxonomy' => 'type',
                'field' => 'term_id',
                'terms' =>  $terms[0]->term_id
            )
        ),
    );

  }

  $related = new WP_Query( $related_args );

  console_log($related->posts);

?>

<div class="project-title">

  <div class="back">
    <div class="table">
      <div class="cell">
        <a href="<?php echo $tax_link; ?>">
          <?php echo $icons['arrow']; ?>
          <span>Back</span>
        </a>
      </div>
    </div>
  </div>

  <div class="title">
      <h1><?php the_title(); ?></h1>
  </div>

</div>


<div class="project-picture">
  <?php if ($main_pic) { ?>
    <img src="<?php echo $main_pic['sizes']['large']; ?>" alt="<?php echo get_the_title(); ?>">
  <?php } else { ?>
    <p>Does not have main_pic.</p>
  <?php } ?>
</div>

<div class="project-details">
  <ul>
    <li>
      <p>Name</p>
      <p><?php the_field('project_name'); ?></p>
    </li>
    <li>
      <p>Value by Annvil</p>
      <p><?php the_field('function'); ?></p>
    </li>
    <li>
      <p>Year</p>
      <p><?php the_field('year'); ?></p>
    </li>
    <li>
      <p>Location</p>
      <p><?php the_field('location'); ?></p>
    </li>
    <li>
      <p>Commisioned by</p>
      <p><?php the_field('commisioned_by'); ?></p>
    </li>
    <li>
      <p>Team</p>
      <?php the_field('team'); ?>
    </li>
    <li>
      <p>Photographer</p>
      <?php the_field('photographer'); ?>
    </li>
    <li>
      <p>Area</p>
      <?php the_field('area'); ?>
    </li>
  </ul>
</div>

<?php include("post_content.php") ;?>

<?php if ($related->posts) { ?>

  <div class="portfolio-items related">

      <div class="wrapper">

        <h2>See other projects:</h2>

          <div class="items">

            <?php

             $count = 0;

              foreach ($related->posts as $p):
                $p_id = $p->ID;
                $pic = get_field('main_picture', $p_id);
                ?>

                <a href="<?php echo get_the_permalink($p_id); ?>" class="portfolio-item animate">

                    <div class="p-item-title">
                      <div class="table">
                        <div class="cell bottom">
                            <?php echo get_the_title($p_id); ?>
                        </div>
                      </div>
                    </div>

                    <div class="picture">
                      <div class="picture-wrapper">
                          <img class="lazy" data-src="<?php echo $pic['sizes']['large']; ?>">
                      </div>
                    </div>

                    <div class="more no-borders">
                      <span>Learn More</span>
                      <?php echo $icons['arrow']; ?>
                    </div>
                </a>

            <?php endforeach; ?>

          </div>

      </div>

  </div>

<?php } else { ?>
  <div class="no-posts-found">
    <p>Sorry. This portfolio category is under CONSTRUCTION...</p>
  </div>
<?php } ?>
