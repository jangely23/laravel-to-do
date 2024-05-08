import './bootstrap'

document.addEventListener('DOMContentLoaded', function () {
    // Obtiene los botones del modal
    const openModalButtons = document.querySelectorAll('[data-modal-target]');
    const closeModalButtons = document.querySelectorAll('[data-close-button]');
    
    // Obtiene los botones del formulario
    const showFormButtons = document.querySelectorAll('[data-show-form]');
    const hideFormButtons = document.querySelectorAll('[data-hide-form]');
    
    // Añade un evento de clic a cada botón que abre un modal
    openModalButtons.forEach(button => {
      button.addEventListener('click', (e) => {
        const modal = document.getElementById(e.target.dataset.modalTarget);
        openModal(modal);
      });
    });

    // Añade un evento de clic a cada botón que cierra un modal
    closeModalButtons.forEach(button => {
        button.addEventListener('click', () => {
          const modal = button.closest('[aria-modal="true"]');
          closeModal(modal);
        });
    });

    // Añade un evento de clic a cada botón que muestra un formulario
    showFormButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const formId = e.target.dataset.showForm;
            const form = document.getElementById(formId);
            showForm(form);
        });
    });

    // Añade un evento de clic a cada botón que oculta un formulario
    hideFormButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const formId = e.target.dataset.hideForm;
            const form = document.getElementById(formId);
            hideForm(form);
        });
    });

    // Función para abrir un modal
    function openModal(modal) {
        console.log('Abrir modal');
        if (modal == null) return;
        modal.classList.remove('hidden');
    }

    // Función para cerrar un modal
    function closeModal(modal) {
        console.log('Cerrar modal');
        if (modal == null) return;
        modal.classList.add('hidden');
    }

    // Función para mostrar un formulario
    function showForm(form) {
        console.log('Mostrar formulario');
        if (form == null) return;
        form.classList.remove('hidden');
    }

    // Función para ocultar un formulario
    function hideForm(form) {
        console.log('Ocultar formulario');
        if (form == null) return;
        form.classList.add('hidden');
    }
});

  
