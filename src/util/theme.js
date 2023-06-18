// Objetivo: Alterar o tema da página
function toggleTheme(theme) {
  // Recuperar todos os elementos que possuem o atributo data-bs-theme
  var elements = document.querySelectorAll("[data-bs-theme]");
  // Alterar o tema de todos os elementos
  for (var i = 0; i < elements.length; i++) {
    // Alterar o tema do elemento
    elements[i].setAttribute("data-bs-theme", theme);
  }
  // Salvar configuração de tema no localStorage
  localStorage.setItem("theme", theme);
}
// Recuperar o elemento do switch
switchCheckbox = document.querySelector(".switch-checkbox");

// Função para verificar se o switch está marcado
function checkedSwitch(themeAtual) {
  // Verificar se o tema atual é dark
  if (themeAtual === "dark") {
    // Marcar o switch
    switchCheckbox.checked = true;
    // Alterar o tema
    toggleTheme(themeAtual);
    // Verificar se o tema atual é light
  } else if (themeAtual === "light") {
    // Desmarcar o switch
    switchCheckbox.checked = false;
    // Alterar o tema
    toggleTheme(themeAtual);
  }
}
// Adicionar evento de mudança no switch
switchCheckbox.addEventListener("click", function () {
  // Verificar se o switch está marcado
  if (this.checked) {
    // Alterar o tema para dark
    toggleTheme("dark");
  } else {
    // Alterar o tema para light
    toggleTheme("light");
  }
});

// Recuperar configuração de tema ao carregar a página
window.addEventListener("load", function () {
  // Recuperar configuração de tema do localStorage
  var currentTheme = localStorage.getItem("theme");
  // Aplicar tema
  checkedSwitch(currentTheme);
});
