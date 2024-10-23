//reservation 
let nbr =  document.getElementById('num');
// console.log(nbr);
// let prix = document.getElementById('montant');
// let montant = Number(prix.value);
// console.log(montant);
// const valid = document.getElementById('nbrBtn');

// valid.addEventListener('click', (e) =>{
//     e.preventDefault();
//     const nbr =  document.getElementById('num').;
//     let numInt = Number(nbr);
//     console.log(numInt);
//     console.log('mety');

   
// });

//AI reservation

// Définir le montant ici
const prix = document.getElementById('prix').value; // Par exemple, vous pouvez changer ce montant
const montant = parseFloat(prix);
console.log(montant);
const input = document.getElementById('inputNumber')




input.addEventListener('click', (e) => {
        e.preventDefault();
    // Récupérer la valeur de l'input
    const inputValue = document.getElementById('inputNumber').value;

    // Vérifier que l'input n'est pas vide et est un nombre
    
        // Convertir la valeur de l'input en nombre
        const numberValue = parseFloat(inputValue);

        // Multiplier le montant par la valeur de l'input
        const result = montant * numberValue;

        // Afficher le résultat
         document.getElementById('result').textContent = ` ${result}  Ar`;

        //insert dans db
        document.getElementById('DbPrice').value = `${result} Ar`

    
        // Afficher un message d'erreur si l'input est invalide
        // document.getElementById('result').innerText = 'Veuillez entrer un nombre valide.';
    
});

const price = document.getElementById('DbPrice').value;
console.log(price);

 
//MEssage 
// const mess =document.getElementById('mess');
// const croix =document.getElementById('croix');
// const contenair =document.getElementById('contenair-mess');



// mess.addEventListener('click', (e) => {
    
//     contenair.style.display = 'block'
// });
// croix.addEventListener('click', (e) => {
    
//     contenair.style.display = 'none'
// });









function nombre(){
    
}




