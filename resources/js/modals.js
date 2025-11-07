import { createCompetition, editCompetition } from "./competitions";

function addCreateModal() {
    const layout = document.getElementById('layout');

    const createModal = document.createElement('div');
    createModal.id = 'create-modal';

    const createForm = document.createElement('form');
    createForm.id='create-form';
    createForm.classList.add('competition-form');
    createForm.onsubmit = createCompetition;

    const deleteCreateModalBtn = document.createElement('span');
    deleteCreateModalBtn.id = 'close-create-btn'
    deleteCreateModalBtn.innerHTML=`
    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-x-icon lucide-square-x"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
    `
    deleteCreateModalBtn.onclick = removeCreateModal;

       
    createForm.innerHTML = `
    <h2>Verseny létrehozás</h2>
    <div class="input-container">
        <label for="name">Verseny neve</label>
        <input
            type="text"
            name="name"
            placeholder="..."
            required
        >
    </div>
    <div class="input-container">
        <label for="year">Verseny éve</label>
        <input
            type="number"
            name="year"
            placeholder="..."
            value=2025
            required
        >
    </div>
    <div class="input-container">
        <label for="year">Elérhető nyelvek</label>
        <textarea
            name="available_languages"
            placeholder="..."
            rows="2"
            required
        ></textarea>
    </div>
    <div class="input-container">
        <label for="pfg">Pont helyes válaszért</label>
        <input 
            type="number"
            name="point_for_good_answer"
            placeholder="..."
            value=2
            required
        >
    </div>
    <div class="input-container">
        <label for="pfb">Pont rossz válaszért</label>
        <input 
            type="number"
            name="point_for_bad_answer"
            placeholder="..."
            value=-1
            required
        >
    </div>
    <div class="input-container">
        <label for="pfn">Pont üres válaszért</label>
        <input 
            type="number"
            name="point_for_no_answer"
            placeholder="..."
            value=0
            required
        >
    </div>
    <button type="submit">Mentés</button>
    `;

    createModal.appendChild(deleteCreateModalBtn);
    createModal.appendChild(createForm);
    layout.appendChild(createModal);
} 

export function addEditModal(comp) {
    
    const layout = document.getElementById('layout');
    
    const editModal = document.createElement('div');
    editModal.id = 'edit-modal';

    const editForm = document.createElement('form');
    editForm.classList.add('competition-form');
    editForm.id = 'edit-form';
    editForm.onsubmit = (e) => editCompetition(e, comp.id);

    const deleteEditModalBtn = document.createElement('span');
    deleteEditModalBtn.id = 'close-edit-btn'
    deleteEditModalBtn.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-x-icon lucide-square-x"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
    `;
    deleteEditModalBtn.onclick = removeEditModal;

    editForm.innerHTML = `
    <h2>Verseny szerkesztés</h2>
    <div class="input-container">
        <label for="name">Verseny neve</label>
        <input
            type="text"
            name="name"
            placeholder="..."
            required
        >
    </div>
    <div class="input-container">
        <label for="year">Verseny éve</label>
        <input
            type="number"
            name="year"
            placeholder="..."
            value=2025
            required
        >
    </div>
    <div class="input-container">
        <label for="year">Elérhető nyelvek</label>
        <textarea
            name="available_languages"
            placeholder="..."
            rows="2"
            required
        ></textarea>
    </div>
    <div class="input-container">
        <label for="pfg">Pont helyes válaszért</label>
        <input 
            type="number"
            name="point_for_good_answer"
            placeholder="..."
            value=2
            required
        >
    </div>
    <div class="input-container">
        <label for="pfb">Pont rossz válaszért</label>
        <input 
            type="number"
            name="point_for_bad_answer"
            placeholder="..."
            value=-1
            required
        >
    </div>
    <div class="input-container">
        <label for="pfn">Pont üres válaszért</label>
        <input 
            type="number"
            name="point_for_no_answer"
            placeholder="..."
            value=0
            required
        >
    </div>
    <button type="submit">Mentés</button>
    `;
    
        
    editForm.querySelector('input[name="name"]').value = comp.name;
    editForm.querySelector('input[name="year"]').value = comp.year;
    editForm.querySelector('textarea[name="available_languages"]').value = comp.available_languages;
    editForm.querySelector('input[name="point_for_good_answer"]').value = comp.point_for_good_answer;
    editForm.querySelector('input[name="point_for_bad_answer"]').value = comp.point_for_bad_answer;
    editForm.querySelector('input[name="point_for_no_answer"]').value = comp.point_for_no_answer;

    editModal.appendChild(deleteEditModalBtn);
    editModal.appendChild(editForm);
    layout.appendChild(editModal);

}

export function addRoundModal(comp) {
    const layout = document.getElementById('layout');
    const modal = document.createElement('div');
    modal.id = 'add-round-modal';

    const form = document.createElement('form');
    form.classList.add('competition-form');
    const compNameHeading = document.createElement('h2');
    compNameHeading.textContent = `${comp.name} ${comp.name.toLowerCase().endsWith('verseny') ? '' : 'verseny'}`

    const deleteRoundModalBtn = document.createElement('span');
    deleteRoundModalBtn.id = 'close-round-btn'
    deleteRoundModalBtn.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-x-icon lucide-square-x"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
    `;
    
    deleteRoundModalBtn.onclick = removeAddRoundModal;
    
    form.appendChild(compNameHeading);
    form.innerHTML += `
        <div class="input-container">
            <label for="pfb">Kérdés</label>
            <input 
                type="text"
                name="question"
                placeholder="..."
                required
            >
        </div>
        <button type="submit">Hozzáadás</button>
    `;
    modal.appendChild(deleteRoundModalBtn);
    modal.appendChild(form);
    layout.appendChild(modal);
}

export function removeCreateModal() {
    const createModal = document.getElementById('create-modal');
    createModal.remove();
}

export function removeEditModal() {
    const editModal = document.getElementById('edit-modal');
    editModal.remove();
}

export function removeAddRoundModal() {
    const roundModal = document.getElementById('add-round-modal');
    roundModal.remove();
}

window.addCreateModal = addCreateModal;
window.removeCreateModal = removeCreateModal;
window.addEditModal = addEditModal;
window.removeEditModal = removeEditModal;
window.addRoundModal = addRoundModal;