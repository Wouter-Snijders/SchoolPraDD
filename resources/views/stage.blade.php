<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stage') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-20">
                <div class="container">
                    <img src="{{ asset('doos.png') }}" alt="Gemaksbox" class="image-top">
                    <div class="title">Gemaksbox</div>
                    <p class="text">Een maaltijdbox met alle ingrediënten en recepten voor <span class="highlight">drie zelfgekookte maaltijden</span></p>
                    <br>
                    <p class="text bold">Kies uit de varianten:</p>
                    <div class="buttons">
                        <button class="button vlees" onclick="toggleDropdown()">Vlees/vis</button>
                        <button class="button vega">Vega</button>
                        <button class="button familie">Familie</button>
                    </div>
                    <div id="dropdown" class="dropdown-content">
                        <h1>Wat zit er in de</h1>
                        <h1 class="gemaksbox-title">Gemaksbox?</h1>
                        <div class="title-underline"></div>
                        <div class="content">
                            <div class="left">
                                <img src="{{ asset('recept.png') }}" alt="Receptkaarten">
                                <div class="text">
                                    <h3><strong>Drie receptkaarten</strong></h3>
                                    <div class="icons">
                                        <div class="icon">
                                            <img src="{{ asset('Vis icon.svg') }}" alt="Vis">
                                            <div class="icon-text"><strong>1x</strong> vis</div>
                                        </div>
                                        <div class="icon">
                                            <img src="{{ asset('Vlees icon.svg') }}" alt="Vlees">
                                            <div class="icon-text"><strong>1x</strong> vlees</div>
                                        </div>
                                        <div class="icon">
                                            <img src="{{ asset('Wortel icon.svg') }}" alt="Vega">
                                            <div class="icon-text"><strong>1x</strong> vega</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="right">
                                <img src="{{ asset('ingredient.png') }}" alt="Ingrediënten">
                                <div class="text-right">
                                    <h3><strong>Verse ingrediënten</strong></h3>
                                    <p>van onze lokale boeren om overheerlijke gerechten mee te maken.</p>
                                </div>
                            </div>
                        </div>
                        <button class="button vlees large-button">Ik kies deze box!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    @font-face {
        font-family: 'Outfit';
        src: url('{{ asset('fonts/Outfit-VariableFont_wght.ttf') }}') format('truetype');
        font-weight: 200 900;
    }

    * {
        font-family: 'Outfit', sans-serif;
    }

    body {
        text-align: center;
        background-color: #f8f8f8;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 500px;
        margin: 0 auto;
        background-color: #A4B08B;
        padding: 5px 20px; /* Verlaag de bovenste en onderste padding om de inhoud dichter bij de afbeelding te plaatsen en het groene blokje te verkleinen */
        border-radius: 10px;
        margin-top: 100px; /* Voeg deze regel toe om de container naar beneden te verplaatsen */
        text-align: center; /* Center the content */
    }

    .image { width: 100%; border-radius: 10px; }

    .image-top {
        width: 100%;
        border-radius: 10px;
        margin-top: -200px; /* Verhoog de negatieve waarde om de afbeelding verder naar boven te verplaatsen */
        display: block;
        margin-left: -15px; /* Verplaats de afbeelding iets naar links */
    }

    .title { font-size: 30px; font-weight: 600; margin: 10px 0; color: white; } /* Semi-bold */

    .text { font-size: 16px; color: white; } /* Normaal gewicht voor de tekst */

    .highlight { font-weight: 600; color: white; font-size: 18px; } /* Semi-bold */

    .bold { font-weight: 600; } /* Semi-bold */

    .buttons { margin-top: 15px; display: flex; justify-content: center; gap: 10px; }

    .button {
        padding: 10px 15px; margin: 5px;
        border: none; border-radius: 15px;
        font-size: 14px; cursor: pointer;
        transition: transform 0.3s ease, background-color 0.3s ease;
        font-weight: 600; /* Semi-bold */
    }

    .vlees { background-color: #EEAF92; color: black; } /* Vlees/vis kleur en zwarte tekstkleur */

    .vega { background-color: #80885E; color: white; } /* Vega kleur en zwarte tekstkleur */

    .familie { background-color: #FFF4E4; color: black; } /* Zand kleur en zwarte tekstkleur */

    .button:hover {
        transform: scale(1.1);
    }

    .dropdown-content {
        display: none;
        background-color: white;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 10px;
        margin-top: 10px;
        width: 100%;
    }

    .title-underline { border-bottom: 3px solid #e59866; width: 60%; margin: auto; margin-bottom: 20px; }

    .content { display: flex; justify-content: space-between; align-items: flex-start; text-align: left; padding: 0 10px; }

    .left, .right { width: 48%; }

    .left img, .right img { width: 100%; border-radius: 10px; }

    .icons { display: flex; flex-direction: row; gap: 15px; margin-top: 10px; }

    .icon { display: flex; flex-direction: column; align-items: center; gap: 5px; font-size: 14px; text-align: center; }

    .icon img { width: 25px; }

    .icon-text { margin-top: 5px; }

    .text-right { text-align: right; }

    .white-black {
        background-color: white !important;
        color: black !important;
    }

    .gemaksbox-title { margin-top: -10px; }

    .left { margin-left: -20px; }

    .large-button {
        padding: 10px 15px;
        font-size: 18px;
        color: black;
        display: inline-block;
        margin: 0 auto;
        text-align: left;
        white-space: nowrap;
        font-weight: 600; /* Semi-bold */
    }

    .uppercase {
        text-transform: uppercase;
    }
</style>

<script>
    function toggleDropdown() {
        var dropdown = document.getElementById("dropdown");
        var vegaButton = document.querySelector(".button.vega");
        var familieButton = document.querySelector(".button.familie");

        if (dropdown.style.display === "none" || dropdown.style.display === "") {
            dropdown.style.display = "block";
            vegaButton.classList.add("white-black");
            familieButton.classList.add("white-black");
        } else {
            dropdown.style.display = "none";
            vegaButton.classList.remove("white-black");
            familieButton.classList.remove("white-black");
        }
    }
</script>
