<h2>Category</h2>
<ul class="nav nav-pills nav-stacked affix" id="category_menu">
    <?php foreach ($categories as $category): ?>
        <li data-id="<?= $category->id ?>"><a  href="#"><?= $category->name ?></a></li>
    <?php endforeach; ?>
</ul>
