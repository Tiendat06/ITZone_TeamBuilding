<?php
    /**
     * @var $mentor_name
     * @var $mentor_phone
     * @var $mentor_key
     * @var $team_member
     */
?>

<div class="container">
    <div class="row">
        <div class="mentor">
            <div class="mentor-header">
                <div class="mentor-header__logo">
                    <img style="width: 100%" src="/public/img/intro/mentor-intro.png" alt="">
                </div>
                <div class="mentor-header__title d-flex flex-wrap">
                    <div class="mentor-header__title-line col-sm-3 col-md-3"></div>
                    <span class="mentor-header__title-para text-center col-sm-6 col-md-6">Danh sách thành viên</span>
                    <div class="mentor-header__title-line col-sm-3 col-md-3"></div>
                </div>
            </div>

            <div class="mentor-content">
                <div class="mentor-info">
                    <div class="mentor-info__logo d-flex flex-wrap justify-content-center">
                        <img style="width: 40px" src="/public/img/general/personal.png" alt="" class="mentor-info__img">
                        <div class="mentor-info__badge col-sm-12 col-md-12 text-center">
                            <p class="badge mentor-info__badge-para mb-0">
                                <span class="mentor-info__text">
                                    Mentor
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="mentor-info__personal">
                        <p class="mentor-info__para mb-0"><?=$mentor_name?></p>
                        <p class="mentor-info__para mb-0"><?=$mentor_phone?></p>
                        <p class="mentor-info__para mb-0"><?=$mentor_key?></p>
                    </div>
                </div>

                <?php
                    foreach ($team_member as $row){
                        $team_member_name = $row['team_member_name'];
                        $team_member_phone = $row['team_member_phone'];
                        $is_done = $row['is_done'];
                        if($is_done != null){
                ?>
                        <div class="mentor-member d-flex flex-wrap">
                            <div class="mentor-member__logo">
                                <img style="width: 40px" src="/public/img/icon/user-icon.png" alt="" class="mentor-member__img">
                            </div>
                            <div class="mentor-member__personal">
                                <p class="mentor-member__para mb-0"><?=$team_member_name?></p>
                                <p class="mentor-member__para mb-0"><?=$team_member_phone?></p>
                            </div>
                        </div>
                <?php
                        } else {
                            ?>
                            <div class="mentor-member d-flex flex-wrap">
                                <div class="mentor-member__logo">
                                    <img style="width: 40px" src="/public/img/icon/user-icon.png" alt="" class="mentor-member__img">
                                </div>
                                <div class="mentor-member__personal">
                                    <p class="mentor-member__para mb-0">Chưa có thông tin</p>
                                </div>
                            </div>
                            <?php
                        }

                    }
                ?>

            </div>
        </div>
    </div>
</div>
