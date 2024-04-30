<?php $style = "roomBookingRequests"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<style>
.hidden {
    display: none;
}

.popupmessage {
    color : red;
}
</style>

<h1>Request for Room Bookings</h1>

<?php if(intval($data["conflict"])) :?>

    <p class="popupmessage">Could not accept the Booking request because the room you are requesting is already booked for that time slot.</p>

<?php elseif($data['emailresult'] === 'success') : ?>

    <p class="popupmessage">Booking was succesfull and the email sent.</p>

<?php elseif($data['emailresult'] === "Email not send. Please try again") : ?>

    <p class="popupmessage"><?php echo $data['emailresult']; ?></p>
    
<?php endif ; ?>


<?php if(empty($data["bookingrequests"])) : ?>

    <p>No booking Requests Recieved.</p>

<?php else : ?>

    <table class="styled-table">
        <thead>
            <tr>
                <th>Room Name</th>
                <th>Request Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Purpose</th>
                <th>Description</th>
                <th>Requested By</th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody id="tbody">
            <?php foreach($data["bookingrequests"] as $row) : ?>
                <tr>
                    <td><?php echo $row->r_id; ?></td>
                    <td><?php echo $row->request_date; ?></td>
                    <td><?php echo $row->start_time; ?></td>
                    <td><?php echo $row->end_time; ?></td>
                    <td><?php echo $row->purpose; ?></td>
                    <td class='description'><?php echo !empty($row->description) ? $row->description : '---'; ?></td>
                    <td><?php echo $row->requested_by; ?></td>
                    <td>
                        <form action="<?php echo URLROOT; ?>/AdminPosts/roomBookingRequestAccepted" method="POST">
                            <button type="submit" name="submit" id="accept_button">Accept</button>
                            <input type="hidden" name="r_id" value=<?php echo $row->r_id; ?>>
                            <input type="hidden" name="request_date" value=<?php echo $row->request_date; ?>>
                            <input type="hidden" name="start_time" value=<?php echo $row->start_time; ?>>
                            <input type="hidden" name="end_time" value=<?php echo $row->end_time; ?>>
                            <input type="hidden" name="purpose" value=<?php echo $row->purpose; ?>>
                            <input type="hidden" name="requested_by" value=<?php echo $row->requested_by; ?>>
                        </form>
                    </td>
                    <td>
                        <form action="<?php echo URLROOT; ?>/AdminPosts/roomBookingRequestdenied" method="POST">
                            <button type="submit" name="submit" id="deny_button">Deny</button>
                            <input type="hidden" name="r_id" value=<?php echo $row->r_id; ?>>
                            <input type="hidden" name="request_date" value=<?php echo $row->request_date; ?>>
                            <input type="hidden" name="start_time" value=<?php echo $row->start_time; ?>>
                            <input type="hidden" name="end_time" value=<?php echo $row->end_time; ?>>
                            <input type="hidden" name="purpose" value=<?php echo $row->purpose; ?>>
                            <input type="hidden" name="requested_by" value=<?php echo $row->requested_by; ?>>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<hr>

<h1>Special Bookings outside Normal Time Table</h1>

<?php if(empty($data["bookings"])) : ?>

    <p>No booking Requests Recieved.</p>


<?php else : ?>

    <table class="styled-table">
        <thead>
            <tr>
                <th>Room Name</th>
                <th>Booking Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Event</th>
                <th>Booked By</th>
                <th></th>
            </tr>
        </thead>

        <tbody id="tbody">
            <?php foreach($data["bookings"] as $row) : ?>
                <tr>
                    <td><?php echo $row->r_id; ?></td>
                    <td><?php echo $row->booking_date; ?></td>
                    <td><?php echo $row->start_time; ?></td>
                    <td><?php echo $row->end_time; ?></td>
                    <td><?php echo $row->event; ?></td>
                    <td><?php echo $row->booked_by; ?></td>
                    <td>
                        <form action="<?php echo URLROOT; ?>/AdminPosts/roomBookingdelete" method="POST">
                            <button type="submit" name="submit" id="dlt_button">Delete</button>
                            <input type="hidden" name="r_id" value=<?php echo $row->r_id; ?>>
                            <input type="hidden" name="booking_date" value=<?php echo $row->booking_date; ?>>
                            <input type="hidden" name="start_time" value=<?php echo $row->start_time; ?>>
                            <input type="hidden" name="end_time" value=<?php echo $row->end_time; ?>>
                            <input type="hidden" name="event" value=<?php echo $row->event; ?>>
                            <input type="hidden" name="booked_by" value=<?php echo $row->booked_by; ?>>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<!-- Footer Section -->

<script>
// Wait for the DOM to be loaded before running the script
document.addEventListener("DOMContentLoaded", function() {
    // Get all elements with the class 'message'
    var messages = document.querySelectorAll('.popupmessage');
    // Loop through each message and set a timeout to hide it
    messages.forEach(function(message) {
        setTimeout(function() {
            // Hide the message by adding a 'hidden' class
            message.classList.add('hidden');
        }, 5000); // Time in milliseconds
    });
});
</script>


<?php require APPROOT . '/views/includes/adminFooter.php'; ?>



