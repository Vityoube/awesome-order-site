<?php if (!empty($session['cart'])): ?>
<ul class="dropdown-menu">
    <?php foreach ($session['cart'] as $restaurantId=>$restaurant): ?>
<li class="dropdown-header">
        <p><?= $restaurant['name'];  ?></p>
        <ul>
            
        </ul>
    </li> 
    <?php endforeach; ?>
</ul>
<?php endif; ?>



