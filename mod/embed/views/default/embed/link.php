<?php
/**
 * Displays an "Embed media" link in longtext inputs.
 */
?>
<a class="longtext_control small link" href="<?php echo $vars['url'] . 'pg/embed/media'; ?>?internalname=<?php echo $vars['internalname']; ?>" rel="facebox"><?php echo elgg_echo('media:insert'); ?></a>