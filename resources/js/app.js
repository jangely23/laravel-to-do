import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    // Obtén todos los elementos que pueden abrir un modal
    const openModalButtons = document.querySelectorAll('[data-modal-target]');

    // Obtén todos los elementos que pueden cerrar un modal
    const closeModalButtons = document.querySelectorAll('[data-close-button]');
    
   
    // Añade un evento de click a cada botón de abrir modal
    openModalButtons.forEach(button => {
      button.addEventListener('click', (e) => {
        const modal = document.getElementById(e.target.dataset.modalTarget);
        openModal(modal);
      });
    });

    // Añade un evento de click a cada botón de cerrar modal
    closeModalButtons.forEach(button => {
      button.addEventListener('click', () => {
        const modal = button.closest('[aria-modal="true"]');
        closeModal(modal);
      });
    });

    // Función para abrir el modal
    function openModal(modal) {
      console.log('abrir'+ " - " + modal)
      if (modal == null) return;
      modal.setAttribute('open', 'true');
      modal.classList.remove('hidden');

    }
    // Función para cerrar el modal
    function closeModal(modal) {
      console.log('cerrar')
      if (modal == null) return;
      modal.setAttribute('open', 'false');
      modal.classList.add('hidden');

    }
  });
  
