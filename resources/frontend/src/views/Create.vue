<template>
    <div class="form__container">
        <p class="form__container--colorText">Criar Livro</p>
        <form @submit.prevent="submit">
            <div class="mb-3">
                <label for="inputName" class="form-label form__container--colorText">name</label>
                <input v-model="nameBook" type="text" class="form-control" id="inputName" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="inputType" class="form-label form__container--colorText">Type</label>
                <select class="form-control" id="inputType">
                    <option value="" select> Selecione</option>
                    <option @click="type = 1" value="1">Digital</option>
                    <option @click="type = 2" value="1">Fisico</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="inputCode" class="form-label form__container--colorText">code</label>
                <input v-model="code" type="text" class="form-control" id="inputCode">
            </div>
            <div class="mb-3">
                <label for="inputSize" class="form-label form__container--colorText">size</label>
                <input v-model="size" type="text" class="form-control" id="inputSize">
            </div>
            <div class="mb-3">
                <label for="inputAuthor" class="form-label form__container--colorText">author</label>
                <input v-model="author" type="text" class="form-control" id="inputSize">
            </div>
            <div class="mb-3">
                <label for="inputCategory" class="form-label form__container--colorText">category</label>
                <select class="form-control" id="inputCategory">
                    <option value="" select> Selecione</option>
                    <option @click="category = 1" value="1">Romance</option>
                    <option @click="category = 2" value="2">Terror</option>
                </select>
            </div>

            <input type="submit" value="Enviar">

            <div v-if="message"> {{message}}</div>
        </form>
    </div>
</template>
<style scoped>
.form__container {
    width: 100%;
    height: 100vh;
    align-items: center;
    background: white;
    display: flex;
    justify-content: center;
    flex-direction: column;

}

.form__content {
    padding: 0 20px;
    width: 100%;
    max-width: 500px;
}

.form__container--colorText {
    color: #333;
}
</style>
<script>
import { defineComponent } from 'vue';
import api from '../utils/api';

export default defineComponent({
    data() {
        return {
            type: undefined,
            nameBook: '',
            category: '',
            size: undefined,
            code: '',
            author: '',
            message: ''
        }
    },
    methods: {
        async submit() {
            console.log(this.$data)
            const message = await api.post('/books', {
                "type_id": this.type,
                "category_id": this.category,
                "name": this.nameBook,
                "author": this.author,
                "code": this.author,
                "size": this.size
            })
            this.message = message
            this.$router.push('/')
        }
    }
})
</script>