			<!-- footer -->
			<footer class="footer" role="contentinfo">
				<ul>
					<li><h3>activ'est</h3></li>
					<li><span class="bold">TEL</span> : 02 99 53 05 66</li>
					<li><span class="bold">FAX</span> : 02 99 26 13 59</li>
					<li><a href="#">www.activ-est.fr</a></li>
				</ul>
				<ul>
					<li><h3>navigation</h3></li>
					<li><a href="https://activ-est.fr/qui-sommes-nous/">Qui sommes-nous?</a></li>
                    <li><a href="https://activ-est.fr/contact">Contact</a></li>
                    <li><a href="https://activ-est.fr/actualite/">Actualités</a></li>
                                        <?php if ( is_user_logged_in() ) {?><li><a href="https://activ-est.fr/annonces">Annonces</a></li><?php }?>
					<li><a href="https://activ-est.fr/evenements/">Événements</a></li>
					<li><a href="https://activ-est.fr/inscription-a-la-newsletter">Inscription à la newsletter</a></li>
				</ul>
				<ul>
					<li><h3>restez connectés !</h3></li>
					<li><a href="https://www.facebook.com/ZI.ActivEst/" target="_blank">
						<img src="<?php echo get_template_directory_uri();?>/img/fb.png" onmouseover="this.src='<?php echo get_template_directory_uri();?>/img/fbhover.png';" onmouseout="this.src='<?php echo get_template_directory_uri();?>/img/fb.png';" alt="Facebook ActivEst Zone-Industrielle réseaux sociaux"/>
					</a></li>
                                        <?php if ( is_user_logged_in() ) {?>
                                        <li><h4>Se déconnecter !</h4></li>
                                        <li><a href="https://activ-est.fr/wp-login.php?action=logout">Déconnection</a></li>
                                        <?php }?>
				</ul>
				
			</footer>
			<!-- /footer -->
			
			<!-- Mentions légales -->
			<p class="mentions_footer">
				<a href="https://activ-est.fr/mentions">Mentions légales</a>&nbsp;&nbsp;-&nbsp;&nbsp;<a href="http://www.activ-est.fr/">Activ'Est <?php the_date('Y'); ?></a>
			</p>
		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
