@extends('layouts.app')

@section('title', 'A propos')

@section('content')

<style>
    body {
        background-color: #080808;
        color: #fff;
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: auto;
        padding: 20px;
    }

    .nav-register {
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        width: 100%;
        margin-top: 50px;
    }

    .logo1 {
        width: 100px;
    }

    .container_logout_match {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    margin: 30px 0;


}


    .logout_btn_container button {
        background-color: #FFC848;
        color: #080808;
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    
    }

    .logout_btn_container button:hover {
        background-color: #e6b838;
    }

    .container_infos {
        text-align: center;
        margin-bottom: 30px;
    }

    .welcome_profile {
        font-size: 20px;
        margin-bottom: 10px;
    }

    .welcome_profile_espace {
        font-size: 20px;
        margin-bottom: 5px;
    }

    .last_connexion {
        font-size: 14px;
        color: #aaa;
    }

    .infos_container {
        background-color: #111;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 0 10px rgba(255, 200, 72, 0.2);
        margin-bottom: 30px;
    }

    .title_infos_container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .title_infos_container h2 {
        margin: 0;
        font-size: 22px;
        color: #FFC848;
    }

    .title_infos_container button {
        background-color: transparent;
        color: #FFC848;
        border: none;
        font-size: 16px;
        cursor: pointer;
    }
    .all_infos_container {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    justify-content: space-between;
    margin-right: 25px;
}

.info_user {
    flex: 0 1 calc(50% - 10px);
    display: flex;
    align-items: flex-start;
    background-color: #222;
    padding: 10px;
    border-radius: 10px;
    min-width: 150px;
    word-break: break-word;
    overflow-wrap: break-word;
    white-space: normal;
}

.info_user i {
    margin-right: 10px;
    color: #FFC848;
    flex-shrink: 0;
}

.info {
    margin: 0;
    font-size: 16px;
    word-break: break-word;
    overflow-wrap: break-word;
    white-space: normal;
    flex: 1;
}

.info_user_picture {
    flex: 0 1 100%;
    text-align: center;
    margin-bottom: 15px;
}

p{
    font-size: 14px;
}


    .info_user_picture img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border: 3px solid #FFC848;
    }



    .info {
        margin: 0;
        font-size: 16px;
    }

    @media screen and (max-width: 600px) {
        .info_user {
            flex: 1 1 100%;
        }
    }

    .container-btn-match {
        text-align: center;
        margin-bottom: 30px;
    }

    .container-btn-match button {
        background-color: #FFC848;
        color: #080808;
        padding: 12px 30px;
        border: none;
        border-radius: 25px;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .container-btn-match button:hover {
        background-color: #e6b838;
    }

    .container_projet {
        background-color: #111;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 0 10px rgba(255, 200, 72, 0.2);
        margin-bottom: 30px;
    }

    .title_add_projet {
        font-size: 22px;
        color: #FFC848;
        margin-bottom: 20px;
    }

    .form-label-projet {
        display: block;
        margin-bottom: 6px;
        color: #FFC848;
        font-weight: bold;
    }

    .form-control-projet {
        width: 100%;
        padding: 10px;
        border-radius: 10px;
        border: none;
        background-color: #222;
        color: white;
        margin-bottom: 15px;
    }

    .form-control-projet:focus {
        outline: none;
        border: 2px solid #FFC848;
    }

    .btn-primary-projet {
        background-color: #FFC848;
        color: #080808;
        padding: 12px 30px;
        border: none;
        border-radius: 25px;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary-projet:hover {
        background-color: #e6b838;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .col-md-4 {
        flex: 1 1 calc(33.333% - 20px);
    }

    .card_projet {
        background-color: #222;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(255, 200, 72, 0.2);
    }

    .card_projet img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .card-body {
        padding: 15px;
    }

    .card-text {
        font-size: 14px;
        color: #ddd;
        margin-bottom: 15px;
    }

    .btn-danger {
        background-color: #ff4c4c;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #e04343;
    }

    @media screen and (max-width: 600px) {
    .all_infos_container {
        gap: 10px;
    }

    .info_user {
        flex: 1 1 48%;
    }

    .info_user_picture {
        flex: 1 1 100%;
        text-align: center;
    }
}
.container_projet {
    background-color: #656463;
    margin-top: 20px;
    margin-right: 20px;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 0 15px rgba(255, 200, 72, 0.1);
    margin-bottom: 40px;
}

.title_add_projet {
    font-size: 22px;
    color: #FFC848;
    margin-bottom: 20px;
    text-align: center;
}

.form-label-projet {
    color: #FFC848;
    font-weight: bold;
    margin-bottom: 8px;
    display: block;
}

.form-control-projet {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    background-color: #222;
    color: #fff;
    border: none;
    margin-bottom: 20px;
    resize: none;
}

.form-control-projet:focus {
    outline: none;
    border: 2px solid #FFC848;
}

.btn-primary-projet {
    background-color: #FFC848;
    color: #080808;
    padding: 12px 24px;
    font-weight: bold;
    border-radius: 25px;
    border: none;
    cursor: pointer;
    display: block;
    margin: 0 auto;
    transition: background-color 0.3s ease;
}

.btn-primary-projet:hover {
    background-color: #e6b838;
}

.card_projet {
    background-color: #222;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(255, 200, 72, 0.15);
    transition: transform 0.3s ease;
}

.card_projet:hover {
    transform: scale(1.02);
}

.card_projet img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-bottom: 1px solid #333;
}

.card-body {
    padding: 15px;
}

.card-text {
    font-size: 14px;
    color: #ddd;
    margin-bottom: 15px;
}

.btn-danger {
    background-color: transparent;
    border: 1px solid #ff4c4c;
    color: #ff4c4c;
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.btn-danger:hover {
    background-color: #ff4c4c;
    color: white;
}

.custom-separator {
    border: none;
    border-top: 2px solid #FFC848;
    margin: 40px 0;
    width: 100%;
    margin-right: 20px;
}

textarea {
    align-items: center;
    height: 85px;
    width: 70%;
    margin-left: 12%;
}

.btn-primary {
    display: block;  /* Permet de centrer avec margin auto */
    margin: 20px auto;
    background-color: #FFC848;
    color: #080808;
    padding: 12px 30px;
    border: none;
    border-radius: 15px; /* Angles arrondis */
    font-weight: bold;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-align: center;
    box-shadow: 0px 4px 10px rgba(255, 200, 72, 0.2);
}

.btn-primary:hover {
    background-color: #e6b838;
}


.popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background:rgb(49, 184, 49); /* Bleu foncé (de ta palette) */
            color: #F0FBF7; /* Blanc cassé */
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            display: none; /* Cachée par défaut */
            z-index: 1000;
        }

        /* Animation pour faire disparaître la pop-up */
        .fade-out {
            animation: fadeOut 1s ease-in-out forwards;
        }

        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }

    .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background:rgb(49, 184, 49); /* Bleu foncé (de ta palette) */
            color: #F0FBF7; /* Blanc cassé */
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            display: none; /* Cachée par défaut */
            z-index: 1000;
        }

        /* Animation pour faire disparaître la pop-up */
        .fade-out {
            animation: fadeOut 1s ease-in-out forwards;
        }

        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }
