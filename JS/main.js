

var btn1 = document.getElementsByClassName("btn")
var slide_item = document.getElementById("slide")

btn1[0].onclick = function(){
    slide_item.style.transform = "translateX(0%)";
}
btn1[1].onclick = function(){
    slide_item.style.transform = "translateX(-20%)";
}
btn1[2].onclick = function(){
    slide_item.style.transform = "translateX(-40%)";
}
btn1[3].onclick = function(){
    slide_item.style.transform = "translateX(-60%)";
}
btn1[4].onclick = function(){
    slide_item.style.transform = "translateX(-80%)";
}

var press = document.getElementsByClassName("press")
var slide_show = document.getElementById("one_col")



press[0].onclick = function(){
    slide_show.style.transform = "translateX(0%)";
}
press[1].onclick = function(){
    slide_show.style.transform = "translateX(-25%)";
}
press[2].onclick = function(){
    slide_show.style.transform = "translateX(-50%)";
}
press[3].onclick = function(){
    slide_show.style.transform = "translateX(-75%)";
}

// ---------Thanh trượt carousel TOP - FASHION -------------//
const carousel = document.querySelector(".carousel"),
firstImg = carousel.querySelectorAll("img")[0],
arrowIcons = document.querySelectorAll(".wrapper i");
let isDragStart = false, isDragging = false, prevPageX, prevScrollLeft, positionDiff;
const showHideIcons = () => {
    // showing and hiding prev/next icon according to carousel scroll left value
    let scrollWidth = carousel.scrollWidth - carousel.clientWidth; // getting max scrollable width
    arrowIcons[0].style.display = carousel.scrollLeft == 0 ? "none" : "block";
    arrowIcons[1].style.display = carousel.scrollLeft == scrollWidth ? "none" : "block";
}
arrowIcons.forEach(icon => {
    icon.addEventListener("click", () => {
        let firstImgWidth = firstImg.clientWidth + 14; // getting first img width & adding 14 margin value
        // if clicked icon is left, reduce width value from the carousel scroll left else add to it
        carousel.scrollLeft += icon.id == "left" ? -firstImgWidth : firstImgWidth;
        setTimeout(() => showHideIcons(), 60); // calling showHideIcons after 60ms
    });
});
const autoSlide = () => {
    // if there is no image left to scroll then return from here
    if(carousel.scrollLeft - (carousel.scrollWidth - carousel.clientWidth) > -1 || carousel.scrollLeft <= 0) return;
    positionDiff = Math.abs(positionDiff); // making positionDiff value to positive
    let firstImgWidth = firstImg.clientWidth + 14;
    // getting difference value that needs to add or reduce from carousel left to take middle img center
    let valDifference = firstImgWidth - positionDiff;
    if(carousel.scrollLeft > prevScrollLeft) { // if user is scrolling to the right
        return carousel.scrollLeft += positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
    }
    // if user is scrolling to the left
    carousel.scrollLeft -= positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
}
const dragStart = (e) => {
    // updatating global variables value on mouse down event
    isDragStart = true;
    prevPageX = e.pageX || e.touches[0].pageX;
    prevScrollLeft = carousel.scrollLeft;
}
const dragging = (e) => {
    // scrolling images/carousel to left according to mouse pointer
    if(!isDragStart) return;
    e.preventDefault();
    isDragging = true;
    carousel.classList.add("dragging");
    positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
    carousel.scrollLeft = prevScrollLeft - positionDiff;
    showHideIcons();
}
const dragStop = () => {
    isDragStart = false;
    carousel.classList.remove("dragging");
    if(!isDragging) return;
    isDragging = false;
    autoSlide();
}
carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("touchstart", dragStart);
document.addEventListener("mousemove", dragging);
carousel.addEventListener("touchmove", dragging);
document.addEventListener("mouseup", dragStop);
carousel.addEventListener("touchend", dragStop);


// detail_product-----------------------
    $(".qtyminus").on("click",function(){
        var now = $(".qty").val();
        if ($.isNumeric(now)){
            if (parseInt(now) -1> 0)
            { now--;}
            $(".qty").val(now);
        }
    })            
    $(".qtyplus").on("click",function(){
        var now = $(".qty").val();
        if ($.isNumeric(now)){
            $(".qty").val(parseInt(now)+1);
        }
    });

// -------- Form CONTACT -------
$('form').submit(function () {

    // Get the Login Name value and trim it
    var fname = $.trim($('#fname').val());
    var lname = $.trim($('#lname').val());
    var email =$.trim($('#email').val());

    // Check if empty of not
    if (fname === '') {
        alert('First name is empty.');
        return false;
    }
    else if (lname === '') {
        alert('Last Name is empty.');
        return false;
    }
    else if (email === '') {
        alert('email is empty.');
        return false;
    }
});

