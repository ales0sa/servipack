<template>
    <div class="container">
        <div class="row">



<div class="col-12 col-lg-8">


            
            <div class="d-flex"
                style="line-height: 40px; border-bottom: 1px solid grey; /*border-top: 2px solid #354B9C*/"
            >



                <span class="list-title" style="min-width: 55%;
                font-weight: bolder; font-size: 12px;">
                    Producto
                </span>
    
                 <span class="list-title" style="min-width: 15%
                 ;font-weight: bolder; font-size: 12px;">
                     P. Unitario
                 </span>

                  <span style="min-width: 15%; font-weight: bolder;
                  font-weight: bolder; font-size: 12px;
                  ">
                      Cantidad
                  </span>

                   <span class="list-title" style="min-width: 29%; 
                   text-align: left; font-weight: bolder; font-size: 12px;">
                      Subtotal
                   </span>
                
            </div>


            <div v-for="(item, index) in finalCart" 
                :key="item.id"
                class="d-flex cart-list-item"
                style="line-height: 22px; border-bottom: 1px solid grey;"
            
            >

                <img :src="item.image" class="p-img"
                 style="margin-right: 22px">

                <span style="min-width: 45%;">
                <p style="margin-bottom: 3px;">{{ item.name }}</p>
                <span class="badge bg-light text-dark"> Mínimo {{ item.unit || 1 }} unidades.</span>
                </span>
    
                 <span class="money" style="min-width: 15%">
                $ {{ formatPrice(item.client_price) }}
                 </span>
 
                  <span class="d-flex justify-content-around" style="min-width: 14%">


                <button class="btn btn-primary btn-sm mb-1 mt-1" 
                 @click="del(item.id, item.unit,index)"> - </button>
                

                <span style="    line-height: 51px;">
                {{ giveMeQty(item.id) }}
                </span>

                <button class="btn btn-primary btn-sm mb-1 mt-1 mr-2"
                 @click="add(item.id, item.unit,index)"> + </button>
                  </span>

                   <span class="money" style="">

                $ {{ giveMeST(item.id, item.client_price) }}
                   </span>
                
                    <span style="
                    padding: 5px;
                    background: #111282;
                    color: white;
                    margin-left: auto;
                    font-weight: bolder;
                    cursor: pointer;
                    line-height: 40px;" 
                    @click="finalCart.splice(index, 1)">
                            X 
                    </span>
            </div>
            
            <div class="d-flex"
                style="line-height: 40px; border-bottom: 1px solid grey; /*border-top: 2px solid #354B9C*/"
            >

                <img src="/logo.png" class="p-img"
                 style="margin-right: 20px; opacity: 0" />

                <span class="money" style="min-width: 35%">

                </span>
    
                 <span class="money" style="min-width: 15%">

                 </span>

                  <span style="min-width: 21%; font-weight: bolder;">
                      TOTAL: 
                  </span>

                   <span class="money" style="min-width: 29%">
                      <strong> $ {{ giveMeTotal() }} </strong>
                   </span>
                
            </div>
            
</div>

<div class="col-12 col-lg-4"  v-if="!pagando && oc == 0">


    <h5>ENVÍO</h5>

        

<div class="form-check">
  <input class="form-check-input" v-model="fde" :value="0" type="radio" name="flexRadioDefaultEnv" id="flexRadioDefaultEnv1">
  <label class="form-check-label" for="flexRadioDefaultEnv1">
      Retiro en el local
  </label>
</div>


<div v-if="fde == 0" class="alert alert-primary" role="alert">

{{ retlocal }}

</div>


<div class="form-check">
  <input class="form-check-input" v-model="fde" :value="1" type="radio" name="flexRadioDefaultEnv" id="flexRadioDefaultEnv2">
  <label class="form-check-label" for="flexRadioDefaultEnv2">
    Envíos CABA y GBA ( A convenir )
  </label>
</div>

<div v-if="fde == 1" class="alert alert-primary" role="alert">

{{ retenvio }}



</div>

<div class="form-check">
  <input class="form-check-input" v-model="fde" :value="2" type="radio" name="flexRadioDefaultEnv" id="flexRadioDefaultEnv3" checked>
  <label class="form-check-label" for="flexRadioDefaultEnv3">
    Expreso
  </label>
</div>


<div v-if="fde == 2" class="alert alert-primary" role="alert">

{{ retexpre }}

