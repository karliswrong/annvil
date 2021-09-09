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
        <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
      </div>

      <div class="social">
        <p>Follow us on social media: <a href="#">Instagram</a></p>
        <p class="address">Kalnciema street 37,<br>
          Riga, Latvia, LV-1046<br>
          Tel. (+371) 263 914 61<br>
          <a href="#">info@annvil.lv</a></p>
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
