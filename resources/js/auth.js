import { isAxiosError } from "axios";
import axios from "axios";

async function register(e) {
    e.preventDefault();
    const formData = new FormData(e.currentTarget);
    const values = Object.fromEntries(formData);
    
    try {
        const resp = await axios.post('/register', values);
        if(resp.data.success) {
            console.log(resp.data.view);
            window.location.href = resp.data.view;
        }
    } catch(error) {
        if(isAxiosError(error)) {
            console.error(error.response.data);
        } else if(error instanceof Error) {
            console.error(error.message); 
        } else {
            console.error("Unknown error occured.");
        }
    }
}

async function login(e) {
    e.preventDefault();
    const formData = new FormData(e.currentTarget);
    const values = Object.fromEntries(formData);

    try {

        const resp = await axios.post('/login', values);
        if(resp.data.success) {
            console.log(resp.data.view);
            window.location.href = resp.data.view;
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

async function logout(e) {
    e.preventDefault();
    
    try {

        const resp = await axios.post('/logout');
        if(resp.data.success) {
            console.log(resp.data.view);
            window.location.href = resp.data.view;
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

window.register = register;
window.login = login;
window.logout = logout;