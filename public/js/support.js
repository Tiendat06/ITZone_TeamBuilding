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

}

export default new Support;