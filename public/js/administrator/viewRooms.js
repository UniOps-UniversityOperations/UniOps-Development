
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
    var filterType = document.getElementById('filter-type');


    filterType.addEventListener('change', function () {
        var selectedType = this.value.toLowerCase();

        // Show/hide lecture rooms based on the selected type
        document.querySelectorAll('.lecture_room').forEach(function (lectureRoom) {
            var roomType = lectureRoom.dataset.roomType.toLowerCase();
            lectureRoom.style.display = roomType.includes(selectedType) ? 'block' : 'none';
        });
    });


    viewButtons.forEach(function (viewButton) {
        viewButton.addEventListener('click', function () {
            var lectureRoom = this.closest('.lecture_room');
            var idleView = lectureRoom.querySelector('.idle-view');
            var detailedView = lectureRoom.querySelector('.detailed-view');
            // var detailedView = lectureRoom.querySelector('.lecture_room_body');

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

        document.querySelectorAll('.lecture_room').forEach(function (lectureRoom) {
            var roomName = lectureRoom.dataset.roomName.toLowerCase();

            console.log('Search Term:', searchTerm);
            console.log('Room Name:', roomName);

            // Toggle the visibility based on the search term
            lectureRoom.style.display = roomName.includes(searchTerm) ? 'block' : 'none';
        });
    });

    // Clear search input when the "X" is clicked
    clearSearch.addEventListener('click', function () {
        searchInput.value = '';
        document.querySelectorAll('.lecture_room').forEach(function (lectureRoom) {
            lectureRoom.style.display = 'block'; // Show all rooms
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


$(document).ready(function () {
    // Function to update the visibility of image_section
    function updateImageSectionVisibility() {
        var index = $(".lecture_room .view_button").index(this);
        // var isSidePanelOpen = $(".side-panel").hasClass("open");
        // var isSideItemActive = $(".side_item.active");

        $(".image_section").toggle(index);
    }

    $(".lecture_room .view_button").click(function () {
        // get the index of the lecture_room div
        var index = $(".lecture_room .view_button").index(this);

        // toggle display block on index of side_item
        $(".side_item").removeClass("active");
        $(".side_item").eq(index).toggleClass("active");

        // show or hide the image_section based on the active class
        updateImageSectionVisibility();
    });

    // onclick .delete_button prevent default and confirm
    $(".delete_button").click(function (e) {
        e.preventDefault();
        var c = confirm("Are you sure you want to delete this room?");
        if (c) {
            // get href from parent div
            var href = $(this).parent().attr("href");
            // follow the href
            window.location.href = href;
        }
    });

    // Toggle visibility when side panel is opened/closed
    $(".side-panel-toggle").click(function () {
        $(".side-panel").toggleClass("open");
        updateImageSectionVisibility();
    });

    // Close side panel and remove image_section
    $(".side-panel .sp-icon-close").click(function () {
        $(".side-panel").removeClass("open");
        $(".side_item.active").removeClass("active"); // remove active class from side_item
        updateImageSectionVisibility();
    });
});

function showImage(imageSrc) {
let popupImage = document.getElementById("popupImage");
popupImage.src = imageSrc;

let imagePopup = document.getElementById("imagePopup");
imagePopup.style.display = "block";
document.body.style.overflow = "hidden";
}
// function to hide the image when we click on cross button
function closeImage() {
let imagePopup = document.getElementById("imagePopup");
imagePopup.style.display = "none";
document.body.style.overflow = "auto";
}



