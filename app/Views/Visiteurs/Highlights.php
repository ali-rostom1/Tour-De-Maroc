<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Highlights | Tour de Morocco 2025</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-[#333333] text-white py-2 px-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-6">
                <a href="Home.html" aria-label="Tour de Morocco Home" class="transform hover:scale-105 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 80" class="w-48 h-[3rem]" role="img" aria-label="Tour de Morocco Logo">
                        <title>Tour de Morocco Logo</title>
                        <text x="10" y="40" font-family="Arial Black" font-size="32" fill="#004D98">TOUR</text>
                        <text x="100" y="40" font-family="Arial" font-size="24" fill="#C8102E">DE</text>
                        <text x="10" y="70" font-family="Arial Black" font-size="32" fill="#C8102E">MOROCCO</text>
                        <path d="M170 15 L173 24 L182 24 L175 30 L178 39 L170 33 L162 39 L165 30 L158 24 L167 24 Z" fill="#C8102E"/>
                    </svg>
                </a>
                <div class="hidden md:flex space-x-4">
                    <a href="Home.html" class="hover:text-yellow-400 transition-colors duration-200 uppercase">Home</a>
                    <a href="Etapes.html" class="hover:text-yellow-400 transition-colors duration-200 uppercase">Etapes</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-200 uppercase">Médias</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-200 uppercase">Jeux</a>
                </div>
            </div>
            
            <div class="flex items-center space-x-6">
                <div class="hidden md:flex space-x-4">
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-200 uppercase">Tour Opérateurs</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-200 uppercase">Montour</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-200 uppercase">VIP</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-200 uppercase">Magasins</a>
                </div>
                <a href="Login.html">
                    <button class="bg-white text-black px-6 py-2 rounded hover:bg-yellow-400 transition-all duration-200 transform hover:-translate-y-0.5">
                        Je me connecte
                    </button>
                </a>
            </div>
        </div>
    </nav>

    <!-- En-tête Highlights -->
    <div class="relative h-[40vh] overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.pexels.com/photos/248547/pexels-photo-248547.jpeg?auto=compress&cs=tinysrgb&w=1920&h=1080&fit=crop" 
                 alt="Peloton de cyclistes en pleine course" 
                 class="w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
        </div>
        
        <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
            <div class="container mx-auto">
                <div class="flex items-center gap-6">
                    <div>
                        <h1 class="text-4xl font-bold mb-2">Highlights</h1>
                        <p class="text-xl opacity-90">Les moments forts du Tour de Morocco 2025</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenu Principal -->
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Filtres et Recherche -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <h2 class="text-xl font-bold mb-6 border-b pb-2">Filtres</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Étape</label>
                            <select class="w-full border rounded-md p-2">
                                <option>Toutes les étapes</option>
                                <option>Étape 1</option>
                                <option>Étape 2</option>
                                <option>Étape 3</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Type de moment</label>
                            <select class="w-full border rounded-md p-2">
                                <option>Tous les moments</option>
                                <option>Sprint final</option>
                                <option>Montagne</option>
                                <option>Échappée</option>
                                <option>Chute</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Coureur</label>
                            <select class="w-full border rounded-md p-2">
                                <option>Tous les coureurs</option>
                                <option>Tadej Pogačar</option>
                                <option>Jonas Vingegaard</option>
                                <option>Remco Evenepoel</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Playlist -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-bold mb-6 border-b pb-2">Ma Playlist</h2>
                    <div class="space-y-4">
                        <p class="text-sm text-gray-600">Connectez-vous pour créer votre playlist personnalisée des meilleurs moments.</p>
                        <button class="w-full bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-500 transition-colors">
                            Créer ma playlist
                        </button>
                    </div>
                </div>
            </div>

            <!-- Vidéos -->
            <div class="lg:col-span-3">
                <!-- Vidéo en vedette -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <h2 class="text-xl font-bold mb-6">Moment du jour</h2>
                    <div class="aspect-video bg-gray-800 rounded-lg mb-4">
                        <img src="istockphoto-525246215-612x612_LE_upscale_balanced_x4.jpg" 
                             alt="Cycliste en pleine ascension" 
                             class="w-full h-full object-cover rounded-lg">
                    </div>
                    <h3 class="text-lg font-bold mb-2">L'attaque décisive de Pogačar dans le Col d'Atlas</h3>
                    <p class="text-gray-600 mb-4">Étape 15 - L'attaque qui pourrait bien avoir scellé le sort de ce Tour de Morocco 2025.</p>
                    <div class="flex items-center gap-4">
                        <button class="flex items-center gap-2 px-4 py-2 bg-gray-100 rounded-md hover:bg-gray-200">
                            <i class="fas fa-share"></i>
                            Partager
                        </button>
                        <button class="flex items-center gap-2 px-4 py-2 bg-gray-100 rounded-md hover:bg-gray-200">
                            <i class="fas fa-plus"></i>
                            Ajouter à ma playlist
                        </button>
                    </div>
                </div>

                <!-- Grille de vidéos -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Vidéo 1 -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="aspect-video bg-gray-800">
                            <img src="https://images.pexels.com/photos/2419153/pexels-photo-2419153.jpeg?auto=compress&cs=tinysrgb&w=800" 
                                 alt="Sprint final de course cycliste" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <span class="inline-block bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full mb-2">Sprint final</span>
                            <h3 class="font-bold mb-2">Sprint victorieux - Étape 14</h3>
                            <p class="text-sm text-gray-600 mb-3">Un sprint d'anthologie pour cette arrivée à Casablanca.</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">Il y a 2 jours</span>
                                <button class="text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Vidéo 2 -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="aspect-video bg-gray-800">
                            <img src="https://images.pexels.com/photos/5807576/pexels-photo-5807576.jpeg?auto=compress&cs=tinysrgb&w=800" 
                                 alt="Cyclistes dans la montagne" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <span class="inline-block bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full mb-2">Montagne</span>
                            <h3 class="font-bold mb-2">L'échappée - Col du Toubkal</h3>
                            <p class="text-sm text-gray-600 mb-3">Une échappée magistrale dans les montagnes de l'Atlas.</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">Il y a 3 jours</span>
                                <button class="text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Autres vidéos... -->
                </div>

                <!-- Pagination -->
                <div class="mt-8 flex justify-center">
                    <nav class="flex items-center gap-2">
                        <button class="px-4 py-2 rounded-md bg-gray-100 hover:bg-gray-200">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="px-4 py-2 rounded-md bg-yellow-400 text-black">1</button>
                        <button class="px-4 py-2 rounded-md bg-gray-100 hover:bg-gray-200">2</button>
                        <button class="px-4 py-2 rounded-md bg-gray-100 hover:bg-gray-200">3</button>
                        <button class="px-4 py-2 rounded-md bg-gray-100 hover:bg-gray-200">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</body>
</html>