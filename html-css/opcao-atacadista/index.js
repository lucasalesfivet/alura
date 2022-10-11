/* pegando a classe do botão MENU no cabeçalho */
const botaoMenu = document.querySelector('.cabecalho__menu')

/* pegando a classe da NAVBAR */
const menu = document.querySelector('.menu-lateral')

/* quando clicar no botão MENU, adiciona a classe MENU-LATERAL--ATIVO na classe da NAVBAR*/
botaoMenu.addEventListener('click', () => {
    menu.classList.toggle('menu-lateral--ativo')
})