<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<ul class="slides default-show">

<li class="bg-dark-30 bg-dark slide-default" style="background-image:url(/<?php print path_to_theme(); ?>/assets/images/NS/ntg-homepage-lead-main.jpg);">
    <div class="slide-box container"><div class="row"><div class="col-lg-12">
        <h1 class="lead-text default-show"><span class="thin">We reach the</span><br> Most Effective Audiences<br> <span class="thin">in Travel.</span></h1>
        <!--<a class="default-show" href="#">Learn More &raquo;</a>-->
    </div></div></div>
</li>

<?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
<?php endforeach; ?>
</ul>
