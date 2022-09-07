<template>
    <div class="list__nav_bar">Books</div>
    <div class="list__container">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Encontre seu livro" aria-label="Recipient's username"
                aria-describedby="button-addon2">
            <select @select="(type)=>tgh(type)">
                <option value="" select>Categoria</option>
                <option value="Romance" @click="tgh('?category=romance')">Romance</option>

            </select>
            <select>
                <option value="" @click="tgh('')" select>Tipo</option>
                <option value="category" @click="tgh('?type=1')">fisico</option>
                <option value="name" @click="tgh('?type=2')">digital</option>
            </select>
        </div>

        <table class="table">
            <thead>
                <tr class="list__table__text list--backgroudWhite">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">type</th>
                    <th scope="col">size</th>
                    <th scope="col">code</th>
                    <th scope="col">category</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="list__table__text" v-for="(book, idx) in books">
                    <th scope="row">{{idx}}</th>
                    <td>{{book.name}}</td>
                    <td>{{book.type}}</td>
                    <td>{{book.size}}</td>
                    <td>{{book.code}}</td>
                    <td>{{book.category}}</td>
                    <td class="flex_box">
                        <p>del </p>
                        <p> edit</p>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</template>
<script>
import { defineComponent } from 'vue';
import api from '../utils/api';
export default defineComponent({
    data() {
        return {
            books: [],
            filteType: 'name'
        }
    },
    mounted() {
        this.getBooks()
    },
    methods: {
        async tgh(t) {
            const data = await api.get(`books${t}`)
            this.books = data.data.data.data
            console.log(data.data.data.data)
        },
        async getBooks() {
            const data = await api.get('/books')
            this.books = data.data.data.data
            console.log(data.data.data.data)
        }
    }

})
</script>

<style scoped>
.list__nav_bar {
    width: 100%;
    display: flex;
    justify-content: left;
    padding: 10px;
    background: #111;
}

.list__container {
    background: white;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 10px 0;
}

.list__table__text:nth-child(odd) {
    background: rgba(163, 163, 163, 0.4);
}

.list--backgroudWhite {
    background: white !important;
}

.list__table__text:hover {
    background: rgb(163, 163, 163);
}
</style>