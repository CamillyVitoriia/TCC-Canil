// Seleciona o elemento do menu hamburguer e o menu lateral
const menuHamburguer = document.getElementById('menu-hamburguer');
const menuLateral = document.getElementById('menu-lateral');
const fecharMenu = document.getElementById('fechar-menu');

menuLateral.style.width = '0';

// Adiciona um ouvinte de evento de clique ao menu hamburguer
menuHamburguer.addEventListener('click', () => {
  // Toggle (alternar) a classe 'active' no menu lateral
  menuLateral.classList.toggle('active');
  
  // Verifica se o menu lateral está aberto
  const isMenuOpen = menuLateral.classList.contains('active');
  
  // Define a largura do menu lateral com base no estado (aberto ou fechado)
  if (isMenuOpen) {
    menuLateral.style.width = '90%'; // Largura quando aberto
  } else {
    menuLateral.style.width = '0'; // Largura quando fechado
  }
});

// Adiciona um ouvinte de evento de clique ao elemento de fechar o menu
fecharMenu.addEventListener('click', () => {
  // Fecha o menu lateral definindo a largura como 0
  menuLateral.style.width = '0';
});
let btn = document.querySelector('.fa-eye')

btn.addEventListener('click', ()=>{
  let inputSenha = document.querySelector('#senha')
  
  if(inputSenha.getAttribute('type') == 'password'){
    inputSenha.setAttribute('type', 'text')
  } else {
    inputSenha.setAttribute('type', 'password')
  }
})


