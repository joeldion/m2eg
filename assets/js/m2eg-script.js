(function ($) {
  // Windows resize
  $(window).on("resize", function () {
    $("#menu-menu-principal-mobile").slideUp(500);
  });

  // Menu separator
  $(".separator > a").click(function (e) {
    e.preventDefault();
  });

  // Submenu toggle
  $(".menu-item-has-children").hover(function () {
    $(this).toggleClass("active");
    $(this).find(".sub-menu").toggleClass("active");
  });

  // Mobile Menu Toggle
  $("#hamburger").click(function () {
    $("#menu-menu-principal-mobile").slideToggle(500);
  });

  // Google Map
  $(".map").click(function () {
    $(this).addClass("active");
  });
})(jQuery);

// Mobile checker
function m2eg_is_mobile() {
  if (
    /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
      navigator.userAgent
    )
  ) {
    return true;
  }
}

function m2eg_lightbox(image_url, id) {
  // Not on mobile
  // if ( ! m2eg_is_mobile() ) {
  //     const gallery = document.getElementById('portfolio-gallery');
  //     const gallery_images = document.getElementsByClassName('portfolio-gallery--img');
  //     for ( var i = 0; i < gallery_images.length; i++ ) {
  //         gallery_images[i].style.display = 'none';
  //     }
  //     const lightbox_image = document.createElement('img');
  //     lightbox_image.id = 'lightbox-image';
  //     lightbox_image.src = image_url;
  //     lightbox_image.dataset.imgid = id;
  //     lightbox_image.classList.add('active');
  //     gallery.appendChild(lightbox_image);
  // }
}

// Lightbox
const lightbox = document.createElement("div");
lightbox.id = "lightbox";
document.body.appendChild(lightbox);

// Portfolio Gallery
const gallery = document.createElement("div");
gallery.id = "portfolio-gallery";
lightbox.appendChild(gallery);

const main_images = document.querySelectorAll(".portfolio-image > img");

main_images.forEach((image) => {
  image.addEventListener("click", (e) => {
    const images_list = document.querySelectorAll(
      image.dataset.parent + " .portfolio-gallery"
    );

    images_list.innerHTML = "";

    for (var i = 0; i < images_list.length; i++) {
      const image_url = images_list[i].dataset.imglarge;
      const image_id = images_list[i].dataset.imgid;

      const image_mobile = document.createElement("img");
      image_mobile.src = image_url;
      image_mobile.classList.add("portfolio-gallery--img");
      gallery.appendChild(image_mobile);
    }

    setTimeout(function () {
      lightbox.classList.add("active");
    }, 100);

    document.body.classList.add("has-lightbox");
  });
});

// Close Lightbox
lightbox.addEventListener("click", (e) => {
  if (e.target !== e.currentTarget) return;

  var lightbox_image = document.getElementById("lightbox-image");
  if (lightbox_image !== null) {
    lightbox_image.remove();
    for (
      var i = 0;
      i < document.getElementsByClassName("portfolio-gallery--img").length;
      i++
    ) {
      document.getElementsByClassName("portfolio-gallery--img")[
        i
      ].style.display = "block";
    }
    return;
  }

  document.body.classList.remove("has-lightbox");
  lightbox.classList.remove("active");
  // document.getElementById('lightbox-image').classList.remove('active');
  gallery.innerHTML = "";
});
