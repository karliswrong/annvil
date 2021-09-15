<?php

include("vars.php");

$team = get_field('team');

?>

<div class="lines">
  <?php echo $icons['lines']; ?>
</div>

<div class="about-wrapper">

  <div class="about-text">
    <h1><?php the_field('about_title'); ?></h1>
    <div class="text">
      <?php the_field('about_text'); ?>
    </div>
  </div>

  <?php if ($team): ?>

    <div class="our-team isAnimate" data-anim="anim_2">

      <div class="team-wrapper">

        <h2><?php the_field('team_title'); ?></h2>

        <div class="list">

          <?php foreach ($team as $person): ?>
            <div class="person">
              <div class="picture lazy" data-bg="<?php echo $person['picture']['sizes']['large']; ?>"></div>
              <div class="name">
                <p><?php echo $person['name']; ?></p>
                <span><?php echo $person['role']; ?></span>
              </div>
              <div class="text">
                <?php echo $person['text']; ?>
              </div>
            </div>
          <?php endforeach; ?>

        </div>

      </div>

    </div>

  <?php endif; ?>

</div>

<script type="text/javascript">
  $(document).ready(function() {
    var el = $(".lines").find("svg");

    var $svg = el.drawsvg({
      duration: 1000,
      callback: function() {}
    });

    $svg.drawsvg('animate');
  });
</script>
