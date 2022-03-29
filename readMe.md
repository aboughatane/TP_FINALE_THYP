Amina BOUGHATANE 17808147

# TP FINALE - Cours Introduction aux  humanités numériques et méthodes digitales -  Catalogue d'images


> Présentation :

Ce dernier TP consiste à regrouper tout les précédents TP (Pagination, Téléversement, Arborescence), en rajoutant un côté Admin.
* Partie Admin :

Pour cette partie j'ai rajouter un formulaire de connexion, l'admin peut accèder au catalogue d'images seulement s'il à un identifiant & mot de passe enregistré dans ma table users de ma base de données, sinon il reçoit un message d'erreur.
L'admin peut aussi supprimé une image en cliquant sur le boutons supprimé, cela va retirer l'image du site web et de la base de données.

![DEMO](https://github.com/aboughatane/TP3_HYPERMEDIA/blob/main/Capture/connexion.PNG) 


![DEMO](https://github.com/aboughatane/TP3_HYPERMEDIA/blob/main/Capture/connexionError.PNG)


* Partie Téléversement :

Après avoir validé la connexion, l'admin se redirige vers la page de téléversement, dans cette page on peut téléverser des images dans notre base de données.
On a aussi un bouton de déconnexion pour pouvoir se déconnecter à tout moment.
En cliquant sur le boutons "Afficher l'arborescence du répértoire, on accede a l'arborescence du répértoire.

 ![DEMO](https://github.com/aboughatane/TP3_HYPERMEDIA/blob/main/Capture/accueil.PNG) 


* Partie Arborescence :


Dans cette partie, On peut visualiser toutes les images de type (PNG, JPG, JPEG, GIF), grâce au système de pagination, de plus on peut supprimer une image à tout moment grâce au bouton de suppression, comme le montre les images suivantes, on voit que l'image disparaît et les autres prennent sa place.


![DEMO](https://github.com/aboughatane/TP3_HYPERMEDIA/blob/main/Capture/suppression1.PNG) 

![DEMO](https://github.com/aboughatane/TP3_HYPERMEDIA/blob/main/Capture/suppression2.PNG)

En passant notre souris sur une des images, cette derniere fait un zoom pour la mettre en premier plan.
On peut aussi se deconnecter ou revenir à la page de téléversement.

![DEMO](https://github.com/aboughatane/TP3_HYPERMEDIA/blob/main/Capture/catalogue1.PNG) 

![DEMO](https://github.com/aboughatane/TP3_HYPERMEDIA/blob/main/Capture/catalogue2.png) 


> outils utilisés 

J'ai utiliser le paquet MAMP sous Windows pour avoir les programmes Apache, PHP et MySQL.


> Structure des images 

J'ai organisé l'affichage des images en utilisant du HTML/CSS pour creer une tableau et limiter la taille des images sur le site web
