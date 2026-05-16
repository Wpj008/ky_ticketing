const statusFilter = document.getElementById('statusFilter');
const priorityFilter = document.getElementById('priorityFilter');

const rows = document.querySelectorAll('tbody tr');

function filterTickets() {
    const selectedStatus = statusFilter.value;
    const selectedPriority = priorityFilter.value;

    rows.forEach(row => {

        const rowStatus = row.dataset.status;
        const rowPriority = row.dataset.priority;

        let show = true;

        // FILTRE STATUT
        if (selectedStatus && rowStatus !== selectedStatus) {
            show = false;
        }

        // FILTRE PRIORITÉ
        if (selectedPriority && rowPriority !== selectedPriority) {
            show = false;
        }

        row.style.display = show ? "" : "none";
    });
}

statusFilter.addEventListener('change', filterTickets);
priorityFilter.addEventListener('change', filterTickets);