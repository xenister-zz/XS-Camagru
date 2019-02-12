let showModal = document.getElementById('modalclick');
let modal = document.getElementById('model-bis');
let modalClose = document.getElementById('close-modal-bis');

showModal.addEventListener('click', function() {
    modal.classList.add("is-active");
});

modalClose.addEventListener('click', function(){
   modal.classList.remove("is-active");
});