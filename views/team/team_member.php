<?php
    /**
     * @var $mentor_key
     * @var $mentor_name
     * @var $mentor_phone
     * @var $team_member
     */
?>

<?php
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
                        <?php
                            if($mentor_key){
                        ?>
                            <p class="mentor-info__para mb-0"><?=$mentor_name?></p>
                            <p class="mentor-info__para mb-0"><?=$mentor_phone?></p>
    <!--                        <p class="mentor-info__para mb-0">HJPYSRESISK</p>-->
                        <?php
                            } else {

                        ?>
                                <p class="mentor-info__para mb-0">Chưa có thông tin</p>
                        <?php
                            }
                        ?>
                    </div>
                </div>

                <?php
                    foreach ($team_member as $row) {
                        $team_member_name = $row->getTeamMemberName();
                        $team_member_phone = $row->getTeamMemberPhone();
                        $team_member_gender = $row->getTeamMemberGender();
                        $icon = 'user-icon.png';
//                        if($team_member_gender == 'Female'){
//                            $icon = 'female-icon.png';
//                        }
                ?>
                <div class="mentor-member d-flex flex-wrap">
                    <div class="mentor-member__logo">
                        <img style="width: 40px" src="/public/img/icon/<?=$icon?>" alt="" class="mentor-member__img">
                    </div>
                    <div class="mentor-member__personal">
                        <p class="mentor-member__para mb-0"><?=$team_member_name?></p>
                        <p class="mentor-member__para mb-0"><?=$team_member_phone?></p>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>

