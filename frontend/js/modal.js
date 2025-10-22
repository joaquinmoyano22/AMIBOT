const modal = document.getElementById('loginModal');
const openModal = document.getElementById('openModal');
const closeModal = document.getElementById('closeModal');

openModal.onclick = function (e) {
  e.preventDefault();
  modal.style.display = 'flex';
};

closeModal.onclick = function () {
  modal.style.display = 'none';
};

window.onclick = function (event) {
  if (event.target === modal) {
    modal.style.display = 'none';
  }
};
