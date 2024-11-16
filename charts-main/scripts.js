// Gender Distribution Chart
const genderCtx = document.getElementById('genderDistribution').getContext('2d');
new Chart(genderCtx, {
    type: 'pie',
    data: {
        labels: ['Male', 'Female'],
        datasets: [{
            data: [60, 40], // Percentage data
            backgroundColor: ['#36a2eb', '#ff6384']
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'bottom' }
        }
    }
});

// Obesity Trends Chart
const obesityCtx = document.getElementById('obesityTrends').getContext('2d');
new Chart(obesityCtx, {
    type: 'bar',
    data: {
        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'], // Example labels
        datasets: [{
            label: 'Obesity Cases',
            data: [10, 20, 15, 25], // Example data
            backgroundColor: '#4bc0c0'
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false }
        },
        scales: {
            x: { title: { display: true, text: 'Week' } },
            y: { title: { display: true, text: 'Cases' } }
        }
    }
});

// Pregnancy Trends Chart
const pregnancyCtx = document.getElementById('pregnancyTrends').getContext('2d');
new Chart(pregnancyCtx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr'], // Example labels
        datasets: [{
            label: 'Pregnant Students',
            data: [5, 10, 15, 20], // Example data
            borderColor: '#ff6384',
            fill: false,
            tension: 0.1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' }
        },
        scales: {
            x: { title: { display: true, text: 'Month' } },
            y: { title: { display: true, text: 'Students' } }
        }
    }
});
