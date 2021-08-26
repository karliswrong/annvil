<?php

  include("vars.php");

  $fields = get_fields();

  console_log($fields);

?>

<!-- Welcome -->
<div class="welcome">

  <p class="slogan"><?php echo $fields['slogan']; ?></p>
  <p class="desc"><?php echo $fields['desc']; ?></p>

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
              $picture = $p_fields['vertical_picture']['sizes']['large'];
            }

          ?>

          <li class="<?php echo $klass; ?>">

            <a href="<?php echo get_the_permalink($id); ?>">

              <div class="picture lazy" data-bg="<?php echo $picture; ?>"></div>
              <span><?php echo get_the_title($id); ?></span>

            </a>

          </li>

        <?php endforeach; ?>

        </ul>

      <?php endif; ?>

    </div>

  </div>

  <a href="#" class="more">
    <span>See our portfolio</span>
    <?php echo $icons['arrow']; ?>
  </a>

</div>

<!-- Self Work -->
<div class="self-work">

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

  <a href="#" class="more white">
    <span>See more self inititated work</span>
    <?php echo $icons['arrow']; ?>
  </a>

</div>

<!-- Featured News -->
<div class="featured-news">
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


          </li>

        <?php endforeach; ?>

        </ul>

      <?php endif; ?>

    </div>

    <a href="#" class="more no-borders">
      <span>see more news</span>
      <?php echo $icons['arrow']; ?>
    </a>

  </div>
</div>
