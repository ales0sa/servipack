<template>
    <div class="container">
        <div>

            <div v-for="item in finalCart" :key="item.id"  class="d-flex">

                <img :src="item.image" class="p-img">

                {{ item.name }}

    
                {{ item.unit }}

                {{ item.client_price }}

                
            </div>                        
                        
                   
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                itemsCount: 0,
                exists: null,
                cart: [],
                parsedcart: [],
                finalCart: []
            };
        },
        created() {


            this.$nextTick(() => {

            this.cart = JSON.parse(localStorage.getItem("servipackCart")) || []


            // first, convert data into a Map with reduce
            let counts = this.cart.reduce((prev, curr) => {
            let count = prev.get(curr.itemId) || 0;
            prev.set(curr.itemId, Number(curr.qty) + count);
            return prev;
            }, new Map());

            // then, map your counts object back to an array
            let reducedObjArr = [...counts].map(([itemId, qty]) => {
            return {itemId, qty}
            })

            //console.log(reducedObjArr);
            this.parsedcart = reducedObjArr


                let ids = Object.keys(this.parsedcart).map((x) => {
                    if (this.parsedcart[x].qty > 0) {                        
                        return this.parsedcart[x].itemId
                   }
                }).filter(Boolean) // elimino undefined elements
                axios.get('/api/cart', {
                    params: { ids: ids.join(',') }
                })
                .then((response) => {
                    this.finalCart = response.data
                   
                });
            })



        },

    }
</script>

<style scoped>

.p-img {
    width: 50px;
}
</style>