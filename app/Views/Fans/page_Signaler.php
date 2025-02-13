<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Signaler une erreur - Tour de Morocco 2025">
    <title>Signaler une erreur - Tour de Morocco 2025</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap');
        
        :root {
            --tour-yellow: #FED100;
            --tour-blue: #004D98;
            --tour-red: #C8102E;
        }
        
        body {
            font-family: 'Roboto Condensed', sans-serif;
        }
        
        .bg-tour-yellow {
            background-color: var(--tour-yellow);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold mb-2">Signaler une erreur</h1>
                <p class="text-gray-600">Aidez-nous à maintenir l'exactitude des données de course</p>
            </div>

            <!-- Form -->
            <form class="bg-white rounded-lg shadow-lg p-6 space-y-6">
                <!-- Type d'erreur -->
                <div>
                    <label for="error-type" class="block text-sm font-medium text-gray-700 mb-2">Type d'erreur</label>
                    <select id="error-type" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500">
                        <option value="">Sélectionnez le type d'erreur</option>
                        <option value="time">Temps incorrect</option>
                        <option value="position">Position incorrecte</option>
                        <option value="rider-info">Informations coureur incorrectes</option>
                        <option value="stage-info">Informations étape incorrectes</option>
                        <option value="other">Autre</option>
                    </select>
                </div>

                <!-- Étape -->
                <div>
                    <label for="stage" class="block text-sm font-medium text-gray-700 mb-2">Étape concernée</label>
                    <input type="text" id="stage" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500" placeholder="ex: Étape 3">
                </div>

                <!-- Coureur -->
                <div>
                    <label for="rider" class="block text-sm font-medium text-gray-700 mb-2">Coureur concerné</label>
                    <input type="text" id="rider" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500" placeholder="Nom du coureur">
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description de l'erreur</label>
                    <textarea id="description" rows="4" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500" placeholder="Décrivez l'erreur en détail..."></textarea>
                </div>

                <!-- Source correcte -->
                <div>
                    <label for="source" class="block text-sm font-medium text-gray-700 mb-2">Source de la correction</label>
                    <input type="text" id="source" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500" placeholder="URL ou référence officielle">
                </div>

                <!-- Contact -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Votre email (optionnel)</label>
                    <input type="email" id="email" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500" placeholder="email@exemple.com">
                    <p class="mt-1 text-sm text-gray-500">Pour vous tenir informé du suivi de votre signalement</p>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-full bg-tour-yellow text-black font-bold py-3 px-6 rounded-lg hover:bg-yellow-400 transition-colors duration-200 transform hover:-translate-y-0.5">
                        Envoyer le signalement
                    </button>
                </div>

                <!-- Disclaimer -->
                <p class="text-sm text-gray-500 text-center mt-4">
                    Nous examinerons votre signalement dans les plus brefs délais et effectuerons les corrections nécessaires après vérification.
                </p>
            </form>
        </div>
    </div>
</body>
</html>