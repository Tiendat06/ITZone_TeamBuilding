<?php

    include "./views/layout/partials/preprocess_footer.php";

    /**@var $link_home
     * @var $span_home
     * @var $link_rule
     * @var $span_rule
     * @var $link_question
     * @var $span_question
     * @var $link_game
     * @var $span_game
     * @var $link_team
     * @var $span_team
     */
?>

<footer class="footer">
    <div class="footer-control w-100">
<!--    itz-bg-normal -->
        <?php
            if($_SESSION['role_name'] == 'mentor'){
        ?>
            <a href="/mentor" class="footer-control__home footer-control__link <?= $link_home ?>">
                <img src="/public/img/icon/majesticons_home-line.png" alt="">
                <span class="<?= $span_home ?>">Home</span>
            </a>

            <a href="/rule" class="footer-control__rule footer-control__link <?= $link_rule ?>">
                <img src="/public/img/icon/ic_round-rule.png" alt="">
                <span class="<?= $span_rule ?>">Rule</span>
            </a>
        <?php
        } else if($_SESSION['role_name'] == 'guard'){
        ?>
                <a href="/guard" class="footer-control__home footer-control__link <?= $link_home ?>">
                    <img src="/public/img/icon/majesticons_home-line.png" alt="">
                    <span class="<?= $span_home ?>">Home</span>
                </a>
                <a href="/guard/question" class="footer-control__question footer-control__link <?= $link_question ?>">
                    <img src="/public/img/icon/mdi_question-box-outline.png" alt="">
                    <span class="<?= $span_question ?>">Quests</span>
                </a>
                <a href="/rule" class="footer-control__rule footer-control__link <?= $link_rule ?>">
                    <img src="/public/img/icon/ic_round-rule.png" alt="">
                    <span class="<?= $span_rule ?>">Rule</span>
                </a>
        <?php
            } else if($_SESSION['role_name'] == 'support') {
        ?>
                <a href="/support" class="footer-control__home footer-control__link <?= $link_home ?>">
                    <img src="/public/img/icon/majesticons_home-line.png" alt="">
                    <span class="<?= $span_home ?>">Home</span>
                </a>
                <a href="/support/question" class="footer-control__question footer-control__link <?= $link_question ?>">
                    <img src="/public/img/icon/mdi_question-box-outline.png" alt="">
                    <span class="<?= $span_question ?>">Quests</span>
                </a>
                <a href="/rule" class="footer-control__rule footer-control__link <?= $link_rule ?>">
                    <img src="/public/img/icon/ic_round-rule.png" alt="">
                    <span class="<?= $span_rule ?>">Rule</span>
                </a>
                <a href="/support/team" class="footer-control__team footer-control__link <?= $link_team ?>">
                    <img src="/public/img/icon/ri_team-line.png" alt="">
                    <span class="<?= $span_team ?>">Team</span>
                </a>
        <?php
            } else if($_SESSION['role_name'] == 'team'){
        ?>
                <a href="/team/game-mentor" class="footer-control__home footer-control__link <?= $link_home ?>">
                    <img src="/public/img/icon/majesticons_home-line.png" alt="">
                    <span class="<?= $span_home ?>">Home</span>
                </a>
                <a href="/team/game-1" class="footer-control__game footer-control__link <?= $link_game ?>">
                    <img src="/public/img/icon/bx_game.png" alt="">
                    <span class="<?= $span_game ?>">Game</span>
                </a>

                <a href="/rule" class="footer-control__rule footer-control__link <?= $link_rule ?>">
                    <img src="/public/img/icon/ic_round-rule.png" alt="">
                    <span class="<?= $span_rule ?>">Rule</span>
                </a>

                <a href="/team/member" class="footer-control__team footer-control__link <?= $link_team ?>">
                    <img src="/public/img/icon/ri_team-line.png" alt="">
                    <span class="<?= $span_team ?>">Team</span>
                </a>
        <?php
            }
        ?>
    </div>
</footer>
