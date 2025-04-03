<style>
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


<form id="login-form" method="POST" action="{{ route('form_feedback') }}" class="space-y-4">
            @csrf
            <div class="container_label">
                <label for="feedback" class="form_label">Commmentaire ? Remarque ? Avis ?</label>
                <input type="text" name="feedback" id="feedback" placeholder="Votre feedback ici" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>
            
            
        </form>

        <div id="popup" class="popup" style="display: none;">
    <span id="popup-text">Ceci est une pop-up temporaire !</span>
</div>

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