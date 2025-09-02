
class Guard{
    constructor() {}

    onClickBtnLock = () => {
        $('.guard-btn__lock').click( function() {
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

   fetchUpdateNextPriority = () => {
    const sendUpdate = (check) => {
        const team_id = $('#modal__team_id').val();
        const mentor_id = $('#modal__mentor-id').val();
        const next_priority = $('#modal__next_priority').val();
        const input = $('#modal__input-key').val();

        fetch('/guard/update_next_location', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ team_id, mentor_id, next_priority, input, check })
        })
        .then(response => response.json())
        .then(data => {
            $('#modal__input-key').val('')
            $('#toast-message-modal').html(data['message'] || '')

            const toast = $('#toast-modal')
            if (data['status'] === true) {
                toast.removeClass('d-none').addClass('bg-success')
                setTimeout(() => {
                    toast.addClass('d-none').removeClass('bg-success')
                    window.location = '/guard/question'
                }, 3000)
            } else {
                toast.removeClass('d-none').addClass('bg-danger')
                setTimeout(() => {
                    toast.addClass('d-none').removeClass('bg-danger')
                }, 3000)
            }
        })
        .catch(error => console.error(error))
    }

    $('#btn__check-key').click(() => sendUpdate(true))
    $('#btnfalse__check-key').click(() => sendUpdate(false))
}

 
}

export default new Guard;