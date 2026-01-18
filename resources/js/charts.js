
import Chart from 'chart.js/auto';


Chart.defaults.font.family = "'Plus Jakarta Sans', sans-serif";
Chart.defaults.color = '#64748b';


const initDashboardCharts = () => {


    const revenueCanvas = document.getElementById('revenueChart');
    if (revenueCanvas) {
        const ctxRevenue = revenueCanvas.getContext('2d');
        let chartData;
        const rawChartAttr = revenueCanvas.getAttribute('data-chart');
        try {
            chartData = JSON.parse(rawChartAttr);
        } catch (err) {
            // Try to fix common issues (HTML-encoded quotes) and recover gracefully
            try {
                chartData = JSON.parse(rawChartAttr.replace(/&quot;/g, '"'));
            } catch (err2) {
                console.error('revenueChart: failed to parse data-chart', rawChartAttr, err2);
                chartData = { labels: [], data: [] };
            }
        }

        
        // Gradient for the line chart
        const gradientRevenue = ctxRevenue.createLinearGradient(0, 0, 0, 300);
        gradientRevenue.addColorStop(0, 'rgba(236, 72, 153, 0.2)'); // #ec4899 with opacity
        gradientRevenue.addColorStop(1, 'rgba(236, 72, 153, 0)');

        new Chart(ctxRevenue, {
            type: 'line',
            data: {
                labels: chartData.labels,
                datasets: [{
                    label: 'Revenue ($)',
                    data: chartData.data,
                    borderColor: '#ec4899', // Pink 500
                    backgroundColor: gradientRevenue,
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#ec4899',
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#18181b',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: '#ec4899',
                        borderWidth: 1,
                        padding: 10,
                        displayColors: false,
                        callbacks: {
                            label: (context) => ` $${context.raw.toLocaleString()}`
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#f1f5f9', borderDash: [5, 5] },
                        ticks: { callback: (value) => '$' + value / 1000 + 'k' }
                    },
                    x: { grid: { display: false } }
                }
            }
        });
    }

    // --- CATEGORY CHART ---
    const categoryCanvas = document.getElementById('categoryChart');
    if (categoryCanvas) {
        const ctxCategory = categoryCanvas.getContext('2d');
        
        new Chart(ctxCategory, {
            type: 'doughnut',
            data: {
                labels: ['Guitars', 'Keyboards', 'Drums', 'Accessories'],
                datasets: [{
                    data: [45, 25, 20, 10],
                    backgroundColor: [
                        '#ec4899', // Pink 500
                        '#831843', // Pink 900
                        '#fce7f3', // Pink 100
                        '#18181b'  // Dark 900
                    ],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '75%',
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#18181b',
                        bodyColor: '#fff',
                        callbacks: {
                            label: (context) => ` ${context.label}: ${context.raw}%`
                        }
                    }
                }
            }
        });
    }
};

// Execute when DOM is ready
document.addEventListener('DOMContentLoaded', initDashboardCharts);
