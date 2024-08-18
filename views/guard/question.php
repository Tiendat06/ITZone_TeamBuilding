<?php
    /**
     * @var $teams
     * @var $team_arrival_progress
     * @var $team_arrival_percent_complete
     */
?>


<div class="container">
    <div class="row guard-question">
        <div class="guard-question-sub-title d-flex flex-wrap align-items-center text-center">
            <div class="guard-question-sub-title__line col-sm-3"></div>
            <span class="guard-question-sub-title__para col-sm-6">Kho thử thách</span>
            <div class="guard-question-sub-title__line col-sm-3"></div>
        </div>

        <div class="guard-question-title col-sm-12 text-center mt-2">
            <h1 class="guard-question-title__para itz-btn-hover">Mật thư trạm</h1>
        </div>

        <div class="row d-flex flex-column guard-question-container">
            <div class=" guard-question-progressbar d-flex flex-row justify-content-center">
                <div class="guard-question-progressbar__title" style="width: 60px">Tiến độ</div>
                <span class="progressbar">
                    <div style="width: <?=$team_arrival_percent_complete?>%" class="progressbar__active"></div>
                    <div class="progressbar__number align-content-start" style="width: 60px"><?=$team_arrival_progress?>/6</div>
                </span>
            </div>
            <div class="row col-md-12 guard-question-table">
                <?php
                    foreach ($teams as $row){
                        $team_id = $row['team_id'];
                        $team_name = $row['team_name'];
                        $mentor_id = $row['mentor_id'];
                        $team_arrival_priority = $row['team_arrival_priority'];
                        $is_open_next_location = $row['is_open_next_location'];
                        $icon_img = 'icon_lock.png';
                        $text = 'Khóa';
                        $bg_status = '';
                        if($is_open_next_location == 1){
                            $icon_img = 'icon-unlock.png';
                            $text = 'Đã mở';
                            $bg_status = 'background-color: #86de8a !important;';
                        }
                ?>
                <div class="mt-1 mb-3 d-flex flex-row justify-content-space-between guard-question-information">
                    <div class="d-flex flex-column justify-content-space-between guard-question-information__box">
                        <div class="guard-question-information__title"><?=$team_name?></div>
                        <div style="<?=$bg_status?>" class="guard-question-information__status"><?=$text?></div>
                    </div>
                    <div data-bs-toggle="modal" <?= $is_open_next_location == 0? 'data-bs-target="#check-key"': "" ?>
                         data-team_id="<?=$team_id?>"
                         data-team_name="<?=$team_name?>"
                         data-team_next_priority="<?=$team_arrival_priority + 1?>"
                         data-mentor_id="<?=$mentor_id?>"
                         class="d-flex align-items-center guard-btn__lock justify-content-end guard-question-information__icon">
                        <img src="/public/img/icon/<?=$icon_img?>" alt="lock_icon">
                    </div>
                </div>
                <?php
                    }
                ?>

            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="check-key" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalToggleLabel">Mở khóa cho TEAM 1</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="" id="modal__mentor-id">
                <input type="hidden" name="" id="modal__team_id">
                <input type="hidden" name="" id="modal__next_priority">
                <div class="input-group">
                    <input type="text" id="modal__input-key" class="form-control" placeholder="Nhập mã định danh mentor" aria-describedby="btn__check-key"/>
                    <button class="btn btn-secondary" type="button" id="btn__check-key">
                        <img src="/public/img/icon/icon-key.png" alt="">
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Đóng
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (window.onClickBtnLock){
            onClickBtnLock();
        }
        if(window.fetchUpdateNextPriority){
            fetchUpdateNextPriority();
        }
    })
</script>