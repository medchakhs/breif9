// script.js
const cartItems = document.getElementById('cart-items');
const totalPriceElement = document.getElementById('total-price');
let cart = [];

function updateCart() {
    cartItems.innerHTML = '';
    let totalPrice = 0;

    cart.forEach(item => {
        const li = document.createElement('li');
        li.textContent = `${item.name} - $${item.price} x ${item.quantity}`;
        cartItems.appendChild(li);

        totalPrice += item.price * item.quantity;
    });

    totalPriceElement.textContent = `Total: $${totalPrice.toFixed(2)}`;
}

document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', () => {
        const productName = button.getAttribute('data-product');
        const productPrice = parseFloat(button.getAttribute('data-price'));

        const existingItem = cart.find(item => item.name === productName);

        if (existingItem) {
            existingItem.quantity++;
        } else {
            cart.push({ name: productName, price: productPrice, quantity: 1 });
        }

        updateCart();
    });
});
