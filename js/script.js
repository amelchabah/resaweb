document.addEventListener("DOMContentLoaded", function () {
  //   aos animations
  AOS.init();



  
  //filtres de recherche

  //fonction qui permet aux filtres activés ou non de le rester, en fonction des paramètres qui apparaissent en url de la page
  function paramsToObject(entries) {
    const result = {}
    for (const [key, value] of entries) { // chaque 'entry' est un uplet [clé, valeur]
      result[key] = value;
    }
    return result;
  }

  let urlParams = new URLSearchParams(window.location.search);
  let entries = urlParams.entries(); //retourne un iterateur d'uplets décodés [clé, valeur]
  let params = paramsToObject(entries); //convertir les paramètres en objets

  // console.log(params);
  // si la checkbox est cochée, laisser la checkbox cochée (ou le toggle activé donc)
  if (params.rock == 'on') document.getElementById('checkbox1').checked = true;
  if (params.gas == 'on') document.getElementById('checkbox2').checked = true;
  //si le parametre de recherche écrite n'est pas vide (nul) :
  if (params.search) document.getElementById('search').value = params.search;




  //stars animation

  function randomNumber(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min
  }

  const STAR_COUNT = 100
  let result = ""
  for (let i = 0; i < STAR_COUNT; i++) {
    result += `${randomNumber(-50, 50)}vw ${randomNumber(-50, 50)}vh ${randomNumber(0, 3)}px ${randomNumber(0, 3)}px #fff,`
  }
  // console.log(result.substring(0, result.length - 1))
})
