<?php include 'header-home.php' ?>



<!-- slider<script type="text/javascript">
	/*********POP IN************/
	function pop(.formulaire_sendinblue) {
		document.getElementById(pop1).style.display='block';
		return false;
	};
	function hide(div) {
	document.getElementById(div).style.display='none';
	return false;
	};
</script> 


	<div id="pop1" class="formulaire_sendinblue">

			<div class="popin">
			<span class="fa fa-times"></span>

			<iframe class="formulaire_sendinblue" src="https://my.sendinblue.com/users/subscribe/js_id/2po8q/id/1" frameborder="0" scrolling="auto"></iframe>
		</div>
	</div>
-->

<div class="slider_container" >
	<div class="mainslider">

		<div class="slide">

			<a href="http://activ-est.fr/actualite/">

			<p class="slide_txt">activ'est<br />

			Voir les actualités</p>

			<img src="<?php echo get_template_directory_uri();?>/img/slide2.jpg" alt="activ-est actualités slider">

			</a>

		</div>

		<div class="slide">

			<a href="http://activ-est.fr">

			<p class="slide_txt">activ'est<br />

			Faites votre recherche dans l'annuaire</p>

			<img src="<?php echo get_template_directory_uri();?>/img/slide1.jpg" alt="activ-est annuaire slider">

			</a>

		</div>

		<div class="slide">

			<a href="http://activ-est.fr/evenement">

			<p class="slide_txt">activ'est<br />

			Quels sont les prochains évènements ?</p>

			<img src="<?php echo get_template_directory_uri();?>/img/slide3.jpg" alt="activ-est evenements slider">

			</a>

		</div>

	</div>

</div>


<!----------- Presentation --------------->

<section class="presentation">

	<div class="title">

		<h2>activ<span class="underline">'est, c</span>'est...</h2>

	</div>

	<div class="bubbles">

		<figure>

			<img src="<?php echo get_template_directory_uri();?>/img/bulle1.png" alt="écopole entreprises zone activités rennes chantepie cesson-sevigné activest ZI sud-est">

			<figcaption>

				<p>Une association qui fédère</p>

				<h4>les entreprises<br />de l'écopole</h4>

			</figcaption>

		</figure>

		<span class="linkbubble"></span>

		<figure class="secfig">

			<img src="<?php echo get_template_directory_uri();?>/img/bulle2.png" alt="écopole entreprises zone activités rennes chantepie cesson-sevigné activest ZI sud-est">

			<figcaption>

				<p>Étendue sur trois communes</p>

				<h4>rennes, chantepie<br />et cesson-sevigné</h4>

			</figcaption>

		</figure>

		<span class="linkbubble"></span>

		<figure>

			<img src="<?php echo get_template_directory_uri();?>/img/bulle3.png" alt="écopole entreprises zone activités rennes chantepie cesson-sevigné activest zi sud ouest">

			<figcaption>

				<p>Qui met en relation</p>

				<h4>les entreprises<br />entre-elles</h4>

			</figcaption>

		</figure>

	</div>

</section>



<!----------- Actualités --------------->

<section class="actualites">

	<div class="title">

		<h2>ac<span class="underline">tualit</span>és</h2>

	</div>

	<div class="actus">

		<?php

		$arguments=array('post_type'=>'actualite',

					'posts_per_page'=>'3',

					'orderby'=>'meta_value',

					'meta_key'=>'date',

					'order'=>'DESC',

					'meta_type'=> 'DATETIME');

		$actualite=new WP_query($arguments);

		if($actualite->have_posts()):

			while($actualite->have_posts()):

				$actualite->the_post();

				if (strlen(get_the_title())<30){

							$title=substr(get_the_title(),0,30);

							$title.="<br />&nbsp";

						}else{

							$title=get_the_title();

						}

						strlen(get_the_content());

						$content=(substr(strip_tags(get_the_content()),0,309));

						$content.="...";

		?>

			<div class="actu">

				<a href="<?php echo get_post_permalink(); ?>"><?php the_post_thumbnail('actu-size'); ?></a>		

				<div class="actu_content">

					<a href="<?php echo get_post_permalink(); ?>"><h3><?php echo $title ?></h3></a>

					<p class="date"><?php $date = get_field('date', false, false); $date = new DateTime($date);echo $date->format('j/m/Y');?></p>

					<?php echo $content; ?>

					<a href="<?php echo get_post_permalink(); ?>" class="readmore">En savoir plus</a>

				</div>

			</div>



		<?php endwhile; endif; ?>

	</div>

</section>



<!----------- Become member --------------->

<section class="becomember">

	<h3>devenez membre, et ne ratez plus l'actualité activ'est !</h3>

	<a href="https://activ-est.fr/inscription/" class="becomemberbuton">Devenir membre</a>

</section>





<?php get_footer(); ?>





<?php wp_reset_query(); ?>

