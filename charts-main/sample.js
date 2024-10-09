class ChartCreator {
    constructor(dataUrl) {
        this.dataUrl = dataUrl;
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

    createAreaChart(data) {
        new Chart(this.areaCtx, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: data.data,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
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
            this.createAreaChart(data);
        }
    }
}

const chartCreator = new ChartCreator('sample-data.json');
chartCreator.init();