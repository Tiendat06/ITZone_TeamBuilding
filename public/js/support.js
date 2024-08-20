class Support{
    constructor() {}

    fetchLocation(){
        let location = parseInt(localStorage.getItem('location'));
        if(!location){
            location = 1;
            localStorage.setItem('location', location.toString());
        }
        $('.support-question__location--icon-right').click(() => {
            location = location + 1;
            if (location > 3){
                location = 1
            }
            localStorage.setItem('location', location.toString());
            this.getLocationFetch()
        })

        $('.support-question__location--icon-left').click(() => {
            location = location - 1;
            if (location < 1){
                location = 3
            }
            localStorage.setItem('location', location.toString());
            this.getLocationFetch()
        })
    }

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