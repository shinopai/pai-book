<template>
    <div class="flex items-center justify-center mt-20 ml-40">
        <form class="w-full max-w-xl bg-white rounded-lg px-4 pt-2">
            <div class="flex flex-wrap -mx-3 mb-6">
                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">コメントする</h2>
                <p v-if="errMessage" class="text-red-500 w-full">{{ errMessage }}</p>
                <div class="w-full md:w-full px-3 mb-2 mt-2">
                    <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" v-model="newComment" placeholder='コメントを入力してください' required @change="checkErr"></textarea>
                </div>
                <div class="w-full md:w-full flex items-start px-3">
                    <div class="-mr-1">
                        <input type='button' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 bg-gray-300 py-2 px-8 focus:outline-none hover:bg-gray-500 hover:text-white cursor-pointer" value='投稿' @click="addComment">
                    </div>
                </div>
    </div>
        </form>
    <div class="flex-grow">
        <!-- component -->
        <div class="flex items-center justify-center">
            <div class="container">
                <div class="flex justify-start p-4">
                    <h1 class="text-xl">コメント({{ allComments.length }})</h1>
                </div>
                <div class="flex justify-start">
                    <div class="ml-10">
                        <ul class="divide-y divide-gray-300">
                            <li v-for="comment in allComments" :key="comment" class="p-4 hover:bg-gray-50 cursor-pointer flex items-center justify-start">
                              <span v-if="currentUserId == comment.user.id">あなた/</span>
                              <span v-else>{{ comment.user.name }}/</span>
                              <span>{{ comment.body }}</span>
                              <span v-if="currentUserId == comment.user.id" class="material-icons text-blue-300" @click="deleteComment(comment.id)">
                                delete
                                </span>
                              </li>
                            <li v-if="allComments.length == 0">コメントはありません</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
import { ref, toRefs, onMounted, watch } from 'vue'
import Axios from 'axios'

export default {
  setup() {
    let newComment = ref('')
    let errMessage = ref('')
    const allComments = ref([])
    const currentUserId = ref()
    const bookId = ref(location.href.split("/")[(location.href.split("/").length) - 1])

    // get current user id
    const getCurrentUserId = async () => {
      await Axios.get('/api/user')
                 .then( response => {
                   currentUserId.value = response.data
                 })
                 .catch( error => {
                   console.log(error.response.data)
                 })
    }

    // get all comments
    const getAllComments = async () => {
      await Axios.get('/api/books/' + bookId.value + '/comments')
                 .then( response => {
                   allComments.value = response.data
                 })
                 .catch( error => {
                   console.log(error.response.data)
                 })
    }

    // add comment
    const addComment = async () => {
      await Axios.post('/api/users/' + currentUserId.value + '/books/' + bookId.value + '/comments', {
        body: newComment.value
      })
      .then( response => {
        getCurrentUserId()
        getAllComments()
      })
      .catch( error => {
        console.log(error.response.data)
      })
    }

    // delete comment
    const deleteComment = async (commentId) => {
      if(confirm('Are you sure?')){
        await Axios.delete('/api/users/' + currentUserId.value + '/books/' + bookId.value + '/comments/' + commentId)
                   .then( response => {
                      getCurrentUserId()
                      getAllComments()
                   })
                   .catch( error => {
                     console.log(error.response.data)
                   })
      }
    }

    // check if user's comment is valid
    const checkErr = () => {
      if(newComment.value.length > 100){
        errMessage.value = '100字以内で入力してください'
      }else{
        errMessage.value = ''
      }
    }

    // // watch if comment value changes
    // watch(comment, () => {
    //   if(newComment.value.length > 10){
    //     errMessage.value = '100字以内で入力してください'
    //   }else{
    //     errMessage.value = ''
    //   }
    // })

    onMounted(() => {
      getCurrentUserId()
      getAllComments()
    })


    return {
      newComment, currentUserId, addComment, deleteComment, allComments, errMessage, checkErr
    }

  },
}
</script>
