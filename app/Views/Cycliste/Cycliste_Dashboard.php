<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tour de Morocco 2025 - Cyclist Profile">
    <title>Tour de Morocco 2025 - Profile</title>
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

        .achievement-card {
            transition: transform 0.2s;
        }
        
        .achievement-card:hover {
            transform: translateY(-5px);
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
                    <a href="Cycliste_Dashboard.html" class="flex items-center space-x-2 bg-[#FED100] text-black p-3 rounded-lg">
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
                    <a href="Parametres.html" class="flex items-center space-x-2 text-gray-600 hover:bg-gray-100 p-3 rounded-lg">
                        <i class="fas fa-cog"></i>
                        <span>Paramètres</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-8">Mon Profil</h1>
            
            <!-- Personal Info Card -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <div class="flex items-start space-x-6">
                    <div class="relative">
                        <img src="/api/placeholder/150/150" alt="Profile picture" class="w-32 h-32 rounded-lg object-cover">
                        <button class="absolute bottom-2 right-2 bg-[#FED100] p-2 rounded-full hover:bg-yellow-400 transition-colors" onclick="uploadPhoto()">
                            <i class="fas fa-camera"></i>
                        </button>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-2xl font-bold">Mohammed Amine</h2>
                                <p class="text-gray-600">Team Atlas</p>
                                <p class="mt-2"><i class="fas fa-envelope mr-2"></i>mohammed.amine@email.com</p>
                                <p><i class="fas fa-phone mr-2"></i>+212 6XX-XXXXXX</p>
                            </div>
                            <button onclick="editProfile()" class="bg-[#004D98] text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                <i class="fas fa-edit mr-2"></i>Modifier
                            </button>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mt-6">
                            <div>
                                <p class="text-gray-600">Nationalité</p>
                                <p class="font-bold">Marocain</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Date de naissance</p>
                                <p class="font-bold">15/03/1995</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Âge</p>
                                <p class="font-bold">28 ans</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Poids</p>
                                <p class="font-bold">68 kg</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Taille</p>
                                <p class="font-bold">178 cm</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Spécialité</p>
                                <p class="font-bold">Grimpeur</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Achievements Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="achievement-card bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center space-x-4">
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-medal text-[#004D98] text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">15</h3>
                            <p class="text-gray-600">Victoires</p>
                        </div>
                    </div>
                </div>
                <div class="achievement-card bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center space-x-4">
                        <div class="bg-yellow-100 p-3 rounded-full">
                            <i class="fas fa-trophy text-[#FED100] text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">3</h3>
                            <p class="text-gray-600">Championnats</p>
                        </div>
                    </div>
                </div>
                <div class="achievement-card bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center space-x-4">
                        <div class="bg-red-100 p-3 rounded-full">
                            <i class="fas fa-star text-[#C8102E] text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">1250</h3>
                            <p class="text-gray-600">Points UCI</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Photos -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold">Photos Récentes</h2>
                    <button class="text-[#004D98] hover:underline">Voir tout</button>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <img src="/api/placeholder/200/200" alt="Race photo 1" class="w-full h-48 object-cover rounded-lg">
                    <img src="/api/placeholder/200/200" alt="Race photo 2" class="w-full h-48 object-cover rounded-lg">
                    <img src="/api/placeholder/200/200" alt="Race photo 3" class="w-full h-48 object-cover rounded-lg">
                    <img src="/api/placeholder/200/200" alt="Race photo 4" class="w-full h-48 object-cover rounded-lg">
                </div>
            </div>

            <!-- Recent Races -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold">Courses Récentes</h2>
                    <button class="text-[#004D98] hover:underline">Voir tout</button>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 hover:bg-gray-50 rounded-lg">
                        <div>
                            <h3 class="font-bold">Tour de Morocco 2024</h3>
                            <p class="text-gray-600">Étape 3</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-[#004D98]">2ème place</p>
                            <p class="text-gray-500">15 Avril 2024</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-4 hover:bg-gray-50 rounded-lg">
                        <div>
                            <h3 class="font-bold">Circuit de Marrakech</h3>
                            <p class="text-gray-600">Final</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-[#C8102E]">1ère place</p>
                            <p class="text-gray-500">20 Mars 2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function uploadPhoto() {
            // Implement photo upload functionality
            alert('Fonctionnalité de téléchargement de photo à implémenter');
        }

        function editProfile() {
            // Show edit profile modal/form
            alert('Formulaire de modification du profil à implémenter');
        }
    </script>

    <!-- Edit Profile Modal (hidden by default) -->
    <div id="editProfileModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-8 max-w-2xl w-full">
            <h2 class="text-2xl font-bold mb-6">Modifier le Profil</h2>
            <form id="profileForm" class="space-y-4">
                <!-- Form fields will be added here -->
            </form>
        </div>
    </div>
</body>
</html>