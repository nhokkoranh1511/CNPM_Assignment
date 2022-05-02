
function updateCartUI(){
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
