<?php
    /**
     * @var $location_name
     * @var $location_map
     * @var $location_address*/
?>


<div class="container">
    <div class="row guard">
        <div class="guard-sub-title d-flex flex-wrap align-items-center text-center">
            <div class="guard-sub-title__line col-sm-3"></div>
            <span class="guard-sub-title__para col-sm-6">Chào mừng đến trạm</span>
            <div class="guard-sub-title__line col-sm-3"></div>
        </div>

        <div class="guard-title col-sm-12 text-center mt-2">
            <h1 class="guard-title__para itz-btn-hover"><?= $location_name ?></h1>
        </div>

        <div class="guard-location">
            <?= $location_map ?>
        </div>

        <a href="#" class="guard-address text-center">
            <i class="fa-solid fa-location-dot guard-address__icon"></i>
            <span class="guard-address__para"><?= $location_address ?></span>
        </a>
    </div>
</div>