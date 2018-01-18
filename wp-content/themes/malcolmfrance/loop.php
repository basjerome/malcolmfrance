<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>" class="clearfix" title="<?php the_title(); ?>">
		<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			<span class="img">
				<img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
			</span>
		<?php endif; ?>
		<span class="post-meta">
			<span class="date"><i class="fa fa-calendar"></i> <?php the_time('l j F Y'); ?></span>
			<span class="hour"><i class="fa fa-clock-o"></i> <?php the_time('g'); ?>H<?php the_time('i'); ?></span>
		</span>
		<span class="post-title"><?php the_title(); ?></span>
		<span class="post-desc"><?php the_excerpt(); ?></span>
	</a>
</article>
<?php endwhile; ?>
<?php endif; ?>
