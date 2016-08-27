
<?php if ($node->field_background_image['und'][0]['filename']): ?>
<section class="page-head short-banner dark-blue-overlay bkg-cover" style="background-image:url(/sites/default/files/<?php print $node->field_background_image['und'][0]['filename']; ?>);">
<?php else: ?>
<section class="page-head" style="background-image:url(/<?php print path_to_theme(); ?>/assets/images/NS/1.jpg);">
<?php endif; ?>


    <div class="container">
        <div class="section-breadcrumb">
            <h1 class="page-title"><?php print $node->field_display_title["und"][0]["value"]; ?></h1>
        </div>
    </div><!-- end div.container -->

</section>



<div class="container">

    <div class="main col-sm-9">

        <section class="row">

            <div class="col-md-12">

                <div class="copy media-links"><?php print render($content); ?></div>
           </div>

        </section>

    </div><!-- end div.main -->

    <aside role="complimentary" class="col-sm-3 top-60">



    </aside>

</div><!-- end div.container -->

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
