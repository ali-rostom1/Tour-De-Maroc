<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tour de Morocco 2025 - Admin Dashboard">
    <title>Tour de Morocco 2025 - Admin Dashboard</title>
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
                <span class="text-xl">| Admin Dashboard</span>
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-sm">Admin</span>
                <img src="/api/placeholder/40/40" alt="Admin profile" class="w-10 h-10 rounded-full">
            </div>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white h-screen shadow-lg">
            <nav class="p-4">
                <div class="space-y-4">
                    <a href="#" class="flex items-center space-x-2 bg-[#FED100] text-black p-3 rounded-lg">
                        <i class="fas fa-home"></i>
                        <span>Vue d'ensemble</span>
                    </a>
                    <a href="#" class="flex items-center space-x-2 text-gray-600 hover:bg-gray-100 p-3 rounded-lg">
                        <i class="fas fa-users"></i>
                        <span>Utilisateurs</span>
                    </a>
                    <a href="#" class="flex items-center space-x-2 text-gray-600 hover:bg-gray-100 p-3 rounded-lg">
                        <i class="fas fa-bicycle"></i>
                        <span>Étapes</span>
                    </a>
                    <a href="#" class="flex items-center space-x-2 text-gray-600 hover:bg-gray-100 p-3 rounded-lg">
                        <i class="fas fa-trophy"></i>
                        <span>Classements</span>
                    </a>
                    <a href="#" class="flex items-center space-x-2 text-gray-600 hover:bg-gray-100 p-3 rounded-lg">
                        <i class="fas fa-video"></i>
                        <span>Médias</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-8">Vue d'ensemble</h1>
            
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Utilisateurs actifs</p>
                            <h3 class="text-2xl font-bold">2,451</h3>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-users text-blue-500"></i>
                        </div>
                    </div>
                    <p class="text-green-500 text-sm mt-2">+15.3% cette semaine</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Pages vues</p>
                            <h3 class="text-2xl font-bold">12,325</h3>
                        </div>
                        <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-eye text-yellow-500"></i>
                        </div>
                    </div>
                    <p class="text-green-500 text-sm mt-2">+7.8% cette semaine</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Commentaires</p>
                            <h3 class="text-2xl font-bold">876</h3>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-comments text-green-500"></i>
                        </div>
                    </div>
                    <p class="text-red-500 text-sm mt-2">-2.1% cette semaine</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Médias partagés</p>
                            <h3 class="text-2xl font-bold">234</h3>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-photo-video text-purple-500"></i>
                        </div>
                    </div>
                    <p class="text-green-500 text-sm mt-2">+12.4% cette semaine</p>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-bold mb-4">Activités récentes</h2>
                <div class="space-y-4">
                    <div class="flex items-center space-x-4 p-4 hover:bg-gray-50 rounded-lg">
                        <img src="/api/placeholder/40/40" alt="User avatar" class="w-10 h-10 rounded-full">
                        <div class="flex-1">
                            <p class="text-sm"><span class="font-bold">Jean Dupont</span> a commenté l'étape 3</p>
                            <p class="text-gray-500 text-sm">Il y a 5 minutes</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4 p-4 hover:bg-gray-50 rounded-lg">
                        <img src="/api/placeholder/40/40" alt="User avatar" class="w-10 h-10 rounded-full">
                        <div class="flex-1">
                            <p class="text-sm"><span class="font-bold">Marie Martin</span> a partagé une photo</p>
                            <p class="text-gray-500 text-sm">Il y a 12 minutes</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4 p-4 hover:bg-gray-50 rounded-lg">
                        <img src="/api/placeholder/40/40" alt="User avatar" class="w-10 h-10 rounded-full">
                        <div class="flex-1">
                            <p class="text-sm"><span class="font-bold">Pierre Dubois</span> s'est inscrit au Club TM</p>
                            <p class="text-gray-500 text-sm">Il y a 25 minutes</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>