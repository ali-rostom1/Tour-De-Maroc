<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tour de Morocco 2025 - Étapes">
    <title>Tour de Morocco 2025 - Étapes</title>
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
                    <a href="Admin_Dashboard.php" class="flex items-center space-x-2 text-gray-600 hover:bg-gray-100 p-3 rounded-lg">
                        <i class="fas fa-home"></i>
                        <span>Vue d'ensemble</span>
                    </a>
                    <a href="Utilisateurs.php" class="flex items-center space-x-2 text-gray-600 hover:bg-gray-100 p-3 rounded-lg">
                        <i class="fas fa-users"></i>
                        <span>Utilisateurs</span>
                    </a>
                    <a href="Etapes.php" class="flex items-center space-x-2 bg-[#FED100] text-black p-3 rounded-lg">
                        <i class="fas fa-bicycle"></i>
                        <span>Étapes</span>
                    </a>
                    <a href="Classements.php" class="flex items-center space-x-2 text-gray-600 hover:bg-gray-100 p-3 rounded-lg">
                        <i class="fas fa-trophy"></i>
                        <span>Classements</span>
                    </a>
                    <a href="Category.php" class="flex items-center space-x-2 text-gray-600 hover:bg-gray-100 p-3 rounded-lg">
                        <i class="fas fa-tag"></i>
                        <span>Categories</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold">Étapes</h1>
                <button class="bg-[#004D98] text-white px-4 py-2 rounded-lg flex items-center space-x-2">
                    <i class="fas fa-plus"></i>
                    <span>Nouvelle Étape</span>
                </button>
            </div>

            <!-- Stage Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Stage 1 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <span class="text-sm font-semibold text-[#004D98]">Étape 1</span>
                                <h3 class="text-lg font-bold">Casablanca → Rabat</h3>
                            </div>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Plat</span>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-calendar-day w-5 text-gray-400"></i>
                                <span>15 Février 2025</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-route w-5 text-gray-400"></i>
                                <span>180 km</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-mountain w-5 text-gray-400"></i>
                                <span>Dénivelé: +1200m</span>
                            </div>
                        </div>
                    </div>
                    <div class="border-t grid grid-cols-3 divide-x">
                        <button class="p-3 text-sm flex items-center justify-center space-x-1 hover:bg-gray-50">
                            <i class="fas fa-edit text-blue-500"></i>
                            <span>Modifier</span>
                        </button>
                        <button class="p-3 text-sm flex items-center justify-center space-x-1 hover:bg-gray-50">
                            <i class="fas fa-map-marked-alt text-green-500"></i>
                            <span>Parcours</span>
                        </button>
                        <button class="p-3 text-sm flex items-center justify-center space-x-1 hover:bg-gray-50">
                            <i class="fas fa-list text-purple-500"></i>
                            <span>Résultats</span>
                        </button>
                    </div>
                </div>

                <!-- Stage 2 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <span class="text-sm font-semibold text-[#004D98]">Étape 2</span>
                                <h3 class="text-lg font-bold">Rabat → Fès</h3>
                            </div>
                            <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">Accidenté</span>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-calendar-day w-5 text-gray-400"></i>
                                <span>16 Février 2025</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-route w-5 text-gray-400"></i>
                                <span>195 km</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-mountain w-5 text-gray-400"></i>
                                <span>Dénivelé: +2500m</span>
                            </div>
                        </div>
                    </div>
                    <div class="border-t grid grid-cols-3 divide-x">
                        <button class="p-3 text-sm flex items-center justify-center space-x-1 hover:bg-gray-50">
                            <i class="fas fa-edit text-blue-500"></i>
                            <span>Modifier</span>
                        </button>
                        <button class="p-3 text-sm flex items-center justify-center space-x-1 hover:bg-gray-50">
                            <i class="fas fa-map-marked-alt text-green-500"></i>
                            <span>Parcours</span>
                        </button>
                        <button class="p-3 text-sm flex items-center justify-center space-x-1 hover:bg-gray-50">
                            <i class="fas fa-list text-purple-500"></i>
                            <span>Résultats</span>
                        </button>
                    </div>
                </div>

                <!-- Stage 3 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <span class="text-sm font-semibold text-[#004D98]">Étape 3</span>
                                <h3 class="text-lg font-bold">Fès → Meknès</h3>
                            </div>
                            <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">Montagne</span>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-calendar-day w-5 text-gray-400"></i>
                                <span>17 Février 2025</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-route w-5 text-gray-400"></i>
                                <span>165 km</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-mountain w-5 text-gray-400"></i>
                                <span>Dénivelé: +3200m</span>
                            </div>
                        </div>
                    </div>
                    <div class="border-t grid grid-cols-3 divide-x">
                        <button class="p-3 text-sm flex items-center justify-center space-x-1 hover:bg-gray-50">
                            <i class="fas fa-edit text-blue-500"></i>
                            <span>Modifier</span>
                        </button>
                        <button class="p-3 text-sm flex items-center justify-center space-x-1 hover:bg-gray-50">
                            <i class="fas fa-map-marked-alt text-green-500"></i>
                            <span>Parcours</span>
                        </button>
                        <button class="p-3 text-sm flex items-center justify-center space-x-1 hover:bg-gray-50">
                            <i class="fas fa-list text-purple-500"></i>
                            <span>Résultats</span>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>
     <!-- Modal Backdrop -->
     <div id="modalBackdrop" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
        <!-- Modal Content -->
        <div class="bg-white rounded-lg w-full max-w-md mx-4">
            <!-- Modal Header -->
            <div class="p-6 border-b">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-[#004D98]">Nouvelle Étape</h2>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <!-- Modal Body -->
            <form id="newStageForm" class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Nom de l'étape
                    </label>
                    <input type="text" name="nom" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#004D98]"
                        placeholder="ex: Étape 1">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Distance (km)
                        </label>
                        <input type="number" name="distance" required step="0.1"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#004D98]"
                            placeholder="ex: 180">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Catégorie
                        </label>
                        <select name="categorie_id" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#004D98]">
                            <option value="">Sélectionner</option>
                            <option value="1">Plat</option>
                            <option value="2">Accidenté</option>
                            <option value="3">Montagne</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Lieu de départ
                        </label>
                        <input type="text" name="lieuDepart" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#004D98]"
                            placeholder="ex: Casablanca">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Lieu d'arrivée
                        </label>
                        <input type="text" name="lieuArrivee" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#004D98]"
                            placeholder="ex: Rabat">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Description
                    </label>
                    <textarea name="description" rows="3"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#004D98]"
                        placeholder="Description de l'étape..."></textarea>
                </div>

                <div class="hidden">
                    <input type="number" name="course_id" value="1">
                    <input type="text" name="statut" value="encours">
                </div>
            </form>

            <!-- Modal Footer -->
            <div class="p-6 border-t flex justify-end space-x-4">
                <button onclick="closeModal()" 
                    class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                    Annuler
                </button>
                <button onclick="submitForm()" 
                    class="px-4 py-2 bg-[#004D98] text-white rounded-md hover:bg-[#003d7a]">
                    Enregistrer
                </button>
            </div>
        </div>
    </div>

    <script>
        // Show modal when "Nouvelle Étape" button is clicked
        function openModal() {
            document.getElementById('modalBackdrop').classList.remove('hidden');
        }

        // Close modal
        function closeModal() {
            document.getElementById('modalBackdrop').classList.add('hidden');
            document.getElementById('newStageForm').reset();
        }

        // Submit form
        function submitForm() {
            const form = document.getElementById('newStageForm');
            if (form.checkValidity()) {
                const formData = new FormData(form);
                const data = Object.fromEntries(formData);
                
                // Convert distance to number
                data.distance = parseFloat(data.distance);
                data.categorie_id = parseInt(data.categorie_id);
                data.course_id = parseInt(data.course_id);

                // Here you would typically send this to your server
                console.log('Form data:', data);
                
                // Example of sending to server
                fetch('/api/etapes', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Success:', data);
                    closeModal();
                    // Optionally refresh the page or update the UI
                    window.location.reload();
                })
                .catch((error) => {
                    console.error('Error:', error);
                    alert('Une erreur est survenue lors de l\'enregistrement');
                });
            } else {
                form.reportValidity();
            }
        }

        // Add click event to "Nouvelle Étape" button
        document.addEventListener('DOMContentLoaded', function() {
            const newStageBtn = document.querySelector('button:has(i.fas.fa-plus)');
            if (newStageBtn) {
                newStageBtn.addEventListener('click', openModal);
            }
        });
    </script>
</body>
</html>