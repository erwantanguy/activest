<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section id="archives_actus">

			
			<div class="title">
				<h1>év<span class="underline">énemen</span>ts</h1>
			</div>
                    <div class="actus archives_actus" id="lesevents">
                        <?php the_content(); ?>
                    </div>
                    <div class="title">
				<h2>événe<span class="underline">ments p</span>assés</h2>
			</div>
                    <div class="actus archives_actus" id="oldsevents">
                        <div id="em-wrapper">
                            <div class="css-events-list">
                                <table class="events-table">
                                    <thead class="cache">
                                        <tr>
                                            <th class="event-time image" scope="col"> </th>
                                            <th class="event-time" scope="col">Date / Heure</th>
                                            <th class="event-description" scope="col">Évènement</th>
                                            <th class="event-time" scope="col"> </th>
                                        </tr>
                                    </thead>
                                        <tbody>
                        <?php $events = EM_Events::get(array(
                'scope'=>'past',
                'order'=> 'DESC',
                 ));
            foreach($events as $event):
                
                $EM_Event = em_get_event($event->post_id, 'post_id');global $EM_Event;
                //print_r(em_get_event($event->post_id, 'post_id'));
                //$event->output('#_LOCATIONID')?>
                                            <tr>
                                                <td class="cache"><a href="<?php echo $EM_Event->output('#_EVENTURL');?>"><?php echo $EM_Event->output('#_EVENTIMAGE{160,100}');?></a></td>
                                                <td class="large"><time datetime="<?php echo $EM_Event->output('#_{Y-m-d\TH:i:s}'); ?>"><?php echo $EM_Event->output('#_EVENTDATES').'<br>'.$EM_Event->output('#_EVENTTIMES'); ?></time></td>
                                                <td>
                                                    <h3><a href="<?php echo get_post_permalink( $EM_Event->post_id ); ?>"><?= $EM_Event->event_name;?></a></h3>
                                                    <?php if($EM_Event->output('#_LOCATIONNAME')):?><i><?php echo $EM_Event->output('#_LOCATIONNAME'); ?>, <?php echo $EM_Event->output('#_LOCATIONTOWN'); ?> <?php echo $EM_Event->output('#_LOCATIONSTATE'); ?></i><?php endif; ?>
                                                </td>
                                                <td class="cache"><a href="<?php echo $EM_Event->output('#_EVENTURL'); ?>" class="btn btn-default">+ d'infos</a><br><a href="<?php echo $EM_Event->output('#_EVENTICALURL'); ?>"><i class="fa fa-calendar-plus-o" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Ajouter l'événement dans l'agenda"></i></a> <?php if($EM_Event->output('#_LOCATIONRSSURL')):?><a href="<?php echo $EM_Event->output('#_LOCATIONRSSURL'); ?>" data-toggle="tooltip" data-placement="bottom" title="Flux des événements du lieu"><i class="fa fa-map-marker" aria-hidden="true"></i></a><?php endif; ?></td>
                                            </tr>
                <?php endforeach;?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
			<div class="actus archives_actus hidden">
				<?php
				$arguments=array('post_type'=>'evenements2',
					'posts_per_page'=>'-1',
					'orderby'=>'meta_value',
					'meta_key'=>'date',
					'meta_type'=>'DateTime',
					'order'=>'DESC');
				$actualite=new WP_query($arguments);
				if($actualite->have_posts()):
					while($actualite->have_posts()):
						$actualite->the_post();
						if (strlen(get_the_title())>25){
							$title=substr(get_the_title(),0,25);
							$title.="...";
						}else{
							$title=get_the_title();
						}
						strlen(get_the_content());
						$content=(substr(strip_tags(get_the_content()),0,300));
						$content.="...";

				?>
                            
				<div class="actu archive_actu">
                                    <div class="image_evenement"><a href="<?php echo get_post_permalink();?>"><?php the_post_thumbnail('actu-size'); ?></a></div>
					<div class="actu_content">
                                            <a href="<?php echo get_post_permalink();?>"><h3><?php echo $title ?></h3></a>
						<p class="date"><?php $date = get_field('date', false, false); $date = new DateTime($date);echo $date->format('j/m/Y');?></p>
						<?php echo $content; ?>
						<a href="<?php echo get_post_permalink(); ?>" class="readmore">En savoir plus</a>
					</div>
                                    
                                   
				</div>

				<?php endwhile; endif; ?>
			</div>
			
		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>
