<?php

include("vars.php");

$news_args = array (
    'post_type'              => 'post',
    'meta_query' => array(),
    'post_status'            => 'publish',
    'posts_per_page'         => -1
);

$news = new WP_Query( $news_args );

$featured_post= get_field('featured_post');

console_log($news->posts);

?>

<div class="page-title">
  <h1><?php echo $fields_options['news_intro']; ?></h1>
</div>

<div class="filters">
  <p>Filter By:</p>

  <?php if ($all_news_terms): ?>
    <ul>
      <li class="active"><a href="/news">all news</a></li>
      <?php foreach ($all_news_terms as $p):
      ?>
        <li><a href="<?php echo get_term_link($p->slug, 'category'); ?>"><?php echo $p->name; ?></a></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</div>

<?php if ($news->posts): ?>

  <div class="portfolio-items">

    <?php if ($featured_post):
      $main_pic = get_field('cover_picture', $featured_post);
      // console_log($main_pic);
    ?>

      <div class="portfolio-item featured">
        <a href="<?php echo get_the_permalink($featured_post); ?>" class="picture lazy" data-bg="<?php echo $main_pic['sizes']['large']; ?>"></a>
        <div class="title">
          <a href="<?php echo get_the_permalink($featured_post); ?>" class="p-item-title"><?php echo get_the_title($featured_post); ?></a>
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

        foreach ($news->posts as $p):
          $id = $p->ID;
          $p_fields = get_fields($id);
          $cover_picture = $p_fields['cover_picture']['sizes']['large'];

          if ($p_fields['article_link']) {
            $link = $p_fields['article_link'];
            $target = "_blank";
          } else {
            $link = get_the_permalink($id);
            $target = "";
          }

          ?>

          <?php if ($id != $featured_post): ?>

            <?php if ($count % 3 == 0) { ?>
              <div class="group">
                <div class="group-wrapper">

                  <div class="items-wrapper">


            <?php } ?>

              <div class="post-item">

                <?php if ($cover_picture) { ?>
                  <a href="<?php echo $link; ?>" target="<?php echo $target; ?>" class="cover">
                      <img class="lazy" data-src="<?php echo $cover_picture; ?>" alt="<?php echo get_the_title($id); ?>" />
                  </a>
                <?php } ?>

                <a href="<?php echo $link; ?>" target="<?php echo $target; ?>" class="post-title"><?php echo get_the_title($id); ?></a>

                <?php if ($p_fields['article_name']): ?>
                  <div class="featured-in">
                    <span>Featured in <a href="<?php echo $p_fields['article_link']; ?>" target="_blank"><?php echo $p_fields['article_name']; ?></a></span>
                  </div>
                <?php endif; ?>

                <?php if ($p_fields['intro']) { ?>
                  <p class="post-intro"><?php echo $p_fields['intro']; ?></p>
                <?php } ?>

                <div class="more">
                  <?php if ($p_fields['article_link']) { ?>
                    <a href="<?php echo $link; ?>" target="_blank"><span>Link to article</span> <?php echo $icons['arrow']; ?></a>
                  <?php } else { ?>
                    <a href="<?php echo $link; ?>"><span>Read Article</span> <?php echo $icons['arrow']; ?></a>
                  <?php } ?>
                </div>

              </div>

              <?php $count++; ?>

            <?php if ($count % 3 == 0) { ?>
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
