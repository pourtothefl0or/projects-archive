const btns = document.querySelectorAll('.btn-modal');
const modalOverlay = document.querySelector('.modal-overlay');
const modals = document.querySelectorAll('.modal');

btns.forEach((el) => {
	el.addEventListener('click', (e) => {
		let path = e.currentTarget.getAttribute('data-path');

		modals.forEach((el) => {
			modalOverlay.classList.remove('active');
			el.classList.remove('active');
		});

		document.querySelector(`[data-target="${path}"]`).classList.add('active');
		modalOverlay.classList.add('active');
	});
});

modalOverlay.addEventListener('click', (e) => {
	if (e.target == modalOverlay) {
		modalOverlay.classList.remove('active');
		modals.forEach((el) => {
			el.classList.remove('active');
		});
	}
});