const body = document.body;
const smallImg = document.querySelectorAll(".full-img");
const cvImg = document.querySelectorAll(".cv-img");
const modal = document.querySelector(".modal");
const closeBtn = document.querySelector(".modal-btn");
console.log(closeBtn)

smallImg.forEach(function(img) {
  img.addEventListener("click", function() {
    img.classList.toggle("full-imgs");
    // closeBtn.classList.add("shows");
    img.classList.toggle("avatar-img");
    
  }) 
})
// closeBtn.addEventListener("click", function() {
//    smallImg.forEach(function(img) {
//     img.classList.remove("full-imgs");
//     img.classList.add("avatar-img")
//    })
// })
// smallImg.forEach(function(img) {
//   img.classList.remove("full-imgs")
//   img.classList.add("avatar-img");
// })






cvImg.forEach(function(img) {
  img.addEventListener("click", function() {
    img.classList.toggle("cv-imgs");
    img.classList.toggle("avatar-img");
  })
})


// apply
const apply = document.querySelectorAll(".apply");

apply.forEach(function(app) {
  app.addEventListener("click", function() {
    alert("Only Applicants Can Apply");
  })
})


// addjob 
// const addjob = document.querySelector(".addjob");

// addjob.forEach(function(adds) {
//   adds.addEventListener("click", function() {
//     alert("Only Employers Can Apply");
//   })
// })




