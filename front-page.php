<?php get_header(); ?>

<?php 

          $args = array(
            'post_type'     => 'post',
            'category_name' => 'featured',  
            );

            $the_query = new WP_Query($args);

         ?>

      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 row-carousel">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <?php if (have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>

                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $the_query->current_post; ?>" class="<?php if($the_query->current_post == 0): ?>active<?php endif; ?>"></li>

                <?php endwhile; endif; ?>
              </ol>

              <?php rewind_posts(); ?>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">

                <?php if (have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>

                <div class="item <?php if($the_query->current_post == 0): ?>active<?php endif; ?>">

                  <?php 
                    $thumbnail_id = get_post_thumbnail_id();
                    $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'thumbnail-size', true);
                    $thumbnail_meta = get_post_meta('$thumbnail_id', '_wp_attachment_image_alt', true);
                  ?>

                  <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_url[0] ?>" alt="<?php echo $thumbnail_meta; ?>"></a>
                  <div class="carousel-caption"><?php the_title(); ?></div>
                </div>

                <?php endwhile; endif; ?>

              </div>

              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          
          <?php if (dynamic_sidebar('front-left')); ?>

        </div>
        <div class="col-md-4">

          <?php if (dynamic_sidebar('front-center')); ?>

       </div>
        <div class="col-md-4">

          <?php if (dynamic_sidebar('front-right')); ?>

        </div>
      </div>

 <?php get_footer(); ?>