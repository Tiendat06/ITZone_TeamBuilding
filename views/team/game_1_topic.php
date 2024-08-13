<?php
?>

<div class="team-game_1">
    <div class="team-game_1__box">
        <div class="team-game_1__header">
            <a href="/" class="team-game_1__back col-sm-2 col-md-2">
                <img src="/public/img/icon/icon-return.png" alt="">
            </a>

            <div class="team-game_1__title col-sm-10 col-md-10">
                <h1 class="team-game_1__title--para"> Mật thư trạm 1 </h1>
            </div>
        </div>

        <div class="team-game_1__content text-center mt-4">
            <div class="team-game_1__content--character">
                <img class="team-game_1__content--img" src="/public/img/topic/dragon_1.png" alt="">
            </div>
            <div class="team-game_1__content--greet">
                <span class="team-game_1__content--para">Chúc mừng bạn đã vượt qua thử thách tại Trạm. Hãy nhanh chóng tìm đáp án của mật thư để mở khóa địa điểm trạm nhé!</span>
            </div>
            <div class="team-game_1__content--info d-flex flex-wrap">
                <div class="team-game_1__content--mail">
                    <i class="fa-regular fa-envelope"></i>
                </div>
                <a href="#" target="_blank" class="team-game_1__content--link">
                    <span class="team-game_1__content--para-link">Mật thư trạm</span>
                </a>

                <div class="team-game_1__content--countdown col-sm-12 col-md-12">
                    <p class="team-game_1__content--para-countdown mb-0">29 : 59</p>
                </div>

                <div class="accordion team-game_1__hint accordion-flush col-sm-12 col-md-12 mt-3" id="accordionFlushExample">
                    <div class="accordion-item team-game_1__hint-item">
                        <h2 class="accordion-header team-game_1__hint-header" id="flush-headingOne">
                            <button class="accordion-button team-game_1__hint-btn p-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Gợi ý (1)
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body team-game_1__hint-body d-flex flex-wrap justify-content-between">
                                <button data-bs-toggle="modal" data-bs-target="#show-hint" data-value="1" class="itz-bg-normal team-game_1__hint-btn">Gợi ý 1</button>
                                <button data-bs-toggle="modal" data-bs-target="#show-hint" data-value="2" class="itz-bg-normal team-game_1__hint-btn">Gợi ý 2</button>
                                <button data-bs-toggle="modal" data-bs-target="#show-hint" data-value="3" class="itz-bg-normal team-game_1__hint-btn">Gợi ý 3</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form action="/#" method="POST" class="team-game_1__answer d-flex flex-wrap">
            <input type="text" placeholder="Nhập đáp án" class="col-sm-8 col-md-8 team-game_1__answer--inp form-control">
            <div class="team-game_1__btn col-sm-3 col-md-3 ">
                <button type="submit" style="border-radius: 10px;" class="itz-bg-normal w-100 h-100">
                    Gửi
                </button>
            </div>

        </form>
    </div>
</div>


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
                Gợi ý 1
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