<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<h1></h1>
			<form class="search" method="post" action="searchform.php?action=search" role="search">
				<input class="search-input" type="text" name="recherche" placeholder="Votre recherche">
				<input type="submit" name="submit" value="RECHERCHER">
			</form>			
			<section>
				<?php
				include("functions_tiw.php");
				$connexion=connexion();


				if(isset($_GET['action'])){
					switch($_GET['action']){

						case "search":

						break;
						}

					}






				?>
			</section>
		</section>

		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
