### Fast Transfert App (PAYDUNYA)
<table>
<tr>
<td>
 Fast Transfert est une application web de transfert d'argent,  réalisée dans le cadre de recrutement de PayDunya.
 Elle se présente comme Western Union pour transférer de l'argent tout en respectant les taux de change d'une devise à une autre.
    
 Fast Transfert possède:
- Une page d'acceuil
- Une page d'inscription
- Une page de connexion
- Une page de tableau de bord (historique des 10 dernières transactions)
</td>
</tr>
</table>

### Interfaces
![](https://github.com/Arslan23/fast-transfert/blob/main/public/images/image1.png)
![](https://github.com/Arslan23/fast-transfert/blob/main/public/images/image2.png)
![](https://github.com/Arslan23/fast-transfert/blob/main/public/images/image3.png)
![](https://github.com/Arslan23/fast-transfert/blob/main/public/images/image4.png)
![](https://github.com/Arslan23/fast-transfert/blob/main/public/images/image5.png)
![](https://github.com/Arslan23/fast-transfert/blob/main/public/images/image6.png)


### Présentation des scénarios (Cas de l'inscription et cas du transfert d'argent)

Une fois sur la page d'accueil, l'utilisateur qui n'est pas connecté à un message <br>
qui l'invite à s'inscrire ou se connecter s'il n'a pas encore de compte.

Dans le menu, il y a le lien d'inscription.

Au niveau de la page d'inscription, il est invité a renseigné son nom, son prénom, son mail, son mot de passe et à choisir sa devise (XOF par défaut).

**Nous avons utlisé un [package](https://github.com/amrshawky/laravel-currency) qui 
nous permet d'obtenir la liste de toutes les devises à jour avec le taux de change.**


Initialement, l'utilisateur inscrit bénéficie de 500000 X0F.
S'il choisit autre devise  à part le XOF, ce montant est converti avant d'être stocké dans le compte de l'utilisateur avec sa devise.

Une fois inscrit, il est redirigé vers la page d'acceuil, maintenant avec le formulaire pour effectuer son opération

Il sélectionne le receveur ou le destinataire.
Il entre le montant à envoyé (la devise de réception du receveur est immédiatement sélectionnée).

Si la transaction est un succès, son compte et celui du receveur sont mis à jour.

Il peut y arriver que  la devise de l'émetteur soit  différente de celui du receveur.
Dans ce cas de figure, le système fait  la conversion dans la devise définie par le receveur avant
de traiter et de valider l'opération.

En cas d'erreur l'utilisateur est informé.



A coté du bouton de validation de l'opération, on peut voir **l'historique de ses transactions** en accédant au lien

### Installation
Pour démarrer sur votre machine:

- Cloner le repository
- Faire `composer install`
- `npm install && npm run dev`
- `php artisan migrate`
- `php artisan optimize`
- `php artisan cache:clear`
- `php artisan artisan serve`



## Dévéloppé avec

- [jQuery - Ajax](http://www.w3schools.com/jquery/jquery_ref_ajax.asp) - jQuery simplifies HTML document traversing, event handling, animating, and Ajax interactions for rapid web development.
- [Laravel](https://laravel.com/docs/9.x) - Documentation
- [Bootstrap](http://getbootstrap.com/) - Extensive list of components and  Bundled Javascript plugins.  
- [Vite](https://vitejs.dev/)


MIT © [AZA Expédit ](https://github.com/Arslan23)

