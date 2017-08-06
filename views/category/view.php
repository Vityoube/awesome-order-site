<?php if (isset($restaurants)): ?>   
            <?php foreach($restaurants as $restaurant) : ?>
            <div class="w3-card">
                <header class="w3-container w3-blue">
                    <a href="<?= \yii\helpers\Url::to(['/restaurant/view','id'=>$restaurant->id,'alt'=>$restaurant->name])?>"> <?= yii\helpers\Html::img($restaurant->getImage()->getUrl('100x'),['alt'=>$restaurant->name])?>
                    </a>
                    <a href="<?= \yii\helpers\Url::to(['/restaurant/view','id'=>$restaurant->id,'alt'=>$restaurant->name])?>">
                        <h1><?= $restaurant->name ?></h1>
                    </a>
                </header>
                <div class="w3-container">
                    <?= $restaurant->description ?>
                    <br>
                </div>
<!--                <footer class="w3-container w3-blue">
                    <h5><a href="<?= \yii\helpers\Url::to(['/restaurant/view','id'=>$restaurant->id,'alt'=>$restaurant->name])?>">Go to order</a></h5>
                </footer>-->
            </div>
        <br>
        <div class="clearfix"/>
            <?php endforeach; ?>
<?php endif; ?>    
