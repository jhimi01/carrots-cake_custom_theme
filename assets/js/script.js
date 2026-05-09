document.addEventListener("DOMContentLoaded", function () {
  const menuBtn = document.querySelector(".menu-icon");
  const closeBtn = document.querySelector(".close-btn");
  const menu = document.querySelector(".offens");

  // Open menu
  menuBtn.addEventListener("click", function () {
    menu.classList.add("active");
  });

  // Close menu
  closeBtn.addEventListener("click", function () {
    menu.classList.remove("active");
  });
});

// jquery
// faq section --------------
jQuery(document).ready(function ($) {
  $(".faq-question").click(function () {
    const currentItem = $(this).parent();

    $(".faq-item")
      .not(currentItem)
      .removeClass("active")
      .find(".faq-answer")
      .slideUp();

    currentItem.toggleClass("active");
    currentItem.find(".faq-answer").slideToggle();
  });
});

// load more posts with ajax ----------------
jQuery(document).ready(function ($) {
  $(".load-more-btn").click(function () {
    const btn = $(this);

    // console.log("load btn", btn);
    // console.log("load btn text", btn.innerText);
    // console.log("load btn html", btn.innerHtml);
    let currentPage = parseInt(btn.data("page"));
    const maxPages = parseInt(btn.data("max-pages"));
    const postsPerPage = parseInt(btn.data("posts-per-page"));
    console.log("current page", postsPerPage);

    let nextPage = currentPage + 1;

    if (nextPage > maxPages) return;

    btn.text("Loading...").prop("disabled", true);

    // sends request to wp backend
    $.ajax({
      url: ajax_params.ajax_url,
      type: "POST",
      data: {
        action: "load_more_posts",
        nonce: ajax_params.nonce,
        page: nextPage,
        posts_per_page: postsPerPage,
      },

      success: function (response) {
        if (response.success) {
          $(".articles").append(response.data.html);

          btn.data("page", nextPage);

          if (!response.data.has_more) {
            btn.closest(".load-more-container").hide();
          } else {
            btn.text("Load More").prop("disabled", false);
          }
        } else {
          btn.closest(".load-more-container").hide();
        }
      },

      error: function () {
        btn.text("Error").prop("disabled", false);
      },
    });
  });
});

// filter and sort with ajax -----------------
jQuery(document).ready(function ($) {
  $("#category-filter, #sort").change(function () {
    const categoryFilter = $("#category-filter").val();
    const sort = $("#sort").val();
    const btn = $(".load-more-btn");
    const postPerPage = parseInt(btn.data("posts-per-page"));

    // console.log('first', categoryFilter)


    $.ajax({
      url: ajax_params.ajax_url,
      type: "POST",
      data: {
        action: "load_more_posts",
        nonce: ajax_params.nonce,
        // page: 1,
        categoryFilter: categoryFilter,
        sortFilter: sort,
        posts_per_page: postPerPage,
      },

      success: function(response){
        if (response.success) {
          $(".articles").html(response.data.html);
          $(".load-more-btn").data("page", 1);
            // btn.data("page", 1);
        }else{
          console.log('not success', response);
        }
        console.log("filtering", response)
      },

      error: function(err){
        console.log("error", err)
      }
    })
  })
})

// load more contetns with ajax
jQuery(document).ready(function ($) {
  $(".get-more-btn").click(function () {
    const contentBtn = $(this);

    let currentPage = parseInt(contentBtn.data("page"));
    const maxPages = parseInt(contentBtn.data("max-pages"));
    // const contentsPerPage = parseInt(contentBtn.data("contentsPerPage"));
    const contentsPerPage = parseInt(contentBtn.data("contents-per-page"));
    const postId = parseInt(contentBtn.data("post-id"));

    console.log("contentBtn", postId);

    let nextPage = currentPage + 1;

    if (nextPage > maxPages) return;

    contentBtn.text("Getting...").prop("disabled", true);

    //sending request to wp backend
    $.ajax({
      url: ajax_params.ajax_url,
      type: "POST",
      data: {
        action: "get_more_contents",
        nonce: ajax_params.nonce,
        page: nextPage,
        post_id: postId,
        per_page_content: contentsPerPage,
      },

      success: function (res) {
        if (res.success) {
          // $(".contents").append(res.data.html);
          //  $(".contents").append(res.data.html);
          contentBtn
            .closest(".content-lists")
            .find(".contents")
            .append(res.data.html);
          console.log("this is res", res);

          contentBtn.data("page", nextPage);

          if (!res.data.has_more) {
            contentBtn.hide();
            console.log("this is res", res);
          } else {
            contentBtn.text("Get More Content").prop("disabled", false);
            console.log("this is res", res);
          }
        } else {
          // contentBtn.closest(".get-more-btn").hide();
          contentBtn.text(res.data.message)
          console.log("this is res", res);
        }
      },

      error: function (err) {
        console.log("error", err);
        contentBtn.text("Error").prop("disabled", false);
      },
    });
  });
});


