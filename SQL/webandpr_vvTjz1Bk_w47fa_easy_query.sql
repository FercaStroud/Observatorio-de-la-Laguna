INSERT INTO webandpr_vvTjz1Bk.w47fa_easy_query (id, name, type, alias, template, pluginVersion) VALUES (1, 'default', 'default', '', '<li <?php if (!has_post_thumbnail()) { ?> class="no-img"<?php } ?>><?php if ( has_post_thumbnail() ) { the_post_thumbnail("eq-thumbnail");}?><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><p class="entry-meta"><?php the_time("F d, Y"); ?></p><?php the_excerpt(); ?></li>', '2.2');
INSERT INTO webandpr_vvTjz1Bk.w47fa_easy_query (id, name, type, alias, template, pluginVersion) VALUES (2, 'template_862558', 'unlimited', 'Template #2', '<div>
   <h6 class="notas-related"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h6>
</div>', '2.2');
INSERT INTO webandpr_vvTjz1Bk.w47fa_easy_query (id, name, type, alias, template, pluginVersion) VALUES (3, 'template_728707', 'unlimited', 'Template #3', '<?php
   $posts = array(''-1''); // Array of posts
   if($posts){
      //Implode the posts and set a varible to pass to our exclude param.
      $post__not_in = implode(",", $posts);
   }
   echo do_shortcode(''[easy_query post__not_in="''.$post__not_in.''"]'');
?>', '2.2');
INSERT INTO webandpr_vvTjz1Bk.w47fa_easy_query (id, name, type, alias, template, pluginVersion) VALUES (4, 'template_367398', 'unlimited', 'Template #4', '<?php
global $post;
echo do_shortcode(''[easy query post__in="''. $post->ID .''"]'');
?>', '2.2');
INSERT INTO webandpr_vvTjz1Bk.w47fa_easy_query (id, name, type, alias, template, pluginVersion) VALUES (5, 'template_414028', 'unlimited', 'Template #5', '<?php 
  $postactual = get_the_ID();
  echo do_shortcode(''[easy_query post__not_in="''.$postactual.''"]'');
?>', '2.2');