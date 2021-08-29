<template>
  <div class="container">
    <div class="row">
      <div v-if="errors.expreso" class="alert alert-danger" role="alert">
        Ingresa el nombre del expreso.
      </div>
      <div v-if="errors.comprobante" class="alert alert-danger" role="alert">
        Ingresa el comprobante de la transferencia.
      </div>
      <div v-if="errors.direccion" class="alert alert-danger" role="alert">
        Ingresa una dirección de entrega.
      </div>

      <div class="text-center" v-if="finishedOrder">
        <div class="btn button-success">
          <i class="far fa-check-circle"></i>
        </div>

        <h2>Orden generada!</h2>

        <h1>#{{ ocdetail.id }}</h1>

        <a href="/myorders"> Ir a mis ordenes </a>
      </div>

      <div class="col-12 col-lg-8" v-if="finalCart.length && !pagando">
        <div
          class="d-flex"
          style="
            line-height: 40px;
            border-bottom: 1px solid grey; /*border-top: 2px solid #354B9C*/
          "
        >
          <span
            class="list-title"
            style="min-width: 55%; font-weight: bolder; font-size: 12px"
          >
            Producto
          </span>

          <span
            class="list-title"
            style="min-width: 15%; font-weight: bolder; font-size: 12px"
          >
            P. Unitario
          </span>

          <span
            style="
              min-width: 15%;
              font-weight: bolder;
              font-weight: bolder;
              font-size: 12px;
            "
          >
            Cantidad
          </span>

          <span
            class="list-title"
            style="
              min-width: 29%;
              text-align: left;
              font-weight: bolder;
              font-size: 12px;
            "
          >
            Subtotal
          </span>
        </div>

        <div
          v-for="(item, index) in finalCart"
          :key="item.id"
          class="d-flex cart-list-item"
          style="line-height: 22px; border-bottom: 1px solid grey"
        >
          <img :src="item.image" class="p-img" style="margin-right: 22px" />

          <span style="min-width: 45%">
            <p style="margin-bottom: 3px">{{ item.name }}</p>
            <span class="badge bg-light text-dark">
              Mínimo {{ item.unit || 1 }} unidades.</span
            >
          </span>

          <span class="money" style="min-width: 15%">
            $ {{ formatPrice(item.client_price) }}
          </span>

          <span class="d-flex justify-content-around" style="min-width: 14%">
            <button
              class="btn btn-primary btn-sm mb-1 mt-1"
              @click="del(item.id, item.unit, index)"
            >
              -
            </button>

            <span style="line-height: 51px">
              {{ giveMeQty(item.id) }}
            </span>

            <button
              class="btn btn-primary btn-sm mb-1 mt-1 mr-2"
              @click="add(item.id, item.unit, index)"
            >
              +
            </button>
          </span>

          <span class="money" style="">
            $ {{ giveMeST(item.id, item.client_price) }}
          </span>

          <span
            style="
              padding: 5px;
              background: #111282;
              color: white;
              margin-left: auto;
              font-weight: bolder;
              cursor: pointer;
              line-height: 40px;
            "
            @click="removeFromCart(index)"
          >
            X
          </span>
        </div>

        <div
          class="d-flex"
          style="
            line-height: 40px;
            border-bottom: 1px solid grey; /*border-top: 2px solid #354B9C*/
          "
        >
          <img
            src="/logo.png"
            class="p-img"
            style="margin-right: 20px; opacity: 0"
          />

          <span class="money" style="min-width: 35%"> </span>

          <span class="money" style="min-width: 15%"> </span>

          <span style="min-width: 21%; font-weight: bolder"> TOTAL: </span>

          <span class="money" style="min-width: 29%">
            <strong> $ {{ giveMeTotal() }} </strong>
          </span>
        </div>
        <div class="mt-3">

          <strong>Complete estos campos porfavor: </strong>

          <div class="form-group mt-3">
            <input placeholder="Telefono de contacto" v-model="telefono" class="form-control" />
          </div>
          <div class="form-group mt-3">
            <input
              v-if="fde !== 0"
              placeholder="Dirección de entrega"
              v-model="direccion"
              class="form-control"
            />
          </div>
        </div>
      </div>
      <div
        class="col-12 col-lg-12 text-center p-5"
        v-else-if="oc == 0 && !pagando"
      >
        <h3>Tu carrito esta vacío !</h3>

        <a href="/productos"> SELECCIONAR PRODUCTOS </a>
      </div>

      <!--- 
