<template>
    <div>
        <div v-if="loading">
            Data is loading...
        </div>
        <div v-else>
            <div class="row mb-4" v-for="row in rows" :key="'row' + row">
                <div class="col d-flex align-items-stretch"
                     v-for="(bookable, column) in bookablesInRow(row)"
                     :key="'row' + row + column">
                    <item v-bind="bookable"></item>
                </div>
                <div class="col" v-for="p in placeholdersInRow(row)" :key="'placeholder' + row + p"></div>
            </div>

        </div>

    </div>
</template>

<script>
import BookableListItem from "./BookableListItem"
export default {
    components: {
        item: BookableListItem
    },
    data() {
        return {
            bookables: null,
            loading: false,
            columns: 3
        }
    },
    computed: {
        rows() {
            return this.bookables === null
                ? 0
                : Math.ceil(this.bookables.length / this.columns)
        }
    },
    methods: {
        bookablesInRow(row) {
            return this.bookables.slice((row - 1) * this.columns, row * this.columns);
        },
        placeholdersInRow(row) {
            return this.columns - this.bookablesInRow(row).length
        }
    },
    // beforeCreate() {
    //     console.error('before create');
    // },
    created() {
        this.loading = true;

        const request = axios.get('/api/bookables').then(response => {
            this.bookables = response.data.data;
            this.loading = false;
        });
        console.log(request);
    },
    // beforeMount() {
    //     console.error('before mount');
    // },
    mounted() {
        console.error('mounted');
    },
    // beforeDestroy() {
    //     console.error('before destroy');
    // },
    // destroyed() {
    //     console.error('destroyed');
    // }

}
</script>

<style scoped>

</style>
