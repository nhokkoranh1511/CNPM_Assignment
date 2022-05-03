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

let pizza = document.getElementById("pizza");
let appetizer = document.getElementById("appetizer");
let beverage = document.getElementById("beverage");

let pizza_button = document.getElementById("piza");
let appetizer_button = document.getElementById("side-food");
let beverage_button = document.getElementById("drink");

function drinkTime() {
    if (appetizer_button.classList.contains('active'))
    {
        appetizer_button.classList.remove('active');
    }
    if (!beverage_button.classList.contains('active'))
    {
        beverage_button.classList.add('active');
    }
    if (pizza_button.classList.contains('active'))
    {
        pizza_button.classList.remove('active');
    }
    pizza.style.display = "none";
    appetizer.style.display = "none";
    beverage.style.display = "block";
}

function pizzaTime() {
    if (appetizer_button.classList.contains('active'))
    {
        appetizer_button.classList.remove('active');
    }
    if (beverage_button.classList.contains('active'))
    {
        beverage_button.classList.remove('active');
    }
    if (!pizza_button.classList.contains('active'))
    {
        pizza_button.classList.add('active');
    }
    pizza.style.display = "block";
    appetizer.style.display = "none";
    beverage.style.display = "none";
}

function appeTime() {
    if (!appetizer_button.classList.contains('active'))
    {
        appetizer_button.classList.add('active');
    }
    if (beverage_button.classList.contains('active'))
    {
        beverage_button.classList.remove('active');
    }
    if (pizza_button.classList.contains('active'))
    {
        pizza_button.classList.remove('active');
    }
    pizza.style.display = "none";
    appetizer.style.display = "block";
    beverage.style.display = "none";
}

pizza_button.onclick = pizzaTime();
appetizer_button.onclick = appeTime();
beverage_button.onclick = drinkTime();