const menuHamburguer = document.getElementById('menu-hamburguer');
const menuLateral = document.getElementById('menu-lateral');
const fecharMenu = document.getElementById('fechar-menu');

menuLateral.style.width = '0';

menuHamburguer.addEventListener('click', () => {
  menuLateral.classList.toggle('active');
  
  const isMenuOpen = menuLateral.classList.contains('active');
  
  if (isMenuOpen) {
    menuLateral.style.width = '90%'; 
  } else {
    menuLateral.style.width = '0';
  }
});


fecharMenu.addEventListener('click', () => {
 
  menuLateral.style.width = '0';
});