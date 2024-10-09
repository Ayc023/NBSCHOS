class ChartCreator {
    constructor(dataUrl) {
        this.dataUrl = dataUrl;
        this.barCtx = document.getElementById('myChart');
        this.pieCtx = document.getElementById('pieChart');
        this.lineCtx = document.getElementById('lineChart'); 
        this.areaCtx = document.getElementById('areaChart'); 
    }

    async fetchData() {
        try {
            const response = await fetch(this.dataUrl);
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return await response.json();
        } catch (error) {
            console.error('There has been a problem with your fetch operation:', error);
        }
    }

    // Function to process data to create time-based labels
    processData(data) {
        const counts = {
            weeks: Array(52).fill(0),   // Assuming 52 weeks in a year
            months: Array(12).fill(0),   // 12 months in a year
            years: {}
        };

        data.forEach(record => {
            const date = new Date(record.basic_info_date); // Ensure this matches your PHP output

            if (isNaN(date)) return; // Skip invalid dates

            const week = Math.floor(date.getTime() / (1000 * 60 * 60 * 24 * 7)); // Week calculation
            const month = date.getMonth(); // 0-11 for months
            const year = date.getFullYear();

            counts.weeks[week % 52]++; // Ensure we stay within 0-51 for weeks
            counts.months[month]++;

            // Count by year
            if (!counts.years[year]) {
                counts.years[year] = 0;
            }
            counts.years[year]++;
        });

        // Convert years object to arrays for charts
        const yearsArray = Object.keys(counts.years).map(year => `${year}`);
        const yearCounts = yearsArray.map(year => counts.years[year]);

        return {
            weeks: counts.weeks,
            months: counts.months,
            years: { yearsArray, yearCounts }
        };
    }

    createBarChart(data) {
        new Chart(this.barCtx, {
            type: 'bar',
            data: {
                labels: data.weeks.map((_, index) => `Week ${index + 1}`), // Create labels for weeks
                datasets: [{
                    label: 'Patients per Week',
                    data: data.weeks,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    createPieChart(data) {
        const monthNames = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        new Chart(this.pieCtx, {
            type: 'pie',
            data: {
                labels: monthNames, // Use actual month names for labels
                datasets: [{
                    label: 'Patients per Month',
                    data: data.months,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    tooltip: {
                        callbacks: {
                            label: (tooltipItem) => {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });
    }

    createLineChart(data) {
        new Chart(this.lineCtx, {
            type: 'line',
            data: {
                labels: data.years.yearsArray, // Years for the X-axis
                datasets: [{
                    label: 'Patients per Year',
                    data: data.years.yearCounts,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: false,
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    createAreaChart(data) {
        new Chart(this.areaCtx, {
            type: 'line',
            data: {
                labels: data.years.yearsArray, // Years for the X-axis
                datasets: [{
                    label: 'Patients per Year',
                    data: data.years.yearCounts,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: true,
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    async init() {
        const data = await this.fetchData();
        if (data) {
            const processedData = this.processData(data.data); // Process the fetched data
            this.createBarChart(processedData);
            this.createPieChart(processedData);
            this.createLineChart(processedData);
            this.createAreaChart(processedData);
        }
    }
}

// Create an instance of ChartCreator and initialize it
const chartCreator = new ChartCreator('fetch_data.php'); // Change to your PHP endpoint
chartCreator.init();
