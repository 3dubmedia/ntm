
<?php if ($node->field_background_image['und'][0]['filename']): ?>
	<section class="page-head" style="background-image:url(/sites/default/files/<?php print $node->field_background_image['und'][0]['filename']; ?>);">
<?php else: ?>
    <section class="page-head">
<?php endif; ?>
        <div class="container">

            <div class="section-breadcrumb">

                <?php
                $main = $node->field_main_nav["und"][0]["value"];
                switch ($main) {
                    case "Audiences":
                        $url = "/audiences";
                        break;
                    case "Insights":
                        $url = "/insights";
                        break;
                    case "Solutions":
                        $url = "/solutions";
                        break;
                    case "Content":
                        echo "/content";
                        break;
                    case "Events":
                        $url = "/events";
                        break;
                }
                ?>
                <?php print "<a href='{$url}'>".$main."</a>"; ?>

            </div>

            <?php if ($node->field_display_title["und"][0]["value"]): ?>
            <h1 class="page-title"><?php print removeP($node->field_display_title["und"][0]["value"]); ?></h1>
            <?php endif; ?>

        </div>

	</section>

	<div class="main">

        <section>

            <div class="container">


                <div class="row content-block">
					<div class="col-md-7">

                        <?php if ($node->field_audience_headline_one["und"][0]["value"]): ?>
						<h2 class="headline headline-md"><?php print $node->field_audience_headline_one["und"][0]["value"]; ?></h2>
                        <?php endif; ?>

						<div class="copy"><?php print removeP($node->field_audience_body_one["und"][0]["value"]); ?></div>
					</div>

					<div class="col-md-5">
						<?php if ($node->field_audience_right_image_one['und'][0]['filename']): ?>
						<img class="btm-40" src="/sites/default/files/<?php print $node->field_audience_right_image_one["und"][0]["filename"]; ?>" alt="audience" />
						<?php endif; ?>
					</div>
                </div>



            </div>

        </section>


        <div class="container"><hr class="section-divider"></div>



        <?php

        foreach ($node->field_event_groups['und'] as $eventNode){
            $nids = array();
            $args="";
            $entID = $eventNode['value'];
            $thisEnt = entity_load('field_collection_item',array($entID));

            $thisGroup = $thisEnt[$entID]->field_group_events['und'];
            $thisGroupName = $thisEnt[$entID]->field_group_name['und'][0]['value'];
            foreach ($thisGroup as $event){
                $nids[] = $event['nid'];
            }
            $args = implode("+", $nids);

            print'<section class="white-bkg">
                <div class="full-width-container">
                    <span class="bright-blue headline-xs btm-20 font-700 lh-1 center">'.$thisGroupName .'</span>
                    <div class="slider-horiz">
                        <div class="slide-nav">
                            <div>
                                <div class="slide-nav-left">
                                    <button name="slide-nav-left" class="slide-button disabled"><img src="/sites/all/themes/Rival/assets/images/NS/basic-slider-arrow-left.png" width="24" height="47" alt="" /></button>
                                </div>
                                <div class="slide-nav-right">
                                    <button name="slide-nav-right" class="slide-button"><img src="/sites/all/themes/Rival/assets/images/NS/basic-slider-arrow-right.png" width="24" height="47" alt="" /></button>
                                </div>
                            </div>
                        </div><!-- end div.slide-nav -->
						<div class="slide-container">
							<div>
								<div class="slide-content">';

                        $view_name = 'events';
                        $display_id = 'block';
                        print views_embed_view($view_name , $display_id, $args);
                        print'</div><!-- end div.slide-container -->
							</div>
						</div><!-- end div.slide-container -->
                    </div><!-- end div.slider-horiz -->
                </div><!-- end div.full-width-container -->
            </section>';


        }
        ?>


        <section class="bright-blue-bkg">

            <div class="full-width-container center">

                <h2 class="white font-900 headline-sm btm-40"><?php print removeP($node->field_bottom_block_headline["und"][0]["value"]); ?></h2>
                <a class="cta light-blue-bkg btm-40 port-btm-0 inline-block" href="/contact">Contact Us</a>

            </div><!-- end div.full-width-container -->

        </section>



    </div>
