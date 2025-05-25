  const cart = [];

  function addToCart(name, price) {
    const existing = cart.find(item => item.name === name);
    if (existing) {
      alert(`${name} is already in your cart.`);
      return;
    }

    cart.push({ name, price, quantity: 1 });
    renderCart();
  }

  function removeItem(name) {
    const index = cart.findIndex(item => item.name === name);
    if (index !== -1) {
      cart.splice(index, 1);
    }
    renderCart();
  }

  function renderCart() {
    const cartContainer = document.getElementById('cart-items');
    const totalDisplay = document.getElementById('total');
    cartContainer.innerHTML = '';

    let total = 0;

    cart.forEach(item => {
      const itemTotal = item.price * item.quantity;
      total += itemTotal;

      const div = document.createElement('div');
      div.className = 'cart-item';
      div.innerHTML = `
        <span>${item.name} - $${itemTotal}</span>
        <button onclick="removeItem('${item.name}')">Remove</button>
      `;
      cartContainer.appendChild(div);
    });

    totalDisplay.innerText = `Total: $${total}`;
  }