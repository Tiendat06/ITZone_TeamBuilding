document.addEventListener('DOMContentLoaded', () => {
    console.log('teamLetter.js');
    const inputField = document.getElementById('team--letter-input');
    const submitButton = document.getElementById('team--letter-btn');
    const modalHeader = document.querySelector('.team-letter__header');
    const modalBody = document.querySelector('.team-letter__content');
    const modalIcon = document.querySelector('.team-letter__icon');
    const modalFooter = document.querySelector('.team-letter__footer');
    const modalStatus = document.querySelector('.team-letter__status');
    const modalContinue = document.querySelector('.team-letter__continue');
    const toast = document.getElementById('toast');
    const toastMessage = document.getElementById('toast-message');

    let count = 0;

    // Hàm hiển thị toast
    const showToast = (message, isSuccess) => {
        toastMessage.innerHTML = message;
        toast.classList.remove('d-none', isSuccess ? 'bg-danger' : 'bg-success');
        toast.classList.add(isSuccess ? 'bg-success' : 'bg-danger');

        // Ẩn toast sau 5 giây
        setTimeout(() => {
            toast.classList.add('d-none');
            toast.classList.remove('bg-success', 'bg-danger');
        }, 5000);
    };

    // Hàm cập nhật modal
    const updateModal = (status, title, body, iconSrc) => {
        modalHeader.style.display = 'none';
        modalStatus.classList.remove('d-none');
        modalStatus.textContent = status;
        modalBody.innerHTML = body;
        modalIcon.src = iconSrc;
        modalIcon.style.width = "70%";
        modalContinue.classList.remove('d-none');
        modalFooter.style.display = 'none';
    };

    // Event listener cho nút gửi
    submitButton.addEventListener('click', () => {
        count++;
        const answer = inputField.value.trim();

        if (!answer) {
            alert('Vui lòng nhập đáp án!');
            return;
        }

        // Gửi yêu cầu POST để kiểm tra đáp án
        fetch('http://localhost:3000/check-answer', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ answer }),
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);

                if (data.status === 'success') {
                    updateModal(
                        "Thành công",
                        "Chúc mừng bạn đã trả lời đúng",
                        `<span style="color: white"> Chúc mừng bạn đã trả lời đúng </span> <br> Cảm ơn bạn đã tham gia trò chơi`,
                        '/public/img/topic/icon-success.png'
                    );
                    showToast(data.message, true);
                } else if (count === 3) {
                    updateModal(
                        "Thất bại",
                        "Rất tiếc, bạn đã trả lời sai",
                        `<span style="color: white"> Rất tiếc, bạn đã trả lời sai </span> <br> Cảm ơn bạn đã tham gia trò chơi`,
                        '/public/img/topic/icon-cry.png'
                    );
                    showToast('Bạn đã hết lượt trả lời. Rất tiếc!', false);
                }

                inputField.value = '';
            })
            .catch(error => {
                console.error('Error checking answer:', error);
                alert('Đã xảy ra lỗi, vui lòng thử lại sau.');
            });
    });
});
