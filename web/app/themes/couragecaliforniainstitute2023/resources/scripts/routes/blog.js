class PostLoader {
  constructor(container, postNum, renderer) {
    this.container = container
    this.postNum = postNum
    this.renderer = renderer
    this.currentPage = 0;
    this.categories = [];
    this.loading = true;

    this.LOAD_POSTS = this.LOAD_POSTS.bind(this);
  }

  LOADING_TOGGLE(){
    this.container.toggleClass('loading')
    this.loading = !this.loading;
  }

  LOAD_POSTS() {
    this.currentPage++; // Do currentPage + 1, because we want to load the next page

    if(!this.loading && this.currentPage !== 1) this.LOADING_TOGGLE()
  
    $.ajax({
      type: 'POST',
      context: this,
      url: ajax_object.ajax_url,
      data: {
        action: 'posts_load_more',
        paged: this.currentPage,
        renderer: this.renderer,
        cats: '', //this.categories.join('+'),
        postNum: this.postNum,
        nonce: ajax_object.ajax_nonce,
      },
      success: function (res) {
        console.log(res.data);
        this.LOADING_TOGGLE()
        if(res.data){
          //Check if there could be more posts
          if(res.data.length < this.postNum){ 
            this.container.addClass('no-more') } 
          else {
            this.container.removeClass('no-more')
          }

          //Append the new posts
          $('.row', this.container).append(res.data);
        } else {
          this.container.addClass('no-more')
          // $('.row', this.container).append('<div class="no-posts">No post satisfies these conditions.</div>');
        }
      },
      error: (e) => {
        this.container.addClass('no-more')
        console.log(e);
      }
    });
  }  
}

let blogPage = new PostLoader(
  $('#blog'), //Container
  16, // Postnum
  'partials.post-block' //renderer
  );

  //INITIAL LOAD
  blogPage.LOAD_POSTS()

//Load More Posts
$('#loadMore').on('click', blogPage.LOAD_POSTS);