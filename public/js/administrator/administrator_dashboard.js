document.addEventListener('DOMContentLoaded', function () {
    
    var streamFilter = document.getElementById("streamFilter");

        var rows = document.querySelectorAll(".styled-table tbody tr");

        function filterRows() {
            var streamValue = streamFilter.value;

            rows.forEach(function (row) {
                var streamMatch = streamValue === "" || row.cells[3].textContent === streamValue;

                row.style.display = streamMatch? "" : "none";
            });
        }

        // Attach event listeners to filters
        streamFilter.addEventListener("change", filterRows);

});