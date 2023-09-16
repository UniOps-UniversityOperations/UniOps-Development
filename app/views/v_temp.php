<?php require APPROOT.'/views/includes/components/header.php'?>

    <h1>Hello, World!</h1>
    <p>This is a test HTML document. You can use it to experiment with HTML and see how different elements work.</p>
    <h2>Sample List</h2>
    <ul>
        <?php foreach($data['temps'] as $temp): ?>
            <li><?php echo $temp->id; ?> - <?php echo $temp->name?></li> 
        <?php endforeach; ?>
    </ul>
    <p>Feel free to modify this content and explore HTML tags, formatting, and styling.</p>

<?php require APPROOT.'/views/includes/components/footer.php'?>
