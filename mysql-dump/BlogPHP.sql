CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255),
  `email` varchar(255),
  `password` varchar(255),
  `is_admin` boolean DEFAULT false,
  `state` varchar(255),
  `modified_at` datetime,
  `created_at` datetime
);

CREATE TABLE `auth` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `token` varchar(64) NOT NULL,
  `user_id` int NOT NULL
);

CREATE TABLE `articles` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255),
  `tiny_text` text,
  `text` text,
  `image_url` varchar(255),
  `state` varchar(255),
  `modified_at` datetime,
  `created_at` datetime
);

CREATE TABLE `comments` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `article_id` int NOT NULL,
  `text` text,
  `state` varchar(255),
  `modified_at` datetime,
  `created_at` datetime,
  `is_response` boolean DEFAULT false,
  `comment_id` int
);

ALTER TABLE `comments` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `comments` ADD FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);

ALTER TABLE `comments` ADD FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`);

ALTER TABLE `auth` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_admin`, `modified_at`, `created_at`) VALUES (NULL, 'Guilherme', 'guilherme.cimabatista@gmail.com', '$2y$10$Be8zC3vR6mckvBJfIWrVf.nPH.h3WKaQcsPfLAgNxLZo62R5kgS1i', '1', '2021-11-26 10:43:58', '2021-11-26 10:43:58');

INSERT INTO `articles` (`id`, `title`, `tiny_text`, `text`, `image_url`, `state`, `modified_at`, `created_at`) VALUES (NULL, "Docker : qu'est-ce que c'est ?", "Docker est la plateforme de conteneurisation la plus utilisée. Découvrez tout ce que vous devez savoir à son sujet : qu'est-ce que c'est, à quoi ça sert, comment ça fonctionne et quelles formations permettent d'apprendre à l'utiliser.", "Avant de découvrir Docker, vous devez comprendre ce qu'est un conteneur. Il s'agit d'un environnement d'exécution léger, et d'une alternative aux méthodes de virtualisation traditionnelles basées sur les machines virtuelles. L'une des pratiques clés du développement de logiciel moderne est d'isoler les applications déployées sur un même hôte ou sur un même cluster. Ceci permet d'éviter qu'elles interfèrent.\r\nPour exécuter les applications, il est toutefois nécessaire d'exploiter des packages, des bibliothèques et divers composants logiciels. Pour exploiter ces ressources tout en isolant une application, on utilise depuis longtemps les machines virtuelles. Celles-ci permettent de séparer les applications entre elles sur un même système, et de réduire les conflits entre les composants logiciels et la compétition pour les ressources. Cependant, une alternative a vu le jour : les conteneurs.\r\nUne machine virtuelle s'apparente à un système d'exploitation complet, d'une taille de plusieurs gigaoctets, permettant le partitionnement des ressources d'une infrastructure. Un conteneur délivre uniquement les ressources nécessaires à une application.\r\nEn effet, le conteneur partage le kernel de son OS avec d'autres conteneurs. C'est une différence avec une machine virtuelle, utilisant un hyperviseur pour distribuer les ressources hardware. Cette méthode permet de réduire l'empreinte des applications sur l'infrastructure. Le conteneur regroupe tous les composants système nécessaires à l'exécution du code, sans pour autant peser aussi lourd d'un OS complet. De même, un conteneur est plus léger et plus simple qu'une machine virtuelle et peut donc démarrer et s'arrêter plus rapidement. Il est donc plus réactif, et adaptable aux besoins fluctuants liés au ” scaling ” d'une application.\r\nDernier point fort : contrairement à un hyperviseur, un moteur de conteneur n'a pas besoin d'émuler un système d'exploitation complet. Le conteneur offre donc de meilleures performances qu'un déploiement sur machine virtuelle traditionnelle.\r\nDocker est une plateforme de conteneurs lancée en 2013 ayant largement contribué à la démocratisation de la conteneurisation. Elle permet de créer facilement des conteneurs et des applications basées sur les conteneurs. Il en existe d'autres, mais celle-ci est la plus utilisée. Elle est par ailleurs plus facile à déployer et à utiliser que ses concurrentes.\r\nC'est une solution open source, sécurisée et économique. De nombreux individus et entreprises contribuent au développement de ce projet. Un large écosystème de produits, services et ressources sont développés par cette vaste communauté. Initialement conçue pour Linux, Docker permet aussi d'exécuter des conteneurs sur Windows ou Mac grâce à une ” layer ” de virtualisation Linux entre l'OS Windows / macOS et l'environnement runtime Docker. Il est donc possible d'exécuter des conteneurs Windows natifs sur des environnements de conteneurs Windows ou Linux.", NULL, 'PUBLIC', '2021-11-26 12:11:06', '2021-11-26 12:11:02');

