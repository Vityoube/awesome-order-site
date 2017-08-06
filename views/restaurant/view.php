<div class="wrap">
<h1>Restaurant <?= $restaurant->name ?></h1>

<?php $i=1; foreach($restaurant->products as $product): ?>
<?php if (!$product->parent_id): ?>
<?= \yii\jui\Accordion::widget([
    'items' => [
        [
            'header' => !$product->description ? $product->name: 
    $product->name.'<br><br>'.$product->description,
            'content'=> '',
        ],
        
    ],
    'options' => ['tag' => 'div'],
    'itemOptions' => ['tag' => 'div'],
    'headerOptions' => ['tag' => 'h3'],
    'clientOptions' => ['collapsible' => true,'active'=>false],
]); ?>
  <?php if ($product->relatedProducts) : ?>
    <?php foreach ($product->relatedProducts as $relatedProduct): ?>
        <?php $form= \yii\widgets\ActiveForm::begin();
            $relatedProductCheckbox=$form->field($relatedProduct,'isOrdered')->checkBox(['0','1']);
            $script="$('#w div".$i."').append(".$relatedProductCheckbox."+'<br>')";
            $this->registerJs($script);
        ?>
    <?php endforeach; ?>
    <?php endif; ?>
<?php endif; ?>

<?php endforeach; ?>    
</div>
