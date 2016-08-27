
<?php if ($node->field_background_image['und'][0]['filename']): ?>
	<section class="page-head" style="background-image:url(/sites/default/files/<?php print $node->field_background_image['und'][0]['filename']; ?>);">
<?php else: ?>
    <section class="page-head">
<?php endif; ?>
        <div class="container">

            <div class="section-breadcrumb">

                <?php
                $main = strtolower($node->field_main_nav["und"][0]["value"]);
                switch ($main) {
                    case "audiences":
                        $url = "/audiences";
                        break;
                    case "insights":
                        $url = "/insights";
                        break;
                    case "solutions":
                        $url = "/solutions";
                        break;
                    case "content":
                        $url = "/content";
                        break;
                    case "events":
                        $url = "/events";
                        break;
                }

                ?>
                <?php if ($main !="content") { print "<a href='{$url}'>".$main."</a>"; } ?>

            </div>

            <?php if ($node->field_display_title["und"][0]["value"]): ?>
            <h1 class="page-title"><?php print removeP($node->field_display_title["und"][0]["value"]); ?></h1>
            <?php endif; ?>

        </div>

	</section>

	<div class="main">

        <section>

            <div class="container">

                <?php if($node->field_block_one_active["und"][0]["value"]): ?>
                <div class="row">
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
                </div><!-- row -->
                <?php endif; ?>
            </div><!-- container -->
        </section>

        <?php if($node->field_brands_active["und"][0]["value"]): ?>
		<section class="brands">
			<div class="container">

				<div class="row">
					<?php if ($node->field_audience_brandheadline_one["und"][0]["value"]): ?>
					<div class="block-title brands"><?php print removeP($node->field_audience_brandheadline_one["und"][0]["value"]); ?></div>
					<?php endif; ?>
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
					<ul id="works-grid" class="works-grid works-grid-gut works-grid-<?php print $count; ?> works-hover-w">

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

                </div><!-- row -->
			</div><!-- container -->
		</section>

        <?php endif; ?>



        <?php if($node->field_block_two_active["und"][0]["value"]): ?>
        <section>
	        <div class="container">
				<div class="row">
                <div class="col-md-4 img-block">
                    <?php if ($node->field_audience_left_image_two['und'][0]['filename']): ?>
                    <img class="" src="/sites/default/files/<?php print $node->field_audience_left_image_two["und"][0]["filename"]; ?>" alt="" />
                    <?php endif; ?>
                </div>
                <div class="col-md-8">
                    <?php if($node->field_audience_title_two["und"][0]["value"]): ?>
                    <h3 class="block-title"><?php print removeP($node->field_audience_title_two["und"][0]["value"]); ?></h3>
                    <?php endif; ?>

                    <h2 class="headline headline-md"><?php print removeP($node->field_audience_headline_two["und"][0]["value"]); ?></h2>
                    <div class="copy"><?php print removeP($node->field_audience_body_two["und"][0]["value"]); ?></div>
                </div>
				</div><!-- row -->
            </div><!-- container -->
        </section>
        <?php endif; ?>

        <?php if($node->field_block_three_active["und"][0]["value"]): ?>
        <section class="big-quote">

            <div class="container">

                <h2 class="headline"><?php print removeP($node->field_audience_body_three["und"][0]["value"]); ?></h2>

            </div>

        </section>
        <?php endif; ?>

        <?php if($node->field_block_four_active["und"][0]["value"]): ?>
        <section>

            <div class="container">
			<div class="row content-block">
                <div class="col-md-7">

                    <div class="block-title"><?php print removeP($node->field_audience_title_four["und"][0]["value"]); ?></div>
                    <h2 class="headline headline-sm"><?php print removeP($node->field_audience_headline_four["und"][0]["value"]); ?></h2>
                    <div class="copy"><?php print removeP($node->field_audience_body_four["und"][0]["value"]); ?></div>

                </div>

                <div class="col-md-5 img-block">
                    <?php if ($node->field_audience_right_image_four['und'][0]['filename']): ?>
                    <img class="full-width-img" src="/sites/default/files/<?php print $node->field_audience_right_image_four["und"][0]["filename"]; ?>" alt="" />
                    <?php endif; ?>
                </div>
			</div><!-- row -->
            </div>

        </section>
        <?php endif; ?>

        <?php if($node->field_block_five_active["und"][0]["value"]): ?>
        <section class="image-bg-block bg-dark dark-blue-overlay cover top" style="background-image:url(/sites/default/files/<?php print $node->field_audience_backimage_five["und"][0]["filename"]; ?>);">

            <div class="container">

            	<?php if ($node->field_audience_left_image_five['und'][0]['filename']): ?>
            	<div class="row">
					<div class="col-md-4 img-block">
						<img class="tab-50w display-block m-auto" src="/sites/default/files/<?php print $node->field_audience_left_image_five["und"][0]["filename"]; ?>" alt="" />
					</div>

					<div class="col-md-8 left">
						<h3 class="block-title"><?php print removeP($node->field_audience_title_five["und"][0]["value"]); ?></h3>
						<h2 class="headline headline-md"><?php print removeP($node->field_audience_headline_five["und"][0]["value"]); ?></h2>
						<div class="copy"><?php print removeP($node->field_audience_body_five["und"][0]["value"]); ?></div>
					</div>
            	</div><!-- row-->
                <?php else: ?>
                <div class="row">
                	<div class="col-md-12 center">
						<h3 class="block-title"><?php print removeP($node->field_audience_title_five["und"][0]["value"]); ?></h3>
						<h2 class="headline headline-md"><?php print removeP($node->field_audience_headline_five["und"][0]["value"]); ?></h2>
						<div class="row">
							<div class="col-md-6 col-md-offset-3 copy"><?php print removeP($node->field_audience_body_five["und"][0]["value"]); ?></div>
						</div><!-- row -->
					</div>
				</div><!-- row -->
                <?php endif; ?>

            </div><!-- container -->

        </section>
        <?php endif; ?>

        <?php if($node->field_block_six_active["und"][0]["value"]): ?>
        <section class="light-grey-bkg">
			<div class="container center">
				<div class="row content-block">
	                <div class="block-title"><?php print removeP($node->field_audience_title_six["und"][0]["value"]); ?></div>
	                <h2 class="headline headline-md"><?php print removeP($node->field_audience_headline_six["und"][0]["value"]); ?></h2>
	                <div class="copy center"><?php print removeP($node->field_audience_body_six["und"][0]["value"]); ?></div>
				</div><!-- row -->
            </div><!-- container -->
			<div class="full-width-container">
                <div class="slider-horiz">

					<div class="slide-nav">
						<div>
							<div class="slide-nav-left">
								<button name="slide-nav-left" class="slide-button disabled"><img src="/<?php print path_to_theme(); ?>/assets/images/NS/basic-slider-arrow-left.png" alt="" /></button>
							</div>
							<div class="slide-nav-right">
								<button name="slide-nav-right" class="slide-button"><img src="/<?php print path_to_theme(); ?>/assets/images/NS/basic-slider-arrow-right.png" alt="" /></button>
							</div>
						</div>
					</div>

					<div class="slide-container">

						<div>

		                    <div class="slide-content">

							<?php
							$view_name = 'events';
							$display_id = 'block';

							$eventBrandsArray = $node->field_brands['und'];
							foreach ($eventBrandsArray as $eventBrands){
								$nids[] = $eventBrands['nid'];
							}
							$args = implode("+", $nids);
							print views_embed_view($view_name , $display_id, $args);
							?>

		                    </div>

						</div>

					</div>

                </div>

            </div>

        </section>
        <?php endif; ?>


        <?php if($node->field_bottom_blocks['und']): ?>
		<section>

			<div class="container mystery">

				<?php
				$c=0;
				$count = count($node->field_bottom_blocks['und']);
				foreach ($node->field_bottom_blocks['und'] as $blockNode){
					$entID = $blockNode['value'];
					$thisEnt = entity_load('field_collection_item',array($entID));
					$thisBlock = $thisEnt[$entID];

					if ($c % 2 == 0) { //if even
						print '<div class="row">';

                            if ($thisBlock->field_bottom_block_image['und'][0]['filename']){
                            print'<div class="col-md-5 pull-right img-block">
								<img src="/sites/default/files/'.$thisBlock->field_bottom_block_image['und'][0]['filename'].'" width="" height="" alt="" />
							</div>';
                            }

							print'<div class="col-md-7">';

                                if ($thisBlock->field_bottom_block_title['und'][0]['value']){
								print'<h3 class="block-title">'.removeP($thisBlock->field_bottom_block_title['und'][0]['value']).'</h3>';
                                }

                                if ($thisBlock->field_bottom_block_headline['und'][0]['value']){
								print'<h2 class="headline headline-sm">'.removeP($thisBlock->field_bottom_block_headline['und'][0]['value']).'</h2>';
                                }
								print'<div class="copy">'.removeP($thisBlock->field_bottom_block_body['und'][0]['value']).'</div>

							</div>
						</div><!-- end div.row -->';
					} else {
						print '<div class="row">';
                            if ($thisBlock->field_bottom_block_image['und'][0]['filename']){
							print'<div class="col-md-5 img-block">
								<img src="/sites/default/files/'.$thisBlock->field_bottom_block_image['und'][0]['filename'].'" width="" height="" alt="" />
							</div>';
                            }
							print '<div class="col-md-7 pull-right">';

                                if ($thisBlock->field_bottom_block_title['und'][0]['value']){
                                print '<h3 class="block-title">'.removeP($thisBlock->field_bottom_block_title['und'][0]['value']).'</h3>';
                                }

                                if ($thisBlock->field_bottom_block_headline['und'][0]['value']){
                                print '<h2 class="headline headline-sm">'.removeP($thisBlock->field_bottom_block_headline['und'][0]['value']).'</h2>';
                                }
                                print'<div class="copy">'.removeP($thisBlock->field_bottom_block_body['und'][0]['value']).'</div>

							</div>
						</div><!-- end div.row -->';
					}
					$c++;
					if ($count != $c){
						print '<hr class="hr-dark btm-60">';
					}

				}
				?>

			</div><!-- end div.container -->

		</section>
		<?php endif; ?>


    </div>
