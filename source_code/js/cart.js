
class CartItem{
    constructor(name, img, price, id){
        this.id = id;
        this.name = name
        this.img=img
        this.price = price
        this.quantity = 1
   }
}
class LocalCart{
    static key = "cartItems"

    static getLocalCartItems(){
        let cartMap = new Map()
     const cart = localStorage.getItem(LocalCart.key)   
     if(cart===null || cart.length===0)  return cartMap
        return new Map(Object.entries(JSON.parse(cart)))
    }

    static addItemToLocalCart(id, item){
        let cart = LocalCart.getLocalCartItems()
        if(cart.has(id)){
            let mapItem = cart.get(id)
            mapItem.quantity +=1
            cart.set(id, mapItem)
        }
        else
        cart.set(id, item)
       localStorage.setItem(LocalCart.key,  JSON.stringify(Object.fromEntries(cart)))
       updateCartUI()
        
    }

    static removeItemFromCart(id){
    let cart = LocalCart.getLocalCartItems()
    if(cart.has(id)){
        let mapItem = cart.get(id)
        if(mapItem.quantity>1)
       {
        mapItem.quantity -=1
        cart.set(id, mapItem)
       }
       else
       cart.delete(id)
    } 
    if (cart.length===0)
    localStorage.clear()
    else
    localStorage.setItem(LocalCart.key,  JSON.stringify(Object.fromEntries(cart)))
       updateCartUI()
    }
}


const cartIcon = document.querySelector('.fa-cart-arrow-down')
const wholeCartWindow = document.querySelector('.whole-cart-window')
wholeCartWindow.inWindow = 0
$(".butto").click(function(){
    const id = this.parentElement.parentElement.getAttribute("data-id")
    const img = this.parentElement.parentElement.children[0].src;
    console.log(img)
    const name = this.parentElement.parentElement.parentElement.children[1].textContent
    let price = this.parentElement.parentElement.parentElement.children[3].textContent
    price = price.replace("đ", '')
    const item = new CartItem(name, img, price, id)
    LocalCart.addItemToLocalCart(id, item)
})


cartIcon.addEventListener('click', ()=>{
if(wholeCartWindow.classList.contains('hide'))
wholeCartWindow.classList.remove('hide');
else wholeCartWindow.classList.add('hide');
})
 

function updateCartUI(){
    const cartWrapper = document.querySelector('.cart-wrapper')
    cartWrapper.innerHTML=""
    const items = LocalCart.getLocalCartItems()
    if(items === null) return
    let count = 0
    let total = 0
    for(const [key, value] of items.entries()){
        const cartItem = document.createElement('div')
        cartItem.classList.add('cart-item')
        let price = value.price*value.quantity
        price = price*1000
        count +=1
        total += price
        console.log(value.img)
        cartItem.innerHTML =
        `
        <img src="${value.img}"> 
                       <div class="details">
                           <h3>${value.name}</h3>
                           <p>
                            <span class="quantity">Số lượng: ${value.quantity}</span>
                               <span class="price">Giá: ${price}đ</span>
                           </p>
                       </div>
                       <div class="cancel"><i class="fas fa-window-close"></i></div>
        `
       cartItem.lastElementChild.addEventListener('click', ()=>{
           LocalCart.removeItemFromCart(key)
       })
        cartWrapper.append(cartItem)
    }

    if(count > 0){
        cartIcon.classList.add('non-empty')
        let root = document.querySelector(':root')
        root.style.setProperty('--after-content', `"${count}"`)
        const subtotal = document.querySelector('.subtotal')
        subtotal.innerHTML = `Tổng Cộng: ${total}đ`
    }
    else
    {
    const subtotal = document.querySelector('.subtotal')
    subtotal.innerHTML = `Tổng Cộng: 0đ`
    cartIcon.classList.remove('non-empty')
    }
}
document.addEventListener('DOMContentLoaded',()=>{updateCartUI()})

$("#Ipay").click(function(){
    data = LocalCart.getLocalCartItems();
    objectSend = new Array();
    for(const [key, value] of data.entries()){
        curObject = {id:parseInt(key),value:value.quantity};
        
        objectSend.push(curObject);
    }
    objectSend = JSON.stringify(objectSend);
    $("#ipayfoodlist").attr("value",objectSend);
    $("#ipayform").submit();
});


$("#Wpay").click(function(){
    data = LocalCart.getLocalCartItems();
    objectSend = new Array();
    for(const [key, value] of data.entries()){
        curObject = {id:parseInt(key),value:value.quantity};
        
        objectSend.push(curObject);
    }
    objectSend = JSON.stringify(objectSend);
    $("#wpayfoodlist").attr("value",objectSend);
    $("#wpayform").submit();
});