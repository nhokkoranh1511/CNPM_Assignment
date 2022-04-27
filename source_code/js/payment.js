
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

 

function updateCartUI(){
    console.log("Tao đây");
    const cartBody = document.querySelector('#cart-body')
    cartBody.innerHTML=""
    const items = LocalCart.getLocalCartItems()
    if(items === null) return
    let count = 0
    let total = 0
    let digit = 1
    for(const [key, value] of items.entries())
    {
        const cartData = document.createElement('tr')
        cartData.classList.add('cart-data')
        let price = value.price*value.quantity
        price = price*1000
        count +=1
        total += price
        console.log(value.img)
        cartData.innerHTML =
        `
        <td class="digit"><h3>${digit}</h3></td>
        <td>
            <span><img class="pay-img" src="${value.img}"/> 
            <h3>${value.name}</h3></span>
        </td>
        <td><h3>${value.price}đ</h3></td>
        <td class="digit"><h3>${value.quantity}</h3></td>
        <td>
           <h3>${price}đ</h3>
        </td>
        `
       cartData.lastElementChild.addEventListener('click', ()=>{
           LocalCart.removeItemFromCart(key)
       })
        cartBody.append(cartData)
        digit++
    }

    const subtotal = document.querySelector('#total')
    subtotal.innerHTML = `Tổng Cộng: ${total}đ`
}
document.addEventListener('DOMContentLoaded',()=>{updateCartUI()})