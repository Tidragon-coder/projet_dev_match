<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 900px; margin: auto;">

  <h1 style="text-align: center; font-size: 2.8em; color: #480E33;">🤝 MatchWork – Projet Laravel en groupe</h1>

  <p style="font-size: 1.2em; text-align: center;">
    MatchWork est une application web développée avec le framework Laravel dans le cadre d’un devoir de cours en groupe.<br>
    L'objectif est de mettre en relation des personnes de différents domaines pour qu'elles puissent collaborer sur des projets à deux.
  </p>

  <hr>

  <h2 style="color: #480E33;">👥 Membres du groupe</h2>
  <p>Nous sommes 4 développeurs à avoir travaillé sur ce projet :</p>
  <ul>
    <li><strong>Estelle</strong> – <a href="https://github.com/estellealz">https://github.com/estellealz</a></li>
    <li><strong>Théo</strong> – <a href="https://github.com/Tidragon-coder">https://github.com/Tidragon-coder</a></li>
    <li><strong>Clément</strong> – <a href="https://github.com/clemco23">https://github.com/clemco23</a></li>
    <li><strong>Mandela</strong> – <a href="https://github.com/madibz">https://github.com/madibz</a></li>
  </ul>

  <p>
    Notre problématique de départ : en tant que développeurs, nous avons constaté qu’il est parfois difficile de s’entourer de profils complémentaires (designers, marketers, etc.) pour faire aboutir des projets ambitieux.  
    Avec MatchWork, nous avons voulu faciliter la création de duos efficaces afin de mener à bien des projets concrets, solides et bien construits.
  </p>

  <hr>

  <h2 style="color: #480E33;">🎯 Objectif du projet</h2>
  <p>
    L’application permet à un utilisateur de :
    <ul>
      <li>Créer un compte et compléter son profil</li>
      <li>Consulter d'autres profils complémentaires</li>
      <li>Proposer ou accepter un "match" pour créer un binôme</li>
    </ul>
    Ce projet a été réalisé en groupe dans un but pédagogique, pour apprendre à développer une application Laravel complète.
  </p>

  <hr>

  <h2 style="color: #480E33;">⚙️ Installation du projet</h2>

  <h3>1. Cloner le projet</h3>
  <pre><code>git clone https://github.com/votre-utilisateur/matchwork.git
cd matchwork</code></pre>

  <h3>2. Installer les dépendances PHP</h3>
  <pre><code>composer install</code></pre>

  <h3>3. Créer un fichier <code>.env</code></h3>
  <p>Créer un fichier nommé <code>.env</code> à la racine du projet. Vous pouvez vous baser sur le fichier <code>.env.example</code> s’il existe.</p>

  <h3>4. Contenu recommandé pour le fichier <code>.env</code></h3>
  <pre><code>APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test1
DB_USERNAME=root
DB_PASSWORD=</code></pre>

  <h3>5. Générer la clé d'application</h3>
  <pre><code>php artisan key:generate</code></pre>

  <hr>

  <h2 style="color: #480E33;">🚀 Lancement du projet</h2>
  <p>Une fois les étapes précédentes terminées, exécutez les commandes suivantes :</p>
  <pre><code>php artisan storage:link
php artisan optimize:clear
php artisan serve</code></pre>

  <p>L'application sera accessible sur :</p>
  <p><strong>👉 <a href="http://localhost:8000" target="_blank">http://localhost:8000</a></strong></p>

  <p><strong>Voici le lien pour tester l'application :</strong> <br>
    ➡️ <a href="http://localhost:8000" target="_blank">http://localhost:8000</a></p>

  <hr>

  <h2 style="color: #480E33;">🧪 Tester MatchWork</h2>
  <ul>
    <li>Créer un compte utilisateur</li>
    <li>Compléter son profil</li>
    <li>Explorer les profils proposés</li>
    <li>Proposer un match</li>
    <li>Former un binôme et démarrer un projet</li>
  </ul>

  <hr>

  <h2 style="color: #480E33;">📌 Remarques</h2>
  <ul>
    <li>Ce projet est un devoir de cours réalisé en collaboration</li>
    <li>Il est conçu pour fonctionner en local</li>
    <li>Il peut être amélioré et enrichi selon les besoins</li>
  </ul>

  <p style="text-align: center; font-size: 1.2em; margin-top: 2em;">✨ Merci d’avoir consulté le projet MatchWork ! ✨</p>
