<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications - Tour de Morocco 2025</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Top Navigation Bar -->
    <nav class="bg-[#333333] text-white py-2 px-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Left Side -->
            <div class="flex items-center space-x-6">
                <a href="Home.html" class="transform hover:scale-105 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 80" class="w-48 h-[3rem]">
                        <text x="10" y="40" font-family="Arial Black" font-size="32" fill="#004D98">TOUR</text>
                        <text x="100" y="40" font-family="Arial" font-size="24" fill="#C8102E">DE</text>
                        <text x="10" y="70" font-family="Arial Black" font-size="32" fill="#C8102E">MOROCCO</text>
                        <path d="M170 15 L173 24 L182 24 L175 30 L178 39 L170 33 L162 39 L165 30 L158 24 L167 24 Z" fill="#C8102E"/>
                    </svg>
                </a>
                <div class="hidden md:flex space-x-4">
                    <a href="Home.html" class="hover:text-yellow-400 transition-colors duration-200">HOME</a>
                    <a href="Etapes.html" class="hover:text-yellow-400 transition-colors duration-200">ETAPES</a>
                    <a href="Histoire.html" class="hover:text-yellow-400 transition-colors duration-200">HISTOIRE</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-200">JEUX</a>
                </div>
            </div>
            
            <!-- Right Side -->
            <div class="flex items-center space-x-4">
                <a href="#" class="bg-white text-black px-6 py-2 rounded hover:bg-yellow-400 transition-all duration-200">
                    Je me connecte
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Notifications</h1>
            <button class="flex items-center gap-2 text-gray-600 hover:text-black">
                <i class="fas fa-cog"></i>
                Paramètres
            </button>
        </div>

        <!-- Favorites Banner -->
        <div class="bg-yellow-50 p-4 rounded-lg mb-8">
            <div class="flex items-center gap-3">
                <i class="fas fa-star text-yellow-500 text-xl"></i>
                <div>
                    <h2 class="font-bold">Étapes favorites</h2>
                    <p class="text-sm text-gray-600">Gérez les notifications pour vos étapes préférées</p>
                </div>
            </div>
        </div>

        <!-- Notification Cards -->
        <div class="space-y-4">
            <!-- Card 1 -->
            <div class="bg-white rounded-lg p-4 shadow-sm border hover:border-yellow-400 transition-colors">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <h3 class="font-bold">Étape 1: Casablanca - Rabat</h3>
                        <p class="text-sm text-gray-600">Notification de départ</p>
                    </div>
                    <button class="p-2 rounded-full bg-blue-100 text-blue-600 hover:bg-blue-200 transition-colors">
                        <i class="fas fa-bell"></i>
                    </button>
                    <i class="fas fa-chevron-right ml-4 text-gray-400"></i>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-lg p-4 shadow-sm border hover:border-yellow-400 transition-colors">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <h3 class="font-bold">Étape 2: Rabat - Fès</h3>
                        <p class="text-sm text-gray-600">Notification des résultats</p>
                    </div>
                    <button class="p-2 rounded-full bg-blue-100 text-blue-600 hover:bg-blue-200 transition-colors">
                        <i class="fas fa-bell"></i>
                    </button>
                    <i class="fas fa-chevron-right ml-4 text-gray-400"></i>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-lg p-4 shadow-sm border hover:border-yellow-400 transition-colors">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <h3 class="font-bold">Étape 3: Fès - Meknès</h3>
                        <p class="text-sm text-gray-600">Notification de départ</p>
                    </div>
                    <button class="p-2 rounded-full bg-gray-100 text-gray-400 hover:bg-gray-200 transition-colors">
                        <i class="fas fa-bell-slash"></i>
                    </button>
                    <i class="fas fa-chevron-right ml-4 text-gray-400"></i>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white rounded-lg p-4 shadow-sm border hover:border-yellow-400 transition-colors">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <h3 class="font-bold">Étape 4: Meknès - Marrakech</h3>
                        <p class="text-sm text-gray-600">Notifications de départ et résultats</p>
                    </div>
                    <button class="p-2 rounded-full bg-blue-100 text-blue-600 hover:bg-blue-200 transition-colors">
                        <i class="fas fa-bell"></i>
                    </button>
                    <i class="fas fa-chevron-right ml-4 text-gray-400"></i>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-[#333333] text-white mt-16 py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Tour de Morocco 2025</h3>
                    <p class="text-gray-400">La plus grande course cycliste du Maroc</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Liens Rapides</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-yellow-400 transition-colors">Parcours</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition-colors">Équipes</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition-colors">Actualités</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Suivez-nous</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="hover:text-yellow-400 transition-colors"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="hover:text-yellow-400 transition-colors"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="hover:text-yellow-400 transition-colors"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="hover:text-yellow-400 transition-colors"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-sm text-gray-400">
                <p>&copy; 2025 Tour de Morocco. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>