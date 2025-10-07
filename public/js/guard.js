class Guard {
    constructor() { }

    onClickBtnLock = () => {
        // console.log('ahihi');
        $('.guard-btn__lock').click(function () {
            let team_id = $(this).data('team_id');
            let team_name = $(this).data('team_name');
            let team_next_priority = $(this).data('team_next_priority');
            let mentor_id = $(this).data('mentor_id');

            $('#modalToggleLabel').html(`Mở khóa cho ${team_name}`);
            $('#modal__mentor-id').val(mentor_id);
            $('#modal__team_id').val(team_id);
            $('#modal__next_priority').val(team_next_priority);
        })
    }
    is_success = null;
    confirmHandling = () => {
        console.log('confirmHandling');
        const confirmBtnSuccess = document.querySelector(".confirm__btn--success");
        const confirmBtnFailure = document.querySelector(".confirm__btn--failure");
        console.log(confirmBtnSuccess);
        console.log(confirmBtnFailure);
        confirmBtnSuccess.addEventListener('click', () => {
            this.is_success = true;
            confirmBtnSuccess.style.backgroundColor = '#86DE8A2B';
            confirmBtnFailure.style.backgroundColor = 'white';
        })

        confirmBtnFailure.addEventListener('click', () => {
            confirmBtnFailure.style.backgroundColor = '#ED59594A';
            confirmBtnSuccess.style.backgroundColor = 'white';
            this.is_success = false;
        })
    }



    fetchUpdateNextPriority = () => {
        $('#btn__check-key').click(() => {
            let team_id = $('#modal__team_id').val();
            let mentor_id = $('#modal__mentor-id').val();
            let next_priority = $('#modal__next_priority').val();
            let input = $('#modal__input-key').val();

            fetch('/guard/update_next_location', {
                method: 'POST',
                body: JSON.stringify({
                    team_id,
                    mentor_id,
                    next_priority,
                    input,
                    is_success: this.is_success
                })
            })
                .then(response => response.json())
                .then(data => {
                    $('#modal__input-key').val('')
                    $('#toast-message-modal').html(data['message'])
                    if (data['status'] === true) {
                        $('#toast-modal').removeClass('d-none').addClass('bg-success');
                        setTimeout(() => {
                            $('#toast-modal').addClass('d-none').removeClass('bg-success');
                            window.location = '/guard/question'
                        }, 3000)

                    } else {
                        $('#toast-modal').removeClass('d-none').addClass('bg-danger');
                        setTimeout(() => {
                            $('#toast-modal').addClass('d-none').removeClass('bg-danger');
                        }, 3000)
                    }

                })
                .catch(error => {
                    console.error(error)
                })
        })
    }




    checkAllTeamsDone = () => {
        console.log('Tiến độ: ', teamArrivalProgress);

        if (teamArrivalProgress >= 6) {
            // Tất cả các team đã hoàn thành
            const modalTitle = document.querySelector('.modal-header');
            const modalBody = document.querySelector('.modal-body');
            const modalFooter = document.querySelector('.modal-footer');

            // Thay đổi nội dung của modal
            modalTitle.style.display = 'block';
            modalTitle.innerHTML = `<h3 style = 'text-align: center'>Hoàn thành nhiệm vụ</h3>`;
            modalBody.innerHTML = `
                <div class="text-center">
                    <img src="/public/img/topic/guard_finish.png" alt="success" style="width: 70%; margin-bottom: 20px;">
                    <p>Tất cả mật thư của trạm này đã được mở khóa, hãy tập hợp với team hậu cần hoặc di chuyển cùng các team khác để chuẩn bị về SAB và thực hiện thử thách cuối cùng.</p>
                </div>
            `;
            modalFooter.innerHTML = `
                <button class="btn btn-dark" data-bs-dismiss="modal">Đóng</button>
            `;

            // Hiển thị modal
            const modal = new bootstrap.Modal(document.getElementById('check-key'), {
                backdrop: 'static',
                keyboard: false
            });
            modal.show();
        } else {
            console.log('Vẫn còn đội chưa hoàn thành.');
        }
    };
}

export default new Guard;