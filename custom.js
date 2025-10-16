// altera tema (cria função)
function onClickThemeButton() {
  // alert("Clique em 'OK' para alternar o tema!"); // mensagem de alerta ao clicar no botão -> sem isso, ao clicar já muda o tema
  // prompt("Pede input do usuário"); // pede input do usuário -> sem isso, ao clicar já muda o tema
  toggleTheme(); 
}

// Escutadores de evento (clique)
// evento colocamos o evento entre aspas
// ação colocamos a função sem aspas e sem parênteses
document.getElementById("theme-btn").addEventListener("click", onClickThemeButton);