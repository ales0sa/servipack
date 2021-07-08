<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ORDEN #</div>

                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                mode: 'modal',                
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
                expreso: null,
                comprobante: null,
                retlocal: 'Usted podrá retirar su compra a partir de...',
                retenvio: 'Envíos hasta 1000kg. La entrega será a partir de las 96hs ...',
                retexpre: 'Los costos y responsabilidades del envío corren por cuenta y orden del cliente. La empresa coordin...',
                datosban: 'CBU.. BANCO...'
            };
        },
        created() {


            this.$nextTick(() => {

                axios.get('/myorder/' +  this.$route.params.id)
                .then((response) => {
                   console.log(response.data)
                });
            })



        }
    }
</script>
