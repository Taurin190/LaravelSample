<template>
<div>
    <h1>Lastest Hacker News</h1>
    <div>
        <ul v-for="(news, index) in news_list" :key="index">
            <li>
                <div>
                    <h3 v-if="news.url">
                        <a v-bind:href="news.url">{{ news.title }}</a>
                    </h3>
                    <h3 v-else>{{ news.title }}</h3>
                    <span>{{ news.time | moment }}</span>
                    <span><b>{{ news.score }}</b> points by <b>{{ news.by }}</b></span>
                    <span v-if="news.kids"> | <a href="#" v-on:click="openComments(news.id, news.kids)">{{ news.kids.length }} comments</a></span>
                </div>

                <div v-if="comments_list[news.id]">
                    <a v-on:click="closeComments(news.id)" >[-]</a>
                    <ul v-for="(comment, index) in comments_list[news.id]" :key="index">
                        <li>
                            <span>{{ news.time | moment }}</span>
                            <span>commented by <b>{{ comment.by }}</b></span>
                            <p>{{ comment.text }}</p>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
</template>
<script>
import axios from 'axios';
import moment from 'moment';

export default {
  name: 'HackerNews',
  data: function(){
      return {
        news_id_list: [],
        news_list: [],
        comments_list: {},
      }
  },
  mounted: function() {
      this.loadLatestNews();
  },
  methods: {
      loadLatestNews: function() {
          console.log("loading...");
          axios.get("https://hacker-news.firebaseio.com/v0/topstories.json?print=pretty")
          .then((res) => {
              this.news_id_list = res.data;
              this.news_id_list.forEach(
                  (v, i) => {
                      console.log(v);
                      if (i > 20) return;
                      this.news_list = [];
                      this.getNewsDetailFromId(v);
                  }
              );
          });
      },
      getNewsDetailFromId: function(id) {
          console.log(id);
          axios.get("https://hacker-news.firebaseio.com/v0/item/" + id + ".json?print=pretty")
          .then((res) => {
              this.news_list.push(res.data);
          });
      },
      openComments: function(id, comments) {
          console.log(comments);
          var commentDetails = [];
          var vm = this;
          comments.forEach(
              (v, i) => {
                  console.log(v);
                  axios.get("https://hacker-news.firebaseio.com/v0/item/" + v + ".json?print=pretty")
                  .then((res) => {
                      commentDetails.push(res.data);
                      vm.$set(vm.comments_list, id, commentDetails);
                  });
              }
          )
      },
      closeComments: function(id) {
          this.$delete(this.comments_list, id);
      }
  },
  filters: {
      moment: function (date) {
          return moment.unix(date).format('YYYY/MM/DD HH:mm');
      }
  }
}
</script>