<?php
	if (is_page() && !is_front_page() || is_single() || is_category() || is_search()) {
?>
	<ul class="breadcrumb">
		<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
			<a href="<?php echo home_url(); ?>" title="Accueil Malcolm France" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a>
		</li>
		<?php
			if (is_page()) {
				$myAncestors = get_post_ancestors($post);
				if ($myAncestors) {
					$myAncestors = array_reverse($myAncestors);
					foreach ($myAncestors as $crumb) {
						echo '<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><a itemprop="url" href="'.get_permalink($crumb).'"><span itemprop="title">'.get_the_title($crumb).'</span></a></li>';
					}
				}
			}
			// echo get_category_parents( get_the_category(), true, ' &raquo; ' );
			if (is_category()) {
				$myCategory = get_the_category();
				$myParentId = get_category($myCategory[0])->parent;
				$myParent = get_category( $myParentId );
				if (single_term_title('', false) != $myParent->name) {
					echo '<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><a href="' . esc_url( get_category_link( $myParentId ) ) . '" itemprop="url"><span itemprop="title">'.$myParent->name.'</span></a></li>';
				}
				echo '<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><span itemprop="title">'.single_term_title('', false).'</span></li>';
			}
			if (is_single()) {
				$category = get_the_category();
				$category_parent_id = $category[0]->category_parent;
				$category_child_name = $category[0]->name;
				$category_child_link = home_url().'/'.$category[0]->slug;
				if ( $category_parent_id != 0 ) {
					$category_parent = get_term( $category_parent_id, 'category' );
					$category_parent_name = $category_parent->name;
					$category_parent_link = home_url().'/'.$category_parent->slug;
					get_term( $category_parent_id, 'category' );
					echo '<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><span itemprop="title"><a href="'.$category_parent_link.'">'.$category_parent_name.'</a></span></li>';
					echo '<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><span itemprop="title"><a href="'.$category_child_link.'">'.$category_child_name.'</a></span></li>';
				} else {
					echo '<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><span itemprop="title"><a href="'.$category_child_link.'">'.$category_child_name.'</a></span></li>';
				}
			}
			if (is_page() || is_single()) {
				echo '<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><span itemprop="title">'.the_title('', '', false).'</span></li>';
			}
			if (is_search()) {
				echo '<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><span itemprop="title">Résultat de la recherche</span></li>';
			}
		?>
	</ul>
<?php
	}
?>
