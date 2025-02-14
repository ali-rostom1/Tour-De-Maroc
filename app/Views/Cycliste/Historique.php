<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tour de Morocco 2025 - Race History">
    <title>Tour de Morocco 2025 - Historique</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
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
                    <a href="Cycliste_Dashboard.html" class="flex items-center space-x-2 text-gray-600 hover:bg-gray-100 p-3 rounded-lg">
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
                    <a href="Historique.html" class="flex items-center space-x-2 bg-[#FED100] text-black p-3 rounded-lg">
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
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold">Historique des Courses</h1>
                <div class="flex space-x-4">
                    <select id="yearSelect" class="border rounded-lg px-4 py-2" onchange="filterHistory()">
                        <option value="all">Toutes les années</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                    </select>
                    <button onclick="exportHistory()" class="bg-[#004D98] text-white px-4 py-2 rounded-lg">
                        <i class="fas fa-download mr-2"></i>Exporter
                    </button>
                </div>
            </div>

            <!-- Career Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="achievement-card bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center space-x-4">
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-flag-checkered text-[#004D98] text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-2xl">156</h3>
                            <p class="text-gray-600">Courses</p>
                        </div>
                    </div>
                </div>
                <div class="achievement-card bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center space-x-4">
                        <div class="bg-yellow-100 p-3 rounded-full">
                            <i class="fas fa-trophy text-[#FED100] text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-2xl">15</h3>
                            <p class="text-gray-600">Victoires</p>
                        </div>
                    </div>
                </div>
                <div class="achievement-card bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center space-x-4">
                        <div class="bg-red-100 p-3 rounded-full">
                            <i class="fas fa-medal text-[#C8102E] text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-2xl">42</h3>
                            <p class="text-gray-600">Podiums</p>
                        </div>
                    </div>
                </div>
                <div class="achievement-card bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center space-x-4">
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-road text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-2xl">25,648</h3>
                            <p class="text-gray-600">Km Parcourus</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Performance Chart -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <h2 class="text-xl font-bold mb-4">Évolution des Performances</h2>
                <canvas id="performanceChart" height="100"></canvas>
            </div>

            <!-- Major Achievements -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <h2 class="text-xl font-bold mb-6">Principales Victoires</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="achievement-card border rounded-lg p-4">
                        <div class="flex items-center space-x-4 mb-4">
                            <i class="fas fa-trophy text-[#FED100] text-2xl"></i>
                            <div>
                                <h3 class="font-bold">Tour de Morocco 2024</h3>
                                <p class="text-gray-600">Étape 3</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-500">15 Avril 2024</p>
                    </div>
                    <div class="achievement-card border rounded-lg p-4">
                        <div class="flex items-center space-x-4 mb-4">
                            <i class="fas fa-trophy text-[#FED100] text-2xl"></i>
                            <div>
                                <h3 class="font-bold">Circuit de Marrakech</h3>
                                <p class="text-gray-600">Course en ligne</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-500">20 Mars 2024</p>
                    </div>
                    <div class="achievement-card border rounded-lg p-4">
                        <div class="flex items-center space-x-4 mb-4">
                            <i class="fas fa-trophy text-[#FED100] text-2xl"></i>
                            <div>
                                <h3 class="font-bold">Championnat National</h3>
                                <p class="text-gray-600">Course en ligne</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-500">5 Juin 2023</p>
                    </div>
                </div>
            </div>

            <!-- Detailed Race History -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold">Historique Détaillé</h2>
                    <div class="flex space-x-2">
                        <button onclick="sortHistory('date')" class="text-gray-600 hover:text-black">
                            <i class="fas fa-sort"></i>
                        </button>
                        <button onclick="filterResults()" class="text-gray-600 hover:text-black">
                            <i class="fas fa-filter"></i>
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full" id="historyTable">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Course
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Catégorie
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Position
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Points UCI
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Détails
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">15/04/2024</td>
                                <td class="px-6 py-4">Tour de Morocco - Étape 3</td>
                                <td class="px-6 py-4">2.1</td>
                                <td class="px-6 py-4 font-bold text-[#004D98]">2ème</td>
                                <td class="px-6 py-4">30</td>
                                <td class="px-6 py-4">
                                    <button class="text-[#004D98] hover:underline">Voir plus</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">20/03/2024</td>
                                <td class="px-6 py-4">Circuit de Marrakech</td>
                                <td class="px-6 py-4">1.2</td>
                                <td class="px-6 py-4 font-bold text-[#C8102E]">1er</td>
                                <td class="px-6 py-4">40</td>
                                <td class="px-6 py-4">
                                    <button class="text-[#004D98] hover:underline">Voir plus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Initialize performance chart
        const ctx = document.getElementById('performanceChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Points UCI',
                    data: [65, 80, 95, 125, 140, 160],
                    borderColor: '#004D98',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        function filterHistory() {
            // Implement history filtering
            const year = document.getElementById('yearSelect').value;
            console.log('Filtering for year:', year);
        }

        function exportHistory() {
            // Implement history export
            alert('Export de l\'historique en cours...');
        }

        function sortHistory(column) {
            // Implement table sorting
            console.log('Sorting by:', column);
        }

        function filterResults() {
            // Implement results filtering
            console.log('Filtering results');
        }
        </script>
</body>
</html>

        