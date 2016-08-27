<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>

<li class="bg-dark-30 bg-dark slide slide-<?php print $fields['counter']->content; ?>" style="background-image:url(<?php print $fields['field_slide_image']->content; ?>);">
    <div class="slide-box container"><div class="row"><div class="col-lg-12">
        <h2 class="lead-text default-show"><?php print $fields['body']->content; ?></h2>
        <!--<a class="default-show" href="<?php /* print $fields['field_button_link']->content; ?>"><?php print $fields['field_button']->content;*/ ?> &raquo;</a>-->
    </div></div></div>
</li>
