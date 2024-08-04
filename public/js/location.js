class Location{
    constructor() {}

    topicCountDown = (time_end) => {
        var endTime = new Date(time_end).getTime();

        var timer_id = setInterval(() => {
            var now = new Date().getTime();

            var distance = endTime - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            $('#countdown').html(`${minutes} minutes ${seconds} seconds`);

            if (distance < 0) {
                clearInterval(timer_id);
                let location_id = $('#location_id').val();
                this.getTopicAnswer(location_id);

                $('#countdown').html(`EXPIRED`);
            }
        }, 1000);
    }
//
    getTopicAnswer = (location_id) => {
        fetch('/location/get_answer', {
            method: 'POST',
            headers: {
                "Content-Type": "application/json; charset=UTF-8"
            },
            body: JSON.stringify({
                location_id: location_id
            })
        })
            .then(response => response.json())
            .then((data) => {
                // console.log(data)
                if(location_id === 'LOC0000006'){
                    $('#topic_para--alert').html(`Please contact to: ${data['mentor_name']}, ${data['mentor_phone']}`);
                } else{
                    $('#topic_para--alert').html(`Please go to: ${data['location_name']}, ${data['location_address']}`);
                }
                // console.log(data);
            })
            .catch((error) => {
                console.log(error);
            })
    }

    ajaxSendTopicAnswer = () => {
        $('#btn_answer--submit').click(function (){
            var topic_answer = $('#topic_name--input').val();
            // var topic_id = $('#topic_id').val();
            var location_id = $('#location_id').val();
            $.ajax({
                url: '/location/send_answer',
                type: 'POST',
                data: {
                    topic_answer,
                    location_id
                },
                success: (response, status, xhr) => {
                    if(response === '<p>Wrong answer !!</p>' && location_id === 'LOC0000006'){
                        $('#topic_name--input').prop('disabled', true);
                        // localStorage.setItem('inputDisabled', 'true');
                        //
                        // setTimeout(function() {
                        //     $('#topic_name--input').prop('disabled', false);
                        //     localStorage.removeItem('inputDisabled');
                        // }, 180000);
                    } else{
                        $('#topic_para--alert').html(response);
                    }
                },
                error: (xhr, status, error) => {
                    console.log(error);
                },
                complete: (xhr, status) => {

                }
            })
        })
    }

    checkDisableInput = () => {
        // if (localStorage.getItem('inputDisabled') === 'true') {
        //     $('#topic_name--input').prop('disabled', true);
        // }
    }
}

export default new Location;