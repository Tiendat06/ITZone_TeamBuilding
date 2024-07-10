<?php
    /**
     * @var $content
    */
    include "./views/layout/partials/views_content.php";
?>
<!doctype html>
<html lang="en">
    <?php
        include "./views/layout/partials/header.php";
    ?>
<body>
    <?php
        getViews($content);
    ?>
    <?php
        include "./views/layout/partials/footer.php";
    ?>
</body>
</html>
