<?php
/**
 * @var $mentors
 * @var $guards
 */
?>

<div class="container">
    <div class="row">
        <div class="support">
            <div class="support-header d-flex flex-wrap">
                <div class="support-title d-flex flex-wrap">
                    <div class="support-title__line col-sm-4 col-md-4"></div>
                    <div class="support-title__para col-sm-4 col-md-4">Liên hệ</div>
                    <div class="support-title__line col-sm-4 col-md-4"></div>
                </div>

                <div class="support-search col-sm-10">
                    <div class="support-search__inp form-group">
                        <i class="support-search__icon fa fa-search position-absolute"></i>
                        <input type="text" class="form-control support-search__inp--item" placeholder="Tìm kiếm...">
                    </div>
                </div>
            </div>

            <div class="support-content d-flex flex-wrap">
                <div class="support-content__role d-flex flex-wrap nav nav-tabs col-sm-12 col-md-12">
                    <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#admin" href="#"><span>Admin</span></a>
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#mentor" href="#"><span>Mentor</span></a>
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#guard" href="#"><span>Gác trạm</span></a>
                </div>
                <div class="support-content__contact tab-content col-sm-12 col-md-12" id="myTabContent">

                    <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="admin-tab">

                        <div class="support-content__contact--item d-flex flex-wrap">
                            <div class="support-content__contact--info d-flex flex-wrap align-items-center col-sm-8 col-md-8">
                                <img style="width: 30px" class="support-content__contact--img" src="/public/img/icon/icon-phone.png" alt="">
                                <span style="margin-left: 5px" class="mb-0 support-content__contact--para">Nhất Đăng</span>
                            </div>
                            <span class="support-content__contact--phone col-sm-4 col-md-4">0888835504</span>
                        </div>

                        <div class="support-content__contact--item d-flex flex-wrap">
                            <div class="support-content__contact--info d-flex flex-wrap align-items-center col-sm-8 col-md-8">
                                <img style="width: 30px" class="support-content__contact--img" src="/public/img/icon/icon-phone.png" alt="">
                                <span style="margin-left: 5px" class="mb-0 support-content__contact--para">Tiến Đạt</span>
                            </div>
                            <span class="support-content__contact--phone col-sm-4 col-md-4">0356779197</span>
                        </div>


                    </div>

                    <div class="tab-pane fade show" id="mentor" role="tabpanel" aria-labelledby="mentor-tab">
                        <?php
                        foreach ($mentors as $row){
                            $mentor_name = $row['mentor_name'];
                            $mentor_phone = $row['mentor_phone'];
                            ?>
                            <div class="support-content__contact--item d-flex flex-wrap">
                                <div class="support-content__contact--info d-flex flex-wrap align-items-center col-sm-8 col-md-8">
                                    <img style="width: 30px" class="support-content__contact--img" src="/public/img/icon/icon-phone.png" alt="">
                                    <span style="margin-left: 5px" class="mb-0 support-content__contact--para"><?=$mentor_name?></span>
                                </div>
                                <span class="support-content__contact--phone col-sm-4 col-md-4"><?=$mentor_phone?></span>
                            </div>
                            <?php
                        }
                        ?>

                    </div>

                    <div class="tab-pane fade show" id="guard" role="tabpanel" aria-labelledby="guard-tab">
                        <?php
                        foreach ($guards as $row){
                            $guard_name = $row['member_name'];
                            $guard_phone = $row['member_phone'];
                            ?>
                            <div class="support-content__contact--item d-flex flex-wrap">
                                <div class="support-content__contact--info d-flex flex-wrap align-items-center col-sm-8 col-md-8">
                                    <img style="width: 30px" class="support-content__contact--img" src="/public/img/icon/icon-phone.png" alt="">
                                    <span style="margin-left: 5px" class="mb-0 support-content__contact--para"><?=$guard_name?></span>
                                </div>
                                <span class="support-content__contact--phone col-sm-4 col-md-4"><?=$guard_phone?></span>
                            </div>
                            <?php
                        }
                        ?>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (window.searchUser) {
            searchUser();
        }
    });
</script>

