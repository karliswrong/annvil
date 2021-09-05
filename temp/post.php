<?php


  include("vars.php");

  $id = get_the_ID();

  $fields = get_fields();

  $terms = get_the_terms($id,'type');

  $type = get_post_type();

  $main_pic = get_field('cover_picture');

  $post_content = get_field('post_content');

  $slug = get_post_field( 'post_name', get_post() );

  $tax_link = "/news";

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

<?php include("post_content.php") ;?>
