<h2>Category</h2>
<ul class="nav nav-pills nav-stacked affix" id="category_menu">
    <?php $i=0;$count=count($categories); foreach ($categories as $category): ?>
        <li data-id="<?= $category->id ?>" <?php if ($i==0) echo 'class="active"'?> ><a  href="#"><?= $category->name ?></a></li>
    <?php $i++; endforeach; ?>
</ul>
