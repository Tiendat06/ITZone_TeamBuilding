<?php
?>

<div class="container">
    <div class="row">
        <div class="support-team d-flex flex-wrap">
            <div class="support-team__header d-flex flex-wrap">
                <div class="support-team__line col-sm-3 col-md-3"></div>
                <div class="support-team__title position-relative col-sm-5 col-md-5">
                    <div data-bs-toggle="modal" data-bs-target="#choose-team" class="support-team__dropdown text-center">
                        <span class="support-team__dropdown--para">Chọn đội</span>
                        <div class="support-team__dropdown-box d-flex align-items-center">
                            <i class="support-team__dropdown--icon fa-solid fa-angle-down"></i>
                        </div>
                    </div>
                </div>
                <div class="support-team__line col-sm-3 col-md-3"></div>
            </div>

            <div class="support-team-content">
                <div class="support-team-content__heading">
                    <div class="support-team-content__heading-name d-flex flex-wrap text-center">
                        <div class="support-team-content__heading-logo position-relative col-sm-12 col-md-12">
                            <div class="support-team-content__radius support-team-content__radius--left"></div>
                            <img class="support-team-content__heading-img" src="/public/img/icon/icon-mentor-flag.png" alt="">
                            <div class="support-team-content__radius"></div>
                        </div>
                        <div class="support-team-content__heading-para badge mb-0 col-sm-12 col-md-12 text-light">
                            <span class="support-team-content__heading-text">Mentor name</span>
                        </div>
                    </div>

                    <div class="support-team-content__info">
                        <div class="support-team-content__process d-flex">
                            <i class="support-team-content__process-icon fa-solid fa-flag"></i>
                            <div class="support-team-content__process-line"></div>
                            <i class="support-team-content__process-icon fa-solid fa-flag"></i>
                            <div class="support-team-content__process-line"></div>
                            <i class="support-team-content__process-icon fa-solid fa-flag"></i>
                            <div class="support-team-content__process-line"></div>
                            <i class="support-team-content__process-icon fa-solid fa-flag"></i>
                            <div class="support-team-content__process-line"></div>
                            <i class="support-team-content__process-icon fa-solid fa-flag"></i>
                        </div>

                        <div class="support-team-content__list">
                            <div class="support-team-content__item">
                                <img src="/public/img/icon/icon-crown.png" alt="">
                                <span class="support-team-content__para">Tạ Tiến Đạt</span>
                                <img src="/public/img/icon/ph_phone-fill.png" alt="">
                            </div>

                            <div class="support-team-content__item support-team-content__item--member">
                                <img src="/public/img/icon/icon-member-green.png" alt="">
                                <span class="support-team-content__para">Tạ Tiến Đạt</span>
                                <img src="/public/img/icon/icon-phone-green.png" alt="">
                            </div>

                            <div class="support-team-content__item support-team-content__item--member">
                                <img src="/public/img/icon/icon-member-green.png" alt="">
                                <span class="support-team-content__para">Tạ Tiến Đạt</span>
                                <img src="/public/img/icon/icon-phone-green.png" alt="">
                            </div>

                            <div class="support-team-content__item support-team-content__item--member">
                                <img src="/public/img/icon/icon-member-green.png" alt="">
                                <span class="support-team-content__para">Tạ Tiến Đạt</span>
                                <img src="/public/img/icon/icon-phone-green.png" alt="">
                            </div>

                            <div class="support-team-content__item support-team-content__item--member">
                                <img src="/public/img/icon/icon-member-green.png" alt="">
                                <span class="support-team-content__para">Tạ Tiến Đạt</span>
                                <img src="/public/img/icon/icon-phone-green.png" alt="">
                            </div>

                            <div class="support-team-content__item support-team-content__item--member">
                                <img src="/public/img/icon/icon-member-green.png" alt="">
                                <span class="support-team-content__para">Tạ Tiến Đạt</span>
                                <img src="/public/img/icon/icon-phone-green.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<div class="modal fade" id="choose-team" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Chọn đội</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <select class="form-select modal__choose-team" id="modal__choose-team">
                        <option value="TEA0000001">TEAM 1</option>
                        <option value="TEA0000002">TEAM 2</option>
                        <option value="TEA0000003">TEAM 3</option>
                        <option value="TEA0000004">TEAM 4</option>
                        <option value="TEA0000005">TEAM 5</option>
                        <option value="TEA0000006">TEAM 6</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Đóng
                </button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Chọn</button>
            </div>
        </form>
    </div>
</div>