import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// Script

const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const btnCreate = $("#btn-create_account");
const inpPassword = $("#password");
const inpPasswordConfirm = $("#password_confirmation");

btnCreate.onclick = function(e){
    const passCurrent = new Array(10).fill().map(() => String.fromCharCode(Math.random()*86+40)).join("");
    inpPassword.value = passCurrent;
    inpPasswordConfirm.value = passCurrent;
    alert (passCurrent);
}