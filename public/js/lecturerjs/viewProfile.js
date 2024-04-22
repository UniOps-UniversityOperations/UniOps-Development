function editProfile(urlroot){
    window.location.href = urlroot + '/Lecturer/editProfile/';
}

document.getElementById('subjects').addEventListener('click',()=>{
    window.location.href = urlroot + "/Lecturer/viewSubjects/";
})

document.getElementById('details').addEventListener('click',()=>{
    window.location.href = urlroot + "/Lecturer/viewProfile/";
})
  