<?php if (!empty($errors)) : ?>
    <div class="alert alert-info" role="alert">
        <u>
            <?php foreach ($errors as $error) : ?>
                <li>
                    <?php echo "$error"; ?>
                </li>
            <?php endforeach; ?>
        </u>
    </div>
<?php endif; ?>