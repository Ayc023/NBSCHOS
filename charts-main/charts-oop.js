class ChartCreator {
    constructor(dataUrl) {
        this.dataUrl = dataUrl;
        this.barCtx = document.getElementById('myChart');
        this.pieCtx = document.getElementById('pieChart');
        this.lineCtx = document.getElementById('lineChart');
        this.areaCtx = document.getElementById('areaChart');

        // Check if canvas elements exist
        if (!this.barCtx || !this.pieCtx || !this.lineCtx || !this.areaCtx) {
            console.error('One or more chart elements are missing from the HTML.');
            throw new Error('Chart elements missing');
        }
    }

    async fetchData() {
        try {
            const response = await fetch(this.dataUrl);
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            const data = await response.json();
            // Validate the structure of the data
            if (!data || !Array.isArray(data.data)) {
                throw new Error('Invalid data format');
            }
            return data;
        } catch (error) {
            console.error('There has been a problem with your fetch operation:', error);
            return null; // Return null if there's an error
        }
    }

    processData(data) {
        const counts = {
            weeks: Array(52).fill(0),
            months: Array(12).fill(0),
            years: {}
        };

        data.forEach(record => {
            const date = new Date(record.date);
            if (isNaN(date)) return; // Skip invalid dates

            const week = Math.floor((date - new Date(date.getFullYear(), 0, 1)) / (1000 * 60 * 60 * 24 * 7));
            const month = date.getMonth();
            const year = date.getFullYear();

            counts.weeks[week % 52]++;
            counts.months[month]++;
            counts.years[year] = (counts.years[year] || 0) + 1; // Increment the year count
        });

        const yearsArray = Object.keys(counts.years).map(year => `${year}`);
        const yearCounts = yearsArray.map(year => counts.years[year]);

        return { weeks: counts.weeks, months: counts.months, years: { yearsArray, yearCounts } };
    }

    createBarChart(data) {
        new Chart(this.barCtx, {
            type: 'bar',
            data: {
                labels: data.weeks.map((_, index) => `Week ${index + 1}`),
                datasets: [{
                    label: 'Patients per Week',
                    data: data.weeks,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
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
                labels: monthNames,
                datasets: [{
                    label: 'Patients per Month',
                    data: data.months,
                    backgroundColor: this.getPieChartColors(monthNames.length),
                    borderColor: this.getPieChartColors(monthNames.length, true),
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
                labels: data.years.yearsArray,
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
                responsive: true, // Ensure chart resizes responsively
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Year', // Title for X axis
                        },
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Patients', // Title for Y axis
                        },
                    }
                },
                plugins: {
                    legend: {
                        display: true, // Show the legend
                    },
                    tooltip: {
                        enabled: true // Show tooltips on hover
                    }
                }
            }
        });
    }

    createAreaChart(data) {
        new Chart(this.areaCtx, {
            type: 'line',
            data: {
                labels: data.years.yearsArray,
                datasets: [{
                    label: 'Patients per Year (Area)',
                    data: data.years.yearCounts,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: true,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true, // Ensure chart resizes responsively
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Year', // Title for X axis
                        },
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Patients', // Title for Y axis
                        },
                    }
                },
                plugins: {
                    legend: {
                        display: true, // Show the legend
                    },
                    tooltip: {
                        enabled: true // Show tooltips on hover
                    }
                }
            }
        });
    }

    getPieChartColors(count, isBorder) {
        const colors = [];
        for (let i = 0; i < count; i++) {
            colors.push(isBorder ? `rgba(255, 99, 132, 1)` : `rgba(255, 99, 132, 0.2)`);
        }
        return colors;
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
const chartCreator = new ChartCreator('fetch_data.php');
chartCreator.init();