import {
    createApp
} from "vue";
import Comment
from "./components/Comment.vue";
import LikeButton
from "./components/LikeButton.vue";

const comment_app = createApp(Comment)
comment_app.mount('#comment-app')

const btn_app = createApp(LikeButton)
btn_app.mount('#btn-app')
