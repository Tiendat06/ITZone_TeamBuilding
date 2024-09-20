class Support{
    #location_id = '';
    constructor() {}

    fetchLocation(){
        let location = parseInt(localStorage.getItem('location'));
        if(!location){
            location = 1;
            localStorage.setItem('location', location.toString());
        }
        this.transformPage(location);
        $('.support-question__location--icon-right').click(() => {
            location = location + 1;
            if (location > 3){
                location = 1
            }
            localStorage.setItem('location', location.toString());
            this.transformPage(location);
        })

        $('#support-question__location--icon-left').click(() => {
            location = location - 1;
            if (location < 1){
                location = 3
            }
            localStorage.setItem('location', location.toString());
            this.transformPage(location);
        })
    }

    transformPage = (location) => {
        if(location === 1){
            this.#location_id = 'LOC0000002';
            $('.support-question__location--item-outer').css('transform', 'translateX(0)');
            this.fetchApiSupportLocation(this.#location_id);
        } else if(location === 2){
            this.#location_id = 'LOC0000003';
            $('.support-question__location--item-outer').css('transform', 'translateX(-100%)');
            this.fetchApiSupportLocation(this.#location_id);
        } else if(location === 3){
            this.#location_id = 'LOC0000005';
            $('.support-question__location--item-outer').css('transform', 'translateX(-200%)');
            this.fetchApiSupportLocation(this.#location_id);
        }
        console.log(this.#location_id);
    }

    fetchApiSupportLocation = (location_id) => {
        // fetch API here
        // console.log('location id'+location_id)
        $('.accordion-body').html('');
        fetch('/support/get-team-question', {
            method: 'POST',
            body: JSON.stringify({
                location_id
            })
        })
            .then(response => response.json())
            .then(data => {
                let team_is_done = data['team_is_done'];
                let team_is_not_done = data['team_is_not_done'];
                let total_win = 0;
                let total_lose = 0;

                for(const key in team_is_done){
                    total_win++;
                    $('#accordion-body__win').append(`
                        <div class="support-question__report-team mt-2">
                            <span>${team_is_done[key]}</span>
                        </div>
                    `);
                }
                for(const key in team_is_not_done){
                    total_lose++;
                    $('#accordion-body__lose').append(`
                        <div class="support-question__report-team mt-2">
                            <span>${team_is_not_done[key]}</span>
                        </div>
                    `);
                }
                return {
                    total_win, total_lose
                }
            })
            .then(data => {
                let total_win = data['total_win'];
                let total_lose = data['total_lose'];
                $('#support-question__total-lose').html(`${total_lose}/6`);
                $('#support-question__total-win').html(`${total_win}/6`);
            })
            .catch(error => {
                console.log(error)
            })
    }

    // do not use
    getLocationFetch(){
        let location = parseInt(localStorage.getItem('location'));
        let location_id = '';
        if (location === 1){
            $('.support-question__item--para').html('Phố đi bộ');
        } else if (location === 2){
            $('.support-question__item--para').html('Đường sách');
        } else if (location === 3){
            $('.support-question__item--para').html('Công viên');
        } else{
            localStorage.setItem('location', '1');
            this.getLocationFetch();
        }
    }

    searchUser(){
        let searchInput = document.querySelector('.support-search__inp--item')
        let contactItems = document.querySelectorAll('.support-content__contact--item');
        searchInput.addEventListener('input', e=> {
            const value = e.target.value.toLowerCase().trim()
            contactItems.forEach(item => {
                let nameElement = item.querySelector('.support-content__contact--para');
                let name = nameElement.textContent.toLowerCase().trim()

                if (name.includes(value)) {
                    item.style.display = '';
                } else {
                    item.style.setProperty('display', 'none', 'important');
                }
            });
        })
    }

    getTeamId = (team_id) => {
        let team_name = '';
        if(team_id === 'TEA0000001') {
            team_name = 'TEAM 1';
        } else if(team_id === 'TEA0000002') {
            team_name = 'TEAM 2';
        } else if(team_id === 'TEA0000003') {
            team_name = 'TEAM 3';
        } else if(team_id === 'TEA0000004') {
            team_name = 'TEAM 4';
        } else if(team_id === 'TEA0000005') {
            team_name = 'TEAM 5';
        } else if(team_id === 'TEA0000006') {
            team_name = 'TEAM 6';
        }
        $('.support-team__dropdown--para').html(team_name)
    }

    getTeamMember = () => {
        $('#team-button').click(() => {
            let team_id = $('#modal__choose-team').val();
            let process_icon = document.getElementsByClassName('support-team-content__process-icon');
            let process_line = document.getElementsByClassName('support-team-content__process-line');
            this.getTeamId(team_id);
            for(let i = 0; i < process_icon.length; i++){
                process_icon[i].classList.remove('text-success');
                if(i !== 5){
                    process_line[i].classList.remove('bg-success');
                }
            }
            fetch('/support/get-team-member', {
                method: 'POST',
                body: JSON.stringify({
                    team_id
                })
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    let team_arrival = data['team_arrival'];
                    let team_member = data['team_member'];
                    let team_mentor = data['team_mentor'];

                    for(let i = 0; i < team_arrival.length; i++){
                        console.log(team_arrival[i]);
                        if(team_arrival[i]['is_show_next_location'] === 1){
                            document.getElementsByClassName('support-team-content__process-icon')[i].classList.add('text-success');
                            if(i !== 5){
                                document.getElementsByClassName('support-team-content__process-line')[i].classList.add('bg-success');
                            }
                        }
                    }

                    return {
                        team_member,
                        team_mentor
                    }
                })
                .then(data => {
                    let team_member = data['team_member'];
                    let team_mentor = data['team_mentor'];
                    $('.support-team-content__list').html(team_member);

                    return team_mentor;
                })
                .then(team_mentor => {
                    $('.support-team-content__heading-text').html(team_mentor['mentor_name']);
                })
                .catch(error => {
                    console.log(error)
                })
        })
    }

}

export default new Support;