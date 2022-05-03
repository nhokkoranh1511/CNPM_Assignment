document.addEventListener("DOMContentLoaded", function(event) {
    const cartButtons = document.querySelectorAll('.cart-button');
    cartButtons.forEach(button => {
    button.addEventListener('click',cartClick);
    });
    
    function cartClick(){
    let button =this;
    button.classList.add('clicked');
    } 
    });

$("#piza").click(function(){
    if ($("#side-food").classList.contains('active'))
    {
        $("#side-food").classList.remove('active');
    }
    if ($("#drink").classList.contains('active'))
    {
        $("#drink").classList.remove('active');
    }
    if (!this.classList.contains('active'))
    {
        this.classList.add('active');
    }
    $("#pizza").style.display = "block";
    $("#appetizer").style.display = "none";
    $("#beverage").style.display = "none";
})
$("#side-food").click(function(){
    if (!this.classList.contains('active'))
    {
        this.classList.add('active');
    }
    if ($("#drink").classList.contains('active'))
    {
        $("#drink").classList.remove('active');
    }
    if ($("#piza").classList.contains('active'))
    {
        $("#piza").classList.remove('active');
    }
    $("#pizza").style.display = "none";
    $("#appetizer").style.display = "block";
    $("#beverage").style.display = "none";
})
$("#drink").click(function(){
    if ($("#side-food").classList.contains('active'))
    {
        $("#side-food").classList.remove('active');
    }
    if (!this.classList.contains('active'))
    {
        this.classList.add('active');
    }
    if ($("#piza").classList.contains('active'))
    {
        $("#piza").classList.remove('active');
    }
    $("#pizza").style.display = "none";
    $("#appetizer").style.display = "none";
    $("#beverage").style.display = "block";
})
$('.title').each(function(){
    let rand = Math.floor(Math.random() * 3);
    let star_vote1 = $('<div data-aos="fade-up" class="d-flex align-content-center justify-content-center rating"><span class="fas fa-star"></span><span class="fas fa-star"></span><span class="fas fa-star"></span><span class="fas fa-star"></span><span class="fas fa-star"></span></div>');
    let star_vote2 = $('<div data-aos="fade-up" class="d-flex align-content-center justify-content-center rating"><span class="fas fa-star"></span><span class="fas fa-star"></span><span class="fas fa-star"></span><span class="fas fa-star"></span><span class="far fa-star"></span></div>');
    let star_vote3 = $('<div data-aos="fade-up" class="d-flex align-content-center justify-content-center rating"><span class="fas fa-star"></span><span class="fas fa-star"></span><span class="fas fa-star"></span><span class="far fa-star"></span><span class="far fa-star"></span></div>');
    if (rand == 0)
    {
        star_vote1.insertAfter(this);
    }
    else if (rand == 1)
    {
        star_vote2.insertAfter(this);
    }
    else {
        star_vote3.insertAfter(this);
    }  
})


