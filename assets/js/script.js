const statusFilter = document.getElementById('statusFilter');// Récupérer les éléments du DOM
const priorityFilter = document.getElementById('priorityFilter');// Récupérer les lignes du tableau

const rows = document.querySelectorAll('tbody tr');// Fonction de filtrage des tickets

function filterTickets() {// Récupérer les valeurs sélectionnées dans les filtres
    const selectedStatus = statusFilter.value;
    const selectedPriority = priorityFilter.value;

    rows.forEach(row => {// Récupérer les données de statut et de priorité de chaque ligne

        const rowStatus = row.dataset.status;
        const rowPriority = row.dataset.priority;

        let show = true;

        // FILTRE STATUT
        if (selectedStatus && rowStatus !== selectedStatus) {// Si un statut est sélectionné et que le statut de la ligne ne correspond pas, ne pas afficher la ligne
            show = false;
        }

        // FILTRE PRIORITÉ
        if (selectedPriority && rowPriority !== selectedPriority) {// Si une priorité est sélectionnée et que la priorité de la ligne ne correspond pas, ne pas afficher la ligne
            show = false;
        }

        row.style.display = show ? "" : "none";// Afficher ou masquer la ligne en fonction des critères de filtrage
    });
}

statusFilter.addEventListener('change', filterTickets);// Ajouter des écouteurs d'événements pour les filtres
priorityFilter.addEventListener('change', filterTickets);// Initialiser le filtrage au chargement de la page