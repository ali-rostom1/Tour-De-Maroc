<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tour de Morocco 2025 - Découvrez le parcours officiel de la plus grande course cycliste du Maroc">
    <title>Tour de Morocco 2025 - Parcours Officiel</title>
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
        
        /* Custom scrollbar for webkit browsers */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        
        /* Hide scrollbar for Firefox */
        .scrollbar-hide {
            scrollbar-width: none;
        }
        
        /* Smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }
        
        /* Fade-in animation for hero content */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .hero-content {
            animation: fadeIn 1s ease-out;
        }
    </style>
</head>
<body class="overflow-x-hidden">
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
                <a href="Page_Histoire.html" class="hover:text-yellow-400 transition-colors duration-200 uppercase">Histoire</a>
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
<div class="relative h-[80vh] overflow-hidden">
    <!-- Background Image with Lazy Loading -->
    <div class="absolute inset-0">
        <img src="https://cdn.skoda-storyboard.com/2022/05/H5.jpg" alt="Tour de Morocco cyclists" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/30"></div>
    </div>

    <!-- Hero Content -->
    <div class="relative container mx-auto px-4 pt-20 hero-content">
        <h1 class="text-white text-4xl md:text-6xl font-bold max-w-3xl leading-tight mb-8">
            Découvrez le Parcours du Tour de Morocco 2025
        </h1>
        <button class="bg-tour-yellow text-black px-8 py-3 font-bold hover:bg-yellow-400 transition-all duration-200 transform hover:-translate-y-1 rounded-lg flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Voir la Vidéo
        </button>
    </div>



    <!-- Results Widget -->
    <div class="absolute top-4 right-4 bg-white/95 p-4 rounded-lg shadow-xl backdrop-blur-sm">
        <h3 class="text-xl font-bold mb-4 border-b pb-2">Palmarès 2024</h3>
        <div class="space-y-4">
            <div class="flex items-center gap-4 hover:bg-gray-50 p-2 rounded-lg transition-colors">
                <img src="https://img.aso.fr/core_app/img-cycling-tdf-png/111/55968/0:0,400:400-400-0-50/6503d" alt="Yellow jersey" class="h-12 w-12 object-cover rounded">
                <div>
                    <div class="font-bold text-lg">T. POGACAR</div>
                    <div class="text-gray-600">83h 38' 56"</div>
                </div>
                
            </div>
        </div>
        <div class="space-y-4">
            <div class="flex items-center gap-4 hover:bg-gray-50 p-2 rounded-lg transition-colors">
                <img src="https://img.aso.fr/core_app/img-cycling-tdf-png/71/56045/0:0,400:400-400-0-50/6ae79" alt="Yellow jersey" class="h-12 w-12 object-cover rounded">
                <div>
                    <div class="font-bold text-lg">T. POGACAR</div>
                    <div class="text-gray-600">83h 38' 56"</div>
                </div>
                
            </div>
        </div><div class="space-y-4">
            <div class="flex items-center gap-4 hover:bg-gray-50 p-2 rounded-lg transition-colors">
                <img src="https://img.aso.fr/core_app/img-cycling-tdf-png/11/56077/0:0,400:400-400-0-50/90e0d" alt="Yellow jersey" class="h-12 w-12 object-cover rounded">
                <div>
                    <div class="font-bold text-lg">T. POGACAR</div>
                    <div class="text-gray-600">83h 38' 56"</div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 py-8">
    <!-- Section Vidéos -->
    <section class="mb-12" aria-labelledby="videos-title">
        <div class="flex justify-between items-center mb-6">
            <h2 id="videos-title" class="text-3xl font-bold italic">VIDÉOS À LA UNE</h2>
            <a href="#" class="text-gray-600 hover:text-black flex items-center transition-colors duration-200" aria-label="Voir toutes les vidéos">
                <span>VOIR TOUT</span>
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Carte Vidéo 1 -->
            <article class="group relative overflow-hidden rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105">
                <img src="https://t3.ftcdn.net/jpg/04/05/78/16/360_F_405781638_mTCf6NNcMafERrfpVlhLgfMG0FjVOyV0.jpg" alt="Parcours Officiel du Tour de France 2025" class="w-full h-64 object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                <div class="absolute bottom-0 p-4 text-white w-full">
                    <div class="bg-yellow-400 text-black inline-block px-2 py-1 text-sm mb-2 rounded">#TDF2025</div>
                    <h3 class="text-xl font-bold mb-1">LE PARCOURS OFFICIEL</h3>
                    <p class="text-sm font-medium">THE OFFICIAL ROUTE</p>
                </div>
            </article>

            <!-- Carte Vidéo 2 -->
            <article class="group relative overflow-hidden rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105">
                <img src="https://static.vecteezy.com/system/resources/previews/028/058/295/non_2x/cyclist-riding-down-the-road-free-photo.jpg" alt="Meilleurs moments du Tour de France 2024" class="w-full h-64 object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                <div class="absolute bottom-0 p-4 text-white w-full">
                    <div class="bg-yellow-400 text-black inline-block px-2 py-1 text-sm mb-2 rounded">#TDF2025</div>
                    <h3 class="text-xl font-bold">BEST OF 2024</h3>
                </div>
            </article>

            <!-- Carte Vidéo 3 -->
            <article class="group relative overflow-hidden rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105">
                <img src="https://img.freepik.com/premium-photo/man-riding-bike-down-road-with-mountains-background_1000124-260222.jpg" alt="L'étape du Mont Ventoux" class="w-full h-64 object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                <div class="absolute bottom-0 p-4 text-white w-full">
                    <div class="bg-yellow-400 text-black inline-block px-2 py-1 text-sm mb-2 rounded">#TDF2025</div>
                    <h3 class="text-xl font-bold">LE MONT VENTOUX</h3>
                </div>
            </article>
        </div>
    </section>

    <!-- Section Parcours et Classements -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Section Parcours -->
        <section class="lg:col-span-2" aria-labelledby="route-title">
            <h2 id="route-title" class="text-3xl font-bold italic mb-6">PARCOURS</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="group relative overflow-hidden rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105">
                    <img src="https://img.freepik.com/premium-photo/cyclist-road-with-cloudy-sky-background_853115-1082.jpg?w=360" alt="Étape 1 du parcours" class="w-full h-48 object-cover">
                </div>
                <div class="group relative overflow-hidden rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105">
                    <img src="https://img.freepik.com/premium-photo/cyclist-rides-background-nature_982153-138.jpg" alt="Étape 2 du parcours" class="w-full h-48 object-cover">
                </div>
                <div class="group relative overflow-hidden rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105">
                    <img src="https://img.freepik.com/premium-photo/early-morning-asian-men-ride-road-bikes_28914-46661.jpg" alt="Étape 3 du parcours" class="w-full h-48 object-cover">
                </div>
            </div>
        </section>

        <!-- Section Classements -->
        <section class="bg-white p-6 rounded-lg shadow-lg" aria-labelledby="rankings-title">
            <h2 id="rankings-title" class="text-2xl font-bold mb-6">CLASSEMENT GÉNÉRAL</h2>
            <div class="space-y-6">
                <!-- Classement 1 -->
                <article class="flex items-center space-x-4 p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                    <span class="text-xl font-bold w-8 text-yellow-400">1</span>
                    <span class="w-8 text-2xl" role="img" aria-label="Drapeau Slovénie">🇸🇮</span>
                    <div class="flex-1">
                        <h3 class="font-bold text-lg">Tadej POGACAR</h3>
                        <p class="text-sm text-gray-600">UAE TEAM EMIRATES</p>
                        <p class="text-sm font-medium">83h 38' 56"</p>
                    </div>
                </article>

                <!-- Classement 2 -->
                <article class="flex items-center space-x-4 p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                    <span class="text-xl font-bold w-8">2</span>
                    <span class="w-8 text-2xl" role="img" aria-label="Drapeau Danemark">🇩🇰</span>
                    <div class="flex-1">
                        <h3 class="font-bold text-lg">Jonas VINGEGAARD</h3>
                        <p class="text-sm text-gray-600">TEAM VISMA | LEASE A BIKE</p>
                        <p class="text-sm text-gray-600">+ 00h 06' 17"</p>
                    </div>
                </article>
            </div>
        </section>
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
    // Mobile menu toggle
    const menuButton = document.querySelector('[aria-label="Toggle menu"]');
    const mobileMenu = document.createElement('div');
    mobileMenu.className = 'fixed inset-0 bg-black/90 z-40 transform translate-x-full transition-transform duration-300 md:hidden';
    document.body.appendChild(mobileMenu);

    menuButton.addEventListener('click', () => {
        const isExpanded = menuButton.getAttribute('aria-expanded') === 'true';
        menuButton.setAttribute('aria-expanded', !isExpanded);
        mobileMenu.style.transform = isExpanded ? 'translateX(100%)' : 'translateX(0)';
    });

    // Intersection Observer for navbar
    const navbar = document.querySelector('nav.sticky');
    const observer = new IntersectionObserver(
        ([e]) => navbar.classList.toggle('shadow-lg', e.intersectionRatio < 1),
        { threshold: [1] }
    );
    observer.observe(navbar);
</script>
</body>
</html>