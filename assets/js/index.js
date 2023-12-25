/* For Navbar button */
jQuery(document).ready(function () {
    jQuery(".show_billing_form").click(function () {
      jQuery(".billing_form").removeClass("d-none");
      jQuery(".billing_info").addClass("d-none");
      jQuery(this).addClass("d-none");
    });
    jQuery("button.dropdown-toggle").click(function () {
      jQuery("#dropdown").toggleClass("customclass");
    });
  
    jQuery("button.navbar-toggler").click(function () {
      jQuery(".navbar-toggler").toggleClass("close_icon");
    });
  
    /* Dashboard popup message */
    jQuery("#warning_message").modal("show");
  
    jQuery(".mobule_nav_tabs_button").click(function () {
      jQuery(".tab_img_container , .dashboard_navbar").toggleClass("open_menu");
    });
  
    jQuery("#premiumModal").on("shown.bs.modal", function () {
      /* premium-mocups-product-page Slider*/
      jQuery(".similar_slider, .related_slider").slick({
        dots: true,
        infinite: true,
        arrows: false,
        autoplay: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
              infinite: true,
              dots: true,
            },
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      });
    });
  
    jQuery("#bundleModal").on("shown.bs.modal", function () {
      /* bundle-mockups-product-page slider */
      jQuery(".bundle_related_slider").slick({
        dots: true,
        infinite: true,
        arrows: false,
        autoplay: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1201,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true,
            },
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
            },
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      });
    });
  
    jQuery("#premiumModal").on("shown.bs.modal", function () {
      /* Premium product page modal slider start */
      jQuery(".premium_single_img_slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        autoplay: false,
        asNavFor: ".premium_multiple_img_slider",
      });
      jQuery(".premium_multiple_img_slider").slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: ".premium_single_img_slider",
        dots: false,
        arrows: false,
        autoplay: false,
        focusOnSelect: true,
        responsive: [
          {
            breakpoint: 1025,
            settings: {
              slidesToShow: 3,
            },
          },
          {
            breakpoint: 451,
            settings: {
              slidesToShow: 2,
            },
          },
        ],
      });
      /* Premium product page modal slider end */
    });
    jQuery("#bundleModal").on("shown.bs.modal", function () {
      /* Bundle product page modal slider start */
      jQuery(".bundle_single_img_slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        autoplay: false,
        infinite: false,
        asNavFor: ".bundle_multiple_img_slider",
      });
      jQuery(".bundle_multiple_img_slider").slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        asNavFor: ".bundle_single_img_slider",
        dots: false,
        arrows: false,
        autoplay: false,
        infinite: false,
        focusOnSelect: true,
        responsive: [
          {
            breakpoint: 1025,
            settings: {
              slidesToShow: 4,
            },
          },
          {
            breakpoint: 451,
            settings: {
              slidesToShow: 3,
            },
          },
        ],
      });
      /* Bundle product page modal slider end */
    });
  
    /* End */
  });
  
  /* Request page file button */
  jQuery("#files").change(function () {
    filename = this.files[0].name;
    console.log(filename);
  });
  
  /* For Select box */
  var x, i, j, selElmnt, a, b, c;
  x = document.getElementsByClassName("custom-select");
  for (i = 0; i < x.length; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < selElmnt.length; j++) {
      c = document.createElement("DIV");
      c.innerHTML = selElmnt.options[j].innerHTML;
      c.addEventListener("click", function (e) {
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            jQuery(".placeholder_box").attr(
              "placeholder",
              "Search for " + this.innerHTML + ""
            );
            break;
          }
        }
        h.click();
      });
      b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function (e) {
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
  }
  
  function closeAllSelect(elmnt) {
    var x,
      y,
      i,
      arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    for (i = 0; i < y.length; i++) {
      if (elmnt == y[i]) {
        arrNo.push(i);
      } else {
        y[i].classList.remove("select-arrow-active");
      }
    }
    for (i = 0; i < x.length; i++) {
      if (arrNo.indexOf(i)) {
        x[i].classList.add("select-hide");
      }
    }
  }
  document.addEventListener("click", closeAllSelect);
  
  // jQuery(document).ready(function($) {
  
  //     /* For Navbar button */
  
  //     jQuery("button.dropdown-toggle").click(function () {
  //         jQuery("#dropdown").toggleClass("customclass");
  //     });
  
  //     jQuery("button.navbar-toggler").click(function () {
  //         jQuery(".navbar-toggler").toggleClass("close_icon");
  //     });
  
  //     /* Request page file button */
  //     jQuery("#files").change(function () {
  //         filename = this.files[0].name;
  //         console.log(filename);
  //     });
  //     /* 06.10.2023 start */
  //     /* Premium product page modal slider start */
  //     jQuery('.premium_single_img_slider').slick({
  //         slidesToShow: 1,
  //         slidesToScroll: 1,
  //         dots: true,
  //         arrows: false,
  //         autoplay: true,
  //         asNavFor: '.premium_multiple_img_slider'
  //     });
  //     jQuery('.premium_multiple_img_slider').slick({
  //         slidesToShow: 4,
  //         slidesToScroll: 1,
  //         asNavFor: '.premium_single_img_slider',
  //         dots: false,
  //         arrows: false,
  //         autoplay: true,
  //         focusOnSelect: true,
  //         responsive: [{
  //                 breakpoint: 1025,
  //                 settings: {
  //                     slidesToShow: 3,
  //                 }
  //             },
  //             {
  //                 breakpoint: 451,
  //                 settings: {
  //                     slidesToShow: 2,
  //                 }
  //             }
  //         ]
  //     });
  //     /* Premium product page modal slider end */
  
  //     /* premium-mocups-product-page Slider*/
  //     $('.similar_slider, .related_slider').slick({
  //         dots: true,
  //         infinite: true,
  //         arrows: false,
  //         autoplay: true,
  //         speed: 300,
  //         slidesToShow: 3,
  //         slidesToScroll: 3,
  //         responsive: [{
  //                 breakpoint: 1024,
  //                 settings: {
  //                     slidesToShow: 2,
  //                     slidesToScroll: 2,
  //                     infinite: true,
  //                     dots: true
  //                 }
  //             },
  //             {
  //                 breakpoint: 600,
  //                 settings: {
  //                     slidesToShow: 1,
  //                     slidesToScroll: 1
  //                 }
  //             },
  //             {
  //                 breakpoint: 480,
  //                 settings: {
  //                     slidesToShow: 1,
  //                     slidesToScroll: 1
  //                 }
  //             }
  //         ]
  //     });
  
  //     /* bundle-mockups-product-page slider */
  //     $('.bundle_related_slider').slick({
  //         dots: true,
  //         infinite: true,
  //         arrows: false,
  //         autoplay: true,
  //         speed: 300,
  //         slidesToShow: 4,
  //         slidesToScroll: 4,
  //         responsive: [{
  //                 breakpoint: 1201,
  //                 settings: {
  //                     slidesToShow: 3,
  //                     slidesToScroll: 3,
  //                     infinite: true,
  //                     dots: true
  //                 }
  //             },
  //             {
  //                 breakpoint: 600,
  //                 settings: {
  //                     slidesToShow: 2,
  //                     slidesToScroll: 2
  //                 }
  //             },
  //             {
  //                 breakpoint: 480,
  //                 settings: {
  //                     slidesToShow: 1,
  //                     slidesToScroll: 1
  //                 }
  //             }
  //         ]
  //     });
  
  //     /* Dashboard popup message */
  //     jQuery('#warning_message').modal('show');
  
  //     /* For Select box */
  //     var x, i, j, selElmnt, a, b, c;
  //     x = document.getElementsByClassName("custom-select");
  //     for (i = 0; i < x.length; i++) {
  //         selElmnt = x[i].getElementsByTagName("select")[0];
  //         a = document.createElement("DIV");
  //         a.setAttribute("class", "select-selected");
  //         a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  //         x[i].appendChild(a);
  //         b = document.createElement("DIV");
  //         b.setAttribute("class", "select-items select-hide");
  //         for (j = 1; j < selElmnt.length; j++) {
  //             c = document.createElement("DIV");
  //             c.innerHTML = selElmnt.options[j].innerHTML;
  //             c.addEventListener("click", function (e) {
  //                 var y, i, k, s, h;
  //                 s = this.parentNode.parentNode.getElementsByTagName("select")[0];
  //                 h = this.parentNode.previousSibling;
  //                 for (i = 0; i < s.length; i++) {
  //                     if (s.options[i].innerHTML == this.innerHTML) {
  //                         s.selectedIndex = i;
  //                         h.innerHTML = this.innerHTML;
  //                         y = this.parentNode.getElementsByClassName("same-as-selected");
  //                         for (k = 0; k < y.length; k++) {
  //                             y[k].removeAttribute("class");
  //                         }
  //                         this.setAttribute("class", "same-as-selected");
  //                         jQuery('.placeholder_box').attr('placeholder', 'Search for ' + this.innerHTML + '');
  //                         break;
  //                     }
  //                 }
  //                 h.click();
  //             });
  //             b.appendChild(c);
  //         }
  //         x[i].appendChild(b);
  //         a.addEventListener("click", function (e) {
  //             e.stopPropagation();
  //             closeAllSelect(this);
  //             this.nextSibling.classList.toggle("select-hide");
  //             this.classList.toggle("select-arrow-active");
  //         });
  //     }
  
  //     function closeAllSelect(elmnt) {
  //         var x, y, i, arrNo = [];
  //         x = document.getElementsByClassName("select-items");
  //         y = document.getElementsByClassName("select-selected");
  //         for (i = 0; i < y.length; i++) {
  //             if (elmnt == y[i]) {
  //                 arrNo.push(i)
  //             } else {
  //                 y[i].classList.remove("select-arrow-active");
  //             }
  //         }
  //         for (i = 0; i < x.length; i++) {
  //             if (arrNo.indexOf(i)) {
  //                 x[i].classList.add("select-hide");
  //             }
  //         }
  //     }
  //     document.addEventListener("click", closeAllSelect);
  
  //     jQuery(".mobule_nav_tabs_button").click(function () {
  //         jQuery(".tab_img_container , .dashboard_navbar").toggleClass("open_menu");
  //     });
  
  // });
  