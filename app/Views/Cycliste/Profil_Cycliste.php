<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tadej Pogačar - Profil Cycliste | Tour de Morocco 2025</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <nav class="bg-[#333333] text-white py-2 px-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Left Side -->
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
            
            <!-- Right Side -->
            <div class="flex items-center space-x-6">
                <div class="hidden md:flex space-x-4">
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-200 uppercase">Tour Opérateurs</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-200 uppercase">Montour</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-200 uppercase">VIP</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-200 uppercase">Magasins</a>
                </div>
                <a href="Login.html">
                <button class="bg-white text-black px-6 py-2 rounded hover:bg-tour-yellow transition-all duration-200 transform hover:-translate-y-0.5">
                    Je me connecte
                </button></a>
            </div>
        </div>
    </nav>
    
    <!-- Section Héro avec Photo -->
    <div class="relative h-[70vh] overflow-hidden">
        <div class="absolute inset-0">
            <img src="triahtlon-athlete-man-drinking-water-260nw-1409195090_LE_upscale_balanced_x4.jpg" alt="Tadej Pogačar en action" class="w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
        </div>
        
        <!-- Info Principal -->
        <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
            <div class="container mx-auto">
                <div class="flex items-end gap-6">
                    <img src="<?php echo $cycliste->img;?>" alt="Tadej Pogačar portrait" class="w-32 h-32 rounded-full border-4 border-white shadow-lg">
                    <div>
                        <div class="flex items-center gap-4 mb-2">
                            <span class="text-2xl">TM</span>
                            <span class="bg-yellow-400 text-black px-3 py-1 rounded-full text-sm font-bold">
                                <?php echo $cycliste->id; ?> MONDIAL
                            </span>
                        </div>
                        <h1 class="text-4xl font-bold mb-2"><?php echo $cycliste->name ?></h1>
                        <p class="text-xl opacity-90"><?php echo $cycliste->nationalite;?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenu Principal -->
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Colonne de Gauche -->
            <div class="lg:col-span-1">
                <!-- Carte Informations -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <h2 class="text-xl font-bold mb-6 border-b pb-2">Informations</h2>
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <i class="fas fa-calendar-alt w-6 text-gray-500"></i>
                            <div>
                                <p class="text-sm text-gray-600">Date de naissance</p>
                                <p class="font-medium"><?php echo $cycliste->dateNaissance;?></p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <i class="fas fa-map-marker-alt w-6 text-gray-500"></i>
                            <div>
                                <p class="text-sm text-gray-600">Lieu de naissance</p>
                                <p class="font-medium"><?php echo $cycliste->nationalite;?></p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <i class="fas fa-weight w-6 text-gray-500"></i>
                            <div>
                                <p class="text-sm text-gray-600">Poids</p>
                                <p class="font-medium"><?php echo $cycliste->poids;?></p>
                            </div>
                        </div>
                    </div>
                </div>

            
            </div>

            <!-- Colonne Principale -->
            <div class="lg:col-span-2">
                <!-- Biographie -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <h2 class="text-xl font-bold mb-6">Biographie</h2>
                    <div class="prose max-w-none">
                        <p class="mb-4"><?php echo $cycliste->biographie;?></p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>