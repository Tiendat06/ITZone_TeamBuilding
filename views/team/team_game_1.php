<?php
    /**
     * @var $team_arrival_location
     */
?>


<div class="team">
    <div class="team-intro d-flex flex-wrap">
        <div class="team-intro__title col-sm-12">
            <h1 class="team-intro__header">Mật thư trạm</h1>
            <img style="" class="w-100 team-intro__img" src="/public/img/team/intro.png" alt="">
        </div>
        <div class="team-intro__sub-title d-flex flex-wrap">
            <div class="team-intro__line col-sm-4 col-md-4"></div>
            <div class="team-intro__sub-title--para col-sm-4 col-md-4">Hãy tìm ra đáp án</div>
            <div class="team-intro__line col-sm-4 col-md-4"></div>
        </div>
    </div>

    <div class="team-content d-flex">
        <?php
            $index = 0;
            $bus_back = '';
            foreach ($team_arrival_location as $row){
                $location_id = $row['location_id'];
                $is_show_next_location = $row['is_show_next_location'];
                $location_img = $row['location_img'];
                $team_arrival_priority = $row['team_arrival_priority'];
                $url_link = '/team/game-1-topic/'.$location_id;
                $disable_card = '';
                $previous_location = '';
                if($is_show_next_location == 0){
                    $disable_card = 'itz-disable-card';
                    $url_link = '#';
                }
                if($index == 3) $bus_back = $row['bus_back'];
                if($location_id === 'LOC0000006') $url_link = '#';
        ?>
        <a <?= $location_id == 'LOC0000006' && $is_show_next_location == 1?
            'data-bs-target="#team-complete" data-bs-toggle="modal" data-back="'.$bus_back.'" data-location="'.$location_id.'"'
            : '' ?>
                href="<?=$url_link?>" class="team-content__item <?= $is_show_next_location == 1 && $location_id != 'LOC0000006'? 'loading-item': '' ?> d-block <?=$disable_card?> col-sm-4 col-md-4">
            <div class="team-content__item--inner">
                <div class="team-content__item--info text-center">
                    <div class="team-content__item--img">
                        <img style="width: 95px; height: 100px" src="/public/img/topic/<?=$location_img?>" alt="">
                    </div>
                    <div class="team-content__item--header">
                        <h1 class="team-content__item--title mb-0">Trạm <?=$team_arrival_priority - 1?></h1>
                    </div>
                    <div class="team-content__item--play">
                        <img src="/public/img/icon/icon-play.png" alt="">
                    </div>
                </div>
            </div>
        </a>

        <?php
                $index++;
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
        if(window.getBusBack){
            getBusBack();
        }
    })
</script>