<?php


?>

<?php $this->start('content'); ?>
<h1>Welcome <?= $this->name ?></h1>
<div class="col d-flex justify-content-between align-items-center p-3">
    <h5 class="text-danger">Year of project innovation: <?= $this->age ?></h5>
    <h5 class="text-primary fw-bold">Owner/manager/president: <?= $this->author ?></h5>
</div>
<?php $this->end(); ?>