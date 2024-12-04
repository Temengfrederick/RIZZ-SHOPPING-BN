
document.addEventListener('DOMContentLoaded', () => {
  
});
document.addEventListener('DOMContentLoaded', () => {
    console.log('Inventory Reports page loaded');
    
});

document.getElementById('search-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const query = document.getElementById('search-query').value.toLowerCase();
    const rows = document.querySelectorAll('.inventory-reports-list table tbody tr');
    rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        const text = Array.from(cells).map(cell => cell.textContent.toLowerCase()).join(' ');
        row.style.display = text.includes(query) ? '' : 'none';
    });
});
let currentPage = 1;
const reportsPerPage = 10;
const reports = Array.from(document.querySelectorAll('.inventory-reports-list table tbody tr'));
const totalPages = Math.ceil(reports.length / reportsPerPage);

function updateTable() {
    reports.forEach((report, index) => {
        report.style.display = index >= (currentPage - 1) * reportsPerPage && index < currentPage * reportsPerPage ? '' : 'none';
    });
    document.getElementById('prev-page').disabled = currentPage === 1;
    document.getElementById('next-page').disabled = currentPage === totalPages;
    document.getElementById('page-info').textContent = `Page ${currentPage} of ${totalPages}`;
}

document.getElementById('prev-page').addEventListener('click', () => {
    if (currentPage > 1) {
        currentPage--;
        updateTable();
    }
});

document.getElementById('next-page').addEventListener('click', () => {
    if (currentPage < totalPages) {
        currentPage++;
        updateTable();
    }
});

updateTable();

document.getElementById('export-pdf').addEventListener('click', () => {
   
    const doc = new jsPDF();
    doc.text('Inventory Reports', 10, 10);
    doc.autoTable({ html: '.inventory-reports-list table' });
    doc.save('inventory-reports.pdf');
});

document.getElementById('export-pdf').addEventListener('click', () => {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    doc.text('Inventory Reports', 10, 10);
    doc.autoTable({ html: '.inventory-reports-list table' });
    doc.save('inventory-reports.pdf');
});

document.getElementById('export-excel').addEventListener('click', () => {
    const wb = XLSX.utils.book_new();
    const ws = XLSX.utils.table_to_sheet(document.querySelector('.inventory-reports-list table'));
    XLSX.utils.book_append_sheet(wb, ws, 'Reports');
    XLSX.writeFile(wb, 'inventory-reports.xlsx');
});
document.addEventListener('DOMContentLoaded', () => {

    const scrollToTopButton = document.getElementById('scroll-to-top');

   
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            scrollToTopButton.style.display = 'block';
        } else {
            scrollToTopButton.style.display = 'none';
        }
    });

   
    scrollToTopButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});