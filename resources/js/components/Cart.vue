<template>
    <div class="cart-widget">
        <span
            ref="count"
            v-show="itemsCount"
            class="items-count"
        >
            {{ itemsCount }}
        </span>

        <img
            ref="icon"
            src="/cart.png"
            alt="Cart Icon" class="cart-icon"
        />

        <svg>
            <path ref="larc" d="M 41.5 146.683956 A 77 77 0 1 1 118.5 13.3160439" stroke-dasharray="0 483.805269" />
            <path ref="rarc" d="M 41.5 146.683956 A 77 77 0 1 0 118.5 13.3160439" stroke-dasharray="0 483.805269" />
        </svg>
    </div>
</template>

<script>
    import anime from 'animejs';

    export default {
        name: 'CartWidget',

        data() {
            return {
                //itemsCount: 0,
                exists: null,
                cart: [],
            };
        },
        created() {

            this.cart = JSON.parse(localStorage.getItem("servipackCart")) || []
        },
        mounted() {
            anime({
                targets: this.$el,
                duration: 700,
                scale: [1.2, 1],
                opacity: [0, 1],
                easing: 'easeOutQuad'
            });
        },
        computed: {
            itemsCount(newValue, oldValue) {
                const idSet = new Set(this.cart.map(({ itemId, qty }) => itemId));
            //console.log(idSet.size);
                //localStorage.setItem("itemCount", JSON.stringify(newValue));
                return idSet.size
            }
        },
        methods: {
            checkIfExists(itemId) {
              //  console.log(this.cart.indexOf(itemId))
                this.exists = this.cart.indexOf(itemId)
            },
            add(itemId, qty) {
                
                var a = this.cart, b = [{itemId, qty}]
                var c = a.concat(b)
                var d = c.filter((item, pos) => c.indexOf(item) === pos)
                
                //this.cart.push({itemId, qty});

                
                //console.log(d)
                this.cart = d
                localStorage.setItem("servipackCart", JSON.stringify(this.cart));
                //this.cart = JSON.parse(localStorage.getItem("servipackCart"));              

                setTimeout(() => this.itemsCount++, 275);
                this.animate();
            },

            animate() {


                anime.timeline({
                    targets: this.$refs.icon,
                    duration: 90
                }).add({
                    scale: 0.1,
                    delay: 275,
                    easing: 'easeInQuad'
                }).add({
                    scale: 1,
                    easing: 'easeOutQuad'
                });

                const count = anime.timeline({
                    targets: this.$refs.count,
                    duration: 90
                });

                if (!this.itemsCount) {
                    count.add({
                        scale: 0,
                        duration: 0
                    });
                }

                count.add({
                    scale: 1.2,
                    delay: 275,
                    easing: 'easeInQuad'
                }).add({
                    scale: 1,
                    easing: 'easeOutQuad'
                });
            }
        }
    };
</script>

<style scoped>
    .cart-widget {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 69px;
    height: 85px;
    border: 2px solid #3a3a3a;
    border-radius: 50%;
}

    .items-count {
    width: 34px;
    height: 34px;
    border: 3px solid #4ea1c6;
    border-radius: 50%;
    position: absolute;
    top: calc(50% - 30px - 7px);
    left: calc(50% - 30px + 40px);
    z-index: 1;
    font-size: 19px;
    font-weight: bolder;
    line-height: 26px;
    text-align: center;
    color: #fff;
    background-color: #4ea1c6;
    }

    .cart-icon {
        width: 33px;
    }

    svg {
        width: 80px;
        height: 95px;
        position: absolute;
        top: -6px;
        left: -6px;
    }

    path {
        stroke: #111282;
        stroke-width: 6;
        fill: none;
    }
</style>