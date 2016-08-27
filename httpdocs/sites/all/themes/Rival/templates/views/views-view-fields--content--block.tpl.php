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


<li data-toggle="modal" data-target="#about-modal-<?php print $fields['counter']->content; ?>">

    <table class="bio-item">
        <tr>
            <td class="left">
                <div class="bio-img"><img src="<?php print $fields['field_person_image']->content; ?>" width="" height="" alt="" /></div>
            </td>
            <td class="center">
                <span class="name-title">
                    <span class="name"><?php print $fields['field_full_name']->content; ?></span>
                    <span class="title">- <?php print $fields['field_jobtitle']->content; ?></span>
                </span>
                <span class="question"><?php print $fields['body']->content; ?></span>
            </td>
            <td class="right">
                <a href="javascript: void(0)">Read More &raquo;</a>
            </td>
        </tr>
    </table>
</li>
