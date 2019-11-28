//animations jquery

$(function () {
    
    
 

//shpping.php
  
    $("[name='paiement']").click(function () {
        //        if($(this).attr("moi")=="c"){}
        console.log($('#carteBancaire').is(':checked'));
        if ($('#carteBancaire').is(':checked')) {
         $("[value='valider']").eq(1).hide(1000);
            
            $("#paiement").show(2000)

        } else {
            $("#paiement").hide(2000);
               $("[value='valider']").eq(1).show("slow");
        }
    });
   
    // reviews.php
            $("#step1").on({
        click: function () {
            $("#informations").toggle(2000);
        }
    })
    
   
         
     })
    
    



