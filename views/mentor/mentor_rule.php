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
                <h2 class="team-rule__progress-title col-sm-12 col-md-12">Điểm bắt đầu!</h2>
                <h2 class="team-rule__progress-title col-sm-12 col-md-12">Chìa khóa vạn năng</h2>
                <h2 class="team-rule__progress-title col-sm-12 col-md-12">Hãy là 1 người lãnh đạo tốt!</h2>
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
                    Vị trí bạn đang đứng là câu trả lời cho câu đố đầu tiên đấy. Hãy đảm bảo rằng bạn đang đứng đúng chỗ để không gây khó khăn gì cho đội thi của bạn nhé. Kiên nhẫn và chờ đợi nào!
                </p>

                <p class="mb-2 team-rule__progress-para col-sm-12 col-md-12">
                    XXXXXXXX<br>
                    Đây là mã định danh của bạn. Hãy ghi nhớ và tận dụng nó nhé, cực kì quan trọng đấy!
                </p>

                <p class="mb-2 team-rule__progress-para col-sm-12 col-md-12">
                    Giờ thì bạn sẵn sàng để cùng đội của mình bắt đầu cuộc hành trình này rồi. Hãy đưa ra những lời khuyên và lựa chọn hợp lý để mang về chiến thắng cho đội của mình nhé!
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