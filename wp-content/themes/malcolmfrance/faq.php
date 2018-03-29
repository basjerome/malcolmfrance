<?php /* Template Name: F.A.Q. Page Template */ get_header(); ?>
<main role="main" class="main-content">
	<?php get_template_part('breadcrumb'); ?>
	<div class="page-content">
		<h2 class="title-highlight"><span><?php echo get_the_title( $post->post_parent ); ?></span></h2>
		<h1 class="page-title"><?php the_title(); ?></h1>
		<div class="row post-meta">
			<div class="col-sm-6">
				<span class="edit">
					<?php edit_post_link( __( 'Edit', 'malcolmfrance' ), '<i class="fa fa-cog" aria-hidden="true"></i> ', '', null, '' ); ?>
				</span>
			</div>
		</div><!-- /post-meta end -->
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
			<div class="illustration" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
				<img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php echo get_post(get_post_thumbnail_id())->post_title; ?>" class="img-responsive" />
				<span class="copyright">&copy; <?php echo get_post(get_post_thumbnail_id())->_wp_attachment_image_alt; ?></span>
				<meta itemprop="url" content="<?php echo the_post_thumbnail_url(); ?>">
				<meta itemprop="width" content="2000">
				<meta itemprop="height" content="1125">
			</div>
			<meta itemprop="datePublished" content="<?php the_time('c'); ?>"/>
			<meta itemprop="dateModified" content="<?php the_modified_time('c'); ?>"/>
			<div class="legend"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></div>
			<?php endif; ?>
			<?php the_content(); ?>
      <?php $i = 0; if( get_field('mf_faq') ): ?>
      <?php while( have_rows('mf_faq') ): the_row();
        $category = get_sub_field('mf_faq_category');
        $i++;
      ?>
      <h2 class="section-title"><span><?php echo $category; ?></span></h2>
      <div class="accordion">
        <?php while( have_rows('mf_faq_subcategory') ): the_row();
          $title = get_sub_field('mf_faq_title');
        ?>
        <h3><?php echo $title; ?></h3>
        <dl>
          <?php while( have_rows('mf_faq_questions_answers') ): the_row();
            $question = get_sub_field('mf_faq_question');
            $answer = get_sub_field('mf_faq_answer');
            $i++;
          ?>
          <dt>
            <a href="#block-<?php echo $i; ?>" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="block-<?php echo $i; ?>">
              <span class="label"><i class="fa fa-arrow-circle-o-down"></i> <?php echo $question; ?> </span>
            </a>
          </dt>
          <dd class="collapse" id="block-<?php echo $i; ?>">
            <?php echo $answer; ?>
            <?php while( have_rows('mf_faq_more') ): the_row();
              $url = get_sub_field('mf_faq_more_url');
              $text = get_sub_field('mf_faq_more_text');
            ?>
            <p class="text-right"><a href="<?php echo $url; ?>" title="<?php echo $text; ?>">En savoir plus : <?php echo $text; ?></a></p>
            <?php endwhile; ?>
          </dd>
          <?php endwhile; ?>
        </dl>
        <?php endwhile; ?>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>
		</article>
		<?php endwhile; ?>
		<?php endif; ?>
	</div><!-- /page-content -->
</main><!--/ main-content end -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