INSERT INTO `articles` (`id`, `title`, `tiny_text`, `text`, `image_url`, `state`, `modified_at`, `created_at`) VALUES (NULL, "Qu'est-ce que MailHog ?", "Tester des e-mails dans un environnement de développement local peut être difficile. Il est très difficile de savoir si les e-mails sortants de votre site ou de votre application web atteignent réellement la boîte de réception du destinataire. Entrez dans MailHog !", "MailHog est un outil de test de-mail open source destiné principalement aux développeurs. Il vous permet de tester plus efficacement les capacités d'envoi et de réception d'e-mail de votre application web. Construit avec le langage de programmation Go, MailHog peut être utilisé sur plusieurs systèmes d'exploitation, dont Windows, Linux, FreeBSD et macOS. MailHog est maintenu par Ian Kent et publié sous la licence du MIT, ce qui vous permet de le déployer librement pour des utilisations personnelles et commerciales.\r\nMais pourquoi avez-vous besoin de MailHog?\r\nMailHog résout un grand nombre des problèmes majeurs des tests d‘e-mail. Supposons que vous développez un site web WordPress dans un environnement de développement local. Si vous souhaitez tester un formulaire de contact ou tout autre e-mail, la tâche peut être ardue. Généralement, le serveur SMTP par défaut de l'application web se charge de cette tâche. Dans un environnement de développement local, il ne fonctionne presque jamais pour de multiples raisons.\r\nTout d'abord, vous devez configurer votre système d'exploitation, votre serveur web et votre application web pour permettre l'envoi d'e-mails dans un environnement local. Ensuite, vous devez vous assurer que les e-mails arrivent bien dans la boîte de réception de votre destinataire, ce qui peut vous faire perdre du temps. Et puis il y a la question de l'utilisation d'une véritable adresse e-mail pour les tests. Cela peut nuire à la crédibilité de votre e-mail privé.\r\nMailHog résout tous les problèmes mentionnés ci-dessus. Il met en place un faux serveur SMTP que vous pouvez configurer pour que votre application web puisse envoyer et recevoir des e-mails. Il stocke même les e-mails envoyés et reçus dans une interface utilisateur web très pratique, de sorte que vous pouvez les parcourir comme vous le feriez avec une vraie boîte de réception. Enfin, MailHog vous permet également de récupérer ces e-mails grâce à une API pour des tests automatisés. C'est une fonction puissante, et la façon dont vous utilisez l'API dépend de vous.\r\nMailHog est équipé de nombreuses fonctionnalités prêtes à l'emploi. Voici quelques-unes de ses principales fonctionnalités :\r\n    - Léger et portable : Vous n'avez pas besoin d'installer MailHog pour l'utiliser. C'est l'un des principaux avantages de MailHog. Cela le rend très portable pour l'utiliser sur presque tous les systèmes d'exploitation ou serveurs web.\r\n    - Support SMTP étendu : Non seulement MailHog supporte la mise en place d'un faux serveur SMTP, mais vous pouvez également l'utiliser pour mettre en place un serveur ESMTP (Extended SMTP). Il comprend également le support pour SMTP AUTH et PIPELINING.\r\n    - Support d'API : Vous pouvez utiliser l'API HTTP intégrée de MailHog (ou l'API JSON) pour récupérer, lister et supprimer des e-mails.\r\n    - Test d'échec : Vous pouvez inviter Jim, le Singe du Chaos de MailHog (oui, c'est bien son nom) à la fête pour tester la délivrabilité de votre application web. Pour ce faire, il crée de manière aléatoire des problèmes courants de délivrabilité d'e-mail, tels que les connexions/authentifications rejetées et les connexions limitées.\r\n    - Mises à jour en temps réel : MailHog utilise l'interface web EventSource pour fournir des mises à jour instantanées.\r\n    - Capture et stockage des e-mails : Les e-mails capturés peuvent être stockés dans un système de stockage de messages en mémoire et persister dans une base de données MongoDB et un système de stockage basé sur des fichiers.\r\n    - Télécharger les fichiers jointes : MailHog prend en charge le téléchargement de parties MIME individuelles.\r\n    - UI Web : Vous pouvez utiliser l'interface web de MailHog pour visualiser les e-mails en texte brut, en HTML ou la source. Elle prend également en charge le format MIME en plusieurs parties et les en-têtes codés.\r\n    - Authentification : MailHog prend en charge l'authentification HTTP basique pour son interface utilisateur et son API.\r\n    - Libérer les e-mails capturés : Vous pouvez configurer MailHog pour libérer les e-mails capturés vers de véritables serveurs SMTP en vue de leur distribution.\r\nAvec MailHog, tester les e-mails devient un jeu d'enfant. C'est une solution pratique pour tester les e-mails de votre site web ou de votre application web. De plus, MailHog est simple à mettre en place sur presque toutes les plateformes populaires et dispose d'une interface utilisateur web facile à utiliser.", NULL, 'PUBLIC', '2021-11-26 12:38:45', '2021-11-26 12:38:40');