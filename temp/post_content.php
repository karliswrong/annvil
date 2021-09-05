<?php if ($post_content): ?>

  <div class="post-content">

    <?php foreach ($post_content as $block):
      $layout = $block['acf_fc_layout'];
    ?>

    <div class="block">

      <?php if ($layout == "subtitle"): ?>
        <div class="subtitle">
          <h2><?php echo $block['subtitle']; ?></h2>
        </div>
      <?php endif; ?>

      <?php if ($layout == "video"):
        $video_source = $block['source'];
      ?>
        <div class="video">
          <?php if ($video_source = "vimeo"): ?>
            <iframe src="https://player.vimeo.com/video/<?php echo $block['id']; ?>" width="100%" height="100%" frameborder="0"></iframe>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <?php if ($layout == "text"):
        $klass = $block['size'];
      ?>
        <div class="text <?php echo $klass; ?>">
          <?php echo $block['text']; ?>
        </div>
      <?php endif; ?>

      <?php if ($layout == "single_image"): ?>
        <div class="single-image">
          <img class="lazy" data-src="<?php echo $block['image']['sizes']['large']; ?>" alt="<?php the_title(); ?>">
          <?php if ($block['image']['caption']): ?>
            <span><?php echo $block['image']['caption']; ?></span>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <?php if ($layout == "gallery"): ?>
        <div class="gallery">
          <?php if ($block['gallery']): ?>
            <?php foreach ($block['gallery'] as $image):
              // console_log($image);
            ?>

            <div class="image">
                <img class="lazy" data-src="<?php echo $image['sizes']['large']; ?>" alt="<?php the_title(); ?>">
                <?php if ($image['caption']): ?>
                  <span><?php echo $image['caption']; ?></span>
                <?php endif; ?>
            </div>

            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      <?php endif; ?>

    </div>

    <?php endforeach; ?>

  </div>

<?php endif; ?>
