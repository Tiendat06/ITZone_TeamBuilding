<?php
?>

<div class="container">
    <div class="row">
        <div class="support-question d-flex flex-wrap">
            <div class="support-question__header d-flex flex-wrap">
                <div class="support-question__line col-sm-3 col-md-3"></div>
                <div class="support-question__para col-sm-6 col-md-6">Kho mật thư</div>
                <div class="support-question__line col-sm-3 col-md-3"></div>
            </div>

            <div class="support-question__location w-100">
                <div class="support-question__location--scroll position-relative d-flex flex-wrap">
                    <button id="support-question__location--icon-left" type="button" class="btn support-question__location--icon-left position-absolute">
                        <img src="/public/img/icon/icon-left-arrow.png" alt="">
                    </button>

                    <div class="w-100 d-flex overflow-hidden align-items-center justify-content-around">
<!--                        <div class="support-question__location--item-side">-->
<!--                            <img src="/public/img/icon/carbon_map.png" alt="">-->
<!--                        </div>-->
                        <div class="support-question__location--item-outer d-flex">
                            <div class="support-question__location--item-inner col-sm-12 d-flex justify-content-center">
                                <div class="support-question__location--item-mid d-flex flex-wrap justify-content-center">
                                    <img src="/public/img/icon/carbon_map.png" class="mt-2" alt="">
                                    <p class="mb-0 text-light support-question__item--para mt-2">Phố đi bộ</p>
                                </div>
                            </div>
                            <div class="support-question__location--item-inner col-sm-12 d-flex justify-content-center">
                                <div class="support-question__location--item-mid d-flex flex-wrap justify-content-center">
                                    <img src="/public/img/icon/carbon_map.png" class="mt-2" alt="">
                                    <p class="mb-0 text-light support-question__item--para mt-2">Đường sách</p>
                                </div>
                            </div>
                            <div class="support-question__location--item-inner col-sm-12 d-flex justify-content-center">
                                <div class="support-question__location--item-mid d-flex flex-wrap justify-content-center">
                                    <img src="/public/img/icon/carbon_map.png" class="mt-2" alt="">
                                    <p class="mb-0 text-light support-question__item--para mt-2">Công viên</p>
                                </div>
                            </div>
                        </div>
<!--                        <div class="support-question__location--item-side">-->
<!--                            <img src="/public/img/icon/carbon_map.png" alt="">-->
<!--                        </div>-->
                    </div>
                    <button type="button" class="btn support-question__location--icon-right position-absolute">
                        <img src="/public/img/icon/icon-right-arrow.png" alt="">
                    </button>
                </div>
            </div>

            <div class="w-100 d-flex support-question__report--outer">
                <div class="accordion support-question__report" style="height: auto">
                    <div class="accordion-item support-question__report--fail support-question__report--item"
                         data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <div class="support-question__report-icon">
                            <img src="/public/img/icon/icon-time-fail.png" alt="">
                        </div>
                        <p class="mb-0">Thất bại</p>
                        <span id="support-question__total-lose">1/3</span>

                    </div>
                    <div id="collapseOne" class="accordion-collapse collapse support-question__report--collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div id="accordion-body__lose" class="accordion-body">
                            <div class="support-question__report-team mt-2">
                                <span>Team 1</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion support-question__report" style="height: auto">
                    <div class="accordion-item support-question__report--done support-question__report--item"
                         data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <div class="support-question__report-icon">
                            <img src="/public/img/icon/icon-save-done.png" alt="">
                        </div>
                        <p class="mb-0">Hoàn thành</p>
                        <span id="support-question__total-win">2/3</span>
                    </div>
                    <div id="collapseTwo" class="accordion-collapse collapse support-question__report--collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div id="accordion-body__win" class="accordion-body">
                            <div class="support-question__report-team mt-2">
                                <span>Team 2</span>
                            </div>
                            <div class="support-question__report-team mt-2">
                                <span>Team 3</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        if(window.fetchLocation){
            fetchLocation()
        }
    })
</script>