<?php

/*
Template Name: event
*/
$EM_Event = em_get_event($post->ID, 'post_id');global $EM_Event;
get_header(); ?>
<main role="main">
    <section class="single">
        <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="underline"><?php the_title(); ?></span></a></h1>
            <div id="info">
                <div class="middle">
                    <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_post_thumbnail('large'); // Fullsize image for the single post ?>
                            </a>
                    <?php endif; ?>
                </div>
                <div id="lesinfos">
                    <div id="col1">
                        <h3>Date(s)</h3>
                        <time datetime="<?php echo $EM_Event->output('#_{Y-m-d\TH:i:s}'); ?>"><?php echo $EM_Event->output('#_EVENTDATES').'<br>'.$EM_Event->output('#_EVENTTIMES'); ?></time>
                        <?php if($EM_Event->output('#_LOCATIONID')):?>
                            <h3>Pour venir</h3>
                            <div itemscope itemtype="http://schema.org/Organization">
                                <span itemprop="name"><?php echo $EM_Event->output('#_LOCATIONNAME'); ?></span>
                                <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                    <a href="https://www.google.com/maps/?q=<?php echo $EM_Event->output('#_LOCATIONLATITUDE'); ?>,<?php echo $EM_Event->output('#_LOCATIONLONGITUDE'); ?>"><span itemprop="streetAddress"><?php echo $EM_Event->output('#_LOCATIONADDRESS'); ?></span><br>
                                    <span itemprop="postalCode"><?php echo $EM_Event->output('#_LOCATIONPOSTCODE'); ?></span>
                                    <span itemprop="addressLocality"><?php echo $EM_Event->output('#_LOCATIONTOWN'); ?></span></a>
                                </div>
                                 
                            </div>
                    <?php endif; ?>
                    </div>
                    <div id="col2">
                        <?php if($EM_Event->output('#_LOCATIONID')):?>
                        <div itemscope itemtype="http://schema.org/LocalBusiness" id="map">
                            <?php echo $EM_Event->output('#_LOCATIONMAP'); ?>
                            </div>
                            <?php //echo $EM_Event->output('#_LOCATIONEXCERPTCUT'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div id="content">
                <?php echo $EM_Event->output('#_EVENTEXCERPT'); ?>
                <?php if($EM_Event->output('#_BOOKINGFORM')){?>
                <div id="booking">
                    <?php echo $EM_Event->output('#_BOOKINGFORM'); ?>
                    <?php //echo $EM_Event->output('#_BOOKINGBUTTON'); ?>
                    <?php //echo $EM_Event->output('#_BOOKINGTICKETS'); ?>
                </div>
                <?php }?>
            </div>
        </article>
        <?php endwhile;endif;?>
    </section>
</main>
<?php get_footer(); ?>