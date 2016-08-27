
<?php if ($node->field_background_image['und'][0]['filename']): ?>
    <section class="page-head short-banner dark-blue-overlay bkg-cover" style="background-image:url(/sites/default/files/<?php print $node->field_background_image['und'][0]['filename']; ?>);">
<?php else: ?>
    <section class="page-head short-banner dark-blue-overlay bkg-cover" style="background-image:url(/<?php print path_to_theme(); ?>/assets/images/NS/1.jpg);">
<?php endif; ?>


        <div class="container">

            <div class="section-breadcrumb">

                <?php
                if ($node->field_about_breadcrumb["und"][0]["value"]){
                    print "<a href='/about'>About Us</a> &middot; ";
                    print $node->field_about_breadcrumb["und"][0]["value"];
                }  else {
                    print "About Us";
                }
                ?>

            </div>
            <h1 class="page-title"><?php print $node->field_display_title["und"][0]["value"]; ?></h1>

        </div><!-- end div.container -->

	</section>


	<section>
    <div class="container">
		<div class="row">
    	<div class="main col-sm-9">
			<div class="row">

                <div class="col-md-12">

					<div class="copy media-links"><?php print $node->body["und"][0]["value"]; ?></div>
	           </div>

			</div>

            <?php if ($node->field_show_videos['und'][0]['value']): ?>
			<div id="videos" class="row btm-50">


                <?php
                $i=1;
                foreach ($node->field_videos['und'] as $video){
                    $entID = $video['value'];
                    $thisEnt = entity_load('field_collection_item',array($entID));
                  
                    $thisImage = $thisEnt[$entID]->field_video_image['und'][0]['filename'];
                    $thisVideo = $thisEnt[$entID]->field_video_id['und'][0]['value'];

                    if ($i==1){
                        print '<div class="col-md-6">
                            <div id="'.$thisVideo.'" class="about-video ftd-video tab-land-btm-20" data-toggle="modal" data-target="#video-modal">
                                <img class="ftd-item" src="/sites/default/files/'.$thisImage.'" width="" height="294" alt="" />
                                <div class="icon-overlay"><div><span class="icon-video"></span></div></div>
                            </div>
                        </div>

                        <div class="col-md-6"><div class="row">';
                    } else {
                        print '<div class="col-xs-6">
                            <div id="'.$thisVideo.'" class="btm-10 about-video tab-land-btm-20" data-toggle="modal" data-target="#video-modal">
                                <img src="/sites/default/files/'.$thisImage.'" width="" height="" alt="" />
                                <div class="icon-overlay">
                                	<div>
                                		<span class="icon-video"></span>
                                	</div>
                                </div>
                            </div>
                        </div>';
                    }

                    $i++;
                }
                print '</div>';
                ?>

                </div>

			</div><!-- videos row -->
            <?php endif; ?>
            <?php
            $people=0;
            if ( ($node->field_content_list["und"][0]["value"]=="Executive Bio") || ($node->field_content_list["und"][0]["value"]=="Travel Passion") || ($node->field_content_list["und"][0]["value"]=="Career Track") ){
                $people=1;
            }
            ?>
            <?php if($people): ?>
			<div id="people" class="row">
                <div class="col-md-12">
                    <?php if($node->field_content_list_title["und"][0]["value"]): ?><h2 class="headline headline-xl"><?php print $node->field_content_list_title["und"][0]["value"]; ?></h2><?php endif; ?>
                    <ul class="fullwidth-grey-list no-pad">
                        <?php
                        $view_name = 'content';
                        $display_id = 'block';
                        print views_embed_view($view_name , $display_id, $node->field_content_list["und"][0]["value"]);
                        ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>

            <?php if($node->field_content_list["und"][0]["value"]=="News"): ?>
            <section class="row">
                <div class="col-md-12">
                    <?php if($node->field_content_list_title["und"][0]["value"]): ?><h2 class="headline headline-xl"><?php print $node->field_content_list_title["und"][0]["value"]; ?></h2><?php endif; ?>
                    <ul class="no-pad">
                        <?php
                        $view_name = 'content';
                        $display_id = 'block_2';
                        print views_embed_view($view_name , $display_id);
                        ?>
                    </ul>
                </div>
            </section>
            <?php endif; ?>

            <?php if($node->field_content_list["und"][0]["value"]=="Awards"): ?>
            <section class="row">
                <div class="col-md-12">
                    <?php if($node->field_content_list_title["und"][0]["value"]): ?><h2 class="headline headline-xl"><?php print $node->field_content_list_title["und"][0]["value"]; ?></h2><?php endif; ?>
                    <ul class="no-pad">
                        <?php
                        $view_name = 'content';
                        $display_id = 'block_3';
                        print views_embed_view($view_name , $display_id);
                        ?>
                    </ul>
                </div>
            </section>
            <?php endif; ?>

            <?php if($node->field_content_list["und"][0]["value"]=="Press Release"): ?>
            <section class="row">
                <div class="col-md-12">
                    <?php if($node->field_content_list_title["und"][0]["value"]): ?><h2 class="headline headline-xl"><?php print $node->field_content_list_title["und"][0]["value"]; ?></h2><?php endif; ?>
                    <ul class="no-pad">
                        <?php
                        $view_name = 'content';
                        $display_id = 'block_4';
                        print views_embed_view($view_name , $display_id);
                        ?>
                    </ul>
                </div>
            </section>
            <?php endif; ?>

            <?php if($node->field_content_list["und"][0]["value"]=="Jobs"): ?>
            <section class="row">
                <div class="col-md-12">
                    <?php if($node->field_content_list_title["und"][0]["value"]): ?><h2 class="headline headline-xl"><?php print $node->field_content_list_title["und"][0]["value"]; ?></h2><?php endif; ?>
                    <ul class="no-pad">
                        <?php
                        $view_name = 'content';
                        $display_id = 'block_5';
                        print views_embed_view($view_name , $display_id);
                        ?>
                    </ul>
                </div>
            </section>
            <?php endif; ?>

            <?php if($node->field_content_list["und"][0]["value"]=="Internships"): ?>
            <section class="row">
                <div class="col-md-12">
                    <?php if($node->field_content_list_title["und"][0]["value"]): ?><h2 class="headline headline-xl"><?php print $node->field_content_list_title["und"][0]["value"]; ?></h2><?php endif; ?>
                    <ul class="no-pad">
                        <?php
                        $view_name = 'content';
                        $display_id = 'block_5';
                        print views_embed_view($view_name , $display_id, "Internship");
                        ?>
                    </ul>
                </div>
            </section>
            <?php endif; ?>

    	</div><!-- end div.main -->

        <aside role="complimentary" class="col-sm-3">

            <?php
                $tree = menu_tree_page_data('main-menu'); 
                foreach($tree as $key => $mi) {
     
                    if ($tree[$key]['below'] && strcmp($tree[$key]['link']['title'],"About Us") == 0) {
                        $menu[$tree[$key]['link']['title']] = $tree[$key]['below'];

                        foreach($menu[$tree[$key]['link']['title']] as $mkey => $mmi) {
                            if ($mmi['below']) {
                                $mmenu[$mmi['link']['title']] = $mmi['below'];
                            }
                        }
                    }
                }
            ?>

            <ul class="sidenav">
                <?php
                    $menuCount = 1;

                    $main_menu = $menu;

                    foreach($menu["About Us"] as $mKey => $mValue){
                        if(!$mValue['link']['hidden']){
                            $mTmpHref = $mValue['link']['href'];
                            $mTmpTitle = $mValue['link']['title'];
                            $isExternal = (strpos($mTmpHref, "http") === false) ? false:true;
                            if ($mTmpHref == '<front>'){
                                $mTmpHref = '/';
                            } else if(!$isExternal) {
                                $mTmpHref = "/" . drupal_get_path_alias($mTmpHref);
                            }
                            print "<li><span class='category'><a href='$mTmpHref'>" . $mValue['link']['title'] . "</span></a>";
                            //print "<li><a href='test'>" . $mValue['link']['title'] . "</a>";
                            if($mmenu[$mTmpTitle]) {
                                print "<ul>";
                                foreach($mmenu[$mTmpTitle] as $mmKey => $mmValue){
                                    if(!$mmValue['link']['hidden']){
                                        //print "<pre>"; print_r($mmValue['link']['in_active_trail']); print "</pre>";
                                        $mmActive = ($mmValue['link']['in_active_trail']) ? "active":"";
                                        $mmTmpHref = $mmValue['link']['href'];
                                        $mmTmpTitle = $mmValue['link']['title'];
                                        $isExternal = (strpos($mmTmpHref, "http") === false) ? false:true;
                                        if ($mmTmpHref == '<front>'){
                                            $mmTmpHref = '/';
                                        } else if(!$isExternal) {
                                            $mmTmpHref = "/" . drupal_get_path_alias($mmTmpHref);
                                        }
                                        print "<li class='$mmActive'><a href='$mmTmpHref'>" . $mmValue['link']['title'] . "</a>";

                                        print "</li>";
                                    }
                                }
                                print "</ul>";
                            }

                            print "</li>";
                        }
                    }
                ?>

            </ul>

        </aside>
		</div><!-- row -->
    </div><!-- end div.container -->
	</section>
    <?php
    if ($people){
        $view_name = 'content';
        $display_id = 'block_1';
        print views_embed_view($view_name , $display_id, $node->field_content_list["und"][0]["value"]);
    }
    ?>

	<div id="video-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
					<div class="loader"></div>
					<div class="video-container"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="cta" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
