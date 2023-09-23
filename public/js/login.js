//make checkboxes mutually exclusive

const checkboxes = document.querySelectorAll('.mutually-exclusive');

checkboxes.forEach((checkbox) => {
    checkbox.addEventListener('change', function () {
        if (this.checked) {
            checkboxes.forEach((otherCheckbox) => {
                if (otherCheckbox !== this) {
                    otherCheckbox.checked = false;
                    otherCheckbox.value = false; // Set the value of other checkboxes to false
                } else {
                    this.value = true; // Set the value of the checked checkbox to true
                }
            });
        }
    });
});