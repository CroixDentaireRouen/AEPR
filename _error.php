<?php  if (count($errors) > 0) : ?>
    <div class="error">
        <?php foreach ($errors as $error) : ?>
            <b><p style="background-color:rgb(255,0,0);"><?php echo $error ?></p></b>
        <?php endforeach ?>
    </div>
<?php  endif ?>
