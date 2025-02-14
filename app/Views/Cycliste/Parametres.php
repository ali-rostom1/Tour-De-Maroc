<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tour de Morocco 2025 - Paramètres">
    <title>Tour de Morocco 2025 - Paramètres</title>
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
    </style>
</head>
<body class="bg-gray-100">
    <!-- Top Navigation -->
    <nav class="bg-[#333333] text-white py-4 px-6">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 80" class="w-48 h-[3rem]">
                    <text x="10" y="40" font-family="Arial Black" font-size="32" fill="#004D98">TOUR</text>
                    <text x="100" y="40" font-family="Arial" font-size="24" fill="#C8102E">DE</text>
                    <text x="10" y="70" font-family="Arial Black" font-size="32" fill="#C8102E">MOROCCO</text>
                </svg>
                <span class="text-xl">| Espace Cycliste</span>
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-sm">Mohammed Amine</span>
                <img src="/api/placeholder/40/40" alt="Cyclist profile" class="w-10 h-10 rounded-full">
            </div>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white h-screen shadow-lg">
            <nav class="p-4">
                <div class="space-y-4">
                    <a href="Cycliste_Dashboard.html" class="flex items-center space-x-2 text-gray-600 hover:bg-gray-100 p-3 rounded-lg">
                        <i class="fas fa-user"></i>
                        <span>Profil</span>
                    </a>
                    <a href="performance.html" class="flex items-center space-x-2 text-gray-600 hover:bg-gray-100 p-3 rounded-lg">
                        <i class="fas fa-chart-line"></i>
                        <span>Performances</span>
                    </a>
                    <a href="Photos.html" class="flex items-center space-x-2 text-gray-600 hover:bg-gray-100 p-3 rounded-lg">
                        <i class="fas fa-camera"></i>
                        <span>Photos</span>
                    </a>
                    <a href="Historique.html" class="flex items-center space-x-2 text-gray-600 hover:bg-gray-100 p-3 rounded-lg">
                        <i class="fas fa-trophy"></i>
                        <span>Historique</span>
                    </a>
                    <a href="Parametres.html" class="flex items-center space-x-2 bg-[#FED100] text-black p-3 rounded-lg">
                        <i class="fas fa-cog"></i>
                        <span>Paramètres</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-8">Paramètres</h1>
            
            <!-- Account Settings -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <h2 class="text-xl font-bold mb-6">Paramètres du Compte</h2>
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 mb-2">Adresse Email</label>
                            <input type="email" value="mohammed.amine@email.com" class="w-full p-3 border rounded-lg">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Numéro de Téléphone</label>
                            <input type="tel" value="+212 6XX-XXXXXX" class="w-full p-3 border rounded-lg">
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Langue</label>
                        <select class="w-full p-3 border rounded-lg">
                            <option>Français</option>
                            <option>العربية</option>
                            <option>English</option>
                        </select>
                    </div>
                </form>
            </div>

            <!-- Notification Settings -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <h2 class="text-xl font-bold mb-6">Notifications</h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 hover:bg-gray-50 rounded-lg">
                        <div>
                            <h3 class="font-bold">Notifications Email</h3>
                            <p class="text-gray-600">Recevoir des mises à jour par email</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#004D98]"></div>
                        </label>
                    </div>
                    <div class="flex items-center justify-between p-4 hover:bg-gray-50 rounded-lg">
                        <div>
                            <h3 class="font-bold">Notifications SMS</h3>
                            <p class="text-gray-600">Recevoir des alertes par SMS</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#004D98]"></div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Security Settings -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <h2 class="text-xl font-bold mb-6">Sécurité</h2>
                <div class="space-y-6">
                    <button class="w-full md:w-auto bg-[#004D98] text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                        <i class="fas fa-lock mr-2"></i>Changer le mot de passe
                    </button>
                    <button class="w-full md:w-auto bg-[#004D98] text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                        <i class="fas fa-shield-alt mr-2"></i>Activer l'authentification à deux facteurs
                    </button>
                </div>
            </div>

            <!-- Save Changes Button -->
            <div class="flex justify-end">
                <button class="bg-[#FED100] text-black px-8 py-3 rounded-lg hover:bg-yellow-400 transition-colors">
                    Enregistrer les modifications
                </button>
            </div>
        </main>
    </div>

    <script>
        // Add any necessary JavaScript functionality here
    </script>
</body>
</html>