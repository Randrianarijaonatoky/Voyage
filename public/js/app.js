//selection des btn
let btnReserves = document.querySelectorAll('.voyageDetail-cards-card-textes-end-btn');
const formulaire = document.querySelector('.voyageDetail-reservation');
const btnAnnuler = document.querySelector(".voyageDetail-reservation-btn2");
const btnAnnuler1 = document.querySelector(".voyageDetail-reservation-croix");
const cards = document.querySelector('.voyageDetail-cards');




//function
btnReserves.forEach((btn) => {
    btn.addEventListener('click', (e) =>{
        formulaire.style.display= 'block';
        cards.style.filter = 'brightness(0.3)';
        // formulaire.setAttribute('.reservation');
        console.log("mety");
    })
});

const clickAnnuler = () =>{
    formulaire.style.display= 'none';
    cards.style.display = 'block';
    console.log('hello');
}
const clickAnnuler1 = () =>{
    formulaire.style.display= 'none';
    cards.style.display = 'block';
    console.log('hello');
}

// btnAnnuler.addEventListener('click', clickAnnuler);
// btnAnnuler1.addEventListener('click', clickAnnuler1);



//scroll
navigation =  document.querySelector('navigation-btn');
// console.log(navigator);
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 25 || document.documentElement.scrollTop > 25) {
    document.getElementById("navigation").style.display = 'block';
    
    navigation.addEventListener('click', (e) =>{
        document.body.scrollTop = 1;
        console.log('Mety');
       
       
    });
  } else {
    document.getElementById("navigation").style.display = "none";
  }

}

//decouvert



//dashboard
const btnvoyage1 = document.querySelector('.Dashboard-listes-btn1');
const btnvoyage2 = document.querySelector('.Dashboard-listes-btn1-2');
const listVoyage = document.querySelector('.Dashboard-listes-voyage')


const btnUtilisateur1 = document.querySelector('.Dashboard-listes-btn2');
const btnUtilisateur2 = document.querySelector('.Dashboard-listes-btn2-1');
const listUtilisateur = document.querySelector('.Dashboard-listes-Utilisateur')




btnvoyage1.addEventListener('click', (e) =>{
    // formulaire.style.display= 'block';
    listVoyage.style.display = 'block';
    btnvoyage2.style.display = 'block';
    btnvoyage1.style.display = 'none';
    // listVoyage.classList.toggle('.Dashboard-listes-voyageJs');
});
btnvoyage2.addEventListener('click', (e) =>{
    // formulaire.style.display= 'block';
    listVoyage.style.display = 'none';
    btnvoyage2.style.display = 'none';
    btnvoyage1.style.display = 'block';
    // listVoyage.setAttribute('.Dashboard-listes-voyageJs');
});

btnUtilisateur1.addEventListener('click', (e) =>{
    // formulaire.style.display= 'block';
    listUtilisateur.style.display = 'block';
    btnUtilisateur2.style.display = 'block';
    btnUtilisateur1.style.display = 'none';
    
});
btnUtilisateur2.addEventListener('click', (e) =>{
    // formulaire.style.display= 'block';
    listUtilisateur.style.display = 'none';
    btnUtilisateur2.style.display = 'none';
    btnUtilisateur1.style.display = 'block';
    // listVoyage.setAttribute('.Dashboard-listes-utilisateurJs');
});

//effacer
let effacer = document.querySelectorAll('.lesVoyages-cards-card-btn-listes-delete');
const cancel = document.querySelector('.cancelbtn');
const container = document.querySelector(".delete");

// console.log(effacer);
effacer.forEach((btn) => {

    btn.addEventListener('click', (e) =>{
        // formulaire.style.display= 'block';
        container.style.display = 'block';
        
        // listVoyage.classList.toggle('.Dashboard-listes-voyageJs');
    })
})
cancel.addEventListener('click', (e) =>{
    // formulaire.style.display= 'block';
    container.style.display = 'none';
    
    // listVoyage.classList.toggle('.Dashboard-listes-voyageJs');
})



///responsive///////
const closex = document.getElementById('close');
const bar = document.getElementById('bar');
const navBar = document.querySelector('.navBar');
const listNav = document.querySelector('.nav-listes');

closex.style.display ='none';
listNav.style.display = 'none';

const activeMenu = () => {
    
    bar.style.display = 'none';
    closex.style.display ='block';
    
}
const closeMenu = () => {
    navBar.classList.toggle('active');
    bar.style.display = 'block';
    closex.style.display ='none';
    listNav.style.transform = 'scale(0)';

}

bar.addEventListener('click', activeMenu);
closex.addEventListener('click',closeMenu );
console.log(closex);



/////////affichage de l'image////////
const imageFile = document.getElementById('image-file');
const imagePic = document.getElementById('image-pic');



