import axios, { isAxiosError } from "axios";
import { addEditModal, removeCreateModal, removeEditModal } from "./modals";

function updateNoCompContainer() {
    const layout = document.getElementById('layout');
    const compList = document.getElementById('competition-list');
    const existingContainer = document.getElementById('no-comp-container');

    const hasCompetitions = compList && compList.children.length > 0;

    if (hasCompetitions) {
        if (existingContainer) {
            existingContainer.remove();
        }
        return;
    }

    if (!existingContainer) {
        const message = document.createElement('div');
        message.id = 'no-comp-container';
        message.innerHTML = `<h1>Nincs még verseny felvéve.</h1>`;
        layout.appendChild(message);
    }
}



export async function createCompetition(e) {
    e.preventDefault();

    const form = e.currentTarget;
    const formData = new FormData(form);
    const values = Object.fromEntries(formData.entries());
    try {
        const resp = await axios.post('/competitions/create', values);
        
        if(resp.data.success) {
            form.reset();
            const { competition } = resp.data;
            
            removeCreateModal();
            
            
            let compList = document.getElementById('competition-list');
            if(!compList) {
                const layout = document.getElementById('layout');
                compList = document.createElement('div');
                compList.id = ('competition-list');
                layout.appendChild(compList);
            }

            const comp = document.createElement('li');
            comp.id = competition.id;

            comp.innerHTML = `
            <div class="content">
                <span>
                Verseny: <strong></strong>
                </span>
                <span>
                Év: <strong></strong>
                </span>
                <span>
                Elérhető nyelvek: <strong></strong>
                </span>
                <span>
                Pont jó válaszért: <strong></strong>
                </span>
                <span>
                Pont rossz válaszért: <strong></strong> 
                </span>
                <span>
                Pont üres válaszért: <strong></strong>
                </span>
            </div>
            <div class="actions">
                <button class="edit-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-icon lucide-pencil"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>
                </button>
                <button class="delete-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-icon lucide-trash"><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                </button>
            </div>
            `
            comp.querySelector('.content span:nth-child(1) strong').textContent = competition.name;
            comp.querySelector('.content span:nth-child(2) strong').textContent = competition.year;
            comp.querySelector('.content span:nth-child(3) strong').textContent = competition.available_languages;
            comp.querySelector('.content span:nth-child(4) strong').textContent = competition.point_for_good_answer;
            comp.querySelector('.content span:nth-child(5) strong').textContent = competition.point_for_bad_answer;
            comp.querySelector('.content span:nth-child(6) strong').textContent = competition.point_for_no_answer;
        
            compList.appendChild(comp);
            updateNoCompContainer();
            
            const deleteBtn = comp.querySelector('.delete-btn');
            deleteBtn.onclick = (e) => removeCompetition(e, competition.id);
            const editBtn = comp.querySelector('.edit-btn');
            editBtn.onclick = () => addEditModal(competition);
            
        }
    } catch (error) {
        if(isAxiosError(error)) {
            console.error(error.response.data);
        } else if(error instanceof Error) {
            console.error(error.message); 
        } else {
            console.error("Unknown error occured.");
        }
    }
}

export async function editCompetition(e, id) {
    e.preventDefault();

    const form = e.currentTarget;
    const formData = new FormData(form);
    const values = Object.fromEntries(formData.entries());
    console.log(values);
    
    try {
        const resp = await axios.put(`/competitions/${id}`, values);
        if(resp.data.success) {
            removeEditModal();
            const { competition } = resp.data;
            
            console.log(competition);
            
            const listItem = document.getElementById(id);
            listItem.querySelector('span:nth-child(1) strong').textContent = competition.name;
            listItem.querySelector('span:nth-child(2) strong').textContent = competition.year;
            listItem.querySelector('span:nth-child(3) strong').textContent = competition.available_languages; 
            listItem.querySelector('span:nth-child(4) strong').textContent = competition.point_for_good_answer; 
            listItem.querySelector('span:nth-child(5) strong').textContent = competition.point_for_bad_answer; 
            listItem.querySelector('span:nth-child(6) strong').textContent = competition.point_for_no_answer; 
        }
    } catch (error) {
        if(isAxiosError(error)) {
            console.error(error.response.data);
        } else if(error instanceof Error) {
            console.error(error.message); 
        } else {
            console.error("Unknown error occured.");
        }
    }
}

async function removeCompetition(e, id) {
    e.preventDefault();
    
    try {
        const resp = await axios.delete(`/competitions/${id}`);
        
        if(resp.data.success) {
            document.getElementById(id).remove();
            updateNoCompContainer();
        }
    } catch (error) {
        if(isAxiosError(error)) {
            console.error(error.response.data);
        } else if(error instanceof Error) {
            console.error(error.message); 
        } else {
            console.error("Unknown error occured.");
        }
    }
}

window.createCompetition = createCompetition;
window.editCompetition = editCompetition;
window.removeCompetition = removeCompetition;