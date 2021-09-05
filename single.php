<?php

get_header();

$ID = get_the_ID();

$type = get_post_type();

console_log($terms);

if ($type == "portfolio" || $type == "selfwork") {
  include("temp/project.php");
}

if ($type == "post") {
  include("temp/post.php");
}

get_footer();

?>
