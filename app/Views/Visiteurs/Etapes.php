<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tour de Morocco 2025 - Calendrier détaillé des étapes">
    <title>Tour de Morocco 2025 - Les Étapes</title>
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
        
        .bg-tour-blue {
            background-color: var(--tour-blue);
        }
        
        .bg-tour-red {
            background-color: var(--tour-red);
        }
        
        .stage-card {
            transition: all 0.3s ease;
        }
        
        .stage-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }

        .elevation-profile {
            position: relative;
            height: 60px;
            background: linear-gradient(180deg, #f0f0f0 0%, #e0e0e0 100%);
            overflow: hidden;
        }

        .elevation-line {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            path {
                fill: none;
                stroke: #666;
                stroke-width: 2;
            }
        }

        .filter-button.active {
            background-color: var(--tour-yellow);
            color: black;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Top Navigation Bar -->
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

<!-- Mobile Menu Button -->
<button class="md:hidden fixed top-4 right-4 z-50 bg-[#333333] text-white p-2 rounded-lg shadow-lg hover:bg-gray-700 transition-colors" aria-label="Toggle menu" aria-expanded="false">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
</button>

<!-- Main Navigation -->
<nav class="bg-white shadow-md sticky top-0 z-40">
    <div class="container mx-auto flex flex-wrap justify-between items-center py-2 px-4">
        <div class="flex items-center space-x-8 overflow-x-auto scrollbar-hide">
            <a href="#" class="text-lg font-bold hover:text-yellow-600 transition-colors duration-200 whitespace-nowrap border-b-2 border-transparent hover:border-yellow-600">Parcours 2025</a>
            <a href="#" class="text-lg hover:text-yellow-600 transition-colors duration-200 whitespace-nowrap border-b-2 border-transparent hover:border-yellow-600">Édition 2024</a>
            <a href="#" class="text-lg hover:text-yellow-600 transition-colors duration-200 whitespace-nowrap border-b-2 border-transparent hover:border-yellow-600">Grands Départs</a>
            <a href="#" class="text-lg hover:text-yellow-600 transition-colors duration-200 whitespace-nowrap border-b-2 border-transparent hover:border-yellow-600">Culture Tour</a>
            <a href="Highlights.html" class="text-lg hover:text-yellow-600 transition-colors duration-200 whitespace-nowrap border-b-2 border-transparent hover:border-yellow-600">Vidéos</a>
        </div>
        
        <div class="flex items-center space-x-8">
            <a href="#" class="text-lg hover:text-yellow-600 transition-colors duration-200">Morocco</a>
            <a href="#" class="text-lg bg-tour-yellow px-6 py-2 hover:bg-yellow-500 transition-all duration-200 rounded-lg transform hover:-translate-y-0.5 font-bold">CLUB</a>
            <div class="flex items-center">
                <span class="mr-2 font-bold">TM</span>
                <img src="https://www.locmarrakech.com/tourisme/wp-content/uploads/2024/06/Maroc.jpeg" alt="Morocco flag" class="h-4 w-6" loading="lazy">
            </div>
            
            <!-- Search Form -->
            <form class="relative flex items-center">
                <input 
                    type="search" 
                    placeholder="Rechercher..." 
                    class="pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:border-yellow-600 transition-colors duration-200"
                >
                <button 
                    type="submit" 
                    class="absolute left-3 hover:text-yellow-600 transition-colors duration-200"
                    aria-label="Search"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</nav>

    <!-- Hero Section -->
    <div class="relative h-[40vh] overflow-hidden">
        <img src="https://images2.giant-bicycles.com/b_white%2Cc_crop%2Ch_600%2Cq_70%2Cw_1920/j7erhuxkw9ammp33xnes/Road_desktop.jpg" alt="Tour de Morocco landscape" class="w-full h-full object-cover"/>
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/30">
            <div class="container mx-auto h-full flex items-center px-4">
                <div class="text-white">
                    <h1 class="text-5xl font-bold mb-4">Les Étapes 2025</h1>
                    <p class="text-xl">21 étapes, 3,415 kilomètres, 1 grande aventure</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <!-- Interactive Map Section -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h2 class="text-2xl font-bold mb-4">Le vélo c'est comme la vie, pour garder l'équilibre il faut continuer à bouger.</h2>
            <div class="aspect-[32/9] bg-gray-200 rounded-lg overflow-hidden">
                <img src="triahtlon-athlete-man-drinking-water-260nw-1409195090_LE_upscale_balanced_x4.jpg" alt="Carte du Tour de Morocco" class="w-full h-full object-cover"/>
            </div>
        </div>

        <!-- Filters -->
        <div class="mb-8 flex flex-wrap gap-4">
            <button class="filter-button px-6 py-2 rounded-full bg-gray-200 hover:bg-tour-yellow transition-colors active">
                Toutes les étapes
            </button>
            <button class="filter-button px-6 py-2 rounded-full bg-gray-200 hover:bg-tour-yellow transition-colors">
                Étapes de plaine
            </button>
            <button class="filter-button px-6 py-2 rounded-full bg-gray-200 hover:bg-tour-yellow transition-colors">
                Étapes de montagne
            </button>
            <button class="filter-button px-6 py-2 rounded-full bg-gray-200 hover:bg-tour-yellow transition-colors">
                Contre-la-montre
            </button>
        </div>

        <!-- Stage Cards Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Stage 1 -->
            <div class="stage-card bg-white rounded-lg overflow-hidden shadow-lg">
                <div class="relative">
                    <img src="https://img.freepik.com/premium-photo/group-cyclists-racing-down-road-with-sun-them_862994-406078.jpg" alt="Étape 1" class="w-full h-48 object-cover"/>
                    <div class="absolute top-4 left-4 bg-tour-yellow px-4 py-2 rounded-full font-bold">
                        ÉTAPE 1
                    </div>
                    <div class="absolute bottom-4 right-4 bg-white/90 px-4 py-2 rounded-full">
                        1 JUILLET 2025
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-2xl font-bold">Casablanca → Rabat</h3>
                        <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">182 km</span>
                    </div>
                    <div class="mb-4 elevation-profile rounded">
                        <svg viewBox="0 0 400 60" class="elevation-line">
                            <path d="M0,50 Q100,45 200,30 T400,40" stroke="#666" fill="none"/>
                        </svg>
                    </div>
                    <div class="grid grid-cols-3 gap-4 mb-6">
                        <div class="text-center">
                            <div class="text-sm text-gray-600">Dénivelé</div>
                            <div class="font-bold">+1200m</div>
                        </div>
                        <div class="text-center">
                            <div class="text-sm text-gray-600">Départ</div>
                            <div class="font-bold">12:00</div>
                        </div>
                        <div class="text-center">
                            <div class="text-sm text-gray-600">Difficulté</div>
                            <div class="font-bold">⭐⭐</div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <button class="bg-tour-blue text-white px-6 py-2 rounded hover:bg-blue-700 transition-colors">
                            Détails de l'étape
                        </button>
                        <button class="text-tour-blue hover:text-blue-700 transition-colors">
                            <i class="fas fa-bookmark"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stage 2 -->
            <div class="stage-card bg-white rounded-lg overflow-hidden shadow-lg">
                <div class="relative">
                    <img src="https://img.freepik.com/premium-photo/group-cyclists-are-riding-down-road-with-sun-setting-them_862994-406071.jpg" alt="Étape 2" class="w-full h-48 object-cover"/>
                    <div class="absolute top-4 left-4 bg-tour-yellow px-4 py-2 rounded-full font-bold">
                        ÉTAPE 2
                    </div>
                    <div class="absolute bottom-4 right-4 bg-white/90 px-4 py-2 rounded-full">
                        2 JUILLET 2025
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-2xl font-bold">Fès → Meknès</h3>
                        <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">165 km</span>
                    </div>
                    <div class="mb-4 elevation-profile rounded">
                        <svg viewBox="0 0 400 60" class="elevation-line">
                            <path d="M0,30 Q100,20 200,50 T400,25" stroke="#666" fill="none"/>
                        </svg>
                    </div>
                    <div class="grid grid-cols-3 gap-4 mb-6">
                        <div class="text-center">
                            <div class="text-sm text-gray-600">Dénivelé</div>
                            <div class="font-bold">+2100m</div>
                        </div>
                        <div class="text-center">
                            <div class="text-sm text-gray-600">Départ</div>
                            <div class="font-bold">11:30</div>
                        </div>
                        <div class="text-center">
                            <div class="text-sm text-gray-600">Difficulté</div>
                            <div class="font-bold">⭐⭐⭐⭐</div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <button class="bg-tour-blue text-white px-6 py-2 rounded hover:bg-blue-700 transition-colors">
                            Détails de l'étape
                        </button>
                        <button class="text-tour-blue hover:text-blue-700 transition-colors">
                            <i class="fas fa-bookmark"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="mt-16 bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold mb-8 text-center">Le Tour 2025 en Chiffres</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center p-4 rounded-lg bg-gray-50">
                    <div class="text-4xl font-bold text-tour-blue mb-2">21</div>
                    <div class="text-gray-600">Étapes</div>
                </div>
                <div class="text-center p-4 rounded-lg bg-gray-50">
                    <div class="text-4xl font-bold text-tour-red mb-2">3,415</div>
                    <div class="text-gray-600">Kilomètres</div>
                </div>
                <div class="text-center p-4 rounded-lg bg-gray-50">
                    <div class="text-4xl font-bold text-tour-yellow mb-2">4</div>
                    <div class="text-gray-600">Arrivées en altitude</div>
                </div>
                <div class="text-center p-4 rounded-lg bg-gray-50">
                    <div class="text-4xl font-bold text-green-600 mb-2">2</div>
                    <div class="text-gray-600">Contre-la-montre</div>
                </div>
            </div>
        </div>
    </div>

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
                        <li><a href="#" class="hover:text-tour-yellow transition-colors">Parcours</a></li>
                        <li><a href="#" class="hover:text-tour-yellow transition-colors">Équipes</a></li>
                        <li><a href="#" class="hover:text-tour-yellow transition-colors">Actualités</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Suivez-nous</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="hover:text-tour-yellow transition-colors"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="hover:text-tour-yellow transition-colors"><i class="fab fa-twitter"></i></a><a href="#" class="hover:text-tour-yellow transition-colors"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="hover:text-tour-yellow transition-colors"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-sm text-gray-400">
                <p>&copy; 2025 Tour de Morocco. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        // Filter buttons functionality
        const filterButtons = document.querySelectorAll('.filter-button');
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
            });
        });

        // Stage cards animation
        const stageCards = document.querySelectorAll('.stage-card');
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        stageCards.forEach(card => {
            observer.observe(card);
        });
    </script>
</body>
</html>