<div class="w-full md:w-1/2 p-3">
    <!--Graph Card-->
    <div class="bg-white border rounded shadow">
        <div class="border-b p-3">
            <h5 class="font-bold uppercase text-gray-600">Graph</h5>
        </div>
        <div class="p-5">
            <canvas id="chartjs-0" class="chartjs" width="undefined" height="undefined"></canvas>
            <script>
            new Chart(document.getElementById("chartjs-0"), {
                "type": "line",
                "data": {
                    "labels": ["January", "February", "March", "April", "May", "June", "July"],
                    "datasets": [{
                        "label": "Views",
                        "data": [65, 59, 80, 81, 56, 55, 40],
                        "fill": false,
                        "borderColor": "rgb(75, 192, 192)",
                        "lineTension": 0.1
                    }]
                },
                "options": {}
            });
            </script>
        </div>
    </div>
    <!--/Graph Card-->
</div>