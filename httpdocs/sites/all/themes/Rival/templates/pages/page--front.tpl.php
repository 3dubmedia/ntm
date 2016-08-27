
<?php

function removeP($s){
    $string = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $s);
    return $string;
}
?>

<!-- Home start -->
    <section class="home-section home-full-height">

        <div class="home-slider">

            <?php
            $view_name = 'home_page_carousel';
            $display_id = 'block';
            print views_embed_view($view_name , $display_id);
            ?>
            <div class="home-slider-nav-box">
                <?php
                $view_name = 'home_page_carousel';
                $display_id = 'block_1';
                print views_embed_view($view_name , $display_id);
                ?>
            </div>

        </div>

    </section>
    <!-- Home end -->

    <div class="main">

        <section class="bg-dark cover bottom" style="background-image:url('/sites/default/files/<?php print $node->field_background_image_one["und"][0]["filename"]; ?>');">


            <div class="container">
	            <div class="row center">
		            <div class="col-md-8 col-md-offset-2">
		                <?php if($node->field_top_image_one["und"][0]["filename"]): ?>
		                <img class="center-img mob-img" src="/sites/default/files/<?php print $node->field_top_image_one["und"][0]["filename"]; ?>" width="285" height="" alt="" />
		                <?php endif; ?>
		                <h2 class="headline headline-xxl"><?php print removeP($node->field_headline_one["und"][0]["value"]); ?></h2>
		                <div class="copy copy-24 btm-50"><?php print removeP($node->field_body_one["und"][0]["value"]); ?></div>

		                <?php
		                $link="#";
		                $att="";
		                $link=$node->field_button_one_link['und'][0]['url'];
		                $target=$node->field_button_one_link['und'][0]['attributes']['target'];
		                if ($target){
		                	$att = "target='_blank'";
		                }
		                ?>
		                <a class="cta dark" href="<?php print $link; ?>" <?php print $att; ?>><?php print removeP($node->field_button_one["und"][0]["value"]); ?></a>
	            	</div>
	            </div>
            </div>

        </section>

        <section>

            <div class="container">

                <div class="row">

                    <div class="col-md-8">

                        <img class="mobile-hide" src="/<?php print path_to_theme(); ?>/assets/images/NS/home-section-2-text.png" width="" height="" alt="" />
						<h2 class="headline headline-xl dark-blue mobile-show center">World Class Content.</h2>
                    </div>

                    <div class="col-md-4 mob-center">

                        <p class="copy-18 btm-30"><?php print removeP($node->field_body_two["und"][0]["value"]); ?></p>
						<?php
						$link="#";
						$att="";
						$link=$node->field_button_two_link['und'][0]['url'];
						$target=$node->field_button_two_link['und'][0]['attributes']['target'];
						if ($target){
							$att = "target='_blank'";
						}
						?>
                        <a class="cta" href="<?php print $link; ?>" <?php print $att; ?>><?php print removeP($node->field_button_two["und"][0]["value"]); ?></a>

                    </div>

                </div>

            </div>

        </section>

        <section class="center dark-blue-overlay bg-dark cover" style="background-image:url('/sites/default/files/<?php print $node->field_background_image_three["und"][0]["filename"]; ?>')">

            <div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
		                <img class="btm-30 port-top-0 mob-img" src="/sites/default/files/<?php print $node->field_top_image_three["und"][0]["filename"]; ?>" width="" height="" alt="" />
		                <h2 class="headline headline-xl"><?php print removeP($node->field_headline_three["und"][0]["value"]); ?></h2>
		                <p class="copy copy-18 btm-40"><?php print ($node->field_body_three["und"][0]["value"]); ?></p>

						<?php
						$link="#";
						$att="";
						$link=$node->field_button_three_link['und'][0]['url'];
						$target=$node->field_button_three_link['und'][0]['attributes']['target'];
						if ($target){
							$att = "target='_blank'";
						}
						?>
		                <a class="cta" href="<?php print $link; ?>" <?php print $att; ?>><?php print removeP($node->field_button_three["und"][0]["value"]); ?></a>
					</div>
				</div><!-- row -->
            </div>

        </section>

        <section class="centered">

            <div class="container centered">
				<div class="row">
					<div class="col-md-12">
                	<h2 class="headline headline-lrg"><?php print removeP($node->field_headline_four["und"][0]["value"]); ?></h2>
					</div>
				</div>
                <div class="row btm-60">
                    <div class="col-md-4 btm-40">
                        <div class="img-center h-150"><img src="/sites/default/files/<?php print $node->field_left_image_four["und"][0]["filename"]; ?>" alt="" /></div>
                        <span class="block-title"><?php print removeP($node->field_left_text_four["und"][0]["value"]); ?></span>
                    </div>
                    <div class="col-md-4 btm-40">
                        <div class="img-center h-150"><img src="/sites/default/files/<?php print $node->field_middle_image_four["und"][0]["filename"]; ?>" alt="" /></div>
                        <span class="block-title"><?php print removeP($node->field_middle_text_four["und"][0]["value"]); ?></span>
                    </div>
                    <div class="col-md-4 btm-40">
                        <div class="img-center h-150"><img src="/sites/default/files/<?php print $node->field_right_image_four["und"][0]["filename"]; ?>" alt="" /></div>
                        <span class="block-title"><?php print removeP($node->field_right_text_four["und"][0]["value"]); ?></span>
                    </div>
                </div>
				<div class="row">
                	<img class="btm-40" src="/sites/default/files/<?php print $node->field_bottom_image_four["und"][0]["filename"]; ?>" />
					<div class="col-md-8 col-md-offset-2 copy copy-18"><?php print removeP($node->field_body_four["und"][0]["value"]); ?></div>
				</div>

				<?php
				$link="#";
				$att="";
				$link=$node->field_button_four_link['und'][0]['url'];
				$target=$node->field_button_four_link['und'][0]['attributes']['target'];
				if ($target){
					$att = "target='_blank'";
				}
				?>
				<a class="cta dark" href="<?php print $link; ?>" <?php print $att; ?>><?php print removeP($node->field_button_four["und"][0]["value"]); ?></a>

            </div>

        </section>

        <hr class="section-divider">

        <section class="centered">

            <div class="container">
                <?php

                $count = count($node->field_brands_group['und']);
                if ($count < 3) {
                    $count=2;
                }                
                if ($count > 5) {
                    $count=3;
                }
				if ($count > 6) {
                    $count=4;
                } 
                if ($count == 9) {
                    $count=3;
                }
                ?>

                <div class="row">
	                <div class="col-md-12">
					<h2 class="headline headline-lrg"><?php print removeP($node->field_headline_five["und"][0]["value"]); ?></h2>
	                </div>
                    <ul id="works-grid" class="works-grid works-grid-gut clr-both works-grid-<?php print $count; ?> works-hover-w">

                    <?php
                    foreach ($node->field_brands_group['und'] as $brandNode){
                        $entID = $brandNode['value'];
                        $thisEnt = entity_load('field_collection_item',array($entID));

                        $thisNid = $thisEnt[$entID]->field_brand['und'][0]['nid'];
                        $thisNode = node_load($thisNid);

                        $url = url('node/' . $thisNid);

                        print '<li class="work-item illustration webdesign">
                            <a href="'.$url.'">
                                <div class="work-image">
                                    <img src="/sites/default/files/'.$thisNode->field_brand_logo["und"][0]["filename"].'" alt="">
                                </div>
                                <div class="work-caption font-alt">
                                    <div class="work-descr white">'.removeP($thisNode->body["und"][0]["summary"]).'</div>
                                    <span class="brands-cta">Learn More &raquo;</span>
                                </div>
                            </a>
                        </li>';

                    }
                    ?>

                    </ul>

                </div>
                <div class="copy"><?php print removeP($node->field_body_five["und"][0]["value"]); ?></div>

            </div>

        </section>

    </div>
    <!-- .container-fluid end -->
