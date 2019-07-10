import app from './components/App.vue';
import product from './components/main/Product.vue';
import cart from './components/shopping_cart/Cart.vue';


export default [
	{path: '/' , component: app},
	{path: '/products/:id' , name: 'product',  component: product},
	{path: '/cart' , name: 'cart',  component: cart},
]

