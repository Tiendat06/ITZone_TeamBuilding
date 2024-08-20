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
            $('.support-question__location--item-outer').css('transform', 'translateX(-10px)');
            this.fetchApiSupportLocation(this.#location_id);
        } else if(location === 2){
            this.#location_id = 'LOC0000003';
            $('.support-question__location--item-outer').css('transform', 'translateX(calc(-100% - 10px))');
            this.fetchApiSupportLocation(this.#location_id);
        } else if(location === 3){
            this.#location_id = 'LOC0000005';
            $('.support-question__location--item-outer').css('transform', 'translateX(calc(-200% - 10px))');
            this.fetchApiSupportLocation(this.#location_id);
        }
        console.log(this.#location_id);
    }

    fetchApiSupportLocation = (location_id) => {
        // fetch API here
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

}

export default new Support;