<div v-if="pagando || failedMP" class="text-center p-4 col-12 col-lg-4"  > 
        
        <div class="spinner-border text-primary" role="status" v-if="!failedMP">
            <span class="visually-hidden">Espere...</span>
        </div>
        
        <h2 v-if="fdp !== 2">Generando orden...</h2>
        <h2 v-else-if="fdp == 2 && !failedMP">Esperando pago...</h2>
        <span v-else-if="fdp == 2 && failedMP"> 
            <p>No completaste el pago! Puedes reintentarlo o cambiar la forma de pago.</p>
            <a href="#" @click="checkout()"> REINTENTAR </a>
        </span>

    </div>
--->

      <div class="col-12 col-lg-4" v-if="!pagando && finalCart.length">
        <h5>ENVÍO</h5>

        <div class="form-check">
          <input
            class="form-check-input"
            v-model="fde"
            :value="0"
            type="radio"
            name="flexRadioDefaultEnv"
            id="flexRadioDefaultEnv1"
          />
          <label class="form-check-label" for="flexRadioDefaultEnv1">
            Retiro en el local
          </label>
        </div>

        <div
          v-if="fde == 0"
          class="alert alert-primary"
          role="alert "
          v-html="retlocal"
        ></div>

        <div class="form-check">
          <input
            class="form-check-input"
            v-model="fde"
            :value="1"
            type="radio"
            name="flexRadioDefaultEnv"
            id="flexRadioDefaultEnv2"
          />
          <label class="form-check-label" for="flexRadioDefaultEnv2">
            Envíos CABA y GBA ( A convenir )
          </label>
        </div>

        <div
          v-if="fde == 1"
          class="alert alert-primary"
          role="alert"
          v-html="retenvio"
        ></div>

        <div class="form-check">
          <input
            class="form-check-input"
            v-model="fde"
            :value="2"
            type="radio"
            name="flexRadioDefaultEnv"
            id="flexRadioDefaultEnv3"
            checked
          />
          <label class="form-check-label" for="flexRadioDefaultEnv3">
            Expreso
          </label>
        </div>

        <div
          v-if="fde == 2"
          class="alert alert-primary"
          role="alert"
          v-html="retexpre"
        ></div>
        <input
          v-if="fde == 2"
          placeholder="Nombre Expreso"
          v-model="expreso"
          class="form-control"
        />

        <h5>FORMA DE PAGO</h5>

        <div class="form-check">
          <input
            class="form-check-input"
            v-model="fdp"
            :value="0"
            type="radio"
            name="flexRadioDefault"
            id="flexRadioDefault1"
          />
          <label class="form-check-label" for="flexRadioDefault1">
            Efectivo
          </label>
        </div>
        <div class="form-check">
          <input
            class="form-check-input"
            v-model="fdp"
            :value="1"
            type="radio"
            name="flexRadioDefault"
            id="flexRadioDefault2"
          />
          <label class="form-check-label" for="flexRadioDefault2">
            Transferencia Bancaria
          </label>
        </div>

        <div
          v-if="fdp == 1"
          class="alert alert-primary"
          role="alert"
          v-html="datosban"
        ></div>
        <input v-if="fdp == 1" type="file" v-on:change="onChange" />

        <div class="form-check">
          <input
            class="form-check-input"
            v-model="fdp"
            :value="2"
            type="radio"
            name="flexRadioDefault"
            id="flexRadioDefault3"
            checked
          />
          <label class="form-check-label" for="flexRadioDefault3">
            Mercado Pago
          </label>
        </div>

        <div class="mt-5 d-grid gap-2">
          <button
            v-if="finalCart.length"
            class="btn btn-success"
            @click="checkout()"
            type="button"
          >
            Pagar
          </button>
        </div>
      </div>

      <!---
      --->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      mode: "modal",
      itemsCount: 0,
      direccion: "",
      telefono: "",
      finishedOrder: false,
      pagando: false,
      failedMP: false,
      ocdetail: null,
      oc: 0,
      exists: null,
      cart: [],
      parsedcart: [],
      finalCart: [],
      errors: [],
      fdp: 0,
      fde: 0,
      expreso: "",
      comprobante: null,
      retlocal: "Usted podrá retirar su compra a partir de...",
      retenvio: "Envíos hasta 1000kg. La entrega será a partir de las 96hs ...",
      retexpre:
        "Los costos y responsabilidades del envío corren por cuenta y orden del cliente. La empresa coordin...",
      datosban: "CBU.. BANCO...",
    };
  },
  created() {
    this.$nextTick(() => {
      this.cart = JSON.parse(localStorage.getItem("servipackCart")) || [];

      // first, convert data into a Map with reduce
      let counts = this.cart.reduce((prev, curr) => {
        let count = prev.get(curr.itemId) || 0;
        prev.set(curr.itemId, Number(curr.qty) + count);
        return prev;
      }, new Map());

      // then, map your counts object back to an array
      let reducedObjArr = [...counts].map(([itemId, qty]) => {
        return { itemId, qty };
      });

      //console.log(reducedObjArr);
      this.parsedcart = reducedObjArr;

      let ids = Object.keys(this.parsedcart)
        .map((x) => {
          if (this.parsedcart[x].qty > 0) {
            return this.parsedcart[x].itemId;
          }
        })
        .filter(Boolean); // elimino undefined elements
      axios
        .get("/api/cart", {
          params: { ids: ids.join(",") },
        })
        .then((response) => {
          this.finalCart = response.data.cart;
          this.retlocal = response.data.retlocal;
          this.retenvio = response.data.retenvio;
          this.retexpre = response.data.retexpre;
          this.datosban = response.data.datosban;
        });
    });
  },
  methods: {
    onChange(e) {
      this.comprobante = e.target.files[0];
    },
    checkoutReturn(data) {
      //console.log(data)
      this.failedMP = true;
      this.pagando = false;
    },
    checkout() {
      this.pagando = true;

      let form = new FormData();

      if(this.fde == 2){

        form.append("expreso", this.expreso);
      }

      if(this.fde == 1){
        form.append("comprobante", this.comprobante);
      }

      form.append("fdp", this.fdp);
      form.append("fde", this.fde);
      form.append("direccion", this.direccion);
      form.append("telefono", this.telefono);
      form.append("cart", JSON.stringify(this.parsedcart));

      this.errors = [];
      this.oc = 0;
      this.pagando = true;

      axios
        .post("/generate-preference", form)
        .then((response) => {
          setTimeout(
            function () {
              if (
                response.data.status == "success" ||
                response.data.status == "pending"
              ) {
                this.oc = response.data.oc.id;
                this.pagando = false;

                this.ocdetail = response.data.oc;

                if (this.fdp == 2) {
                  //localStorage.removeItem('servipackCart')

                  if (this.mode !== "modal") {
                    window.location.href = response.data.mp;
                  } else {
                    $MPC.openCheckout({
                      mode: "modal",
                      url: response.data.mp,
                      onreturn: this.checkoutReturn,
                    });
                  }
                } else {


                  this.finishedOrder = true;
                  this.finalCart = [];
                  localStorage.removeItem("servipackCart");

                }
              } else {
                alert("ERROR");
              }

            }.bind(this),
            1000
          );
        })
        .catch((error) => {
          console.log("ERRRR:: ", error.response.data);
          this.pagando = false;
          this.errors = error.response.data.errors;
        });
    },
    removeFromCart(index){
      this.finalCart.splice(index, 1);

      //localStorage.setItem('servipackCart', this.finalCart);

    },
    del(itemId, qty) {  
                var index = this.parsedcart.findIndex((p) => p.itemId == itemId);

                let parsed = Number(this.parsedcart[index].qty) - qty;
                var a = this.cart, b = [{itemId, parsed}]
                var c = a.concat(b)
                var d = c.filter((item, pos) => c.indexOf(item) === pos)
                
                console.log(d)         


    },
      del(id, qty) {
      var index = this.parsedcart.findIndex((p) => p.itemId == id);

      let parsed = Number(this.parsedcart[index].qty);
      let unit = Number(qty);

      if (!unit) {
        unit = 1;
      }

      this.parsedcart[index].qty = parsed - unit;
      this.$root.$refs.cart.add(this.parsedcart[index].itemId, -qty);
      //this.$root.$refs.cart.add(index, pqty);

      //  console.log(this.finalCart)
    },
    add(id, qty) {
      var index = this.parsedcart.findIndex((p) => p.itemId == id);

      let parsed = Number(this.parsedcart[index].qty);
      let unit = Number(qty);

      if (!unit) {
        unit = 1;
      }

      this.parsedcart[index].qty = parsed + unit;
      this.$root.$refs.cart.add(this.parsedcart[index].itemId, qty);
      //this.$root.$refs.cart.add(index, pqty);

      //  console.log(this.finalCart)
    },
    giveMeTotal() {
      let sumita = 0;

      this.finalCart.forEach((element) => {
        //console.log(element)
        let index = this.parsedcart.findIndex((p) => p.itemId == element.id);
        sumita += this.parsedcart[index].qty * element.client_price;
      });

      return this.formatPrice(sumita);
    },
    giveMeST(id, cp) {
      var index = this.parsedcart.findIndex((p) => p.itemId == id);
      //return 5
      return this.formatPrice(this.parsedcart[index].qty * cp);
    },
    giveMeQty(id) {
      var index = this.parsedcart.findIndex((p) => p.itemId == id);
      //return 5
      return this.parsedcart[index].qty;
    },
    formatPrice(value) {
      let val = (value / 1).toFixed(2).replace(".", ",");
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
  },
};
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