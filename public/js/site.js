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
                    success: function (response) {
                        console.log('success');
                        $('#para').html(response.message);
                    },
                    error: function (error) {
                        console.log(error);
                    },
                    complete: function (){
                        console.log('complete')
                    }
                })
            })

        })

    }
}

export default new Site();

