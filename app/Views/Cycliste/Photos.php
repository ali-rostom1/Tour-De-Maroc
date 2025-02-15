<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tour de Morocco 2025 - Cyclist Photos">
    <title>Tour de Morocco 2025 - Photos</title>
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

        .photo-card {
            transition: transform 0.2s;
        }
        
        .photo-card:hover {
            transform: scale(1.02);
        }

        .masonry-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            grid-gap: 1.5rem;
            grid-auto-flow: dense;
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
                    <a href="Cycliste_Dashboard.html" class="flex items-center space-x-2 text-gray-600 hover:bg-gray-100 p-3 rounded-lg">
                        <i class="fas fa-user"></i>
                        <span>Profil</span>
                    </a>
                    <a href="performance.html" class="flex items-center space-x-2 text-gray-600 hover:bg-gray-100 p-3 rounded-lg">
                        <i class="fas fa-chart-line"></i>
                        <span>Performances</span>
                    </a>
                    <a href="Photos.html" class="flex items-center space-x-2 bg-[#FED100] text-black p-3 rounded-lg">
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
            <!-- Header and Upload Section -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold">Mes Photos</h1>
                <button onclick="showUploadModal()" class="bg-[#004D98] text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-upload mr-2"></i>Ajouter des photos
                </button>
            </div>

            <!-- Filters and Search -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <div class="flex flex-wrap gap-4 items-center justify-between">
                    <div class="flex gap-4 items-center">
                        <select class="border rounded-lg px-4 py-2" onchange="filterPhotos()">
                            <option value="all">Toutes les courses</option>
                            <option value="tour2024">Tour de Morocco 2024</option>
                            <option value="circuit">Circuit de Marrakech</option>
                        </select>
                        <select class="border rounded-lg px-4 py-2" onchange="filterPhotos()">
                            <option value="all">Toutes les dates</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                        </select>
                    </div>
                    <div class="relative">
                        <input type="text" placeholder="Rechercher..." 
                               class="border rounded-lg pl-10 pr-4 py-2 w-64"
                               onkeyup="searchPhotos()">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>
            </div>

            <!-- Photo Grid -->
            <div class="masonry-grid">
                <!-- Photo Cards -->
                <div class="photo-card bg-white rounded-lg shadow-sm overflow-hidden">
                    <img src="/api/placeholder/400/300" alt="Race photo" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold">Tour de Morocco 2024</h3>
                        <p class="text-gray-600 text-sm">Étape 3 - Arrivée</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-gray-500 text-sm">15 Avril 2024</span>
                            <div class="flex space-x-2">
                                <button class="text-gray-600 hover:text-blue-600" onclick="downloadPhoto(1)">
                                    <i class="fas fa-download"></i>
                                </button>
                                <button class="text-gray-600 hover:text-red-600" onclick="deletePhoto(1)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="photo-card bg-white rounded-lg shadow-sm overflow-hidden">
                    <img src="/api/placeholder/400/300" alt="Race photo" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold">Circuit de Marrakech</h3>
                        <p class="text-gray-600 text-sm">Podium</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-gray-500 text-sm">20 Mars 2024</span>
                            <div class="flex space-x-2">
                                <button class="text-gray-600 hover:text-blue-600" onclick="downloadPhoto(2)">
                                    <i class="fas fa-download"></i>
                                </button>
                                <button class="text-gray-600 hover:text-red-600" onclick="deletePhoto(2)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="photo-card bg-white rounded-lg shadow-sm overflow-hidden">
                    <img src="/api/placeholder/400/300" alt="Race photo" class="w-full h-56 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold">Tour de Morocco 2024</h3>
                        <p class="text-gray-600 text-sm">Étape 2 - Sprint</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-gray-500 text-sm">14 Avril 2024</span>
                            <div class="flex space-x-2">
                                <button class="text-gray-600 hover:text-blue-600" onclick="downloadPhoto(3)">
                                    <i class="fas fa-download"></i>
                                </button>
                                <button class="text-gray-600 hover:text-red-600" onclick="deletePhoto(3)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add more photo cards here -->
            </div>
        </main>
    </div>

    <!-- Upload Modal -->
    <div id="uploadModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-8 max-w-2xl w-full">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Ajouter des Photos</h2>
                <button onclick="hideUploadModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center mb-6">
                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-600">Glissez vos photos ici ou</p>
                <button class="text-blue-600 hover:underline">parcourez vos fichiers</button>
                <input type="file" class="hidden" multiple accept="image/*">
            </div>
            <div class="flex justify-end space-x-4">
                <button onclick="hideUploadModal()" class="px-4 py-2 text-gray-600 hover:text-gray-800">
                    Annuler
                </button>
                <button onclick="uploadPhotos()" class="bg-[#004D98] text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Télécharger
                </button>
            </div>
        </div>
    </div>

    <script>
        function showUploadModal() {
            document.getElementById('uploadModal').classList.remove('hidden');
        }

        function hideUploadModal() {
            document.getElementById('uploadModal').classList.add('hidden');
        }

        function uploadPhotos() {
            // Implement photo upload functionality
            alert('Fonctionnalité de téléchargement à implémenter');
            hideUploadModal();
        }

        function downloadPhoto(id) {
            // Implement photo download functionality
            alert('Téléchargement de la photo ' + id);
        }

        function deletePhoto(id) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cette photo ?')) {
                // Implement photo deletion functionality
                alert('Suppression de la photo ' + id);
            }
        }

        function filterPhotos() {
            // Implement photo filtering functionality
            console.log('Filtering photos...');
        }

        function searchPhotos() {
            // Implement photo search functionality
            console.log('Searching photos...');
        }
    </script>
</body>
</html>