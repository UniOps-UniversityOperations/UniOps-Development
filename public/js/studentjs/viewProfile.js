function editProfile(urlroot){
    window.location.href = urlroot + '/Student/editProfile/';
}

//Preview Profile Image

const profilePicInput = document.getElementById('profilePicInput');
const imgContainer = document.getElementById('profilepicture');

profilePicInput.addEventListener('change',function(event){
    const file = this.files[0];
    if(file){
        const reader = new FileReader();

        reader.addEventListener('load',function(){
            imgContainer.setAttribute('src',this.result);
        });
        reader.readAsDataURL(file);
    }
})

clearProfilePicture = document.getElementById('clearProfilePic');
clearProfilePicture.addEventListener('click',()=> {
    window.location.href = urlroot + "/Student/clearProfilePicture/";
})