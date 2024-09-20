<?php
?>
<div class="team-rule">
    <div class="team-rule__header">
        <h3 class="team-rule__title">IT-Zone Teambuilding 2024</h3>
    </div>

    <div class="team-rule__content">
        <a href="/" class="d-block team-rule__back">
            <i class="team-rule__back--icon fa-solid fa-arrow-left"></i>
            <span class="team-rule__text">Trở về</span>
        </a>

        <div class="team-rule__header">
            <div class="team-rule__img col-sm-12 col-md-12">
                <img class="team-rule__img--logo" src="/public/img/logo/it-zone-logo-original.jpg" alt="" srcset="">
            </div>
        </div>

        <div id="team-rule__progress" class="team-rule__progress w-100">
            <div class="team-rule-progress__heading col-sm-12 col-md-12">
                <h2 class="team-rule__progress-title col-sm-12 col-md-12">Kiểm tra bản đồ!</h2>
                <h2 class="team-rule__progress-title col-sm-12 col-md-12">Vuợt ngàn chông gai!</h2>
                <h2 class="team-rule__progress-title col-sm-12 col-md-12">Không thể xuyên thủng!</h2>
            </div>

            <div class="team-rule__stt col-sm-12 col-md-12">
                <div class="team-rule__stt--item col-sm-12 col-md-12">
                    <div style="background-color: transparent;" class="team-rule__stt-line-left team-rule__stt-line"></div>
                    <div class="team-rule__stt-text">1</div>
                    <div class="team-rule__stt-line team-rule__stt-line-right"></div>
                </div>

                <div class="team-rule__stt--item col-sm-12 col-md-12">
                    <div class="team-rule__stt-line-left team-rule__stt-line"></div>
                    <div class="team-rule__stt-text">2</div>
                    <div class="team-rule__stt-line team-rule__stt-line-right"></div>
                </div>

                <div class="team-rule__stt--item col-sm-12 col-md-12">
                    <div class="team-rule__stt-line-left team-rule__stt-line"></div>
                    <div class="team-rule__stt-text">3</div>
                    <div class="team-rule__stt-line team-rule__stt-line-right"></div>
                </div>
            </div>

            <div class="team-rule__progress-text col-sm-12 col-md-12">
                <p class="mb-2 team-rule__progress-para col-sm-12 col-md-12">
                    Bản đồ ở trang chủ sẽ hiện vị trí của trạm bạn đang giữ. Với vai trò là một người gác trạm, hãy đảm bảo không một đội nào có thể vượt qua nơi bạn canh giữ quá dễ dàng.
                </p>

                <p class="mb-2 team-rule__progress-para col-sm-12 col-md-12">
                    Như đã nói, bạn sẽ là người gây khó khăn cho bất kỳ đội nào đặt chân đến trạm bằng những câu đố. Hãy lựa chọn và đưa ra câu đố hợp lý. Bật mí rằng, mỗi câu đố cần có chìa khóa để khởi động đấy!
                </p>

                <p class="mb-2 team-rule__progress-para col-sm-12 col-md-12">
                    Những bộ giáp, những hàng rào đã được hoàn thành. Hãy biến nơi bạn đang đứng trở thành nỗi dè chừng của bất cứ đội chơi nào đi qua nhé!<br>
                    Hãy gây thật nhiều trở ngại!
                </p>

            </div>

            <div class="team-rule__control col-sm-12 col-md-12">
                <div style="text-align: center" class="team-rule__control-text col-sm-12 col-md-12">
                    <p class="mb-0 team-rule__control-para col-sm-12 col-md-12"><span class="team-rule__control-next">Tiếp >>></span></p>
                </div>

                <div class="team-rule__control-text col-sm-12 col-md-12">
                    <p class="team-rule__control-para col-sm-6 col-md-6"><span class="team-rule__control-previous"><<< Trước</span></p>
                    <p style="text-align: right" class="mb-0 team-rule__control-para col-sm-6 col-md-6"><span class="team-rule__control-next">Tiếp >>></span></p>
                </div>

                <div class="team-rule__control-text col-sm-12 col-md-12">
                    <p class="mb-0 team-rule__control-para col-sm-6 col-md-6"><span class="team-rule__control-previous"><<< Trước</span></p>
                    <p style="text-align: right" class="mb-0 team-rule__control-para col-sm-6 col-md-6"><span class="team-rule__control-return">Xem lại <i class="fa-solid fa-rotate-left"></i></span></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', () => {
        if(window.translateNextRule){
            translateNextRule();
        }
        if(window.translatePreviousRule){
            translatePreviousRule();
        }
        if(window.translateReturn){
            translateReturn();
        }
    })
</script>