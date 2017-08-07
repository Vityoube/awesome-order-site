<div class="wrap">
<h1>Restaurant <?= $restaurant->name ?></h1>

<?php $i=1; foreach($products as $product): ?>
<?= \yii\jui\Accordion::widget([
    'items' => [
        [
            'header' => !$product->description ? $product->name: 
    $product->name.'<br><br>'.$product->description,
            'content'=> $product->content,
        ],
        
    ],
    'options' => ['tag' => 'div'],
    'itemOptions' => ['tag' => 'div'],
    'headerOptions' => ['tag' => 'h3'],
    'clientOptions' => ['collapsible' => true,'active'=>false],
]); ?>

<?php endforeach; ?>    
</div>
