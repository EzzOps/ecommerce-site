// Form Validation
document.getElementById('signupForm').addEventListener('submit', function(event) {
    var email = document.getElementById('email').value;
    if (email === '') {
        alert('Please enter your email');
        event.preventDefault();
    }
});

// Dynamic Search
document.getElementById('searchInput').addEventListener('input', function() {
    var searchValue = this.value.toLowerCase();
    var productItems = document.querySelectorAll('.product-item');
    productItems.forEach(function(item) {
        if (item.textContent.toLowerCase().includes(searchValue)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});

// Slider Functionality
var slideIndex = 0;
function showSlides() {
    var slides = document.getElementsByClassName("mySlides");
    for (var i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    slides[slideIndex-1].style.display = "block";  
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
showSlides(); // Call function initially