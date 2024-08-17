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
            foreach ($team_arrival_location as $row){
                $location_id = $row['location_id'];
                $is_show_next_location = $row['is_show_next_location'];
                $location_img = $row['location_img'];
                $team_arrival_priority = $row['team_arrival_priority'];
                $url_link = '/team/game-1-topic/'.$location_id;
                $disable_card = '';
                if($is_show_next_location == 0){
                    $disable_card = 'itz-disable-card';
                    $url_link = '#';
                }
        ?>
        <a href="<?=$url_link?>" class="team-content__item d-block <?=$disable_card?> col-sm-4 col-md-4">
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
            }
        ?>

<!--        itz-disable-card -->
<!--        <a href="#" class="team-content__item itz-disable-card d-block col-sm-4 col-md-4">-->
<!--            <div class="team-content__item--inner">-->
<!--                <div class="team-content__item--info text-center">-->
<!--                    <div class="team-content__item--img">-->
<!--                        <img style="width: 95px; height: 100px" src="/public/img/topic/dragon_2.png" alt="">-->
<!--                    </div>-->
<!--                    <div class="team-content__item--header">-->
<!--                        <h1 class="team-content__item--title mb-0">Trạm 2</h1>-->
<!--                    </div>-->
<!--                    <div class="team-content__item--play">-->
<!--                        <img src="/public/img/icon/icon-play.png" alt="">-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </a>-->
<!---->
<!--        <a href="#" class="team-content__item itz-disable-card d-block col-sm-4 col-md-4">-->
<!--            <div class="team-content__item--inner">-->
<!--                <div class="team-content__item--info text-center">-->
<!--                    <div class="team-content__item--img">-->
<!--                        <img style="width: 95px; height: 100px" src="/public/img/topic/dragon_3.png" alt="">-->
<!--                    </div>-->
<!--                    <div class="team-content__item--header">-->
<!--                        <h1 class="team-content__item--title mb-0">Trạm 3</h1>-->
<!--                    </div>-->
<!--                    <div class="team-content__item--play">-->
<!--                        <img src="/public/img/icon/icon-play.png" alt="">-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </a>-->

    </div>
</div>