// server.js

const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');

const app = express();

// Подключение к MongoDB
mongoose.connect('mongodb://localhost/shoppingCart', {
  useNewUrlParser: true,
  useUnifiedTopology: true,
});

// Создаем модель товара
const Product = mongoose.model('Product', new mongoose.Schema({
  name: String,
  price: Number,
}));

// Создаем модель корзины
const Cart = mongoose.model('Cart', new mongoose.Schema({
  products: [{
    product: {
      type: mongoose.Schema.Types.ObjectId,
      ref: 'Product',
    },
    quantity: Number,
  }],
}));

app.use(bodyParser.json());

// Добавление товара в корзину
app.post('/cart', async (req, res) => {
  const { productId } = req.body;

  // Проверяем, есть ли товар в корзине
  let cart = await Cart.findOne({});
  if (!cart) {
    cart = new Cart({ products: [] });
  }

  let existingProduct = cart.products.find(item => item.product.toString() === productId);

  if (existingProduct) {
    // Если товар уже есть в корзине, увеличиваем количество
    existingProduct.quantity++;
  } else {
    // Если товара нет в корзине, добавляем его
    cart.products.push({ product: productId, quantity: 1 });
  }

  await cart.save();
  res.json(cart);
});

// Запуск сервера
app.listen(3000, () => {
  console.log('Server is running on port 3000');
});