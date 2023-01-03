import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// Script


// Random password for account creation
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const btnCreate = $("#btn-create_account");
const inpPassword = $("#password");

if(btnCreate){
    btnCreate.onclick = function(e){
        inpPassword.value = "***************";
    }
}

