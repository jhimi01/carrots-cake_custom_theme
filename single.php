<?php


get_header();
?>

	<main >

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'carrotscake' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'carrotscake' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

		

		endwhile; // End of the loop.
		?>

	</main>

<?php
get_footer();
