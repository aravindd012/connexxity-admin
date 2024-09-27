
// BOM Table to Excel
function bomToExcel(tableID, filename) {
    var table = document.getElementById(tableID);
    var workbook = XLSX.utils.table_to_book(table, { sheet: "Sheet1" });
    XLSX.writeFile(workbook, filename);
}

// Estimate (Supply and Installation table) to excel
function estimateToExcel(tables, filename) {
    var workbook = XLSX.utils.book_new(); // Create a new workbook
    var sheetNames = ['Supply Cost','Installation Cost','Overall Cost'];
    tables.forEach((tableID, index) => {
        var table = document.getElementById(tableID);
        if(table){
            var worksheet = XLSX.utils.table_to_sheet(table);
            var sheetName = sheetNames[index];
            XLSX.utils.book_append_sheet(workbook, worksheet, sheetName); // Add each table as a new sheet
        } 
    });

    // Save the workbook
    XLSX.writeFile(workbook, filename);
}


// Function to export BOM table as PDF using jsPDF
function bomToPDF(tableID, filename) {
    // Ensure jsPDF is properly referenced from the 'window' object
    const { jsPDF } = window.jspdf; // Correct usage
    var doc = new jsPDF();
    
    var table = document.getElementById(tableID);

    // Using AutoTable plugin to convert the table to PDF
    doc.autoTable({ html: table });

    // Save the generated PDF with a filename
    doc.save(filename);
}

// Function to export Estimate page Tables to PDF
function estimateToPDF(tables, filename) {
    const { jsPDF } = window.jspdf; // Ensure jsPDF is properly referenced
    var doc = new jsPDF();
    
    // Check if autoTable is available
    if (typeof doc.autoTable === 'undefined') {
        console.error('The autoTable plugin is not available in jsPDF.');
        return;
    }

    // Loop through each table and add it to the PDF
    tables.forEach((tableID, index) => {
        var table = document.getElementById(tableID);
        if (table) {  // Check if the table exists in the DOM
            doc.autoTable({ html: table }); // Add the table to the PDF

            if (index < tables.length - 1) { 
                doc.addPage(); // Add a new page after each table, except the last one
            }
        } else {
            console.warn(`Table with ID "${tableID}" not found.`);
        }
    });

    // Save the generated PDF
    doc.save(filename);
}

