<?php
    /**@var $team_member*/

?>
<?php

    foreach($team_member as $member){
        $team_member_name = $member->getTeamMemberName();
        $team_member_phone = $member->getTeamMemberPhone();
        if($member->getIsTeamLeader() == 1) {
            ?>
            <div class="support-team-content__item">
                <img src="/public/img/icon/icon-crown.png" alt="">
                <span class="support-team-content__para"><?= $team_member_name ?></span>
                <img src="/public/img/icon/ph_phone-fill.png" title="<?=$team_member_phone?>" alt="">
            </div>
                <?php
        } else {
            ?>
                <div class="support-team-content__item support-team-content__item--member">
                    <img src="/public/img/icon/icon-member-green.png" alt="">
                    <span class="support-team-content__para"><?= $team_member_name ?></span>
                    <img src="/public/img/icon/icon-phone-green.png" title="<?=$team_member_phone?>" alt="">
                </div>
            <?php
        }
    }

?>





