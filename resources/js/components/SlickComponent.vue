<template>
    <div class="slick">
        <div class="slick__container">
            <button class="slick__arrow slick__arrow--left" @click="prevItem"><i class="far fa-arrow-alt-circle-left"></i></button>
            <div class="slick__items" style="">
                <div class="slick__div" v-for="(item, key) in chunks[displayChunk]" :key="key">
                    <img :src="item" alt="" >
                </div>
            </div>
            <button class="slick__arrow slick__arrow--right" @click="nextItem"><i class="far fa-arrow-alt-circle-right"></i></button>
        </div>
        <div class="slick__dots mt-4">
            <div class="slick__dot" :class="{ 'slick__dot--active': displayChunk == dot - 1 }" v-for="dot in chunks.length" :key="dot" @click="displayChunk = dot - 1"></div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['images'],
        components: {},
        data(){
            return{
                items: [],
                chunks: [],
                count: 0,
                displayLength: 7,
                displayChunk: 0
            }
        },
        created() {
            this.items = JSON.parse(this.images)
            this.resize()
        },
        updated: function () {},
        methods: {
            prevItem() {
                this.displayChunk--
                let length = this.chunks.length - 1
                if (this.displayChunk < 0) {
                    this.displayChunk = length
                }
            },
            nextItem() {
                this.displayChunk++
                let length = this.chunks.length - 1
                if (this.displayChunk > length) {
                    this.displayChunk = 0
                }
            },
            recalculate() {
                let chunks = () => {
                    var results = [];
                    
                    // let items = Object.assign({}, this.items)
                    // Vue.set(vm.someObject, 'b', 2)
                    // this.$set(this.someObject, 'b', 2)
                    let items = Object.values(this.items)
                    while (items.length) {
                        results.push(items.splice(0, this.displayLength));
                    }
                    return results;
                }
                this.chunks = chunks()
            },
            resize() {
                let displayLength = 6
                if (document.documentElement.clientWidth < 991.98) {
                    displayLength = 4
                }
                if (document.documentElement.clientWidth < 767.98) {
                    displayLength = 3
                }
                if (document.documentElement.clientWidth < 575.98) {
                    displayLength = 2
                }
                this.displayLength = displayLength
                this.recalculate()
            }
        }
  }
</script>
<style lang="scss" scoped>
    .slick {
        &__container {
            display: flex;
        }
        &__div {
            vertical-align: middle;
            box-shadow: 4px 3px 6px #00000029;
            border: 1px solid #F2F2F2;
            border-radius: 12px;
            padding: 17px;
            background: white;
            width: 160px;
            text-align: center;
            height: 100%;
        }
        &__items {
            flex-grow: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            overflow: hidden;
        }
        &__arrow {
            border: none;
            background: none;
            color:rgba(0, 0, 0, .3);
            &:hover {
                color:rgba(0, 0, 0, .4);
            }
            &--left {
            }
            &--right {
            }
        }
        &__dots {
            display: flex;
            justify-content: center;
        }
        &__dot {
            width: 16px;
            height: 16px;
            border-radius: 100%;
            background-color: var(--gray);
            margin: 0 5px;
            &--active {
                background-color: var(--darkgray);
            }
        }
        img {
            height: 140px;
        }
    }
</style>