<template>
    <div style="display: inline-table;">
        <input  type="number" class="iqty" :min="unit" :step="unit" v-model="qty">
        <button
            class="add-to-cart-button"
            v-bind="$attrs"
            v-on="$listeners"
        >
            <span>Agregar</span>  <i class = "fas fa-plus"></i>
        </button>
        <button
            class="checkout-button"
            @click="toCart()"
        >
            <span>Carrito</span> <i class = "fas fa-shopping-cart"></i>
        </button>
        
        <div>
            
        <strong>$ {{ formatPrice(qty * price) }} </strong>  POR <strong>{{ qty }}</strong> UNIDADES
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                qty: 1
            };
        },
        created() {
            this.qty = this.unit
        },
        methods: {
            toCart(){
                window.location.href = "/cart"
            },
            formatPrice(value) {
                let val = (value/1).toFixed(2).replace('.', ',')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            }
        },
        props: [ 'unit', 'price', 'id' ],
        name: 'AddToCartButton'
    };
</script>

<style scoped>
    .add-to-cart-button {
        display: inline-block;
        padding: 0.4em 1em;
        border: none;
        font: inherit;
        font-size: 15px;
        text-transform: uppercase;
        color: #fff;
        background-color: #2f6410;
        cursor: pointer;
        transition: opacity 200ms ease;
    }
    .checkout-button {
        display: inline-block;
        padding: 0.4em 1em;
        border: none;
        font: inherit;
        font-size: 15px;
        text-transform: uppercase;
        border-top-right-radius: 25px;
        border-bottom-right-radius: 25px;
        color: #fff;
        background-color: #111282;
        cursor: pointer;
        transition: opacity 200ms ease;
    }

    .add-to-cart-button:hover {
        opacity: 0.75;
    }
</style>