<input placeholder="Nombre Expreso" />

</div>


    <h5>FORMA DE PAGO</h5>

<div class="form-check">
  <input class="form-check-input" v-model="fdp" :value="0" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
      Efectivo
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" v-model="fdp" :value="1" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
  <label class="form-check-label" for="flexRadioDefault2">
    Transferencia Bancaria
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" v-model="fdp" :value="2"  type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked>
  <label class="form-check-label" for="flexRadioDefault3">
    Mercado Pago
  </label>
</div>

<div class="mt-5 d-grid gap-2">
  <button class="btn btn-primary" @click="checkout()" type="button"> Pagar </button>
</div>
</div>
<div class="col-12 col-lg-4"  v-else>


    <div v-if="pagando" class="text-center p-4" > 
        
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        
        <h2>Generando orden...</h2>
        
         </div>

    <div class="text-center" v-if="oc >= 1 && oc.fdp !== 2">

        <div class="btn button-success">
            <i class="far fa-check-circle"></i>

        
        </div>
            
        <h2>Orden generada!</h2>

        <h1>#{{ ocdetail.id }}</h1>

    </div>
    

</div>             
                        
                   
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                itemsCount: 0,
                pagando: false,
                ocdetail: null,
                oc: 0,
                exists: null,
                cart: [],
                parsedcart: [],
                finalCart: [],
                fdp: 0,
                fde: 0,
                retlocal: 'Usted podrá retirar su compra a partir de...',
                retenvio: 'Envíos hasta 1000kg. La entrega será a partir de las 96hs ...',
                retexpre: 'Los costos y responsabilidades del envío corren por cuenta y orden del cliente. La empresa coordin...'
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
        methods: {
            checkout(){

                this.pagando = true

                let form = new FormData

                form.append('fdp',  this.fdp);
                form.append('fde',  this.fde);
                form.append('cart', JSON.stringify(this.parsedcart));

                
                
                axios.post('/generate-preference', form).then((response) => {
                    
                    setTimeout(function(){
                       // window.location.href = this.urlBack
                        console.log(response.data)
                        if(response.data.status == 'success'){



                            this.oc = response.data.oc.id
                            this.pagando = false;
                            this.ocdetail = response.data.oc

                            if(this.fdp == 2){
                                localStorage.removeItem('servipackCart')
                                window.location.href = response.data.mp
                            }else{
                                this.finalCart = []
                                localStorage.removeItem('servipackCart')
                            }


                        }
                    }.bind(this), 1000)
                })
                


            },
             del(id, qty) {


                var index = this.parsedcart.findIndex(p => p.itemId == id);
                
                let parsed = Number(this.parsedcart[index].qty)
                let unit   = Number(qty)

                if(!unit){
                    unit   = 1
                }

                if(parsed !== unit){

                    this.parsedcart[index].qty = parsed - unit
                    this.$root.$refs.cart.add(index,pqty) 
                }

                
              //  console.log(this.finalCart)
              
              
            },
            add(id, qty) {


                var index = this.parsedcart.findIndex(p => p.itemId == id);
                
                let parsed = Number(this.parsedcart[index].qty)
                let unit   = Number(qty)

                if(!unit){
                    unit   = 1
                }

                this.parsedcart[index].qty = parsed + unit

                this.$root.$refs.cart.add(index,pqty) 
                
              //  console.log(this.finalCart)
              
              
            },
            giveMeTotal(){

                let sumita = 0

                this.finalCart.forEach(element => 
                    { 
                        //console.log(element) 
                        let index = this.parsedcart.findIndex(p => p.itemId == element.id);
                        sumita += this.parsedcart[index].qty * element.client_price

                    }
                );
                    

                return this.formatPrice(sumita)
            },
            giveMeST(id, cp){

                var index = this.parsedcart.findIndex(p => p.itemId == id);
                //return 5
                return this.formatPrice(this.parsedcart[index].qty * cp)
            },
            giveMeQty(id){

                var index = this.parsedcart.findIndex(p => p.itemId == id);
                //return 5
                return this.parsedcart[index].qty
            },
            formatPrice(value) {
                let val = (value/1).toFixed(2).replace('.', ',')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            }
        }

    }
</script>

<style lang="scss" scoped>

.p-img {
    width: 50px;
    height: 50px;
}

.cart-list-item {
    .money {
        line-height: 50px; 
    }
}
</style>