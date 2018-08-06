<?php
/**
 * @var $cats Array
 */
if (count($cats) > 0):
?>
<aside class="nwidget nwidget-categories">
    <div class="nwidget__title"><?= translate_i18n('article/cat/title') ?></div>
    <ul class="nwidget__list categories">
        <?php foreach ($cats as $cat): ?>
            <li class="item">
                <a href="<?= \includes\Bootstrap::bootstrap()->helper->getLinkFilterCat($cat->term_id) ?>" title="<?= $cat->name ?>" class="item__title"><?= ucfirst($cat->name) ?></a>
                <span class="number">(<?= ucfirst($cat->count) ?>)</span>
            </li>
        <?php endforeach; ?>
    </ul>
</aside>
<?php endif; ?>