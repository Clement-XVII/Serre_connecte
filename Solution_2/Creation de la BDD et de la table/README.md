Pour cette partie je ne vais pas pouvoir trop vous aider mais je vous conseille vivement de suivre ce tuto.
https://linuxhint.com/install_phpmyadmin_debian_10/

Quand vous avez tous installé, connectez-vous à Phpmyadmin pour cela entré dans l'URL votre adresse IP/Phpmyadmin comme dans l'image ci-dessous.

1- Créer une table.

2- Appeler la "test".

3- Créer là base de données.

<p align="center">
     <img src="/IMG/Dessin sans titre.png" width="540" height="360">
</p> 


1- Ensuite cliquer sur la table "test" créer juste avant, comme sur l'image.

2- Aller dans l'onglet SQL en haut.

3- Entrer le code ci-dessous:

<p align="center">
     <img src="/IMG/Dessin sans titre (1).png" width="540" height="360">
</p>

```
CREATE TABLE `sensor` (
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `temp` varchar(10) NOT NULL,
  `hum` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

Cliquer sur "Exécuter"  en bas à droite.

ATTENTION ! il faut ajouter l'AUTO_INCREMENT à l'id.

Voilà la table ainsi que les champs sont créés je vous invite à vous renseigner un peu sur le fonctionnement d'une base de données.
Je vous donne les liens qui mon aider.

https://icreateproject.info/2014/12/14/arduino-save-data-to-database/ 

https://www.w3schools.com/php/php_mysql_insert.asp
