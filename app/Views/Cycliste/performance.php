<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tour de Morocco 2025 - Cyclist Performance Dashboard">
    <title>Tour de Morocco 2025 - Performance Dashboard</title>
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
        
        .stat-card {
            transition: transform 0.2s;
        }
        
        .stat-card:hover {
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
                    <a href="performance.html" class="flex items-center space-x-2 bg-[#FED100] text-black p-3 rounded-lg">
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
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold">Mes Performances</h1>
                <div class="flex space-x-4">
                    <select id="stageSelect" class="border rounded-lg px-4 py-2">
                        <option value="all">Toutes les étapes</option>
                        <option value="1">Étape 1</option>
                        <option value="2">Étape 2</option>
                        <option value="3">Étape 3</option>
                    </select>
                    <button onclick="exportData()" class="bg-[#004D98] text-white px-4 py-2 rounded-lg">
                        <i class="fas fa-download mr-2"></i>Exporter
                    </button>
                </div>
            </div>

            <!-- Performance Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="stat-card bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-600">Vitesse Moyenne</p>
                            <h3 class="text-2xl font-bold">42.5 km/h</h3>
                        </div>
                        <div class="bg-blue-100 p-2 rounded-lg">
                            <i class="fas fa-tachometer-alt text-[#004D98]"></i>
                        </div>
                    </div>
                    <p class="text-green-500 mt-2">+2.3% vs dernière étape</p>
                </div>

                <div class="stat-card bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-600">Points</p>
                            <h3 class="text-2xl font-bold">185</h3>
                        </div>
                        <div class="bg-yellow-100 p-2 rounded-lg">
                            <i class="fas fa-star text-[#FED100]"></i>
                        </div>
                    </div>
                    <p class="text-green-500 mt-2">+45 points aujourd'hui</p>
                </div>

                <div class="stat-card bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-600">Classement Général</p>
                            <h3 class="text-2xl font-bold">3ème</h3>
                        </div>
                        <div class="bg-red-100 p-2 rounded-lg">
                            <i class="fas fa-trophy text-[#C8102E]"></i>
                        </div>
                    </div>
                    <p class="text-red-500 mt-2">-1 position</p>
                </div>

                <div class="stat-card bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-600">Distance Parcourue</p>
                            <h3 class="text-2xl font-bold">524 km</h3>
                        </div>
                        <div class="bg-green-100 p-2 rounded-lg">
                            <i class="fas fa-road text-green-600"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mt-2">Total de la course</p>
                </div>
            </div>

            <!-- Performance Charts -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-xl font-bold mb-4">Vitesse par Étape</h3>
                    <canvas id="speedChart"></canvas>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-xl font-bold mb-4">Comparaison avec les Leaders</h3>
                    <canvas id="comparisonChart"></canvas>
                </div>
            </div>

            <!-- Recent Performance Table -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold">Détails des Étapes</h2>
                    <div class="flex space-x-2">
                        <button onclick="sortTable('date')" class="text-gray-600 hover:text-black">
                            <i class="fas fa-sort"></i>
                        </button>
                        <button onclick="filterResults()" class="text-gray-600 hover:text-black">
                            <i class="fas fa-filter"></i>
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full" id="performanceTable">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Étape
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Distance
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Vitesse Moy.
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Position
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Points
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="performanceTableBody">
                            <!-- Table content will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script>


// Initialize charts and fetch data
document.addEventListener('DOMContentLoaded', function() {
    const cyclisteId = '123'; // Replace this with the actual cyclist ID you want to fetch
    fetch(`/tour-de-maroc/cyclistePerformance/dataResultatsByCyclisteId/${cyclisteId}`)
        .then(response => response.json())
        .then(data => {
            // Assuming the response is an array of stages with relevant data
            const performanceData = { stages: data };

            // Initialize charts
            initializeCharts(performanceData);

            // Populate the table with the fetched data
            populatePerformanceTable(performanceData);
        })
        .catch(error => console.error('Error fetching data:', error));
});

// Initialize charts
function initializeCharts(performanceData) {
    // Speed Chart
    const speedCtx = document.getElementById('speedChart').getContext('2d');
    new Chart(speedCtx, {
        type: 'line',
        data: {
            labels: performanceData.stages.map(stage => stage.stage),
            datasets: [{
                label: 'Vitesse Moyenne (km/h)',
                data: performanceData.stages.map(stage => stage.vitesse), // assuming 'vitesse' in your API response
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
            }
        }
    });

    // Comparison Chart
    const comparisonCtx = document.getElementById('comparisonChart').getContext('2d');
    new Chart(comparisonCtx, {
        type: 'bar',
        data: {
            labels: performanceData.stages.map(stage => stage.stage),
            datasets: [{
                label: 'Votre Position',
                data: performanceData.stages.map(stage => stage.position),
                backgroundColor: '#FED100'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    reverse: true,
                    min: 1,
                    max: 10
                }
            },
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
}

// Populate table with fetched data
function populatePerformanceTable(performanceData) {
    const tableBody = document.getElementById('performanceTableBody');
    tableBody.innerHTML = ''; // Clear the table first

    performanceData.stages.forEach(stage => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td class="px-6 py-4 whitespace-nowrap">${stage.stage}</td>
            <td class="px-6 py-4 whitespace-nowrap">${stage.date}</td>
            <td class="px-6 py-4 whitespace-nowrap">${stage.distance} km</td>
            <td class="px-6 py-4 whitespace-nowrap">${stage.vitesse} km/h</td> <!-- Assuming 'vitesse' field -->
            <td class="px-6 py-4 whitespace-nowrap">${stage.position}${getOrdinalSuffix(stage.position)}</td>
            <td class="px-6 py-4 whitespace-nowrap">${stage.points}</td>
        `;
        tableBody.appendChild(row);
    });
}

// Helper function to get ordinal suffix (e.g. 1st, 2nd, 3rd, etc.)
function getOrdinalSuffix(position) {
    const j = position % 10,
          k = position % 100;
    if (j === 1 && k !== 11) {
        return 'st';
    }
    if (j === 2 && k !== 12) {
        return 'nd';
    }
    if (j === 3 && k !== 13) {
        return 'rd';
    }
    return 'th';
}

        // Sample data
        // const performanceData = {
        //     stages: [
        //         { stage: 'Étape 1', date: '2025-02-10', distance: 180, speed: 41.2, position: 4, points: 40 },
        //         { stage: 'Étape 2', date: '2025-02-11', distance: 165, speed: 39.8, position: 3, points: 45 },
        //         { stage: 'Étape 3', date: '2025-02-12', distance: 179, speed: 42.5, position: 2, points: 50 }
        //     ]
        // };

        // // Initialize charts
        // document.addEventListener('DOMContentLoaded', function() {
        //     // Speed Chart
        //     const speedCtx = document.getElementById('speedChart').getContext('2d');
        //     new Chart(speedCtx, {
        //         type: 'line',
        //         data: {
        //             labels: performanceData.stages.map(stage => stage.stage),
        //             datasets: [{
        //                 label: 'Vitesse Moyenne (km/h)',
        //                 data: performanceData.stages.map(stage => stage.speed),
        //                 borderColor: '#004D98',
        //                 tension: 0.1
        //             }]
        //         },
        //         options: {
        //             responsive: true,
        //             plugins: {
        //                 legend: {
        //                     position: 'bottom'
        //                 }
        //             }
        //         }
        //     });

        //     // Comparison Chart
        //     const comparisonCtx = document.getElementById('comparisonChart').getContext('2d');
        //     new Chart(comparisonCtx, {
        //         type: 'bar',
        //         data: {
        //             labels: performanceData.stages.map(stage => stage.stage),
        //             datasets: [{
        //                 label: 'Votre Position',
        //                 data: performanceData.stages.map(stage => stage.position),
        //                 backgroundColor: '#FED100'
        //             }]
        //         },
        //         options: {
        //             responsive: true,
        //             scales: {
        //                 y: {
        //                     reverse: true,
        //                     min: 1,
        //                     max: 10
        //                 }
        //             },
        //             plugins: {
        //                 legend: {
        //                     position: 'bottom'
        //                 }
        //             }
        //         }
        //     });

        //     // Populate table
        //     populatePerformanceTable();
        // });

        // function populatePerformanceTable() {
        //     const tableBody = document.getElementById('performanceTableBody');
        //     tableBody.innerHTML = '';

        //     performanceData.stages.forEach(stage => {
        //         const row = document.createElement('tr');
        //         row.innerHTML = `
        //             <td class="px-6 py-4 whitespace-nowrap">${stage.stage}</td>
        //             <td class="px-6 py-4 whitespace-nowrap">${stage.date}</td>
        //             <td class="px-6 py-4 whitespace-nowrap">${stage.distance} km</td>
        //             <td class="px-6 py-4 whitespace-nowrap">${stage.speed} km/h</td>
        //             <td class="px-6 py-4 whitespace-nowrap">${stage.position}${getOrdinalSuffix(stage.position)}</td>
        //             <td class="px-6 py-4 whitespace-nowrap">${stage.points}</td>
        //         `;
        //         tableBody.appendChild(row);
        //     });
        // }

    

        function exportData() {
            // Implementation for exporting data
            alert('Export des données en cours...');
        }

        function sortTable(column) {
            // Implementation for sorting table
            console.log('Sorting by:', column);
        }

        function filterResults() {
            // Implementation for filtering results
            console.log('Filtering results');
        }
    </script>
</body>
</html>