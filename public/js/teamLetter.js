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

        fetch('/team/get_special_topic', {
            method: 'POST',
        })
            .then(response => response.json())
            .then(data => {
                const special_station = data.special_station;
                const status = special_station.status;
                if (status == false) {
                    modalBody.innerHTML = data.special_station.message;
                    modalFooter.style.display = 'none';
                } else if (status == true) {
                    modalBody.innerHTML = special_station.data.topic_link;
                    const { is_done, is_success } = special_station.data;
                    if (is_done == true && is_success == true)
                        updateModal(
                            "Thành công",
                            `<span style="color: white"> Chúc mừng bạn đã trả lời đúng </span> <br> Cảm ơn bạn đã tham gia trò chơi`,
                            '/public/img/topic/icon-success.png'
                        );
                    else if (is_done == true && is_success == false) {
                        updateModal(
                            "Thất bại",
                            `<span style="color: white"> Rất tiếc, bạn đã trả lời sai </span> <br> Cảm ơn bạn đã tham gia trò chơi`,
                            '/public/img/topic/icon-cry.png'
                        );
                    }
                }
            })

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
                    const { status, message, attempts_left } = data;
                    if (status === true) {
                        updateModal(
                            "Thành công",
                            `<span style="color: white"> Chúc mừng bạn đã trả lời đúng </span> <br> Cảm ơn bạn đã tham gia trò chơi`,
                            '/public/img/topic/icon-success.png'
                        );
                    } else if (status === false) {
                        inputField.value = '';
                        inputField.style.border = "1px solid red";
                        showToast(message, status);
                        if ((attempts_left <= 0 || attempts_left == undefined) && answer != '')
                            updateModal(
                                "Thất bại",
                                `<span style="color: white"> Rất tiếc, bạn đã trả lời sai </span> <br> Cảm ơn bạn đã tham gia trò chơi`,
                                '/public/img/topic/icon-cry.png'
                            );
                    }
                })
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
