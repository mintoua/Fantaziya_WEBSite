function check(){
    
    var id = ''; //Vide ou non 
    var categorie = ''; //Categorie cochee ou non
    var prix = ''; //Doit etre numerique
    var disponible = ''; //Soit 0 soit 1

    const error = document.getElementById('error');

    
     var idd=f.id.value;
     if (f.id.value.length==""){
         alert("Veuillez saisir l'id");
     } else
       {
            id = f.id.value;
       }
     
     

     if(isNaN(f.prix.value)==true)
     {
        alert("Le prix doit etre numerique") ;
     } else
       {
            prix = f.prix.value;
       }
     

     if(f.disponible.value == 0)||(f.disponible.value == 1){
         disponible = f.disponible.value;
     }
     else{
            alert("Veuillez saisir 0 pour non disponible ou 1 pour disponible");
         }

         if (document.getElementById('collier').checked || document.getElementById('bague').checked || document.getElementById('boucles').checked ||  document.getElementById('bracelet').checked){
           var ele=document.getElementsByName('categorie');
           var cat;

           cat = ele.value;
        } else{
                  alert("Veuillez saisir une catégorie");
              }
         }
      
 
    
}

