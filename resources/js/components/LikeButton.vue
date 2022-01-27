<template>
  <span>
    <template v-if="isLiked">
    <span class="material-icons text-red-500 cursor-pointer" style="vertical-align: -5px;" @click="unlikeBook">
favorite
</span>
    </template>
    <template v-else>
    <span class="material-icons text-red-500 cursor-pointer" style="vertical-align: -5px;" @click="likeBook">
favorite
</span>
    </template>
{{ likeNumber }}
<span v-if="isLiked" class="bg-red-500 text-white rounded-xl px-1">お気に入り登録済み</span>
  </span>
</template>

<script>
import { ref, onMounted } from 'vue'
import Axios from 'axios'

export default {
  setup() {
    const likeNumber = ref()
    const bookId = ref(location.href.replace('http://localhost:8888/books/', ''))
    const currentUserId = ref()
    let isLiked = ref(Boolean)

    // get current user id
    const getCurrentUserId = async () => {
      await Axios.get('/api/user')
                 .then( response => {
                   currentUserId.value = response.data
                   checkIsLike(currentUserId.value)
                 })
                 .catch( error => {
                   console.log(error.response.data)
                 })
    }

    // get this book's like mumber
    const getLikeNumber = async () => {
      await Axios.get('/api/books/' + bookId.value + '/likes')
                 .then( response => {
                   likeNumber.value = response.data
                 })
                 .catch( error => {
                   console.log(error.response.data)
                 })
    }

    // like this book
    const likeBook = async () => {
      await Axios.post('/api/users/' + currentUserId.value + '/books/' + bookId.value + '/like')
                 .then( response => {
                    getCurrentUserId()
                    getLikeNumber()
                 })
                 .catch( error => {
                   console.log(error.response.data)
                 })
    }

    // unlike this book
    const unlikeBook = async () => {
      await Axios.delete('/api/users/' + currentUserId.value + '/books/' + bookId.value + '/unlike')
                 .then( response => {
                    getCurrentUserId()
                    getLikeNumber()
                 })
                 .catch( error => {
                   console.log(error.response.data)
                 })
    }

    // check if user likes this book
    const checkIsLike = async (userId) => {
      await Axios.get('/api/users/' + userId + '/books/' + bookId.value + '/check')
                 .then( response => {
                   console.log(response.data)
                   if(response.data.length > 0){
                     isLiked.value = true
                   }else{
                     isLiked.value = false
                   }
                 })
                 .catch( error => {
                   console.log(error.response.data)
                 })
    }

    onMounted(() => {
      getCurrentUserId()
      getLikeNumber()
    })

    return {
      likeNumber, likeBook, unlikeBook, isLiked
    }
  },
}
</script>
