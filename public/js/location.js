class Location{
    #time_fine = null;
    #is_done = false;
    #total_hint = 0;
    constructor() {}

    getIsDone = () => {
        return this.#is_done;
    }

    topicCountDown = (time_end) => {
        var endTime = new Date(time_end).getTime();

        var timer_id = setInterval(async () => {
            let location_id = $('#team-location_id').val();
            let topic_id = $('#team-topic__id').val();
            // await this.fetchCheckDisableInput(topic_id)
            await this.checkIsDone(timer_id, location_id);
            this.checkIsFine();
            var now = new Date().getTime();

            var distance = endTime - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            this.getTopicHint(minutes, seconds);

            if(minutes < 10) minutes = `0${minutes}`;
            if(seconds < 10) seconds = `0${seconds}`;
            // console.log(minutes)
            // console.log(seconds)
            $('#team__topic-countdown').html(`${minutes} : ${seconds}`);

            if (distance < 0 && this.getIsDone() === false) {
                $("#team__topic-input").prop('disabled', true).val('');
                $('#team__topic-btn').prop('disabled', true);
                this.fetchUpdateTopicIsDone(topic_id, 0);

                clearInterval(timer_id);

                $('#team__topic-countdown').html(`00 : 00`);

                $('#toast-message').html('Đã hết thời gian trả lời đáp án');

                $('#toast').removeClass('d-none').addClass('bg-warning');

                let timerId = await new Promise(resolve => setTimeout(() => {
                    $('#toast').addClass('d-none').removeClass('bg-warning');
                        resolve();
                    }, 3000))
                this.fetchGetTopicAnswer(location_id);
            }
            if(this.getIsDone()){
                $('#team__topic-countdown').html(`00 : 00`);
                $("#team__topic-input").prop('disabled', true).val('');
                $('#team__topic-btn').prop('disabled', true);
            }

        }, 1000);
    }

    fetchUpdateTopicIsDone = (topic_id, is_done) => {
        fetch('/team/update_topic_is_done', {
            method: 'POST',
            headers: {
                "Content-Type": "application/json; charset=UTF-8"
            },
            body: JSON.stringify({
                topic_id,
                is_done
            })
        })
            .then(response => response.json())
            .then((data) => {
                console.log(data);
            })
            .catch(error => {
                console.log(error)
            })
    }

    fetchUpdateNextLocationWhileMentor = () => {
        fetch('/team/update_lotte_location', {
            method: 'POST',
            body: JSON.stringify({
                location_id: 'LOC0000001'
            })
        })
            .then(response => response.json())
            .then(data => {
                console.log(data)
            })
            .catch(error => {
                console.error(error)
            })
    }

    fetchGetTopicAnswer = (location_id) => {
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
                if(location_id !== 'LOC0000002' && location_id !== 'LOC0000003' && location_id !== 'LOC0000005'){
                    // ${data['mentor_name']},
                    $('#team__topic-alert--outer').removeClass('d-none').removeClass('alert-danger').addClass('alert-success');
                    $('#team__topic-alert').html(`Hãy liên hệ: ${data['mentor_name']}, ${data['mentor_phone']}</br>Hãy chuyển sang trang Game để tiếp tục cuộc hành trình`);
                    this.fetchUpdateNextLocationWhileMentor()
                } else{
                    console.log(data)
                    $('#team__topic-alert--outer').removeClass('d-none').removeClass('alert-danger').addClass('alert-success');
                    $('#team__topic-alert').html(`Hãy đi tới: ${data['location_name']} </br>${data['location_address']}`);
                }
                // console.log(data);
            })
            .catch((error) => {
                console.log(error);
            })
    }

    fetchSendTopicAnswer = () => {
        $('#team__topic-btn').click(() => {
            var topic_answer = $('#team__topic-input').val();
            var location_id = $('#team-location_id').val();
            var topic_id = $('#team-topic__id').val();

            fetch('/location/send_answer', {
                method: "POST",
                headers: {
                    "Content-Type": "application/json; charset=UTF-8"
                },
                body: JSON.stringify({
                    location_id,
                    topic_answer
                })
            })
                .then(response => response.json())
                .then(async (data) => {
                    let message = data['message'];
                    $('#toast-message').html(message);
                    if (data['status'] === true){
                        this.#is_done = true;
                        let answer = data['answer'];
                        $('#toast').removeClass('d-none').addClass('bg-success');
                        $('#team__topic-alert--outer').removeClass('alert-danger').addClass('alert-success').removeClass('d-none')
                        $('#team__topic-alert').html(answer)
                        let timerId = await new Promise(resolve => setTimeout(() => {
                            $('#toast').addClass('d-none').removeClass('bg-success');
                            resolve();
                        }, 5000))
                        this.fetchUpdateTopicIsDone(topic_id, 1);
                    } else {
                        this.fetchUpdateTimeFine(topic_id);
                        $('#toast').removeClass('d-none').addClass('bg-danger');

                        let timerId = await new Promise(resolve => setTimeout(() => {
                            $('#toast').addClass('d-none').removeClass('bg-danger');
                            resolve();
                        }, 5000))
                        clearTimeout(timerId);
                    }
                })
                .catch(error => {
                    console.log(error)
                })
        })
    }

    fetchUpdateTimeFine = (topic_id) => {
        fetch('/team/update_time_fine', {
            method: 'POST',
            body: JSON.stringify({
                topic_id
            })
        })
            .then(response => response.json())
            .then(data => {
                if(data['status'] === true){
                    this.#time_fine = data['time_fine']
                    console.log(this.#time_fine);
                }
            })
            .catch(error => {
                console.error(error);
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

    fetchCheckDisableInput = (topic_id) => {
        fetch('/team/check_time_fine', {
            method: 'POST',
            body: JSON.stringify({
                topic_id
            })
        })
            .then(response => response.json())
            .then(data => {
                if (data['time_fine'] != null){
                    this.#time_fine = data['time_fine'];
                }
                console.log(data)
            })
            .catch(error => {
                console.error(error);
            })
    }

    fetchCheckIsDoneTopic = (topic_id) => {
        fetch('/team/check_is_done_topic', {
            method: 'POST',
            body: JSON.stringify({
                topic_id
            })
        })
            .then(response => response.json())
            .then(data => {
                if (data['status'] === true){
                    this.#is_done = true;
                    console.log('is done: '+this.#is_done)

                }
            })
            .catch(error => {
                console.error(error)
            })
    }

    fetchViewTopicHint = () => {
        $('.team-game_1__hint-btn-view').click(function ()  {
            $('#hint-modal__para').html('')
            let hint_priority = $(this).data('value');
            let topic_id = $('#team-topic__id').val();

            $('#backDropModalTitle').html(`Gợi ý ${hint_priority}`)
            fetch('/team/view_topic_hint', {
                method: 'POST',
                body: JSON.stringify({
                    topic_id,
                    hint_priority
                })
            })
                .then(response => response.json())
                .then(data => {
                    if(data['status'] === true){
                        $('#hint-modal__para').html(data['hint_description']);
                    } else{
                        $('#hint-modal__para').html(`Gợi ý ${hint_priority} chưa được mở`);
                    }
                    console.log(data)
                })
                .catch(error => {
                    console.error(error)
                })
        })
    }

    getTopicHint = (minutes, seconds) => {
        if(minutes === 25 && seconds === 0){
            console.log('update hint 1')
            document.getElementsByClassName('team-game_1__hint-btn-view')[0].classList.remove('d-none')
            this.#total_hint = 1;
        } else if (minutes === 20 && seconds === 0){
            console.log('update hint 2')
            this.#total_hint = 2;
            document.getElementsByClassName('team-game_1__hint-btn-view')[1].classList.remove('d-none')
        } else if (minutes === 15 && seconds === 0){
            console.log('update hint 3')
            document.getElementsByClassName('team-game_1__hint-btn-view')[2].classList.remove('d-none')
            this.#total_hint = 3;
        }
        $('#team__total-hint').html(`Gợi ý (${this.#total_hint})`)
    }

    checkIsFine = () => {
        // console.log(`is fine: ${this.#time_fine}`)
        if (this.#time_fine != null) {
            let endTime = this.#time_fine;
            let endDateTime = new Date(endTime);

            // console.log(endDateTime)
            let now = new Date().getTime();

            let distance = endDateTime - now;

            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);
            if (distance > 0){
                $("#team__topic-input").prop('disabled', true).val('');
                $('#team__topic-btn').prop('disabled', true);
            } else {
                $("#team__topic-input").prop('disabled', false);
                $('#team__topic-btn').prop('disabled', false);
            }
        }
    }

    checkIsDone = async (timer_id, location_id) => {
        if(this.#is_done){
            clearInterval(timer_id);
            $("#team__topic-input").prop('disabled', true).val('');
            $('#team__topic-btn').prop('disabled', true);
            $('#team__topic-countdown').html(`00 : 00`);

            $('#toast-message').html('Chúc mừng bạn đã hoàn thành mật thư');

            $('#toast').removeClass('d-none').addClass('bg-success');

            let timerId = await new Promise(resolve => setTimeout(() => {
                $('#toast').addClass('d-none').removeClass('bg-success');
                resolve();
            }, 3000))
            this.fetchGetTopicAnswer(location_id);
        }
    }

    checkGetHintExtra = (time_end) => {
        let endTime = new Date(time_end).getTime();
        let now = new Date().getTime();
        let distance = endTime - now;

        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);

        if ((minutes === 25 && seconds === 0) ||
            (minutes < 25)){
            document.getElementsByClassName('team-game_1__hint-btn-view')[0].classList.remove('d-none')
            this.#total_hint = 1;
        } if ((minutes === 20 && seconds === 0) ||
            (minutes < 20)) {
            document.getElementsByClassName('team-game_1__hint-btn-view')[1].classList.remove('d-none')
            this.#total_hint = 2;
        } if ((minutes === 15 && seconds === 0) ||
            (minutes < 15)){
            document.getElementsByClassName('team-game_1__hint-btn-view')[2].classList.remove('d-none')
            this.#total_hint = 3;
        }
        $('#team__total-hint').html(`Gợi ý (${this.#total_hint})`)

    }


}

export default new Location;