<template>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mt-3">
                    <label class="form-label" :for="nombre">Nombre</label>
                    <div class="input-group">
                        <input
                            type="text"
                            class="form-control"
                            :id="nombre"
                            :name="nombre"
                            v-model="nombre"
                            :disabled="disabledForm"
                        >
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label" :for="empresa">Empresa</label>
                    <div class="input-group">
                        <input
                            type="text"
                            class="form-control"
                            :id="empresa"
                            :name="empresa"
                            v-model="empresa"
                            :disabled="disabledForm"
                        >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-3">
                    <label class="form-label" :for="telefono">Teléfono</label>
                    <div class="input-group">
                        <input
                            type="text"
                            class="form-control"
                            :id="telefono"
                            :name="telefono"
                            v-model="telefono"
                            :disabled="disabledForm"
                        >
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label" :for="email">Email</label>
                    <div class="input-group">
                        <input
                            type="text"
                            class="form-control"
                            :id="email"
                            :name="email"
                            v-model="email"
                            :disabled="disabledForm"
                        >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <label class="form-label" :for="consulta">Escriba acá su consulta</label>
                    <div class="input-group">
                        <textarea
                            class="form-control"
                            :id="consulta"
                            :name="consulta"
                            v-model="consulta"
                            :disabled="disabledForm"
                            rows="5"
                        ></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mt-3">
                    <div class="custom-control custom-checkbox">
                        <input
                        type="checkbox"
                        v-bind:true-value="1"
                        v-bind:false-value="0"
                        v-model.number="accept_conditions"
                        class="custom-control-input"
                        id="customCheck1"
                        :disabled="disabledForm"
                        >
                        <label class="custom-control-label" for="customCheck1">Acepto los términos y condiciones de privacidad</label>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="d-flex align-items-end justify-content-end" v-if="accept_conditions == 1">
                        <button class="outline-btn outline-btn--orange" v-if="saving == 0" @click="recaptcha">CONSULTAR</button>
                        <div class="btn btn-message" v-if="saving == 1"><i class="fas fa-spinner fa-pulse"></i> ENVIANDO</div>
                        <div class="btn btn-message btn-message--success" v-if="saving == 2"><i class="fas fa-check"></i> ENVIADO CON ÉXITO</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    var publicPATH = document.head.querySelector('meta[name="public-path"]').content;

    export default {
        props: {
            urlData: '',
            urlBack: '',
            urlAction: '',
            formName: '',
        },
        components: {},
        data(){
            return{
                publicPATH: publicPATH,
                nombre: '',
                empresa: '',
                telefono: '',
                email: '',
                consulta: '',
                recaptcha_token: '',
                accept_conditions: 0,
                saving: 0,
                disabledForm: false
            }
        },
        created() {
            this.$nextTick(() => {});
        },
        updated: function () {
            this.$nextTick(function () {
            })
        },
        methods: {
            async recaptcha() {
                this.saving = 1
                this.disabledForm = true
                try {
                    // (optional) Wait until recaptcha has been loaded.
                    await this.$recaptchaLoaded()

                    // Execute reCAPTCHA with action "login".
                    const token = await this.$recaptcha('login')
                    this.recaptcha_token = token
                } catch(e) {
                    this.saving = 0
                }
                this.postForm()
            },
            postForm() {
                console.log(this.recaptcha_token)
                var form = new FormData();
                form.append('nombre',          this.nombre);
                form.append('empresa',         this.empresa);
                form.append('telefono',        this.telefono);
                form.append('email',           this.email);
                form.append('consulta',        this.consulta);
                form.append('recaptcha_token', this.recaptcha_token);
                axios.post(this.urlAction, form).then((response) => {
                    this.saving = 2
                    setTimeout(function(){
                       // window.location.href = this.urlBack
                    }.bind(this), 1000)
                })
                //this.loaded = 1
            },
        }
  }
</script>
<style lang="scss" scoped>
    .btn--custom-dark {
        background-color: #000;
        border: 1px solid #000;
        border-radius: 0;
        color: #FFF;
        padding-left: 30px;
        padding-right: 30px;
        font-weight: 600;
        letter-spacing: .3px;
        white-space: nowrap;
        &:hover {
            background-color: #FFF;
            color: #000;
        }
    }
    /*.form-control {
        border-color: #000
    }*/
    label {
        font-size: 16px;
        font-weight: 600;
        color: #485057;
    }
</style>