Pour cette partie je ne vais pas pouvoir trop vous aider mais je vous conseille vivement de suivre ce tuto.
https://linuxhint.com/install_phpmyadmin_debian_10/

Quand vous avez tous installé, connectez-vous à Phpmyadmin pour cela entré dans l'URL votre adresse IP/Phpmyadmin comme dans l'image ci-dessous.

1- Créer une table 

2- Appeler la "teste" 

3- creer là

<p align="center">
     <img src="/IMG/Dessin sans titre.png" width="540" height="360">
</p> 


1- Ensuite développer la table creer juste avant, comme sur l'image.

2- aller dans l'onglet SQL 

3- entrer le code ci-dessous:

<p align="center">
     <img src="/IMG/Dessin sans titre (1).png" width="540" height="360">
</p>

/*CREATE TABLE `test`.`sensor` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`value` VARCHAR( 10 ) NOT NULL
 );*/

Voilà la table ainsi que les champs sont créés je vous invite à vous renseigner un peu sur le fonctionnement d'une base de données.
Je vous donne les liens qui mon aider et que j'ai dû adapter avec les nouvelles mises à jour.
https://icreateproject.info/2014/12/14/arduino-save-data-to-database/
https://www.w3schools.com/php/php_mysql_insert.asp
