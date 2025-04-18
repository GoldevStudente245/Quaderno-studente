function expandSidebar() {
    const sidebar = document.getElementById("sidebar");
    const main = document.getElementById("main");
    sidebar.classList.add("expanded");
    main.style.marginLeft = "250px";  // Aggiorna margine quando la sidebar è espansa
}

function collapseSidebar() {
    const sidebar = document.getElementById("sidebar");
    const main = document.getElementById("main");
    sidebar.classList.remove("expanded");
    main.style.marginLeft = "80px";  // Margine iniziale quando la sidebar è chiusa
}