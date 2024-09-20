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
                <h2 class="team-rule__progress-title col-sm-12 col-md-12">Hãy là 1 hậu cần mẫu mực!</h2>
                <h2 class="team-rule__progress-title col-sm-12 col-md-12">Xanh hay đỏ?</h2>
                <h2 class="team-rule__progress-title col-sm-12 col-md-12">Sẵn sàng hỗ trợ!</h2>
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
                    Tên chức năng của bạn đã nói lên tất cả, bạn là người hỗ trợ tất cả đội thi cũng như các gác trạm bất cứ khi nào họ cần. Vậy nên hãy nắm rõ thông tin liên lạc của tất cả mọi người để không ai bị bỏ lại nhé!
                </p>

                <p class="mb-2 team-rule__progress-para col-sm-12 col-md-12">
                    Bên cạnh thông tin cần thiết, bạn là người có thể kiểm soát mức độ hoàn thành câu hỏi của tất cả các trạm. Với ô xanh thể hiện số câu hỏi được giải và ô đỏ là ngược lại. Thêm một điều thú vị nữa, bạn cũng có thể theo dõi lộ trình các đội nữa đấy!
                </p>

                <p class="mb-2 team-rule__progress-para col-sm-12 col-md-12">
                    Cũng giống như các hỗ trợ trong game hay cả trong các công việc, một người hậu cần sẽ phải có mặt kịp thời ở mọi điểm nóng. Hãy đưa ra những phán đoán và xử lí tình huống bất ngờ thật gọn gàng nhé!
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