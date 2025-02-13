
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histoire du Tour | Tour de Morocco 2025</title>
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

    <!-- En-tête Histoire -->
    <div class="relative h-[50vh] overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://www.shutterstock.com/image-photo/road-bike-triathlon-race-cyclist-260nw-1439562110.jpg" 
                 alt="Histoire du Tour du Maroc" class="w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
        </div>
        
        <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
            <div class="container mx-auto">
                <div class="max-w-2xl">
                    <h1 class="text-4xl font-bold mb-4">L'Histoire du Tour du Maroc</h1>
                    <p class="text-xl opacity-90">Une aventure cycliste à travers les époques, des premières éditions aux succès modernes.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Timeline Navigation -->
    <div class="sticky top-0 bg-white shadow-md z-10">
        <div class="container mx-auto px-4">
            <div class="flex overflow-x-auto py-4 gap-4 no-scrollbar">
                <button class="px-6 py-2 bg-yellow-400 text-black rounded-full whitespace-nowrap font-medium">Toutes les époques</button>
                <button class="px-6 py-2 bg-gray-100 hover:bg-gray-200 rounded-full whitespace-nowrap">1930-1950</button>
                <button class="px-6 py-2 bg-gray-100 hover:bg-gray-200 rounded-full whitespace-nowrap">1951-1970</button>
                <button class="px-6 py-2 bg-gray-100 hover:bg-gray-200 rounded-full whitespace-nowrap">1971-1990</button>
                <button class="px-6 py-2 bg-gray-100 hover:bg-gray-200 rounded-full whitespace-nowrap">1991-2010</button>
                <button class="px-6 py-2 bg-gray-100 hover:bg-gray-200 rounded-full whitespace-nowrap">2011-2025</button>
            </div>
        </div>
    </div>

    <!-- Contenu Principal -->
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <h2 class="text-xl font-bold mb-6 border-b pb-2">Explorer par</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Décennie</label>
                            <select class="w-full border rounded-md p-2">
                                <option>Toutes les décennies</option>
                                <option>Années 1930</option>
                                <option>Années 1940</option>
                                <option>Années 1950</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Type de contenu</label>
                            <select class="w-full border rounded-md p-2">
                                <option>Tout le contenu</option>
                                <option>Articles</option>
                                <option>Photos</option>
                                <option>Vidéos</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Thématique</label>
                            <select class="w-full border rounded-md p-2">
                                <option>Toutes les thématiques</option>
                                <option>Vainqueurs</option>
                                <option>Étapes mythiques</option>
                                <option>Innovation</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Stats historiques -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-bold mb-6 border-b pb-2">Chiffres clés</h2>
                    <div class="space-y-4">
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <div class="text-3xl font-bold text-yellow-500 mb-1">95</div>
                            <div class="text-sm text-gray-600">Éditions</div>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <div class="text-3xl font-bold text-yellow-500 mb-1">47</div>
                            <div class="text-sm text-gray-600">Vainqueurs différents</div>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <div class="text-3xl font-bold text-yellow-500 mb-1">15,000+</div>
                            <div class="text-sm text-gray-600">Kilomètres parcourus</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenu Principal -->
            <div class="lg:col-span-3">
                <!-- Moments Clés -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <h2 class="text-2xl font-bold mb-6">Les Moments Qui Ont Façonné l'Histoire</h2>
                    <div class="space-y-8">
                        <!-- Moment 1 -->
                        <?php 
                        foreach($historique as $row) :
                        ?>
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="md:w-1/2">
                                <img src="https://images.pexels.com/photos/5807576/pexels-photo-5807576.jpeg" 
                                    alt="<?php echo htmlspecialchars($row->__get('evenement')); ?>" class="w-full h-64 object-cover rounded-lg">
                            </div>
                            <div class="md:w-1/2">
                                <span class="text-sm text-gray-500"><?php echo htmlspecialchars($row->__get('dateEvenement')); ?></span>
                                <h3 class="text-xl font-bold mb-2"><?php echo htmlspecialchars($row->__get('evenement')); ?></h3>
                                <p class="text-gray-600 mb-4"><?php echo htmlspecialchars($row->__get('description')); ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>

                    </div>
                </div>

                <!-- Galerie Interactive -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <h2 class="text-2xl font-bold mb-6">Galerie Interactive</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="relative group cursor-pointer">
                            <img src="https://static.vecteezy.com/system/resources/previews/028/058/295/non_2x/cyclist-riding-down-the-road-free-photo.jpg" 
                                 alt="Archive 1" class="w-full h-48 object-cover rounded-lg">
                            <div class="absolute inset-0 bg-black bg-opacity-50 group-hover:bg-opacity-70 transition-all rounded-lg flex items-center justify-center opacity-0 group-hover:opacity-100">
                                <i class="fas fa-play text-white text-3xl"></i>
                            </div>
                        </div>
                        <div class="relative group cursor-pointer">
                            <img src="https://images.pexels.com/photos/163491/bike-mountain-mountain-biking-trail-163491.jpeg" 
                                 alt="Archive 2" class="w-full h-48 object-cover rounded-lg">
                            <div class="absolute inset-0 bg-black bg-opacity-50 group-hover:bg-opacity-70 transition-all rounded-lg flex items-center justify-center opacity-0 group-hover:opacity-100">
                                <i class="fas fa-image text-white text-3xl"></i>
                            </div>
                        </div>
                        <div class="relative group cursor-pointer">
                            <img src="https://img.freepik.com/premium-photo/woman-training-time-trial-road-bike-triathlon_641503-126971.jpg" 
                                 alt="Archive 3" class="w-full h-48 object-cover rounded-lg">
                            <div class="absolute inset-0 bg-black bg-opacity-50 group-hover:bg-opacity-70 transition-all rounded-lg flex items-center justify-center opacity-0 group-hover:opacity-100">
                                <i class="fas fa-file-alt text-white text-3xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Témoignages -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h2 class="text-2xl font-bold mb-6">Témoignages des Légendes</h2>
                    <div class="space-y-6">
                        <div class="p-6 bg-gray-50 rounded-xl">
                            <div class="flex items-center gap-4 mb-4">
                                <img src="https://images.pexels.com/photos/1851164/pexels-photo-1851164.jpeg" 
                                     alt="Champion historique" class="w-16 h-16 rounded-full object-cover">
                                <div>
                                    <h3 class="font-bold">Mohamed El Gourch</h3>
                                    <p class="text-gray-600">Vainqueur 1960</p>
                                </div>
                            </div>
                            <p class="text-gray-700 italic">"Le Tour du Maroc a toujours été plus qu'une simple course. C'est une aventure qui traverse l'histoire et la culture de notre pays..."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>