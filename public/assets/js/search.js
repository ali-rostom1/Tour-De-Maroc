  
 document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.getElementById('search-form');
    const searchInput = document.getElementById('search-input');
    const searchResults = document.getElementById('search-results');
    const cyclistesResults = document.querySelector('#cyclistes-results ul');
    const equipesResults = document.querySelector('#equipes-results ul');
    const etapesResults = document.querySelector('#etapes-results ul');
    const noResults = document.getElementById('no-results');

    // Base URL configuration
    const BASE_URL = '/Tour-De-Maroc';
    
    // Debug flag
    const DEBUG = true;

    function log(...args) {
        if (DEBUG) {
            console.log('[Search Debug]:', ...args);
        }
    }

    searchInput.addEventListener('focus', function() {
        if (searchInput.value.trim() !== '') {
            searchResults.classList.remove('hidden');
        }
    });

    document.addEventListener('click', function(event) {
        if (!searchForm.contains(event.target) && !searchResults.contains(event.target)) {
            searchResults.classList.add('hidden');
        }
    });

    let debounceTimer;
    const MINIMUM_SEARCH_LENGTH = 2;
    const DEBOUNCE_DELAY = 300;

    searchInput.addEventListener('input', function() {
        clearTimeout(debounceTimer);
        
        const query = searchInput.value.trim();
        
        if (query.length < MINIMUM_SEARCH_LENGTH) {
            searchResults.classList.add('hidden');
            return;
        }
        
        debounceTimer = setTimeout(() => performSearch(query), DEBOUNCE_DELAY);
    });

    searchForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const query = searchInput.value.trim();
        
        if (query.length >= MINIMUM_SEARCH_LENGTH) {
            performSearch(query);
        }
    });

    async function performSearch(query) {
        log('Initiating search for:', query);
        showLoadingState();

        // Updated endpoints with correct base URL
        const endpoints = {
            primary: `${BASE_URL}/search`,
            fallback: `${BASE_URL}/api/search`,
            backup: `${BASE_URL}/home/search`
        };

        for (const [name, endpoint] of Object.entries(endpoints)) {
            try {
                log(`Trying ${name} endpoint:`, endpoint);
                const url = `${endpoint}?q=${encodeURIComponent(query)}`;
                
                const response = await fetch(url, {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    signal: AbortSignal.timeout(5000)
                });

                log(`${name} endpoint status:`, response.status);

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const contentType = response.headers.get('content-type');
                if (!contentType || !contentType.includes('application/json')) {
                    throw new Error('Server did not return JSON');
                }

                const data = await response.json();
                displayResults(data);
                return;
                
            } catch (error) {
                log(`Error with ${name} endpoint:`, error);
                
                if (name === 'backup') {
                    handleSearchError(error, {
                        endpoint: name,
                        query: query,
                        url: endpoint
                    });
                }
                continue;
            }
        }
    }

    function showLoadingState() {
        const loadingHTML = '<li class="py-2 text-gray-500">Chargement...</li>';
        cyclistesResults.innerHTML = loadingHTML;
        equipesResults.innerHTML = loadingHTML;
        etapesResults.innerHTML = loadingHTML;
        noResults.classList.add('hidden');
        searchResults.classList.remove('hidden');
    }

    function displayResults(data) {
        log('Displaying results:', data);
        
        cyclistesResults.innerHTML = '';
        equipesResults.innerHTML = '';
        etapesResults.innerHTML = '';
        
        let hasResults = false;
        
        const resultTypes = {
            cyclistes: {
                element: cyclistesResults,
                container: document.getElementById('cyclistes-results'),
                render: (item) => `
                    <a href="${BASE_URL}/cycliste/view/${item.id}" class="block">
                        <div class="font-medium">${escapeHtml(item.nom)}</div>
                        <div class="text-sm text-gray-500">
                            ${escapeHtml(item.nationalite)}
                            ${item.equipe ? ' • ' + escapeHtml(item.equipe) : ''}
                        </div>
                    </a>
                `
            },
            equipes: {
                element: equipesResults,
                container: document.getElementById('equipes-results'),
                render: (item) => `
                    <a href="${BASE_URL}/equipe/view/${item.id}" class="block">
                        <div class="font-medium">${escapeHtml(item.nom)}</div>
                        <div class="text-sm text-gray-500">${escapeHtml(item.pays)}</div>
                    </a>
                `
            },
            etapes: {
                element: etapesResults,
                container: document.getElementById('etapes-results'),
                render: (item) => `
                    <a href="${BASE_URL}/etape/view/${item.id}" class="block">
                        <div class="font-medium">${escapeHtml(item.nom)}</div>
                        <div class="text-sm text-gray-500">
                            ${escapeHtml(item.distance)} km • 
                            ${escapeHtml(item.lieuDepart)} → ${escapeHtml(item.lieuArrivee)}
                            ${item.categorie ? ' • ' + escapeHtml(item.categorie) : ''}
                        </div>
                    </a>
                `
            }
        };

        for (const [type, config] of Object.entries(resultTypes)) {
            if (data[type]?.length > 0) {
                hasResults = true;
                config.container.classList.remove('hidden');
                
                data[type].forEach(item => {
                    const li = document.createElement('li');
                    li.className = 'py-2 hover:bg-gray-50';
                    li.innerHTML = config.render(item);
                    config.element.appendChild(li);
                });
            } else {
                config.container.classList.add('hidden');
            }
        }
        
        if (!hasResults) {
            noResults.textContent = 'Aucun résultat trouvé';
            noResults.classList.remove('hidden');
        } else {
            noResults.classList.add('hidden');
        }
    }

    function handleSearchError(error, context) {
        log('Search error:', error, 'Context:', context);
        
        let errorMessage;
        if (error.name === 'TimeoutError') {
            errorMessage = 'La recherche a pris trop de temps. Veuillez réessayer.';
        } else if (error.message.includes('404')) {
            errorMessage = 'Le service de recherche est temporairement indisponible. Notre équipe a été notifiée.';
        } else {
            errorMessage = `Une erreur s'est produite lors de la recherche. Veuillez réessayer dans quelques instants.`;
        }

        noResults.textContent = errorMessage;
        noResults.classList.remove('hidden');
        
        document.getElementById('cyclistes-results').classList.add('hidden');
        document.getElementById('equipes-results').classList.add('hidden');
        document.getElementById('etapes-results').classList.add('hidden');
    }

    function escapeHtml(unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }
});