<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Tour de France</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap');
        
        body {
            font-family: 'Roboto Condensed', sans-serif;
            background-image: url('data:image/svg+xml,%3Csvg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z" fill="%23yellow" fill-opacity="0.05" fill-rule="evenodd"/%3E%3C/svg%3E');
        }

        .toggle-password {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>
<body>
    
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
    
 
<div class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-xl shadow-lg max-w-md w-full border border-gray-100">
        <!-- Logo -->
        <div class="flex justify-center mb-8">
            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100' width='64' height='64'%3E%3Ccircle cx='50' cy='50' r='45' fill='%23FFD700'/%3E%3Cpath d='M30 50 A20 20 0 0 1 70 50' stroke='black' stroke-width='8' fill='none'/%3E%3C/svg%3E" 
                 alt="Tour de France" class="w-16 h-16">
        </div>

        <h1 class="text-3xl font-bold text-center mb-2">CONNEXION</h1>
        <p class="text-gray-600 text-center mb-8">Bienvenue sur le Tour de Marocco</p>
        
        <!-- Social Login Buttons -->
        <div class="flex justify-center gap-4 mb-8">
            <button class="social-btn w-12 h-12 flex items-center justify-center rounded-lg bg-[#1877F2] text-white hover:bg-[#1864D6] transition-all duration-300">
                <i class="fab fa-facebook-f text-xl"></i>
            </button>
            <button class="social-btn w-12 h-12 flex items-center justify-center rounded-lg border border-gray-300 hover:bg-gray-50 transition-all duration-300">
                <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA0OCA0OCI+PHBhdGggZmlsbD0iIzRjYWY1MCIgZD0iTTQ1LDI0YzAsMTEuNy05LjUsMjEtMjEsMjFTMywzNS43LDMsMjRTMTIuMywzLDI0LDNTNDUsMTIuMyw0NSwyNHoiLz48cGF0aCBmaWxsPSIjZmZmIiBkPSJNMjAuMSwzMy45bC0xMS4yLTcuMmwxLjctMi42bDkuNSw2LjFMMzUuNywxNGwyLjEsMi4zbC0xNy43LDE3LjZMMjAuMSwzMy45eiIvPjwvc3ZnPg==" alt="Google" class="w-6 h-6">
            </button>
            <button class="social-btn w-12 h-12 flex items-center justify-center rounded-lg bg-black text-white hover:bg-gray-800 transition-all duration-300">
                <i class="fab fa-apple text-xl"></i>
            </button>
        </div>

        <!-- Divider -->
        <div class="flex items-center justify-center gap-4 mb-8">
            <div class="h-px bg-gray-200 flex-grow"></div>
            <span class="text-gray-500 text-sm px-4">ou continuez avec</span>
            <div class="h-px bg-gray-200 flex-grow"></div>
        </div>

        <!-- Login Form -->
        <form action="/tour-de-maroc/auth/login" method="POST" class="space-y-6" novalidate>
            <div class="space-y-1">
                <label for="email" class="block text-sm font-medium text-gray-700">Adresse électronique ou numéro de téléphone</label>
                <div class="relative">
                    <input 
                        type="email" 
                        name="email" 
                        id="email"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-colors"
                        placeholder="exemple@email.com"
                        required
                    >
                </div>
                <p class="text-red-500 text-sm hidden">Ce champ doit obligatoirement être rempli</p>
            </div>

            <div class="space-y-1">
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <div class="relative">
                    <input 
                        type="password" 
                        name="password" 
                        id="password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-colors"
                        placeholder="••••••••"
                        required
                    >
                    <button type="button" class="toggle-password text-gray-500 hover:text-gray-700" onclick="togglePassword()">
                        <i class="far fa-eye"></i>
                    </button>
                </div>
                <p class="text-red-500 text-sm hidden">Ce champ doit obligatoirement être rempli</p>
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center space-x-2 cursor-pointer">
                    <input 
                        type="checkbox" 
                        id="remember" 
                        class="w-4 h-4 border-gray-300 rounded text-yellow-400 focus:ring-yellow-400 cursor-pointer"
                    >
                    <span class="text-sm text-gray-700">Se souvenir de moi</span>
                </label>
                <a href="/tour-de-maroc/home/resetpassword" class="text-sm text-yellow-600 hover:text-yellow-500 hover:underline">Mot de passe oublié ?</a>
            </div>

            <button 
                type="submit" 
                class="w-full bg-yellow-400 text-black py-3 rounded-lg font-bold hover:bg-yellow-500 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400"
            >
                CONNEXION
            </button>
        </form>

        <!-- Footer Links -->
        <div class="mt-8 text-center space-y-2">
            <p class="text-gray-600">
                Vous n'avez pas encore de compte ? 
                <a href="/tour-de-maroc/home/register" class="text-yellow-600 hover:text-yellow-500 hover:underline font-medium">Inscription</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>