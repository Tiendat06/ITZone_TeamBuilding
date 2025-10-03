
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
    // checkAllTeamDone = () => {
    //     let location_id = $(this).data('location_id');
    //     fetch('/guard/#', {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json',
    //         },
    //         body: JSON.stringify({ location_id })
    //     }).then(response => response.json()).then(data => {

    //     })
    // }
}

export default new Guard;