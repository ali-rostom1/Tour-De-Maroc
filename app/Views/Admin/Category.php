<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tour de Morocco 2025 - Categories">
    <title>Tour de Morocco 2025 - Categories</title>
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

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .modal.show {
            display: flex;
            align-items: center;
            justify-content: center;
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
                    <a href="Etapes.php" class="flex items-center space-x-2 text-gray-600 hover:bg-gray-100 p-3 rounded-lg">
                        <i class="fas fa-bicycle"></i>
                        <span>Étapes</span>
                    </a>
                    <a href="Classements.php" class="flex items-center space-x-2 text-gray-600 hover:bg-gray-100 p-3 rounded-lg">
                        <i class="fas fa-trophy"></i>
                        <span>Classements</span>
                    </a>
                    <a href="Category.php" class="flex items-center space-x-2 bg-[#FED100] text-black p-3 rounded-lg">
                        <i class="fas fa-tag"></i>
                        <span>Category</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold">Categories</h1>
                <button id="addCategoryBtn" class="bg-[#004D98] text-white px-4 py-2 rounded-lg flex items-center space-x-2">
                    <i class="fas fa-plus"></i>
                    <span>Nouvelle Catégorie</span>
                </button>
            </div>
            
            <!-- Categories Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Sprint Category -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-4 h-4 rounded-full bg-[#FED100]"></div>
                            <h3 class="text-xl font-bold">Sprint</h3>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-gray-500 hover:text-red-500">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text-gray-600">Points pour les sprints intermédiaires</p>
                    <div class="mt-4 flex items-center space-x-2">
                        <span class="text-sm text-gray-500">Points:</span>
                        <span class="text-sm font-bold">20, 17, 15, 13, 11</span>
                    </div>
                </div>

                <!-- Mountain Category -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-4 h-4 rounded-full bg-[#C8102E]"></div>
                            <h3 class="text-xl font-bold">Montagne</h3>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-gray-500 hover:text-red-500">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text-gray-600">Points pour les cols et montées</p>
                    <div class="mt-4 flex items-center space-x-2">
                        <span class="text-sm text-gray-500">Points:</span>
                        <span class="text-sm font-bold">25, 20, 16, 14, 12</span>
                    </div>
                </div>

                <!-- Youth Category -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-4 h-4 rounded-full bg-[#004D98]"></div>
                            <h3 class="text-xl font-bold">Jeunes</h3>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-gray-500 hover:text-red-500">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text-gray-600">Classement des coureurs -25 ans</p>
                    <div class="mt-4 flex items-center space-x-2">
                        <span class="text-sm text-gray-500">Critère:</span>
                        <span class="text-sm font-bold">Temps général</span>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal -->
    <div id="categoryModal" class="modal">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4">
            <!-- Modal Header -->
            <div class="flex justify-between items-center p-6 border-b">
                <h3 class="text-xl font-bold">Ajouter une nouvelle catégorie</h3>
                <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <form id="categoryForm" class="p-6 space-y-4">
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type de catégorie</label>
                    <select id="type" name="type" required class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-[#004D98] focus:border-[#004D98]">
                        <option value="">Sélectionner un type</option>
                        <option value="SPRINT">Sprint</option>
                        <option value="MOUNTAIN">Montagne</option>
                        <option value="YOUTH">Jeunes</option>
                    </select>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea id="description" name="description" required rows="3" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-[#004D98] focus:border-[#004D98]"></textarea>
                </div>

                <div>
                    <label for="basePoints" class="block text-sm font-medium text-gray-700 mb-1">Points de base</label>
                    <input type="number" id="basePoints" name="basePoints" required class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-[#004D98] focus:border-[#004D98]">
                </div>

                <div>
                    <label for="coefficient" class="block text-sm font-medium text-gray-700 mb-1">Coefficient</label>
                    <input type="number" id="coefficient" name="coefficient" step="0.1" required class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-[#004D98] focus:border-[#004D98]">
                </div>
            </form>

            <!-- Modal Footer -->
            <div class="flex justify-end space-x-3 p-6 border-t">
                <button id="cancelBtn" class="px-4 py-2 border rounded-lg text-gray-600 hover:bg-gray-50">
                    Annuler
                </button>
                <button id="saveBtn" class="px-4 py-2 bg-[#004D98] text-white rounded-lg hover:bg-[#003d7a]">
                    Enregistrer
                </button>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Get DOM elements
        const modal = document.getElementById('categoryModal');
        const addBtn = document.getElementById('addCategoryBtn');
        const closeBtn = document.getElementById('closeModal');
        const cancelBtn = document.getElementById('cancelBtn');
        const saveBtn = document.getElementById('saveBtn');
        const form = document.getElementById('categoryForm');

        // Show modal
        addBtn.addEventListener('click', () => {
            modal.classList.add('show');
        });

        // Hide modal
        function hideModal() {
            modal.classList.remove('show');
            form.reset();
        }

        closeBtn.addEventListener('click', hideModal);
        cancelBtn.addEventListener('click', hideModal);

        // Close modal when clicking outside
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                hideModal();
            }
        });

        // Handle form submission
        saveBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (form.checkValidity()) {
                const formData = {
                    type: document.getElementById('type').value,
                    description: document.getElementById('description').value,
                    basePoints: parseInt(document.getElementById('basePoints').value),
                    coefficient: parseFloat(document.getElementById('coefficient').value)
                };
                
                console.log('Category Data:', formData);
                // Here you would typically send the data to your server
                // fetch('/api/categories', {
                //     method: 'POST',
                //     headers: {'Content-Type': 'application/json'},
                //     body: JSON.stringify(formData)
                // });
                
                hideModal();
            } else {
                form.reportValidity();
            }
        });
    </script>
</body>
</html>