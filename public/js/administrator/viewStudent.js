
document.addEventListener('DOMContentLoaded', function () {
    // Check if the side-panel-open class is already present
    var wrapper = document.querySelector('.wrapper');
    // if (wrapper && !wrapper.classList.contains('side-panel-open')) {
    //     // Add the side-panel-open class if it's not present
    //     wrapper.classList.add('side-panel-open');
    // }

    var viewButtons = document.querySelectorAll('.view_button');
    var searchInput = document.getElementById('search');
    var clearSearch = document.getElementById('clear-search');


    viewButtons.forEach(function (viewButton) {
        viewButton.addEventListener('click', function () {
            var studelntRoom = this.closest('.student_room');
            var idleView = studentRoom.querySelector('.idle-view');
            var detailedView = studentRoom.querySelector('.detailed-view');
          

            // Close all detailed views except the one associated with the clicked button
            document.querySelectorAll('.detailed-view').forEach(function (otherDetailedView) {
                if (otherDetailedView !== detailedView) {
                    otherDetailedView.style.display = 'none';
                }
            });

            // Toggle the visibility of the idle and detailed views for the corresponding room
            // idleView.style.display = idleView.style.display === 'none' ? 'block' : 'none';
            detailedView.style.display = detailedView.style.display === 'none' ? 'block' : 'none';
        });
    });

    searchInput.addEventListener('input', function () {
        var searchTerm = searchInput.value.toLowerCase();

        document.querySelectorAll('.student_room').forEach(function (studentRoom) {
            var roomName =studentRoom.dataset.roomName.toLowerCase();

            console.log('Search Term:', searchTerm);
            console.log('Room Name:', roomName);

            // Toggle the visibility based on the search term
            studentRoom.style.display = roomName.includes(searchTerm) ? 'block' : 'none';
        });
    });

    // Clear search input when the "X" is clicked
    clearSearch.addEventListener('click', function () {
        searchInput.value = '';
        document.querySelectorAll('.student_room').forEach(function (studentRoom) {
            studentRoom.style.display = 'block'; // Show all rooms
        });
    });


    
});

document.querySelectorAll(".side-panel-toggle").forEach(element => {
    element.addEventListener("click", () => {
        var wrapper = document.querySelector(".wrapper");
        if (wrapper) 
            wrapper.classList.toggle("side-panel-open");
        
        // set timeout 300ms and set style display: none;
        setTimeout(function () {
            var sidePanel = document.querySelector(".side-panel");
            // toggle displauy
        }, 300);
            
        // if (sidePanel) {
        //     sidePanel.classList.toggle("side-panel-open");
        // }

        // animate .side-panel width from 0 to 500px
        // var sidePanel = document.querySelector(".side-panel");
        // if (sidePanel) {
        //     sidePanel.classList.toggle("side-panel-open");
        // }

    });
});

document.querySelectorAll(".view_button").forEach(element => {
    element.addEventListener("click", () => {
        var wrapper = document.querySelector(".wrapper").classList.add("side-panel-open");
        // if (wrapper) {
        //     wrapper.classList.toggle("side-panel-open");
        // }
    });
});

 



