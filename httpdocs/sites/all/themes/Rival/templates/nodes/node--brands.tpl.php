
<?php if ($node->field_hero_background_image['und'][0]['filename']): ?>
    <section class="page-head" style="background-image:url(/sites/default/files/<?php print $node->field_hero_background_image['und'][0]['filename']; ?>);">
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
                <?php print "<a href='{$url}'>".$main."</a>"; ?> &middot;

                <?php
                $nid = $node->field_parent["und"][0]["nid"];
                $url = url('node/' . $nid);
                ?>
                <?php print "<a href='{$url}'>".$node->field_parent["und"][0]["node"]->title."</a>"; ?>

            </div>
            <h1 class="page-title"><?php print removeP($node->field_brand_name["und"][0]["value"]); ?></h1>

        </div>

    </section>

    <section>

        <div class="container">
			<div class="row">
            <div class="main col-sm-9">

                <?php
                if ($node->field_image_group['und']){
                    foreach ($node->field_image_group['und'] as $imgNode){
                        $imgEntID = $imgNode['value'];
                        $thisImgEnt = entity_load('field_collection_item',array($imgEntID));

                        $img1 = image_style_url("normal", $thisImgEnt[$imgEntID]->field_image_1['und'][0]['uri']);
                        $img2 = image_style_url("normal", $thisImgEnt[$imgEntID]->field_image_2['und'][0]['uri']);

                        if ($img1 && $img2){
                            print '<div class="row box-list">
                                <div class="col-md-6">
                                    <img src="'.$img1.'" width="" height="" alt="" />
                                </div>
                                <div class="col-md-6">
                                    <img src="'.$img2.'" width="" height="" alt="" />
                                </div>
                            </div>';
                        } else {
                            print '<div class="row box-list">
                                <div class="col-md-12">
                                    <img src="/sites/default/files/'.$img1.'" width="" height="" alt="" />
                                </div>
                            </div>';
                        }
                    }
                }
                ?>

                <h2 class="headline headline-sm"><?php print removeP($node->field_headline["und"][0]["value"]); ?></h2>
                <div class="copy"><?php print removeP($node->body["und"][0]["value"]); ?></div>
                <div class="row btm-100">

                    <?php if ($node->field_website_url_cta['und'][0]['value']): ?>
                    <div class="col-sm-6 col-md-4"><a class="extras-link" href="<?php print removeP($node->field_website_url_cta['und'][0]['value']); ?>" target="_blank">Visit Website &raquo;</a></div>
                    <?php endif; ?>

                    <?php if ($node->field_contact_cta['und'][0]['value']): ?>
                    <div class="col-sm-6 col-md-4"><a class="extras-link" href="<?php print removeP($node->field_contact_cta['und'][0]['value']); ?>" target="_blank">Contact Us &raquo;</a></div>
                    <?php endif; ?>

                    <?php if ($node->field_media_kit_cta['und'][0]['value']): ?>
                    <div class="col-sm-6 col-md-4"><a class="extras-link" href="<?php print removeP($node->field_media_kit_cta['und'][0]['value']); ?>" target="_blank">Media Kit &raquo;</a></div>
                    <?php endif; ?>
               </div><!-- end div.row -->

                <div class="block-title more-brands">More <?php print $node->field_parent["und"][0]["node"]->title; ?> Brands</div>
                    <?php

                    $count = count($node->field_brands_group['und']);
                    if ($count < 3) {
                        $count=2;
                    }
                    if ($count > 3) {
                        $count=4;
                    }

                    ?>
                    <ul id="works-grid" class="works-grid works-grid-gut works-grid-<?php print $count; ?> works-hover-w">

                    <?php
                    if ($node->field_brands_group['und']){
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
                    }
                    ?>

                    </ul>

            </div>

            <aside role="complimentary" class="col-sm-3">

                <ul class="sidenav">
                    <?php print views_embed_view("brands","block_1",$node->field_main_nav["und"][0]["value"]); ?>
                </ul>

            </aside>
			</div><!-- div.row -->
        </div>
        <!-- end div.container -->

    </section>
