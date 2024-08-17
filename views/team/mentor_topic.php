<?php
    /**
     * @var $topic_data
     * @var $location_id
     */
?>

<div class="container">
    <div class="row">
        <div class="team-mentor_topic">
            <div class="team-mentor_topic__header d-flex flex-wrap">
                <div class="team-mentor_topic__line col-sm-3 col-md-3"></div>
                <span class="team-mentor_topic__header-title text-center col-sm-6 col-md-6">Hãy tìm mentor của bạn</span>
                <div class="team-mentor_topic__line col-sm-3 col-md-3"></div>
            </div>

            <div class="team-mentor_topic__sub-header">
                <h1 class="team-mentor-topic__sub-header-title">Mật thư</h1>
                <span class="team-mentor_topic__sb-header-sub-title">Giải mật thư tìm Mentor của bạn.</span>
            </div>

            <div class="team-mentor_topic__content d-flex flex-wrap">
                <div class="team-mentor_topic__logo col-sm-12 col-md-12 text-center">
                    <img style="width: 200px" src="/public/img/topic/mail-img.png" alt="">
                </div>
                <a href="<?=$topic_data['topic_link']?>" target="_blank" class="team-mentor_topic__link"> Mật thư truy tìm Mentor </a>
                <span class="team-mentor_topic__text text-center col-sm-12 col-md-12">
                    Chào mừng bạn đến mật thư tìm Mentor, hãy nhanh chóng tìm ra đáp án đến với Mentor của bạn
                </span>
                <p id="team__topic-countdown" class="team-mentor_topic__time">-- : --</p>
                <div class="accordion team-game_1__hint accordion-flush col-sm-12 col-md-12 mb-3" id="accordionFlushExample">
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
                <div class="form-group col-sm-12 col-md-12 d-flex flex-wrap justify-content-between">
                    <input id="team__topic-input" placeholder="Nhập đáp án" type="text" class="col-sm-8 col-md-8 form-control team-mentor_topic__inp">
                    <button id="team__topic-btn" type="submit" class="col-sm-3 col-md-3 itz-bg-normal team-mentor_topic__btn">Gửi</button>
                </div>
                <div id="team__topic-alert--outer" style="padding: 8px" class="alert alert-danger mt-3 mb-0 w-100 d-none">
                    <span style="font-size: 11px" id="team__topic-alert"></span>
                </div>
            </div>
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
            </div>
        </form>
    </div>
</div>