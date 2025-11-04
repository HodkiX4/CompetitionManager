import axios, { isAxiosError } from "axios";

async function addCompetition(e) {
    e.preventdDefault();
    const formData = new FormData(e.currentTarget);
    const values = Object.fromEntries(formData);
    try {
        const resp = await axios.post('/create', values);
    } catch (error) {
        if(isAxiosError(e)) {
            console.error(e.response.data);
        } else if(e instanceof Error) {
            console.error(e.message); 
        } else {
            console.error("Unknown error occured.");
        }
    }
}

async function editCompetition(e, id) {
    e.preventdDefault();
    const formData = new FormData(e.currentTarget);
    const values = Object.fromEntries(formData);
    try {
        const resp = await axios.post(`/edit${id}`, values);
    } catch (error) {
        if(isAxiosError(e)) {
            console.error(e.response.data);
        } else if(e instanceof Error) {
            console.error(e.message); 
        } else {
            console.error("Unknown error occured.");
        }
    }
}

async function removeCompetition(e, id) {
    e.preventdDefault();
    const formData = new FormData(e.currentTarget);
    const values = Object.fromEntries(formData);
    try {
        const resp = await axios.post(`/delete/${id}`, values);
    } catch (error) {
        if(isAxiosError(e)) {
            console.error(e.response.data);
        } else if(e instanceof Error) {
            console.error(e.message); 
        } else {
            console.error("Unknown error occured.");
        }
    }
}

window.addCompetition = addCompetition;
window.editCompetition = editCompetition;
window.removeCompetition = removeCompetition;