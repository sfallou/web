<script type="text/javascript" language="javascript" charset="utf-8">
 $(document).ready(function(){
  $("#nav > li > a").on("click", function(e){
    if($(this).parent().has("ul")) {
      e.preventDefault();
    }
    
    if(!$(this).hasClass("open")) {
      // hide any open menus and remove all other classes
      $("#nav li ul").slideUp(350);
      $("#nav li a").removeClass("open");
      
      // open our new menu and add the open class
      $(this).next("ul").slideDown(350);
      $(this).addClass("open");
    }
    
    else if($(this).hasClass("open")) {
      $(this).removeClass("open");
      $(this).next("ul").slideUp(350);
    }
  });
});
 </script>
 
      <ul id="nav">
		<li><a href="accueil_gerant.php">Accueil</a></li>
		<li><a href="g_liste_abonnes.php">Liste des abonnés</a></li>
		<li><a href="gestion_facture.php">Gérer les Listes</a></li>
		<li> <a href="g_enregistrer_abonne.php">Nouveau abonnement</a></li>  
		<li><a href="g_historique.php">Etat du Système</a></li>
		<li><a href="modifier_abonne.php">Modifier abonné</a></li>
		<li><a href="enregistrer_dette.php">Enregistrer Dette</a></li>
		<li><a href="g_supprimer_index.php">Suprimer index</a></li>
		<li><a href="supprimer_dette.php">Suprimer une dette</a></li>
		<li><a href="facturation_totale.php">Imprimer</a></li>
		<li> <a href="contact.php">Contact</a></li>
      </ul>
<button type="button"  onClick='javascript:popupcentree("calculatrice.php",235,280,"menubar=no,scrollbars=no,statusbar=no")'><img width="100px" alt="calculatrice" src="images/calculatrice2.jpg"/></button>
		    
 
