const slidePage = document.querySelector(".slide-page");
const nextBtnFirst = document.querySelector(".firstNext");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");
const prevBtnFourth = document.querySelector(".prev-3");
const submitBtn = document.querySelector(".submit");
const progressText = [...document.querySelectorAll(".step p")];
const progressCheck = [...document.querySelectorAll(".step .check")];
const bullet = [...document.querySelectorAll(".step .bullet")];

const inputOcupacao = document.querySelector("#Ocupacao");
const inputRenda = document.querySelector("#Renda");
const inputPossuiPortaoOuMuro = document.querySelector("#PossuiPortaoOuMuro");
const inputPetDentroOuForaDeCasa = document.querySelector("#PetDentroOuForaDeCasa");
const inputTipoDeImovel = document.querySelector("#TipoDeImovel");
const inputTipoDePropriedade = document.querySelector("#TipoDePropriedade");
const inputProtecaoEmJanelasSacadas = document.querySelector("#ProtecaoEmJanelasSacadas");
const inputTemOutrosPets = document.querySelector("#TemOutrosPets");
const inputTemCriancaNaCasa = document.querySelector("#TemCriancaNaCasa");


let max = 4;
let current = 1;

nextBtnFirst.addEventListener("click", () => {

  if (inputOcupacao.value === '' || inputRenda.value === '') {
    alert('preencha todos os campos!')
    return;
  }

  slidePage.style.marginLeft = "-25%";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
  e.preventDefault()
});

nextBtnSec.addEventListener("click", () => {

  if (inputPossuiPortaoOuMuro.value === '' || inputPetDentroOuForaDeCasa.value === '') {
    alert('preencha todos os campos!')
    return;
  }

  slidePage.style.marginLeft = "-50%";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
  e.preventDefault()
});


nextBtnThird.addEventListener("click", () => {

  if (inputTipoDeImovel.value === '' || inputTipoDePropriedade.value === '' || inputProtecaoEmJanelasSacadas.value === '') {
    alert('preencha todos os campos!')
    return;
  }

  slidePage.style.marginLeft = "-75%";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
  e.preventDefault()
});


submitBtn.addEventListener("click", (e)=> {

  if (inputTemOutrosPets.value === '' || inputTemCriancaNaCasa.value === '') {
    alert('preencha todos os campos!');
    e.preventDefault()
    return;
  } else {

    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
    setTimeout(function () {
      alert("Respostas enviadas com sucesso!!");
      location.reload();
    }, 800);
  }
});

prevBtnSec.addEventListener("click", function () {
  slidePage.style.marginLeft = "0%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});
prevBtnThird.addEventListener("click", function () {
  slidePage.style.marginLeft = "-25%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});
prevBtnFourth.addEventListener("click", function () {
  slidePage.style.marginLeft = "-50%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});