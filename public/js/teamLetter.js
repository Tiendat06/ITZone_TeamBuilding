class teamLetter {
    constructor() { };
    checkLetterAnswer() {
        const inputField = document.getElementById('team--letter-input');
        const submitButton = document.getElementById('team--letter-btn');
        const modalHeader = document.querySelector('.team-letter__header');
        const modalBody = document.querySelector('.team-letter__content');
        const modalIcon = document.querySelector('.team-letter__icon');
        const modalFooter = document.querySelector('.team-letter__footer');
        const modalStatus = document.querySelector('.team-letter__status');
        const modalContinue = document.querySelector('.team-letter__continue');
        const toast = document.getElementById('toast-modal');
        const toastMessage = document.getElementById('toast-message-modal');
        const modal = document.getElementById('exampleModal');
        

        
        fetch('/team/get_special_topic', {
                method: 'POST',
            })
            .then(response => response.json())
            .then(data=> {
                console.log(data);
                if(data['special_station']['status']==false) {
                    modalBody.innerHTML=data['special_station']['message'];
                    modalFooter.style.display = 'none';
                } else if(data['special_station']['data']['is_done']==true && data['special_station']['data']['is_success']==true) {

                    updateModal(
                            "Thành công",
                            `<span style="color: white"> Chúc mừng bạn đã trả lời đúng </span> <br> Cảm ơn bạn đã tham gia trò chơi`,
                            '/public/img/topic/icon-success.png'
                        );

                } else if(data['special_station']['data']['is_done']==true && data['special_station']['data']['is_success']==false) {

                    updateModal(
                            "Thất bại",
                            `<span style="color: white"> Rất tiếc, bạn đã trả lời sai </span> <br> Cảm ơn bạn đã tham gia trò chơi`,
                            '/public/img/topic/icon-cry.png'
                        );
                }
                else {

                    modalBody.innerHTML=data['special_station']['data']['topic_link'];
                }

            })
            .catch(error=> {
                console.error("Error:",error);
            })
        
        
        const showToast = (message, isSuccess) => {
            toastMessage.innerHTML = message;
            toast.classList.remove('d-none', isSuccess ? 'bg-danger' : 'bg-success');
            toast.classList.add(isSuccess ? 'bg-success' : 'bg-danger');
            setTimeout(() => {
                toast.classList.add('d-none');
                toast.classList.remove('bg-success', 'bg-danger');
            }, 5000);
        };

        const updateModal = (status, body, iconSrc) => {
            modalHeader.style.display = 'none';
            modalStatus.classList.remove('d-none');
            modalStatus.textContent = status;
            modalBody.innerHTML = body;
            modalIcon.src = iconSrc;
            modalIcon.style.width = "70%";
            modalContinue.classList.remove('d-none');
            modalFooter.style.display = 'none';
        };
        


        
        submitButton.addEventListener('click', () => {
            const answer = inputField.value.trim();            

            fetch('/team/submit_special_puzzle_answer', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ answer }),
            })
                .then(response => response.json())
                .then(data => {
                    const message =data['message'];
                    const count=data['attempts_left'];
                    console.log(count); 
                    if (data['status'] === true) {
                        updateModal(
                            "Thành công",
                            `<span style="color: white"> Chúc mừng bạn đã trả lời đúng </span> <br> Cảm ơn bạn đã tham gia trò chơi`,
                            '/public/img/topic/icon-success.png'
                        );
                        //sucess
                    } else if (data['status']===false && (count<=0 || count==undefined) && answer!='') {
                            
                        updateModal(
                            "Thất bại",
                            `<span style="color: white"> Rất tiếc, bạn đã trả lời sai </span> <br> Cảm ơn bạn đã tham gia trò chơi`,
                            '/public/img/topic/icon-cry.png'
                        );
                        //failed
                        showToast(message, false);
                    } else {
                        inputField.value = '';
                        inputField.style.border = "1px solid red";
                        showToast(message, false);
                    }
                })
                .catch(error => {
                    console.error('Error checking answer:', error);
                });
        });

        modalContinue.addEventListener('click', () => {
            const bootstrapModal = bootstrap.Modal.getInstance(modal);
            if (bootstrapModal) {
                bootstrapModal.hide();
            }
        });
        ;

    }
}
export default new teamLetter;
