<?php $style = "roomBookingRequests"; ?>

<?php require APPROOT . '/views/includes/admin/adminHeader.php'; ?>

<h1>Request for Room Bookings</h1>

<!-- <?php if($data["conflict"]) :?>

    <p>Could not accept the Booking request because the room you are requesting is alredy booked for that time slot.</p>

<?php elseif($data['emailresult'] === 'success') : ?>

    <p>Booking was succesfull and the email sent.</p>

<?php elseif($data['emailresult'] === "Email not send. Please try again") : ?>

    <p><?php echo $data['emailresult']; ?></p>
    
<?php endif ; ?> -->


<?php if(empty($data["bookingrequests"])) : ?>

    <p>No booking Requests Recieved.</p>

<?php else : ?>

    <table class="styled-table">
        <thead>
            <tr>
                <th>Room Id</th>
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
                        <form action="" method="POST">
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
<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>



