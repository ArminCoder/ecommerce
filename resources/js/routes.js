import app from './components/App.vue';
import product from './components/main/Product.vue';

export default [
	{path: '/' , component: app},
	{path: '/products/:id' , name: 'product',  component: product},
]

