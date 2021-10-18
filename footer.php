<?php

  include("temp/vars.php");

?>


<div class="footer">

  <div class="contact-us">

    <div class="wrapper">

      <div class="text">
        <?php echo $fields_options['footer_text']; ?>
      </div>

      <div class="more-button">
        <div class="table">
          <div class="cell">
            <a href="/contact-us/" class="more no-borders">
              <span>contact us</span>
              <?php echo $icons['arrow']; ?>
            </a>
          </div>
        </div>
      </div>

    </div>

  </div>

  <div class="awards">

    <p>Awarded by:</p>
    <?php if ($fields_options['awards']): ?>

      <ul>
        <?php foreach ($fields_options['awards'] as $a): ?>
          <li><img src="<?php echo $a['logo']['sizes']['large']; ?>"></li>
        <?php endforeach; ?>
      </ul>

    <?php endif; ?>

  </div>

  <div class="bottom">

    <div class="logo">
      <?php echo $icons['logo']; ?>
    </div>

    <div class="links">

      <div class="nav">
        <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
      </div>

      <div class="social">
        <?php the_field('social','options'); ?>
      </div>

    </div>

    <div class="copyright">
      <p>Annvil Ltd © <?php echo date('Y'); ?></p>
    </div>

  </div>

</div>

</div>

</body>
</html>
