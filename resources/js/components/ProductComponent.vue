
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                Here is the list of products
                <div>
                    <bootstrap-table 
                        :rows="products" 
                        :columns="columns" 
                        :config="config">
                        <template slot="title" slot-scope="props">
                          <a :href = "'products/' + props.row.id"> {{props.row.title}}</a>
                        </template>
                        <template slot="image" slot-scope="props">
                                <img width="100" :src="props.row.image">
                        </template>
                        <template slot="paginataion-previous-button">
                            Previous
                        </template>
                        <template slot="paginataion-next-button">
                            Next
                        </template>
                        <template slot="pagination-info" slot-scope="props">
                            This page total is {{props.currentPageRowsLength}} |
                            Filterd results total is {{props.filteredRowsLength}} |
                            Original data total is {{props.originalRowsLength}}
                        </template>
                    </bootstrap-table>
                </div>
            </div>
        </div>
    </div>

  </template>

<script>

    import axios from 'axios';
    import 'bootstrap/dist/css/bootstrap.min.css';

    export default {
        name: 'ProductComponent',
        data() {
            return {
                products: [],
                currentPage: 1,
                perPage: 10,
                search: '',
                filter: '',
                columns: [
                    {
                        label: "id",
                        name: "id",
                        sort: true,
                    },
                    {
                        label: "Title",
                        name: "title",
                        sort: true,
                    },
                    {
                        label: "Price",
                        name: "price",
                        sort: true,
                    },
                    {
                        label: "SKU",
                        name: "sku",
                        sort: true,
                    },
                    {
                        label: "Image",
                        name: "image",
                        sort: true,
                    },
                    {
                        label: "Ingredients",
                        name: "ingredients",
                        sort: true,
                    },
                    {
                        label: "Quantity",
                        name: "qty",
                        sort: true,
                    }
                ],
                config: {
                    checkbox_rows: true,
                    rows_selectable: true,
                    pagination: true,
                    pagination_info: true,
                    card_title: "Products",
                    num_of_visibile_pagination_buttons: 10,
                    per_page: 10,
                    per_page_options:  [10,  20,  30, 40, 50, 60, 70, 80, 90, 100],
                }

            };
        },
        mounted() {
            this.getProducts();
        },
        methods: {
            getProducts() {
                axios.get(`/getProducts`, {
                    }).then(response => {
                        console.log(response.data);
                        this.products = response.data;
                    }).catch(error => {
                        console.log(error);
                    });
            }
        },
        watch: {
            filter: function() {
                this.currentPage = 1; // reset the current page number
                this.getProducts();   // fetch the updated products
            }
        },
        computed: {
            paginatedProducts() {
                const start = (this.currentPage - 1) * 10;  // set the starting index
                const end = start + 10;                     // set the ending index
                return this.products.slice(start, end);    // slice the products array based on the current page number
            }
        },created() {
            this.getProducts();
        }

    }

    
    
</script>
