<?php

  include("vars.php");

  $fields = get_fields();

  console_log($fields);

?>

<!-- Welcome -->
<div class="welcome">

  <p class="slogan"><?php echo $fields['slogan']; ?></p>
  <p class="desc"><?php echo $fields['desc']; ?></p>

  <div class="paklajs">
    <video id="vid_paklajs" class="lazy" data-src="<?php echo $fields['video']['url']; ?>" playsinline muted loop autoplay preload="metadata" >
        <source type="<?php echo $fields['video']['mime_type']; ?>" data-src="<?php echo $fields['video']['url']; ?>" />
    </video>
  </div>

  <a href="#" class="more">
    <span>Have a deeper read</span>
    <?php echo $icons['arrow']; ?>
   </a>

</div>

<!-- Featured Projects -->
<div class="featured-projects">

  <div class="wrapper">

    <div class="list">
      <h2><?php echo $fields_options['portfolio_intro']; ?></h2>

      <?php if ($fields['featured_projects']): ?>

        <ul>

          <?php foreach ($fields['featured_projects'] as $p):
            $ind++;
            $id = $p->ID;
            $p_fields = get_fields($id);

            if ($ind == 1) {
              $klass = "large";
              $picture = $p_fields['main_picture']['sizes']['large'];
            } else {
              $klass = "";
              $picture = $p_fields['main_picture']['sizes']['large'];
            }

          ?>

          <li class="<?php echo $klass; ?> animate">

            <a href="<?php echo get_the_permalink($id); ?>">

              <div class="picture">
                <div class="picture-wrapper">
                    <img class="lazy" data-src="<?php echo $picture; ?>">
                </div>
              </div>

              <span><?php echo get_the_title($id); ?></span>

            </a>

          </li>

        <?php endforeach; ?>

        </ul>

      <?php endif; ?>

    </div>

  </div>

  <a href="/our-portfolio/" class="more">
    <span>See our portfolio</span>
    <?php echo $icons['arrow']; ?>
  </a>

</div>

<!-- Self Work -->
<div class="self-work isAnimate" data-anim="anim_1" id="block-selfwork">

  <div class="lines">
    <?php echo $icons['lines']; ?>
  </div>

  <div class="wrapper">

    <div class="subtitle">
      <span>Self initiated work</span>
      <h2><?php echo $fields_options['self_work_intro']; ?></h2>
    </div>

    <div class="list">

      <?php if ($fields['featured_self-work']): ?>

        <ul>

          <?php foreach ($fields['featured_self-work'] as $p):
            $ind++;
            $id = $p->ID;
            $p_fields = get_fields($id);
            $picture = $p_fields['main_picture']['sizes']['large'];

          ?>

          <li>

            <a href="<?php echo get_the_permalink($id); ?>">

              <div class="picture lazy" data-bg="<?php echo $picture; ?>"></div>
              <span><?php echo $p_fields['project_name']; ?><br>
                <?php echo $p_fields['location']; ?>
              </span>

            </a>

          </li>

        <?php endforeach; ?>

        </ul>

      <?php endif; ?>

    </div>
  </div>

  <a href="/selfwork/" class="more white">
    <span>See more self inititated work</span>
    <?php echo $icons['arrow']; ?>
  </a>

</div>

<!-- Featured News -->
<div class="featured-news isAnimate" data-anim="anim_2">
  <div class="wrapper">

    <h2><?php echo $fields_options['news_intro']; ?></h2>

    <div class="posts">

      <?php if ($fields['featured_news']): ?>

        <ul>

          <?php foreach ($fields['featured_news'] as $p):
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

          <li>

            <div class="post-item animate">

              <a href="<?php echo $link; ?>" target="<?php echo $target; ?>">

                <?php if ($cover_picture) { ?>
                  <div class="cover">
                      <img class="lazy" data-src="<?php echo $cover_picture; ?>" alt="<?php echo get_the_title($id); ?>" />
                  </div>
                <?php } ?>

                <div class="post-title"><?php echo get_the_title($id); ?></div>

                <?php if ($p_fields['article_name']): ?>
                  <div class="featured-in">
                    <span>Featured in <?php echo $p_fields['article_name']; ?></span>
                  </div>
                <?php endif; ?>

                <?php if ($p_fields['intro']) { ?>
                  <p class="post-intro"><?php echo $p_fields['intro']; ?></p>
                <?php } ?>

                <div class="more">
                  <?php if ($p_fields['article_link']) { ?>
                    <span>Link to article</span> <?php echo $icons['arrow']; ?>
                  <?php } else { ?>
                    <span>Read Article</span> <?php echo $icons['arrow']; ?>
                  <?php } ?>
                </div>

              </a>

            </div>


          </li>

        <?php endforeach; ?>

        </ul>

      <?php endif; ?>

    </div>

    <a href="/news" class="more no-borders">
      <span>see more news</span>
      <?php echo $icons['arrow']; ?>
    </a>

  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    var el = $(".lines").find("svg");

    var $svg = el.drawsvg({

    });

  });
</script>
