<?php

/**
 * @var $team_arrival_location
 */
?>


<div class="team">
    <div class="team-intro d-flex flex-wrap">
        <div class="team-intro__title col-sm-12">
            <h1 class="team-intro__header">Mật thư trạm </h1>
            <img style="" class="w-100 team-intro__img" src="/public/img/team/intro.png" alt="">
        </div>
        <div class="team-intro__sub-title d-flex flex-wrap">
            <div class="team-intro__line col-sm-4 col-md-4"></div>
            <div class="team-intro__sub-title--para col-sm-4 col-md-4">Hãy tìm ra đáp án</div>
            <div class="team-intro__line col-sm-4 col-md-4"></div>
        </div>
    </div>
    <div class="team-letter">
        <button id="special-letter-btn" type="button" class="itz-btn-trigger team-letter__trigger" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="team-letter__background modal-content">
                    <div class="modal-header flex-column" style="border:none;">
                        <h1 class="team-letter__status d-none"></h1>
                        <img class="team-letter__icon" src="/public/img/topic/icon-special-letter.png" alt="">
                        <h1 class="modal-title fs-5 team-letter__header" id="exampleModalLabel">MẬT THƯ ĐẶC BIỆT</h1>

                    </div>
                    <div class="modal-body team-letter__content">
                        <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</p>
                    </div>

                    <div class="team-letter__footer">
                        <div id="team-letter__footer--inp" class="form-group d-flex justify-content-between">
                            <input id="team--letter-input" placeholder="Nhập đáp án" type="text" class="team-letter__inp">
                            <button id="team--letter-btn" type="submit" class="itz-btn-modal team-letter__btn">Gửi</button>
                        </div>
                    </div>
                    <button class="itz-btn-normal itz-btn-modal team-letter__continue d-none">Tiếp tục</button>
                </div>
            </div>
            <div id="toast-modal" class="bs-toast d-none toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body position-relative w-100 d-flex flex-wrap justify-content-between align-items-center">
                    <span id="toast-message-modal">Chúc mừng bạn đã tìm ra đáp án</span>
                    <div class="toast-icon" id="toast-close-modal">
                        <i class="toast-icon--inner fa-regular fa-rectangle-xmark"></i>
                    </div>
                    <img style="width: 30px" class="toast-body__cloud" src="/public/img/icon/icon-cloud.png" alt="">
                </div>
            </div>
        </div>

    </div>

    <div class="team-content d-flex">
        <?php
        $index = 0;
        $bus_back = '';
        foreach ($team_arrival_location as $row) {
            $location_id = $row['location_id'];
            $is_show_next_location = $row['is_show_next_location'];
            $location_img = $row['location_img'];
            $team_arrival_priority = $row['team_arrival_priority'];
            $url_link = '/team/game-1-topic/' . $location_id;
            $disable_card = '';
            $previous_location = '';
            if ($is_show_next_location == 0) {
                $disable_card = 'itz-disable-card';
                $url_link = '#';
            }
            if ($index == 3) $bus_back = $row['bus_back'];
            if ($location_id === 'LOC0000006') $url_link = '#';
        ?>
            <a <?= $location_id == 'LOC0000006' && $is_show_next_location == 1 ?
                    'data-bs-target="#team-complete" data-bs-toggle="modal" data-back="' . $bus_back . '" data-location="' . $location_id . '"'
                    : '' ?>
                href="<?= $url_link ?>" class="team-content__item <?= $is_show_next_location == 1 && $location_id != 'LOC0000006' ? 'loading-item' : '' ?> d-block <?= $disable_card ?> col-sm-4 col-md-4">
                <div class="team-content__item--inner">
                    <div class="team-content__item--info text-center">
                        <div class="team-content__item--img">
                            <img style="width: 95px; height: 100px" src="/public/img/topic/<?= $location_img ?>" alt="">
                        </div>
                        <div class="team-content__item--header">
                            <h1 class="team-content__item--title mb-0">Trạm <?= $team_arrival_priority - 1 ?></h1>
                        </div>
                        <div class="team-content__item--play">
                            <img src="/public/img/icon/icon-play.png" alt="">
                        </div>
                    </div>
                </div>
            </a>

        <?php
            // $index++;
        }
        ?>

    </div>
</div>

<div class="modal fade" id="team-complete" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px">
            <div class="modal-body p-0">
                <div class="team-game__logo">
                    <img style="width: 100%" src="/public/img/topic/congrats.png" alt="">
                </div>
                <div class="team-game__para p-3">
                    <span id="itz-modal-text-end" style="font-size: 16px; font-weight: bold;-webkit-text-fill-color: transparent;-webkit-background-clip: text;"
                        class="itz-btn-home">
                        Vui lòng chờ gợi ý vài giây
                    </span>
                </div>
                <div class="team-game__btn d-flex justify-content-center">
                    <button style="width: 120px; border-radius: 20px" data-bs-dismiss="modal" class="itz-btn-home btn text-light mb-3">Quay lại</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', () => {
        if (window.getBusBack) {
            getBusBack();
        }
    })
    window.addEventListener('DOMContentLoaded', () => {
        if (window.checkLetterAnswer) {
            checkLetterAnswer();
        }
    });
</script>