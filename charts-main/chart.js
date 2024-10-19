const barCtx = document.getElementById('myChart');
const pieCtx = document.getElementById('pieChart');
const lineCtx = document.getElementById('lineChart');
const areaCtx = document.getElementById('areaChart');

// Check if canvas elements exist
if (!barCtx || !pieCtx || !lineCtx || !areaCtx) {
    console.error('One or more chart elements are missing from the HTML.');
    return; // Exit if any canvas is missing
}

const monthNames = [
    'January', 'February', 'March', 'April', 'May', 'June',
    'July', 'August', 'September', 'October', 'November', 'December'
];

// Fetch data from the PHP endpoint
fetch('fetch_data.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok: ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        const patientData = data.data;

        // Validate the structure of patientData
        if (!Array.isArray(patientData) || patientData.length === 0) {
            console.error('Invalid data structure:', patientData);
            return; // Exit if data is invalid
        }

        // Extract relevant data
        const ages = patientData.map(item => item.age_sex);
        const labels = patientData.map(item => item.name); // Using first names as labels
        const counts = Array(12).fill(0); // For 12 months

        patientData.forEach(item => {
            const date = new Date(item.date);
            if (!isNaN(date)) {
                const month = date.getMonth(); // Get month (0-11)
                counts[month]++;
            }
        });

        // Create charts
        createBarChart(labels, ages);
        createPieChart(labels, ages);
        createLineChart(counts);
        createAreaChart(counts);
    })
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
    });

// Function to create the bar chart
function createBarChart(labels, data) {
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Ages of Patients',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                hoverBackgroundColor: 'rgba(54, 162, 235, 0.8)'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    labels: {
                        font: {
                            size: 14,
                            weight: 'bold'
                        }
                    }
                }
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
}

// Function to create the pie chart
function createPieChart(labels, data) {
    new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: 'Ages of Patients',
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba (75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        font: {
                            size: 13,
                            weight: 'bold'
                        }
                    }
                }
            }
        }
    });
}

// Function to create the line chart
function createLineChart(data) {
    new Chart(lineCtx, {
        type: 'line',
        data: {
            labels: monthNames,
            datasets: [{
                label: 'Patients per Month',
                data: data,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: false,
                borderWidth: 2,
                tension: 0.4
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    labels: {
                        font: {
                            size: 14,
                            weight: 'bold'
                        }
                    }
                }
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
}

// Function to create the area chart
function createAreaChart(data) {
    new Chart(areaCtx, {
        type: 'line',
        data: {
            labels: monthNames,
            datasets: [{
                label: 'Patients per Month (Area)',
                data: data,
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                fill: true,
                borderWidth: 2,
                tension: 0.4
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    labels: {
                        font: {
                            size: 14,
                            weight: 'bold'
                        }
                    }
                }
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
}