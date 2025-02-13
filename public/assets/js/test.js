// Sélectionner les éléments du DOM
let searchForm = document.querySelector('form');
let searchInput = document.querySelector('input[type="search"]');
let searchButton = document.querySelector('button[type="submit"]');

// Créer un conteneur pour les résultats
let resultsContainer = document.createElement('div');
resultsContainer.classList.add('absolute', 'top-full', 'left-0', 'right-0', 'mt-2', 'bg-white', 'rounded-lg', 'shadow-lg', 'max-h-80', 'overflow-y-auto', 'hidden');
searchForm.appendChild(resultsContainer);

// Variable pour stocker le timeout (debounce)
let searchTimeout;

// Configuration de l'API
let API_CONFIG = {
    baseUrl: 'https://votre-api.com/api/search',
    headers: {
        'Content-Type': 'application/json',
        // Ajoutez ici vos headers d'authentification si nécessaire
        // 'Authorization': 'Bearer votre-token'
    }
};

// Fonction pour faire la recherche AJAX
async function performSearch(query) {
    try {
        let url = `${API_CONFIG.baseUrl}?q=${encodeURIComponent(query)}`;
        
        // Afficher l'état de chargement
        resultsContainer.innerHTML = `
            <div class="flex items-center justify-center p-4">
                <div class="loading">Recherche en cours...</div>
            </div>
        `;

        let response = await fetch(url, {
            method: 'GET',
            headers: API_CONFIG.headers
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        let data = await response.json();
        displayResults(data);
    } catch (error) {
        console.error('Erreur lors de la recherche:', error);
        resultsContainer.innerHTML = `
            <div class="p-4 text-red-600 bg-red-50">
                <p class="font-semibold">Une erreur est survenue</p>
                <p class="text-sm">Veuillez réessayer ultérieurement</p>
            </div>
        `;
    }
}

// Fonction pour afficher les résultats
function displayResults(results) {
    if (!results || results.length === 0) {
        resultsContainer.innerHTML = `
            <div class="p-4 text-gray-500 text-center">
                <p>Aucun résultat trouvé</p>
            </div>
        `;
        return;
    }

    let resultsList = results.map(result => `
        <a href="${result.url}" class="block p-4 hover:bg-gray-100 transition-colors duration-200">
            <div class="flex items-center gap-4">
                ${result.image ? `
                    <img src="${result.image}" alt="" class="w-12 h-12 object-cover rounded-lg">
                ` : ''}
                <div class="flex-1">
                    <h3 class="font-semibold text-gray-900">${result.title}</h3>
                    ${result.description ? `
                        <p class="text-sm text-gray-600 mt-1">${result.description}</p>
                    ` : ''}
                    ${result.category ? `
                        <span class="inline-block px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded mt-2">
                            ${result.category}
                        </span>
                    ` : ''}
                </div>
            </div>
        </a>
    `).join('');

    resultsContainer.innerHTML = `
        <div class="divide-y divide-gray-200">
            ${resultsList}
        </div>
    `;
}

