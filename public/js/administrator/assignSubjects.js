
document.addEventListener('DOMContentLoaded', function () {
    // Get references to the button and the form
    var addButton = document.querySelector('.add_button');
    var popupForm = document.querySelector('.popup-form');

    // Add click event listener to the button
    addButton.addEventListener('click', function (event) {
        // Prevent the default behavior of the link
        event.preventDefault();

        // Display the pop-up form
        popupForm.style.display = 'block';
    });

    // Close the pop-up form when clicking outside it
    document.addEventListener('click', function (event) {
        if (event.target === popupForm) {
            popupForm.style.display = 'none';
        }
    });



    var streamFilter = document.getElementById("streamFilter");
        var yearFilter = document.getElementById("yearFilter");
        var semesterFilter = document.getElementById("semesterFilter");

        var rows = document.querySelectorAll(".styled-table tbody tr");

        function filterRows() {
            var streamValue = streamFilter.value;
            var yearValue = yearFilter.value;
            var semesterValue = semesterFilter.value;

            rows.forEach(function (row) {
                var streamMatch = streamValue === "" || row.cells[5].textContent === streamValue;
                var yearMatch = yearValue === "" || row.cells[2].textContent === yearValue;
                var semesterMatch = semesterValue === "" || row.cells[3].textContent === semesterValue;

                row.style.display = streamMatch && yearMatch && semesterMatch ? "" : "none";
            });
        }

        // Attach event listeners to filters
        streamFilter.addEventListener("change", filterRows);
        yearFilter.addEventListener("change", filterRows);
        semesterFilter.addEventListener("change", filterRows);
    
});

