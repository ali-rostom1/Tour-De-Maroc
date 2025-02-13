<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Équipe Virtuelle - Tour de Morocco 2025</title>
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
            <div>
                <h1 class="text-3xl font-bold">Mon Équipe Virtuelle</h1>
                <p class="text-gray-600">Suivez vos cyclistes préférés</p>
            </div>
            <button class="bg-yellow-400 text-black px-6 py-2 rounded-lg hover:bg-yellow-500 transition-all duration-200 flex items-center gap-2">
                <i class="fas fa-plus"></i>
                Ajouter un cycliste
            </button>
        </div>

        <!-- Team Stats -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center">
                    <h3 class="text-gray-600 mb-2">Cyclistes suivis</h3>
                    <p class="text-3xl font-bold">8</p>
                </div>
                <div class="text-center">
                    <h3 class="text-gray-600 mb-2">Victoires d'étape</h3>
                    <p class="text-3xl font-bold">3</p>
                </div>
                <div class="text-center">
                    <h3 class="text-gray-600 mb-2">Points totaux</h3>
                    <p class="text-3xl font-bold">245</p>
                </div>
            </div>
        </div>

        <!-- Cyclists Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Cyclist Card 1 -->
            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <div class="relative">
                    <img src="/api/placeholder/400/200" alt="Cyclist" class="w-full h-48 object-cover rounded-t-lg">
                    <button class="absolute top-4 right-4 text-yellow-400 hover:text-yellow-500 text-xl">
                        <i class="fas fa-star"></i>
                    </button>
                </div>
                <div class="p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-2xl">🇲🇦</span>
                        <h3 class="text-xl font-bold">Mohammed Ahmed</h3>
                    </div>
                    <p class="text-gray-600 mb-4">Team Atlas Pro</p>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Classement général: <strong>5e</strong></span>
                        <span class="text-green-600">Points: 85</span>
                    </div>
                </div>
            </div>

            <!-- Cyclist Card 2 -->
            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <div class="relative">
                    <img src="/api/placeholder/400/200" alt="Cyclist" class="w-full h-48 object-cover rounded-t-lg">
                    <button class="absolute top-4 right-4 text-yellow-400 hover:text-yellow-500 text-xl">
                        <i class="fas fa-star"></i>
                    </button>
                </div>
                <div class="p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-2xl">🇫🇷</span>
                        <h3 class="text-xl font-bold">Pierre Dubois</h3>
                    </div>
                    <p class="text-gray-600 mb-4">Team Sahara Riders</p>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Classement général: <strong>3e</strong></span>
                        <span class="text-green-600">Points: 92</span>
                    </div>
                </div>
            </div>

            <!-- Cyclist Card 3 -->
            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <div class="relative">
                    <img src="/api/placeholder/400/200" alt="Cyclist" class="w-full h-48 object-cover rounded-t-lg">
                    <button class="absolute top-4 right-4 text-yellow-400 hover:text-yellow-500 text-xl">
                        <i class="fas fa-star"></i>
                    </button>
                </div>
                <div class="p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-2xl">🇪🇸</span>
                        <h3 class="text-xl font-bold">Carlos Rodriguez</h3>
                    </div>
                    <p class="text-gray-600 mb-4">Team Casablanca Pro</p>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Classement général: <strong>8e</strong></span>
                        <span class="text-green-600">Points: 68</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Stats -->
        <div class="mt-12 bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-2xl font-bold mb-6">Performance de l'équipe</h2>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <h3 class="font-bold">Meilleur grimpeur</h3>
                        <p class="text-gray-600">Mohammed Ahmed</p>
                    </div>
                    <span class="text-xl">🏔️</span>
                </div>
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <h3 class="font-bold">Meilleur sprinteur</h3>
                        <p class="text-gray-600">Pierre Dubois</p>
                    </div>
                    <span class="text-xl">⚡</span>
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