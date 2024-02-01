
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

function sliceSize(dataNum, dataTotal) {
    return (dataNum / dataTotal) * 360;
}

function addSlice(id, sliceSize, pieElement, offset, sliceID, color) {
    var slice = document.createElement('div');
    slice.className = 'slice ' + sliceID;
    slice.innerHTML = '<span></span>';
    pieElement.appendChild(slice);

    offset = offset - 1;
    var sizeRotation = -179 + sliceSize;

    slice.style.transform = 'rotate(' + offset + 'deg) translate3d(0,0,0)';
    slice.querySelector('span').style.cssText = 'transform: rotate(' + sizeRotation + 'deg) translate3d(0,0,0); background-color: ' + color;
}

function iterateSlices(id, sliceSize, pieElement, offset, dataCount, sliceCount, color) {
    var maxSize = 179;
    var sliceID = 's' + dataCount + '-' + sliceCount;

    if (sliceSize <= maxSize) {
        addSlice(id, sliceSize, pieElement, offset, sliceID, color);
    } else {
        addSlice(id, maxSize, pieElement, offset, sliceID, color);
        iterateSlices(id, sliceSize - maxSize, pieElement, offset + maxSize, dataCount, sliceCount + 1, color);
    }
}

function createPie(id) {
    var listData = [];
    var listTotal = 0;
    var offset = 0;
    var i = 0;
    var pieElement = document.querySelector(id + ' .pie-chart__pie');
    var dataElement = document.querySelector(id + ' .pie-chart__legend');

    var color = [
        'navy',
        'cornflowerblue'
    ];

    dataElement.querySelectorAll('span').forEach(function (span) {
        listData.push(Number(span.innerHTML));
    });

    for (i = 0; i < listData.length; i++) {
        listTotal += listData[i];
    }

    for (i = 0; i < listData.length; i++) {
        var size = sliceSize(listData[i], listTotal);
        iterateSlices(id, size, pieElement, offset, i, 0, color[i]);
        dataElement.querySelector('li:nth-child(' + (i + 1) + ')').style.borderColor = color[i];
        offset += size;
    }
}

function createPieCharts() {
    createPie('.pieID--micro-skills');
    createPie('.pieID--categories');
    createPie('.pieID--operations');
    createPie('.pieID--hello');
}

createPieCharts();
