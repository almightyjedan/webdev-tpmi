document.addEventListener('DOMContentLoaded', function () {
				const swiper = new Swiper('.projectSwiper', {
					slidesPerView: 1,
					spaceBetween: 24,
					loop: false,
					breakpoints: {
						640: { slidesPerView: 2 },
						1024: { slidesPerView: 4 },
					},
					navigation: {
						nextEl: '.btn-next',
						prevEl: '.btn-prev',
					},
				});
			});

			const newsSwiper = new Swiper('.newsSwiper', {
				slidesPerView: 1,
				spaceBetween: 20,
				loop: true,
				grabCursor: true,
				
				freeMode: {
					enabled: true,
					sticky: true,
				},

				autoplay: {
					delay: 3500,
					disableOnInteraction: false,
				},

				navigation: {
					nextEl: '.news-next',
					prevEl: '.news-prev',
				},

				observer: true,
				observeParents: true,

				breakpoints: {
					425: {
						slidesPerView: 1.2,
						spaceBetween: 20,
					},
					// Tablet (768px)
					768: {
						slidesPerView: 2,
						spaceBetween: 30,
					},
					// Laptop (1024px)
					1024: {
						slidesPerView: 4,
						spaceBetween: 30,
						freeMode: false,
					},
				},
			});

document.addEventListener('DOMContentLoaded', function () {
    const chartEl = document.getElementById('solutionsDonutChart');
    if (!chartEl) return;

    const labels = JSON.parse(chartEl.dataset.labels || '[]');
    const values = JSON.parse(chartEl.dataset.values || '[]');
    
    const total = values.reduce((a, b) => a + b, 0);

    new Chart(chartEl, {
        type: 'doughnut',
        plugins: [ChartDataLabels],
        data: {
            labels: labels,
            datasets: [{
                data: values,
                backgroundColor: [
                    '#0a213a',
                    '#154375',
                    '#7294b6',
                    '#5da9e9',
                    '#94c1a4',
                    '#a3a3a3',
                    '#878796',
                ],
                borderWidth: 0,
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
                padding: 70
            },
            cutout: '50%',
            plugins: {
                legend: {
                    display: false
                },
                datalabels: {
                    offset: 15,
                    color: '#000',
                    anchor: 'end',
                    align: 'end',
                    offset: 10,
                    textAlign: 'center',
                    font: {
                        size: 11,
                        weight: 'bold',
                        family: 'Arial'
                    },
                    formatter: (value, ctx) => {
                        let label = ctx.chart.data.labels[ctx.dataIndex];
                        let percentage = ((value / total) * 100).toFixed(1) + '%';
                        return label.split(' ').join('\n') + '\n' + percentage;
                    }
                },
                tooltip: {
                    enabled: true
                }
            }
        }
    });
});