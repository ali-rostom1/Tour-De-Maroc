<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Podium - Tour de Morocco 2025">
    <title>Podium - Tour de Morocco 2025</title>
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
        
        .podium-1 { height: 200px; }
        .podium-2 { height: 160px; }
        .podium-3 { height: 120px; }

        .winner-glow {
            box-shadow: 0 0 30px rgba(254, 209, 0, 0.3);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Hero Section -->
    <div class="relative h-[40vh] bg-gray-900 overflow-hidden">
        <img src="https://img.freepik.com/premium-photo/cyclist-road-with-cloudy-sky-background_853115-1082.jpg?w=360" alt="Tour de Morocco finish line" class="w-full h-full object-cover opacity-50">
        <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-4xl md:text-6xl font-bold text-white text-center">
                Podium Tour de Morocco 2025
            </h1>
        </div>
    </div>

    <!-- Podium Section -->
    <div class="container mx-auto px-4 py-12">
        <!-- Winners Display -->
        <div class="flex flex-col md:flex-row justify-center items-end space-x-4 mb-16">
            <!-- 2nd Place -->
            <div class="flex flex-col items-center mb-8 md:mb-0">
                <div class="relative w-64 mb-4">
                    <img src="https://th.bing.com/th/id/OIP.xy0GhvspWi2QSxI8GFjLEgAAAA?rs=1&pid=ImgDetMain" alt="Second Place" class="w-full h-60 object-cover rounded-lg shadow-lg">
                    <div class="absolute top-4 left-4 bg-gray-100 rounded-full w-12 h-12 flex items-center justify-center">
                        <span class="text-2xl font-bold">2</span>
                    </div>
                </div>
                <div class="bg-white podium-2 w-64 rounded-t-lg shadow-lg p-4 text-center">
                    <?php if (isset($cyclists[1])): ?>
                        <h3 class="text-xl font-bold"><?php echo htmlspecialchars($cyclists[1]->getNom()); ?></h3>
                        <p class="text-gray-600"><?php echo htmlspecialchars($cyclists[1]->getEquipe()->getNom()); ?></p>
                        <p class="text-sm mt-2"><?php echo number_format($cyclists[1]->getTotalPoints(), 1); ?> pts</p>
                        <div class="mt-2"><?php echo htmlspecialchars($cyclists[1]->getNationalite()); ?></div>
                    <?php else: ?>
                        <h3 class="text-xl font-bold">Position non attribuée</h3>
                        <p class="text-gray-600">-</p>
                        <p class="text-sm mt-2">0 pts</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- 1st Place -->
            <div class="flex flex-col items-center mb-8 md:mb-0">
                <div class="relative w-72 mb-4">
                    <img src="https://cdn1.vectorstock.com/i/1000x1000/09/80/gold-medal-metal-realistic-first-placement-vector-15690980.jpg" alt="First Place" class="w-full h-72 object-cover rounded-lg shadow-lg winner-glow">
                    <div class="absolute top-4 left-4 bg-[#FED100] rounded-full w-14 h-14 flex items-center justify-center">
                        <span class="text-3xl font-bold">1</span>
                    </div>
                </div>
                <div class="bg-[#FED100] podium-1 w-72 rounded-t-lg shadow-lg p-4 text-center">
                    <?php if (isset($cyclists[0])): ?>
                        <h3 class="text-2xl font-bold"><?php echo htmlspecialchars($cyclists[0]->getNom()); ?></h3>
                        <p class="text-gray-800"><?php echo htmlspecialchars($cyclists[0]->getEquipe()->getNom()); ?></p>
                        <p class="text-lg font-bold mt-2"><?php echo number_format($cyclists[0]->getTotalPoints(), 1); ?> pts</p>
                        <div class="mt-2"><?php echo htmlspecialchars($cyclists[0]->getNationalite()); ?></div>
                    <?php else: ?>
                        <h3 class="text-2xl font-bold">Position non attribuée</h3>
                        <p class="text-gray-800">-</p>
                        <p class="text-lg font-bold mt-2">0 pts</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- 3rd Place -->
            <div class="flex flex-col items-center">
                <div class="relative w-56 mb-4">
                    <img src="https://th.bing.com/th/id/R.0288f9e3e34d46d950f873c27d6c0f97?rik=F55j9CTcWDL%2bvw&riu=http%3a%2f%2fsc01.alicdn.com%2fkf%2fHTB122thKpXXXXc8aXXXq6xXFXXXZ%2fcustom-medal-zinc-alloy-casting-antique-copper.jpg&ehk=uMD5I3GUsOZejz9KkM6Z5IzikV%2fabFZL9KDJTWbz04g%3d&risl=&pid=ImgRaw&r=0" alt="Third Place" class="w-full h-52 object-cover rounded-lg shadow-lg">
                    <div class="absolute top-4 left-4 bg-[#CD7F32] rounded-full w-10 h-10 flex items-center justify-center">
                        <span class="text-xl font-bold text-white">3</span>
                    </div>
                </div>
                <div class="bg-white podium-3 w-56 rounded-t-lg shadow-lg p-4 text-center">
                    <?php if (isset($cyclists[2])): ?>
                        <h3 class="text-lg font-bold"><?php echo htmlspecialchars($cyclists[2]->getNom()); ?></h3>
                        <p class="text-gray-600"><?php echo htmlspecialchars($cyclists[2]->getEquipe()->getNom()); ?></p>
                        <p class="text-sm mt-2"><?php echo number_format($cyclists[2]->getTotalPoints(), 1); ?> pts</p>
                        <div class="mt-2"><?php echo htmlspecialchars($cyclists[2]->getNationalite()); ?></div>
                    <?php else: ?>
                        <h3 class="text-lg font-bold">Position non attribuée</h3>
                        <p class="text-gray-600">-</p>
                        <p class="text-sm mt-2">0 pts</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold mb-6 text-center">Statistiques du Podium</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#FED100] mb-2">21</div>
                    <p class="text-gray-600">Étapes terminées</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#FED100] mb-2">3,412</div>
                    <p class="text-gray-600">Kilomètres parcourus</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#FED100] mb-2">42</div>
                    <p class="text-gray-600">Vitesse moyenne (km/h)</p>
                </div>
            </div>
        </div>

        <!-- Victory Quote -->
        <?php if (isset($cyclists[0])): ?>
        <div class="max-w-2xl mx-auto text-center mt-12">
            <blockquote class="text-xl italic text-gray-600">
                "Une victoire historique pour le cyclisme marocain. Merci à tous les fans pour leur soutien incroyable tout au long de cette aventure."
            </blockquote>
            <p class="mt-4 font-bold">- <?php echo htmlspecialchars($cyclists[0]->getNom()); ?>, Vainqueur du Tour de Morocco 2025</p>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>