<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactions Fans - Tour de Morocco 2025</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Navigation (repris de votre design original) -->
    <nav class="bg-[#333333] text-white py-2 px-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-6">
                <a href="#" class="transform hover:scale-105 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 80" class="w-48 h-[3rem]">
                        <text x="10" y="40" font-family="Arial Black" font-size="32" fill="#004D98">TOUR</text>
                        <text x="100" y="40" font-family="Arial" font-size="24" fill="#C8102E">DE</text>
                        <text x="10" y="70" font-family="Arial Black" font-size="32" fill="#C8102E">MOROCCO</text>
                        <path d="M170 15 L173 24 L182 24 L175 30 L178 39 L170 33 L162 39 L165 30 L158 24 L167 24 Z" fill="#C8102E"/>
                    </svg>
                </a>
                <div class="hidden md:flex space-x-4">
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-200">HOME</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-200">ETAPES</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-200">HISTOIRE</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors duration-200">JEUX</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Filtres -->
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <h2 class="text-xl font-bold mb-4">Filtrer les étapes</h2>
            <div class="flex flex-wrap gap-4">
                <div class="flex flex-wrap gap-2">
                    <button class="px-4 py-2 rounded-full bg-blue-100 hover:bg-blue-200 transition-colors">
                        Atlas ⛰️
                    </button>
                    <button class="px-4 py-2 rounded-full bg-yellow-100 hover:bg-yellow-200 transition-colors">
                        Sahara 🏜️
                    </button>
                    <button class="px-4 py-2 rounded-full bg-green-100 hover:bg-green-200 transition-colors">
                        Côte 🌊
                    </button>
                </div>
                <div class="flex flex-wrap gap-2">
                    <button class="px-4 py-2 rounded-full bg-green-100 hover:bg-green-200 transition-colors">
                        Facile
                    </button>
                    <button class="px-4 py-2 rounded-full bg-yellow-100 hover:bg-yellow-200 transition-colors">
                        Moyen
                    </button>
                    <button class="px-4 py-2 rounded-full bg-red-100 hover:bg-red-200 transition-colors">
                        Difficile
                    </button>
                </div>
            </div>
        </div>

        <!-- Étapes -->

        <?php 
        foreach($etapes as $row):
        ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Étape 1 -->
            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <div class="relative">
                    <img src="/api/placeholder/400/200" alt="Étape Atlas" class="w-full h-48 object-cover rounded-t-lg">
                    <span class="absolute top-4 left-4 bg-blue-500 text-white px-3 py-1 rounded-full text-sm">
                        Atlas ⛰️
                    </span>
                    <div class="absolute top-4 right-4 flex gap-2">
                        <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm">Difficile</span>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Étape 1: <?= $row->nom ?></h3>
                    <p class="text-gray-600 mb-4"><?= $row->description ?></p>
                    
                    <!-- Section interaction -->
                    <div class="flex items-center justify-between mt-4 pt-4 border-t">
                        <button class="flex items-center gap-2 text-red-500 hover:text-red-600 transition-colors">
                            <i class="fas fa-heart"></i>
                            <span>234</span>
                        </button>
                        <button class="flex items-center gap-2 text-blue-500 hover:text-blue-600 transition-colors">
                            <i class="fas fa-comment"></i>
                            <span>45</span>
                        </button>
                        <div class="flex gap-1">
                            <span class="text-yellow-400">🏆</span>
                            <span class="text-gray-600">+25 pts</span>
                        </div>
                    </div>

                    <!-- Section commentaires -->
                    <div class="mt-4 pt-4 border-t">
                        <form class="flex gap-2">
                            <input type="text" placeholder="Votre commentaire..." class="flex-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Étape 2 -->
            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <div class="relative">
                    <img src="/api/placeholder/400/200" alt="Étape Sahara" class="w-full h-48 object-cover rounded-t-lg">
                    <span class="absolute top-4 left-4 bg-yellow-500 text-white px-3 py-1 rounded-full text-sm">
                        Sahara 🏜️
                    </span>
                    <div class="absolute top-4 right-4 flex gap-2">
                        <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-sm">Moyen</span>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Étape 2: Traversée du Sahara</h3>
                    <p class="text-gray-600 mb-4">Une aventure unique à travers les dunes dorées.</p>
                    
                    <!-- Section interaction -->
                    <div class="flex items-center justify-between mt-4 pt-4 border-t">
                        <form action="/like/addLikeAction"
                        method="POST"
                        >
                        <input type="hidden" name="fan" value="<?= $_SESSION['user_id'] ?>">
                        <input type="hidden" name="etape" value="<?= $etape->id ?>">
                        <button type="submit" class="flex items-center gap-2 text-gray-400 hover:text-red-500 transition-colors">
                        <i class="fas fa-heart"></i>
                            <span>189</span>
                        </button>
                        </form>

                        <button class="flex items-center gap-2 text-blue-500 hover:text-blue-600 transition-colors">
                            <i class="fas fa-comment"></i>
                            <span>32</span>
                        </button>
                        <div class="flex gap-1">
                            <span class="text-yellow-400">🏆</span>
                            <span class="text-gray-600">+15 pts</span>
                        </div>
                    </div>

                    <!-- Section commentaires -->
                    <div class="mt-4 pt-4 border-t">
                        <form class="flex gap-2">
                            <input type="text" placeholder="Votre commentaire..." class="flex-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
        <!-- Section Badges et Récompenses -->
        <div class="mt-12 bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-2xl font-bold mb-6">Vos Badges et Récompenses</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="text-center p-4 bg-gray-50 rounded-lg">
                    <span class="text-4xl mb-2 block">🌟</span>
                    <h3 class="font-bold">Super Fan</h3>
                    <p class="text-sm text-gray-600">100 likes donnés</p>
                </div>
                <div class="text-center p-4 bg-gray-50 rounded-lg">
                    <span class="text-4xl mb-2 block">💬</span>
                    <h3 class="font-bold">Commentateur</h3>
                    <p class="text-sm text-gray-600">50 commentaires</p>
                </div>
                <div class="text-center p-4 bg-gray-50 rounded-lg">
                    <span class="text-4xl mb-2 block">🏔️</span>
                    <h3 class="font-bold">Fan de l'Atlas</h3>
                    <p class="text-sm text-gray-600">Suivi toutes les étapes</p>
                </div>
                <div class="text-center p-4 bg-gray-50 rounded-lg">
                    <span class="text-4xl mb-2 block">🏆</span>
                    <h3 class="font-bold">Champion</h3>
                    <p class="text-sm text-gray-600">1000 points gagnés</p>
                </div>
            </div>
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
                        <li><a href="#" class="hover:text-yellow-400 transition-colors">Parcours</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition-colors">Équipes</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition-colors">Actualités</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Suivez-nous</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="hover:text-yellow-400 transition-colors"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="hover:text-yellow-400 transition-colors"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="hover:text-yellow-400 transition-colors"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="hover:text-yellow-400 transition-colors"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-sm text-gray-400">
                <p>&copy; 2025 Tour de Morocco. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
    <!-- Ajoutez ce HTML juste avant la fermeture du body -->
