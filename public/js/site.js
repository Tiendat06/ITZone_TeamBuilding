// Class Component ES6

class Site{
    index = () => {
        console.log('hello world !!');
    }

    ajaxTest = () => {
        $(document).ready(() => {
            $('#button').click(function (){
                $.ajax({
                    url: '/student',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        name: 'Jake Johnson',
                    }),
                    success: function (response, status, xhr) {
                        console.log('success');
                        $('#para').html(response.message);
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    },
                    complete: function (xhr, status){
                        console.log('complete')
                    }
                })
            })
        })
    }
}

export default new Site();

