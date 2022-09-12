

<?php

    require_once '_inc/config.php';

    $item = get_item();
    if (! $item) show_404();

    include_once "_partials/header.php"


?>

    <!-- .page-header>h1 -->
    <div class="page-header">
        <h1>Edit</h1>
    </div>


<div class="row">
    <!-- form.col-sm-6>.form-group>textarea.form-control -->
    <form id="edit-form" action="_inc/edit-item.php" class="col-sm-6" method="post">
        <p class="form-group">
            <textarea name="message" id="text"  rows="3"  class="form-control"><?php echo $item ?></textarea>
        </p>
        <!-- p.form-group*2>input.form-control -->


        <!-- input:submit.btn-sm.btn-danger -->

        <p class="form-group">
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
            <input type="submit" value="Upraviť" class="btn-sm btn-danger">
            <span>
                <a href="<?php echo $base_url ?>" class="back-link text-muted">Späť</a>
            </span>
        </p>

    </form>
</div>

<?php include_once "_partials/footer.php" ?>



