@props(['chartData', 'chartId', 'title'])

<div class="bg-white shadow p-3">
    {{$title}}
    
    <canvas id="{{$chartId}}"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const ctx = document.getElementById("<?php echo $chartId; ?>").getContext('2d');
        const data = @json($chartData);

        new Chart(ctx, {
            type: data['type'],
            data: data,
            options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
            }
        });
    });
</script>