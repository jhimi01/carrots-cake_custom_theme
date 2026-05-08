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

// load more posts with ajax
jQuery(document).ready(function ($) {
  $(".load-more-btn").click(function () {
    const btn = $(this);

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
