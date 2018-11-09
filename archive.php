<!--PAGE ACTUALITES-->

<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section id="archives_actus">

			
			<div class="title">
				<h1>ac<span class="underline">tualit</span>és</h1>
			</div>
			<div class="actus archives_actus">
				<?php
				$arguments=array('post_type'=>'actualite',
					'posts_per_page'=>'-1',
					'orderby'=>'meta_value',
					'meta_key'=>'date',
					'meta_type'=>'DateTime',
					'order'=>'DESC');
				$actualite=new WP_query($arguments);
				if($actualite->have_posts()):
					while($actualite->have_posts()):
						$actualite->the_post();
						if(strlen(get_the_title())<30){

							$title=substr(get_the_title(),0,30);

							$title.="<br />&nbsp";
						}else{
							$title=get_the_title();
						}
						strlen(get_the_content());
						$content=(substr(strip_tags(get_the_content()),0,320));
						$content.="...";
						
				?>
				<div class="actu archive_actu">
					<div class="thumbnail">
					<a href="<?php echo get_post_permalink(); ?>"><?php the_post_thumbnail('actu-size'); ?></a>
					</div>
					<div class="actu_content">
						<a href="<?php echo get_post_permalink(); ?>"><h3><?php echo $title ?></h3></a>
						<p class="date"><?php $date = get_field('date', false, false); $date = new DateTime($date);echo $date->format('j/m/Y');?></p>
						<?php echo "<p>" .$content. "</p>" ?>
						<a href="<?php echo get_post_permalink(); ?>" class="readmore">En savoir plus</a>
					</div>
				</div>
				
				<?php endwhile; endif; ?>
			</div>
			
		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>