</style>
@section('content')


<div class="nav-register">
    <img class="logo1" src="images/logo.png" alt="Logo">
</div>
    <div class="container">
        <div class="container_logout_match">
           <!-- <a href="{{ route('profile') }}"><img src="{{ asset('images/logo.png') }}" alt="Logo MatchWork" class="logo1"></a> -->
            
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
        @csrf
        <button type="submit" style="background: none; color: #ff4c4c; border: none; font-weight: bold; font-size: 16px; cursor: pointer;">
            <i class="fa-solid fa-right-from-bracket"></i> Se déconnecter
        </button>
    </form>
        </div>

        <div class="infos_container">
            <h1 class="title_add_projet">À PROPOS DE MATCH WORK</h1>
            <p>MatchWork est une plateforme pensée par des développeurs, pour tous les passionnés de projets bien construits.</p>
            <p>Nous sommes Estelle, Clément, Mandela et Théo, quatre développeurs web. Nous avons souvent constaté qu’il nous manquait un réseau complémentaire : un endroit où rencontrer la bonne personne avec qui collaborer.</p>
            <p>L’objectif de MatchWork est de permettre à chacun de former le duo de travail idéal — développeur, designer, marketeux.</p>
        </div>

        <div class="infos_container">
            <div class="info_user_picture">
                <img src="{{ asset('images/groupe.png') }}" alt="Photo Groupe">
            </div>
            <p>L’équipe Match Work ❤️</p>
        </div>

        <div class="infos_container">
            <h2 class="title_add_projet">Une idée, un bug, une suggestion ?</h2>
            <p>Votre avis compte énormément ! </p> 
            <p>Ci-dessous n’hésitez pas à nous envoyer vos retours, signaler un souci ou proposer une amélioration. Ensemble, on peut faire évoluer la plateforme pour qu’elle vous ressemble.</p>
            <form id="login-form" method="POST" action="{{ route('form_feedback') }}" class="space-y-4">
            @csrf
            <div class="container_label">
                <textarea type="text" name="feedback" id="feedback" placeholder="Votre feedback ici..." class="form-control" ></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>
            
            
        </form>
        </div>



        <div id="popup" class="popup" style="display: none;">
    <span id="popup-text">Error</span>
</div>

</body>
</html>

<script>
    function showPopup(message, color) {
        let popup = document.getElementById("popup");
        let popupText = document.getElementById("popup-text");

        popupText.innerHTML = message; // Permet d'utiliser du HTML (comme <br>)
        popup.style.backgroundColor = color; // Modifier la couleur
        popup.style.display = "block"; // Afficher la pop-up

        // Attendre 3 secondes puis cacher la pop-up
        setTimeout(() => {
            popup.classList.add("fade-out");

            // Supprimer la pop-up après l'animation
            setTimeout(() => {
                popup.style.display = "none";
                popup.classList.remove("fade-out");
            }, 1000);
        }, 3000);
    }

    document.addEventListener("DOMContentLoaded", function() {
        // Vérifier si les données de la session sont bien présentes
        @if(session('popupMessage') && session('popupColor'))
            showPopup("{!! session('popupMessage') !!}", "{{ session('popupColor') }}");
        @endif
    });
</script>