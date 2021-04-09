# Serre_connecte
Projet Lycée Serre connecté Bac Pro SN Option RISC

Notre projet était de pouvoir consultés les données à distance. Pour cela nous avons un Arduino et plusieurs capteurs comme CO2, O2, DHT22... Nous sommes partie sur deux solutions:

1- Avoir un programme pour l'Arduino qui contenait une page Web qui affichera les données, plus les capteurs et enfin l'enregistrement sur une carte SD des données.

2- Base de données en Maria Db, Apache2 et Phpmyadmin. La base de données est faits sur une machine virtuelle faite sous Virtualbox et c'est une Debian 10 sans interface graphique.

Le problème que nous avons vite fait face avec la première solution et que le programme était bien trop volumineux pour l'Arduino ce qui provoquait des bugs au niveau de la page web qui s'afficher mal. Le programme marche mais avec environ 4 capteurs. Donc nous sommes partie sur la deuxième solutions mais je vais aussi mettre la première solutions pour ceux qui seraient intéressés.