<div id="commentsModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center p-4 z-50">
    <div class="bg-white rounded-lg w-full max-w-lg relative max-h-[80vh] flex flex-col">
        <!-- En-tête -->
        <div class="flex justify-between items-center p-4 border-b">
            <h3 class="text-xl font-bold">Commentaires</h3>
            <button onclick="closeCommentsModal()" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <!-- Liste des commentaires -->
        <div class="overflow-y-auto p-4 flex-1">
            <div id="commentsList" class="space-y-4">
                <!-- Les commentaires seront insérés ici dynamiquement -->
            </div>
        </div>
        
        <!-- Formulaire de commentaire -->
        <div class="border-t p-4">
            <form id="commentForm" class="flex gap-2" onsubmit="handleCommentSubmit(event)">
                <input 
                    type="text" 
                    id="newComment"
                    placeholder="Votre commentaire..." 
                    class="flex-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
                <button 
                    type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors"
                >
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<script>
// Données simulées des commentaires
const commentsData = {
    'etape1': [
        { author: 'Sophie', text: 'Superbe étape!', date: '2025-02-13' },
        { author: 'Marc', text: 'Le paysage est magnifique', date: '2025-02-13' }
    ],
    'etape2': [
        { author: 'Julie', text: 'Une étape inoubliable', date: '2025-02-13' }
    ]
};

// Sélectionner tous les boutons de commentaire
document.querySelectorAll('.fa-comment').forEach(button => {
    button.parentElement.addEventListener('click', (e) => {
        const stageId = e.currentTarget.closest('.bg-white').dataset.stageId || 'etape1';
        openCommentsModal(stageId);
    });
});

let currentStageId = null;

function openCommentsModal(stageId) {
    currentStageId = stageId;
    const modal = document.getElementById('commentsModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    renderComments(stageId);
}

function closeCommentsModal() {
    const modal = document.getElementById('commentsModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    currentStageId = null;
}

function renderComments(stageId) {
    const commentsList = document.getElementById('commentsList');
    commentsList.innerHTML = '';
    
    const comments = commentsData[stageId] || [];
    
    comments.forEach(comment => {
        const commentElement = createCommentElement(comment);
        commentsList.appendChild(commentElement);
    });
}

function createCommentElement(comment) {
    const div = document.createElement('div');
    div.className = 'bg-gray-50 rounded-lg p-4';
    div.innerHTML = `
        <div class="flex justify-between items-start mb-2">
            <div class="font-bold">${comment.author}</div>
            <div class="text-sm text-gray-500">${formatDate(comment.date)}</div>
        </div>
        <p class="text-gray-700">${comment.text}</p>
    `;
    return div;
}

function handleCommentSubmit(event) {
    event.preventDefault();
    
    if (!currentStageId) return;
    
    const input = document.getElementById('newComment');
    const commentText = input.value.trim();
    
    if (!commentText) return;
    
    const newComment = {
        author: 'Vous',
        text: commentText,
        date: new Date().toISOString().split('T')[0]
    };
    
    if (!commentsData[currentStageId]) {
        commentsData[currentStageId] = [];
    }
    
    commentsData[currentStageId].push(newComment);
    
    // Mettre à jour l'affichage
    renderComments(currentStageId);
    
    // Réinitialiser le formulaire
    input.value = '';
    
    // Mettre à jour le compteur de commentaires
    updateCommentCount(currentStageId);
}

function updateCommentCount(stageId) {
    const stageElement = document.querySelector(`[data-stage-id="${stageId}"]`);
    if (stageElement) {
        const countElement = stageElement.querySelector('.fa-comment').nextElementSibling;
        const commentCount = commentsData[stageId]?.length || 0;
        countElement.textContent = commentCount;
    }
}

function formatDate(dateString) {
    return new Date(dateString).toLocaleDateString('fr-FR');
}

// Fermer la modale si on clique en dehors
document.getElementById('commentsModal').addEventListener('click', (e) => {
    if (e.target === e.currentTarget) {
        closeCommentsModal();
    }
});

// Empêcher la propagation du clic depuis la boîte de dialogue
document.querySelector('#commentsModal > div').addEventListener('click', (e) => {
    e.stopPropagation();
});
</script>
</body>
</html>