<div class="container">
    <?php foreach ($restaurants as $restaurant): ?>
    <a href="<?= \yii\helpers\Url::to(['/restaurant/view','id'=>$restaurant->id,'alt'=>$restaurant->name])?>">
        <?= $restaurant->name ?>
    </a>
</div>
