<template>
<div>
    <h1>Lastest Hacker News</h1>
    <div>
        <ul v-for="(news, index) in news_list" :key="index">
            <li>
                <h3>{{ news.title }}</h3>
                <span>{{ news.score }} points by {{ news.by }}</span>
                <span>comments</span>
            </li>
        </ul>
    </div>
</div>
</template>
<script>
import axios from 'axios';

export default {
  name: 'HackerNews',
  data: function(){
      return {
        news_id_list: [],
        news_list: [],
      }
  },
  mounted: function() {
      this.loadLatestNews();
  },
  methods: {
      loadLatestNews: function() {
          console.log("loading...");
          var response = axios.get("https://hacker-news.firebaseio.com/v0/topstories.json?print=pretty")
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
          var detail = axios.get("https://hacker-news.firebaseio.com/v0/item/" + id + ".json?print=pretty")
          .then((res) => {
              this.news_list.push(res.data);
          });
      }
  }
}
</script>