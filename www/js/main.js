// Das Skript wird erst ausgeführt, wenn das HTML Dokument bereit ist.
window.addEventListener('load', () => {
    // Löschenmodal
    const modal = document.getElementById('deletemember');
    modal.addEventListener('show.bs.modal', (event) => {
        const button = event.relatedTarget; // relatedTarget ist der button, der das Modal getriggered hat
        // das id-feld des Modals heraussuchen
        let inputField = document.getElementById('id-field');
        // id-feld auf die id im Button, also die member-id setzen
        inputField.value = button.dataset.id;
    });
});