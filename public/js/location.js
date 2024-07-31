class Location{
    constructor() {}

    topicCountDown = (time_end) => {
        var endTime = new Date(time_end).getTime();

        var timer_id = setInterval(function() {
            var now = new Date().getTime();

            var distance = endTime - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            $('#countdown').html(`${minutes} minutes ${seconds} seconds`);

            if (distance < 0) {
                clearInterval(timer_id);
                $('#countdown').html(`EXPIRED`);
            }
        }, 1000);
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
                    $('#topic_para--alert').html(response);
                },
                error: (xhr, status, error) => {
                    console.log(error);
                },
                complete: (xhr, status) => {

                }
            })
        })
    }
}

export default new Location;