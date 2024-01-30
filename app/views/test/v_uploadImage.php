<!-- this variable is used to set the css file for this view -->
<?php $style = "viewAssets"; ?> 

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<style>
.database_images{
    width: 500px;
}

/* Styline the Heading of Image Gallery */
.heading{ 
	display: flex;
	justify-content: center;
	align-items: center;
	font-size: 30px;
	background: #121FCF;
	background: linear-gradient(to right, #0e85e0 0%, #26ff1a 100%);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
}
/* Styling gallery section where all images are */
.gallery {
	width: 90%;
	margin:0 auto;
	display:grid;
	grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
	grid-gap: 20px;
	justify-content:center;
	align-items: center; 
}

/* Styling Particular Image */
.gallery-img {
	width: 200px;
	height: 200px;
	cursor: pointer;
	transition: transform 0.2s;
}
/* onHover image will expand little bit */
.gallery-img:hover {
	transform: scale(1.1);
	cursor: zoom-in;
}
/* This section will be seen when we click on image */
.image-popup-container {
	display: none;
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 0.8);
}

/* close button when we want to close the bigger image */
.close-button {
	position: absolute;
	top: 80px;
	right: 50px;
	font-size:60px;
	color: #fff;
	cursor: pointer;
}
.close-button:hover{
	color: red;
}

/* when we click on the image it will expand in bigger size and will displayed 
at middle of screen */
#popupImage {
	display: block;
	max-width: 80%;
	max-height: 80%;
	margin: 0 auto;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
}

/* Making images more responsive for smaller size device */
@media (max-width:670px) {
	.gallery{
		grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
		grid-gap: 10px;
	}
	.gallery-img{
		width:150px;
		height: 150px;
	}

	.heading{
		font-size: 20px;
	}
}

</style>

<script>
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
  
</script>


<form method="post" action="<?php echo URLROOT; ?>/Test/upload/" enctype="multipart/form-data">
   <input type="file" name="image" required/>
   <input type="submit" name="submit" value="Upload" />
</form>


<div class="heading">
	<h1>Image Gallery</h1>
</div>

<!-- Image Gallery section all image in one div -->
<div class="gallery">

    <?php foreach($data['posts'] as $post) : ?>

    <div>
    <!-- <p class="row_num"><?php echo $i++; ?></p> -->

    <img class="database_images" class="gallery-img" onclick="showImage(src)" src="data:image/jpeg;base64,<?php echo base64_encode($post->data); ?>" alt="image">
        
    </div>

    <?php endforeach; ?>
        
	 
</div>

<!-- Image containter where image will show in big size -->
<div class="image-popup-container" id="imagePopup">
    <span class="close-button" onclick="closeImage()">×</span>
    <img src="" alt="Popup Image" id="popupImage">
</div>


<?php require APPROOT . '/views/includes/adminFooter.php'; ?>