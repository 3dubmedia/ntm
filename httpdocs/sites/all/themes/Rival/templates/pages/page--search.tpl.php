
<?php if ($tabs): ?>
    <div id="page-tabs" class="tabs">
        <?php print render($tabs); ?>
    </div>
<?php endif; ?>

<?php print render($page['help']); ?>
<?php if ($action_links): ?>
    <ul class="action-links">
        <?php print render($action_links); ?>
    </ul>
<?php endif; ?>

<?php if ($page['header']): ?>
  <?php print render($page['header']); ?>
<?php endif; ?>

<section>
    <div class="container">
    <?php print render($page['content']); ?>
    <?php if ($page['content1']): ?>
    <?php print render($page['content1']); ?>
    <?php endif; ?>
    </div>
</section>
<?php if ($page['content2']): ?>
  <?php print render($page['content2']); ?>
<?php endif; ?>
<?php if ($page['content3']): ?>
  <?php print render($page['content3']); ?>
<?php endif; ?>
