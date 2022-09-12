

<?php include_once "_partials/header.php" ?>

    <!-- .page-header>h1 -->
    <div class="page-header">
        <h1>NADPIS 111</h1>
    </div>



    <?php $data = $database->select('items',['id','text']); ?>


    <!--  ul.list-group.col-sm-6>.list-group-item*2 -->
    <ul id="item-list" class="list-group col-sm-6">

        <?php
        foreach ($data as $item){
            echo '<li id="item-'. $item['id'] .'" class="list-group-item">';
            echo    $item ['text'];
            echo '  <div class="controls float-end">';
            echo '        <a href="edit.php?id='.$item ['id'].'" class="edit-link">edit</a>';
            echo '        <a href="delete.php?id='.$item ['id'].'" class="delete-link glyphicon glyphicon-remove"> del</a>';
            echo '  </div>';
            echo '</li>';

        }
        ?>

    </ul>

<!-- form.col-sm-6>.form-group>textarea.form-control -->
    <form id="add-form" action="_inc/add-item.php" class="col-sm-6" method="post">
        <p class="form-group">
            <textarea name="message" id="text"  rows="3" placeholder="Sem napíšte text" class="form-control"></textarea>
        </p>
        <!-- p.form-group*2>input.form-control -->


        <!-- input:submit.btn-sm.btn-danger -->

        <p class="form-group submit-button">
            <input type="submit" value="Pridať" class="btn-sm btn-danger">
        </p>

    </form>


<?php include_once   "_partials/footer.php" ?>



