<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
$slideNum=1;
?>

<ul class="home-slider-nav">

<?php foreach ($rows as $id => $row): ?>
    <?php print $row;$slideNum++; ?>

<?php endforeach; ?>
</ul>