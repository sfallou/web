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
		<li><a href="accueil_admin.php">Accueil</a></li>
		<li><a href="liste_abonnes.php">Liste des abonnés</a></li>
		<li><a href="gestion_facture.php">Gérer les Listes</a></li>
		<li> <a href="enregistrer_abonne.php">Nouveau abonnement</a></li>  
		<li><a href="validation_abonne.php">Valider Abonnement</a></li>
		<li><a href="historique.php">Etat du Système</a></li>
		<li><a href="modifier_compte.php">Modifier un compte</a></li>
		<li><a href="modifier_abonne.php">Modifier un abonné</a></li>
		<li><a href="modifier_tarif.php">Changer la tarification</a></li>
		<li><a href="enregistrer_dette.php">Enregistrer Dette</a></li>
		<li> <a href="supervision_finance.php">Supervision finance</a></li>
		<li><a href="enregistrer_depense.php">Enregistrer Dépense</a></li>
		<li><a href="enregistrer_recette.php">Enregistrer Recette</a></li>
		<li><a href="supprimer_abonne.php">Suprimer Abonnement</a></li>
		<li><a href="supprimer_dette.php">Suprimer une dette</a></li>
		<li><a href="facturation_totale.php">Imprimer</a></li>
		<li> <a href="contact.php">Contact</a></li>
      </ul>
 <button type="button"  onClick='javascript:popupcentree("calculatrice.php",235,280,"menubar=no,scrollbars=no,statusbar=no")'><img width="100px" alt="calculatrice" src="images/calculatrice2.jpg"/></button>
		
