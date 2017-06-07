<li>

    <?php if (isset($category['childs'])): ?>
        <a href="<?= \yii\helpers\Url::to(['/category/show', 'id' => $category['id']]) ?>"><?= $category['name'] ?></a>
    <?php else: ?>
        <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category['id']]) ?>"><?= $category['name'] ?></a>
    <?php endif; ?>

    <?php if (isset($category['childs'])): ?>
        <ul>
            <?= $this->getMenuHtml($category['childs']) ?>
        </ul>
    <?php endif; ?>
</li>
