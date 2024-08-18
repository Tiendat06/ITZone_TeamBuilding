<?php
    /**
     * @var $location_id
     * @var $topic_data
     * @var $location_data
     */
?>
<?php
    if($location_id != 'LOC0000001'){
?>
<div class="team-game_1">
    <div class="team-game_1__box">
        <div class="team-game_1__header justify-content-between">
            <a href="/team/game-1" class="team-game_1__back col-sm-3 col-md-3">
                <img src="/public/img/icon/icon-return.png" alt="">
            </a>

            <div class="team-game_1__title col-sm-9 col-md-8">
                <h1 class="team-game_1__title--para">Mật thư trạm</h1>
            </div>
        </div>

        <div class="team-game_1__content text-center mt-4">
            <div class="team-game_1__content--character">
                <img class="team-game_1__content--img" src="/public/img/topic/<?=$location_data['location_img']?>" alt="">
            </div>
            <div class="team-game_1__content--greet">
                <span class="team-game_1__content--para">Chúc mừng bạn đã vượt qua thử thách tại Trạm. Hãy nhanh chóng tìm đáp án của mật thư để mở khóa địa điểm trạm nhé!</span>
            </div>
            <div class="team-game_1__content--info d-flex flex-wrap">
                <div class="team-game_1__content--mail">
                    <i class="fa-regular fa-envelope"></i>
                </div>
                <a href="<?=$topic_data['topic_link']?>" target="_blank" class="team-game_1__content--link">
                    <span class="team-game_1__content--para-link">Mật thư trạm</span>
                </a>

                <div class="team-game_1__content--countdown col-sm-12 col-md-12">
                    <p id="team__topic-countdown" class="team-game_1__content--para-countdown mb-0">-- : --</p>
                </div>

                <div class="accordion team-game_1__hint accordion-flush col-sm-12 col-md-12 mt-3" id="accordionFlushExample">
                    <div class="accordion-item team-game_1__hint-item">
                        <h2 class="accordion-header team-game_1__hint-header" id="flush-headingOne">
                            <button id="team__total-hint" class="accordion-button team-game_1__hint-btn p-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Gợi ý (1)
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body team-game_1__hint-body d-flex flex-wrap justify-content-between">
                                <button data-bs-toggle="modal" data-bs-target="#show-hint" data-value="1" class="itz-bg-normal d-none team-game_1__hint-btn team-game_1__hint-btn-view">Gợi ý 1</button>
                                <button data-bs-toggle="modal" data-bs-target="#show-hint" data-value="2" class="itz-bg-normal d-none team-game_1__hint-btn team-game_1__hint-btn-view">Gợi ý 2</button>
                                <button data-bs-toggle="modal" data-bs-target="#show-hint" data-value="3" class="itz-bg-normal d-none team-game_1__hint-btn team-game_1__hint-btn-view">Gợi ý 3</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form action="/#" onsubmit="return false" method="POST" class="team-game_1__answer d-flex flex-wrap">
            <input id="team__topic-input" type="text" placeholder="Nhập đáp án" class="col-sm-8 col-md-8 team-game_1__answer--inp form-control">
            <div class="team-game_1__btn col-sm-3 col-md-3 ">
                <button id="team__topic-btn" type="submit" style="border-radius: 10px;" class="itz-bg-normal w-100 h-100">
                    Gửi
                </button>
            </div>
        </form>
        <div id="team__topic-alert--outer" style="padding: 8px" class="alert alert-danger mt-3 mb-0 w-100 d-none">
            <span style="font-size: 11px" id="team__topic-alert"></span>
        </div>
    </div>
</div>
<input type="hidden" id="team-topic__id" value="<?= $topic_data['topic_id'] ?>">
<input type="hidden" id="team-location_id" value="<?= $location_id ?>">

<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (window.fetchCheckIsDoneTopic){
            fetchCheckIsDoneTopic('<?=$topic_data['topic_id']?>')
        }
        if(window.fetchCheckDisableInput){
            fetchCheckDisableInput('<?=$topic_data['topic_id']?>')
        }
        if (window.topicCountDown) {
            topicCountDown('<?= $topic_data['time_end'] ?>')
        }
        if (window.fetchViewTopicHint){
            fetchViewTopicHint();
        }
        if(window.checkGetHintExtra){
            checkGetHintExtra('<?= $topic_data['time_end'] ?>');
        }
        if (window.fetchSendTopicAnswer){
            fetchSendTopicAnswer();
        }
    });
</script>
<?php
    } else {
    ?>
        <div class="container">
            <div class="row guard">
                <div class="guard-sub-title d-flex flex-wrap align-items-center text-center">
                    <div class="guard-sub-title__line col-sm-3"></div>
                    <span class="guard-sub-title__para col-sm-6">Chào mừng đến trạm</span>
                    <div class="guard-sub-title__line col-sm-3"></div>
                </div>

                <div class="guard-title col-sm-12 text-center mt-2">
                    <h1 class="guard-title__para itz-btn-hover"><?=$location_data['location_name']?></h1>
                </div>

                <div class="guard-location">
<!--                    <iframe class="guard-location__ggmap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4199643219035!2d106.6973647!3d10.7791119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f6570c90b25%3A0x788f1a06c37e1848!2sApril%2030th%20Park!5e0!3m2!1sen!2s!4v1723054211156!5m2!1sen!2s" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
                    <?=$location_data['location_map']?>
                </div>

                <a href="#" class="guard-address text-center">
                    <i class="fa-solid fa-location-dot guard-address__icon"></i>
                    <span class="guard-address__para"><?=$location_data['location_address']?></span>
                </a>

                <div class="w-100 d-flex justify-content-center align-items-center mt-4">
                    <a style="border-radius: 30px; font-size: 13px; width: 120px" href="/team/game-1" class="itz-btn-home btn text-light d-block pt-2">Quay lại</a>
                </div>
            </div>
        </div>
    <?php
    }
?>

<div class="modal fade" id="show-hint" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Gợi ý 1</h5>
                <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <p id="hint-modal__para" class="mb-0">Gợi ý chưa được mở</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Đóng
                </button>
<!--                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>-->
            </div>
        </form>
    </div>
</div>