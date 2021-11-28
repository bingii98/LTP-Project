/*-----------------------------------------------------------------------------------

    Theme Name: Billie
    Theme URI: http://
    Description: Creative Agency & Portfolio
    Author: UI-ThemeZ
    Author URI: http://themeforest.net/user/UI-ThemeZ
    Version: 1.0

-----------------------------------------------------------------------------------*/
$(function () {
  "use strict";
  /* ===============================  Navbar Menu  =============================== */

  var wind = $(window);
  wind.on("scroll", function () {
    var bodyScroll = wind.scrollTop(),
        navbar = $(".navbar"),
        logo = $(".navbar.change .logo> img");

    if (bodyScroll > 300) {
      navbar.addClass("nav-scroll");
      logo.attr('src', 'img/logo-dark.png');
    } else {
      navbar.removeClass("nav-scroll");
      logo.attr('src', 'img/logo-light.png');
    }
  });
  /* ===============================  scrollIt  =============================== */

  $.scrollIt({
    upKey: 38,
    // key code to navigate to the next section
    downKey: 40,
    // key code to navigate to the previous section
    easing: 'swing',
    // the easing function for animation
    scrollTime: 600,
    // how long (in ms) the animation takes
    activeClass: 'active',
    // class given to the active nav element
    onPageChange: null,
    // function(pageIndex) that is called when page is changed
    topOffset: -70 // offste (in px) for fixed top navigation

  });
  /* ===============================  Swiper slider  =============================== */

  var parallaxSlider;
  var parallaxSliderOptions = {
    speed: 1000,
    autoplay: true,
    parallax: true,
    loop: true,
    on: {
      init: function () {
        var swiper = this;

        for (var i = 0; i < swiper.slides.length; i++) {
          $(swiper.slides[i]).find('.bg-img').attr({
            'data-swiper-parallax': 0.75 * swiper.width
          });
        }
      },
      resize: function () {
        this.update();
      }
    },
    pagination: {
      el: '.slider-prlx .parallax-slider .swiper-pagination',
      dynamicBullets: true,
      clickable: true
    },
    navigation: {
      nextEl: '.slider-prlx .parallax-slider .next-ctrl',
      prevEl: '.slider-prlx .parallax-slider .prev-ctrl'
    }
  };
  parallaxSlider = new Swiper('.slider-prlx .parallax-slider', parallaxSliderOptions);
  var parallaxSliderOptions = {
    speed: 1000,
    mousewheel: true,
    parallax: true,
    loop: true,
    pagination: {
      el: '.slide-full .parallax-slider .swiper-pagination',
      type: 'fraction',
      clickable: true
    },
    on: {
      init: function () {
        var swiper = this;

        for (var i = 0; i < swiper.slides.length; i++) {
          $(swiper.slides[i]).find('.bg-img').attr({
            'data-swiper-parallax': 0.75 * swiper.width
          });
        }
      },
      resize: function () {
        this.update();
      }
    },
    navigation: {
      nextEl: '.slide-full .parallax-slider .next-ctrl',
      prevEl: '.slide-full .parallax-slider .prev-ctrl'
    }
  };
  parallaxSlider = new Swiper('.slide-full .parallax-slider', parallaxSliderOptions);
  var swiperWorkSlider = new Swiper('.slider-scroll .swiper-container', {
    slidesPerView: 2,
    spaceBetween: 100,
    mousewheel: true,
    centeredSlides: true,
    speed: 1000,
    loop: true,
    breakpoints: {
      320: {
        slidesPerView: 1
      },
      480: {
        slidesPerView: 1
      },
      640: {
        slidesPerView: 2
      },
      991: {
        slidesPerView: 2
      }
    },
    pagination: {
      el: '.slider-scroll .swiper-pagination'
    },
    navigation: {
      nextEl: '.slider-scroll .next-ctrl',
      prevEl: '.slider-scroll .prev-ctrl'
    }
  });
  var swiperWorkMetro = new Swiper('.metro .swiper-container', {
    slidesPerView: 2,
    spaceBetween: 0,
    speed: 1000,
    loop: true,
    centeredSlides: true,
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 0
      },
      640: {
        slidesPerView: 1,
        spaceBetween: 0
      },
      767: {
        slidesPerView: 2,
        spaceBetween: 0
      },
      991: {
        slidesPerView: 2,
        spaceBetween: 0
      }
    },
    pagination: {
      el: '.metro .swiper-pagination',
      type: 'progressbar'
    },
    navigation: {
      nextEl: '.metro .swiper-button-next',
      prevEl: '.metro .swiper-button-prev'
    }
  });
  swiperWorkMetro.on('slideChange', function () {
    var activeslide = swiperWorkMetro.realIndex;
    $(".activeslide").html("0" + (activeslide + 1));
  });
  /* ===============================  Var Background image  =============================== */

  var pageSection = $(".bg-img, section");
  pageSection.each(function (indx) {
    if ($(this).attr("data-background")) {
      $(this).css("background-image", "url(" + $(this).data("background") + ")");
    }
  });
  /* ===============================  slick Carousel  =============================== */

  $('.testimonials .slic-item').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: '.testimonials .prev',
    nextArrow: '.testimonials .next',
    dots: true,
    autoplay: true,
    responsive: [{
      breakpoint: 767,
      settings: {
        slidesToShow: 1
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 1
      }
    }]
  });
  $('.team .team-container').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: '.team .prev',
    nextArrow: '.team .next',
    dots: true,
    autoplay: true,
    responsive: [{
      breakpoint: 991,
      settings: {
        slidesToShow: 3
      }
    }, {
      breakpoint: 767,
      settings: {
        slidesToShow: 2
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 1
      }
    }]
  });
  $('.clients-brand .brands-crs').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: false,
    dots: false,
    autoplay: true,
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 4
      }
    }, {
      breakpoint: 767,
      settings: {
        slidesToShow: 2
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 1
      }
    }]
  });
  /* ===============================  YouTubePopUp  =============================== */

  $("a.vid").YouTubePopUp();
  /* ===============================  parallaxie  =============================== */

  $('.parallaxie').parallaxie({
    speed: 0.2,
    size: "cover"
  });
  /* ===============================  countUp  =============================== */

  $('.number-sec .count').countUp({
    delay: 10,
    time: 500
  });
});
/* ===============================  Wow Animation  =============================== */

var wow = new WOW({
  animateClass: 'animated',
  offset: 100
});
wow.init(); // === window When Loading === //

$(window).on("load", function () {
  /* ===============================  Preloader  =============================== */
  $(".load").delay(1500).fadeOut(500);
  /* ===============================  SPLITTING TEXT  =============================== */

  Splitting();
  /* ===============================  thumparallax  =============================== */

  var imageUp = document.getElementsByClassName('thumparallax');
  new simpleParallax(imageUp, {
    delay: 1,
    scale: 1.1
  });
  var imageDown = document.getElementsByClassName('thumparallax-down');
  new simpleParallax(imageDown, {
    orientation: 'down',
    delay: 1,
    scale: 1.1
  });
  /* ===============================  isotope Masonery  =============================== */

  $('.gallery').isotope({
    itemSelector: '.items'
  });
  var $gallery = $('.gallery').isotope();
  $('.filtering').on('click', 'span', function () {
    var filterValue = $(this).attr('data-filter');
    $gallery.isotope({
      filter: filterValue
    });
  });
  $('.filtering').on('click', 'span', function () {
    $(this).addClass('active').siblings().removeClass('active');
  });
  /* ===============================  contact validator  =============================== */

  $('#contact-form').validator();
  $('#contact-form').on('submit', function (e) {
    if (!e.isDefaultPrevented()) {
      var url = "contact.php";
      $.ajax({
        type: "POST",
        url: url,
        data: $(this).serialize(),
        success: function (data) {
          var messageAlert = 'alert-' + data.type;
          var messageText = data.message;
          var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';

          if (messageAlert && messageText) {
            $('#contact-form').find('.messages').html(alertBox);
            $('#contact-form')[0].reset();
          }
        }
      });
      return false;
    }
  });
});
/* ===============================  Scroll back to top  =============================== */

$(document).ready(function () {
  "use strict";

  var progressPath = document.querySelector('.progress-wrap path');
  var pathLength = progressPath.getTotalLength();
  progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
  progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
  progressPath.style.strokeDashoffset = pathLength;
  progressPath.getBoundingClientRect();
  progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';

  var updateProgress = function () {
    var scroll = $(window).scrollTop();
    var height = $(document).height() - $(window).height();
    var progress = pathLength - scroll * pathLength / height;
    progressPath.style.strokeDashoffset = progress;
  };

  updateProgress();
  $(window).scroll(updateProgress);
  var offset = 150;
  var duration = 550;
  jQuery(window).on('scroll', function () {
    if (jQuery(this).scrollTop() > offset) {
      jQuery('.progress-wrap').addClass('active-progress');
    } else {
      jQuery('.progress-wrap').removeClass('active-progress');
    }
  });
  jQuery('.progress-wrap').on('click', function (event) {
    event.preventDefault();
    jQuery('html, body').animate({
      scrollTop: 0
    }, duration);
    return false;
  });
});
/* ===============================  Mouse effect  =============================== */

function mousecursor() {
  if ($("body")) {
    const e = document.querySelector(".cursor-inner"),
          t = document.querySelector(".cursor-outer");
    let n,
        i = 0,
        o = !1;
    window.onmousemove = function (s) {
      o || (t.style.transform = "translate(" + s.clientX + "px, " + s.clientY + "px)"), e.style.transform = "translate(" + s.clientX + "px, " + s.clientY + "px)", n = s.clientY, i = s.clientX;
    }, $("body").on("mouseenter", "a, .cursor-pointer", function () {
      e.classList.add("cursor-hover"), t.classList.add("cursor-hover");
    }), $("body").on("mouseleave", "a, .cursor-pointer", function () {
      $(this).is("a") && $(this).closest(".cursor-pointer").length || (e.classList.remove("cursor-hover"), t.classList.remove("cursor-hover"));
    }), e.style.visibility = "visible", t.style.visibility = "visible";
  }
}

;
$(function () {
  if ($('.cursor-inner').length && $('.cursor-outer').length) {
    mousecursor();
  }
});
/* ===============================  fixed-slider  =============================== */

$(function () {
  "use strict";

  var slidHeight = $(".fixed-slider").outerHeight();
  $(".main-content").css({
    marginTop: slidHeight
  });
});
$(window).scroll(function () {
  /* ===============================  fade slideshow  =============================== */
  var scrolled = $(this).scrollTop();
  $('.fixed-slider .caption , .fixed-slider .capt .parlx').css({
    'transform': 'translate3d(0, ' + -(scrolled * 0.20) + 'px, 0)',
    'opacity': 1 - scrolled / 600
  });
});
/* ===============================  Preloader page  =============================== */

$(document).ready(function () {
  var count = 0;
  var counter = setInterval(function () {
    if (count < 101) {
      $('.count').text(count + '%');
      $('.loader').css('width', count + '%');
      count++;
    } else {
      clearInterval(counter);
    }
  }, 10);
});
/** CUSTOM HERE OKE */

(function ($) {
  $.fn.getHtmlContent = function () {
    return this.clone().find("script,noscript,style").remove().end().html();
  };
})(jQuery); //<![CDATA[


if ($('select[name="provinces"]').length && $('select[name="district"]').length) {
  var address_1 = null;
  var address_2 = null;
  var district = null;

  if (address_2 = localStorage.getItem('address_2_saved')) {
    $('select[name="district"] option').each(function () {
      if ($(this).text() == address_2) {
        $(this).attr('selected', '');
      }
    });
    $('input.billing_address_2').attr('value', address_2);
  }

  if (district = localStorage.getItem('district')) {
    $('select[name="district"]').html(district);
    $('select[name="district"]').on('change', function () {
      var target = $(this).children('option:selected');
      target.attr('selected', '');
      $('select[name="district"] option').not(target).removeAttr('selected');
      address_2 = target.text();
      $('input.billing_address_2').attr('value', address_2);
      district = $('select[name="district"]').html();
      localStorage.setItem('district', district);
      localStorage.setItem('address_2_saved', address_2);
    });
  }

  $('select[name="provinces"]').each(function () {
    var $this = $(this),
        stc = '';
    c.forEach(function (i, e) {
      e += +1;
      stc += `<option value="${i}">${i}</option>`;
      $this.html('<option value="">Tỉnh / Thành phố</option>' + stc);

      if (address_1 = localStorage.getItem('address_1_saved')) {
        $('select[name="provinces"] option').each(function () {
          if ($(this).text() == address_1) {
            $(this).attr('selected', '');
          }
        });
        $('input.billing_address_1').attr('value', address_1);
      }

      $this.on('change', function (i) {
        i = $this.children('option:selected').index() - 1;
        var str = '',
            r = $this.val();

        if (r != '') {
          arr[i].forEach(function (el) {
            str += '<option value="' + el + '">' + el + '</option>';
            $('select[name="district"]').html('<option value="">Quận / Huyện</option>' + str);
          });
          var address_1 = $this.children('option:selected').text();
          var district = $('select[name="district"]').html();
          localStorage.setItem('address_1_saved', address_1);
          localStorage.setItem('district', district);
          $('select[name="district"]').on('change', function () {
            var target = $(this).children('option:selected');
            target.attr('selected', '');
            $('select[name="district"] option').not(target).removeAttr('selected');
            var address_2 = target.text();
            $('input.billing_address_2').attr('value', address_2);
            district = $('select[name="district"]').html();
            localStorage.setItem('district', district);
            localStorage.setItem('address_2_saved', address_2);
          });
        } else {
          $('select[name="district"]').html('<option value="">Quận / Huyện</option>');
          district = $('select[name="district"]').html();
          localStorage.setItem('district', district);
          localStorage.removeItem('address_1_saved', address_1);
        }
      });
    });
  });
}

$('.price-filter input[name="begin_price"]').change(function () {
  $('.price-filter input[name="from_price"]').attr('min', Number($('.price-filter input[name="begin_price"]').val()) + 1000);
}); //]]

/**EDITOR SCRIPT**/

if ($('#editor-content').length) {
  editorInit();
}

function stripHtml(html) {
  let tmp = document.createElement("DIV");
  tmp.innerHTML = html;
  return tmp.textContent || tmp.innerText || "";
}

function editorInit() {
  $('#editor-content').bind('DOMSubtreeModified', function () {
    $('[name="description"]').val($('#editor-content').getHtmlContent());
  });
  const toolbar = document.querySelector("#editor-toolbar");
  const content = document.querySelector("#editor-content");
  const actions = Object.freeze([{
    id: "bold",
    icon: "fa-bold",
    title: "Bold"
  }, {
    id: "italic",
    icon: "fa-italic",
    title: "Italic"
  }, {
    id: "underline",
    icon: "fa-underline",
    title: "Underline"
  }, {
    id: "strikeThrough",
    icon: "fa-strikethrough",
    title: "Strike throught"
  }, {
    id: "removeFormat",
    icon: "fa-times",
    title: "Clear format"
  }, {
    id: "alignment",
    icon: "fa-align-left",
    title: "Set content alignment",
    submenu: [{
      id: "justifyLeft",
      icon: "fa-align-left",
      style: "textAlign:left",
      title: "Align left"
    }, {
      id: "justifyCenter",
      icon: "fa-align-center",
      style: "textAlign:center",
      title: "Align center"
    }, {
      id: "justifyRight",
      icon: "fa-align-right",
      style: "textAlign:right",
      title: "Align right"
    }]
  }, {
    id: "outdent",
    icon: "fa-quote-left",
    title: "Outdent"
  }, {
    id: "indent",
    icon: "fa-quote-right",
    title: "Indent"
  }, {
    id: "insertOrderedList",
    icon: "fa-list-ol",
    title: "Add numbered list",
    tag: "ol"
  }, {
    id: "insertUnorderedList",
    icon: "fa-list-ul",
    title: "Add unordered list",
    tag: "ul"
  }, {
    id: "insertHorizontalRule",
    icon: "fa-minus",
    title: "Add horizontal rule"
  }, {
    id: "createLink",
    icon: "fa-external-link-alt",
    title: "Add link"
  }, {
    id: "unlink",
    icon: "fa-external-link-square-alt",
    title: "Remove link"
  }, {
    id: "undo",
    icon: "fa-reply",
    title: "Undo"
  }, {
    id: "redo",
    icon: "fa-share",
    title: "Redo"
  }]);
  /**
   * Add toolbar buttons
   */

  function setActionButton(action) {
    const button = document.createElement("button");
    const i = document.createElement("i"); // 	Base props

    button.classList.add("action");
    button.title = action.title;
    button.type = 'button';
    button.dataset.action = action.id;
    if (action.style) button.dataset.style = action.style;
    if (action.tag) button.dataset.style = action.tag; // 	Action

    button.addEventListener("click", executeAction); // 	Icon

    i.classList.add("fas");
    i.classList.add(action.icon);
    button.append(i);
    return button;
  }
  /**
   * Executes actions on the editable content wrapper
   * @param e - The mouse event
   * @see {@link https://developer.mozilla.org/es/docs/Web/API/Document/execCommand}
   * @see {@link https://developer.mozilla.org/es/docs/Web/HTML/Global_attributes/contenteditable}
   */


  function executeAction(e) {
    const target = e.currentTarget;
    const action = target.dataset.action;
    content.focus();

    switch (action) {
      case "createLink":
        const anchorUrl = prompt("Insert the anchor URL");
        if (anchorUrl) document.execCommand(action, false, anchorUrl);
        break;

      case "insertImageByUrl":
        const imageUrl = prompt("Insert the image URL");

        if (imageUrl) {
          document.execCommand("insertImage", false, imageUrl);
        }

        break;

      case "insertImageByFile":
        const fileUploadInput = document.querySelector("#image-upload-input");
        fileUploadInput.click();

        fileUploadInput.onchange = () => {
          const [file] = fileUploadInput.files;
          if (file) document.execCommand("insertImage", false, URL.createObjectURL(file));
        };

        break;

      default:
        document.execCommand(action, false);
        break;
    }
  }

  for (const action of actions) {
    const actionButton = setActionButton(action);

    if (action.submenu) {
      const submenu = document.createElement("div");
      let submenuVisible = false;
      submenu.classList.add("submenu");

      for (const subaction of action.submenu) {
        const subActionButton = setActionButton(subaction);
        submenu.append(subActionButton);
      }

      actionButton.addEventListener("click", e => {
        e.preventDefault();
        submenu.classList.toggle("visible");
      });
      actionButton.classList.add("has-submenu");
      actionButton.append(submenu);
    }

    toolbar.append(actionButton);
  }
}

$('.chosen-select').select2();
$("#edit-account").submit(function (e) {
  e.preventDefault();
  var form = $(this);
  var url = form.attr('action');
  $.ajax({
    type: "POST",
    url: url,
    data: form.serialize(),
    beforeSend: function () {
      $('.error-label').remove();
    },
    success: function (data) {
      if (data['error'] === 1) {
        $.each(data['empty_fields'], function (index, value) {
          $(`[name=${index}]`).after('<label class="error-label">Vui lòng không để trống trường này!</label>');
        });
      } else {
        if (data['admin']) {
          window.location = window.location.href.split("?")[0] + data['admin'];
        } else {
          window.location = window.location.href.split("?")[0];
        }
      }
    }
  });
});
$("#add-account").submit(function (e) {
  e.preventDefault();
  var form = $(this);
  var url = form.attr('action');
  $.ajax({
    type: "POST",
    url: url,
    data: form.serialize(),
    beforeSend: function () {
      $('.error-label').remove();
    },
    success: function (data) {
      if (data['error'] === 1) {
        if (data['exist']) {
          $(`[name=username]`).after('<label class="error-label">Username đã được sử dụng!</label>');
        } else {
          $.each(data['empty_fields'], function (index, value) {
            $(`[name=${index}]`).after('<label class="error-label">Vui lòng không để trống trường này!</label>');
          });
        }
      } else {
        if (data['admin']) {
          window.location = window.location.href.split("?")[0] + data['admin'];
        } else {
          window.location = window.location.href.split("?")[0];
        }
      }
    }
  });
});
$("#add-subjects, #edit-subject, #add-room, #edit-room").submit(function (e) {
  e.preventDefault();
  var form = $(this);
  var url = form.attr('action');
  $.ajax({
    type: "POST",
    url: url,
    data: form.serialize(),
    beforeSend: function () {
      $('.error-label').remove();
    },
    success: function (data) {
      if (data['error'] === 1) {
        if (data['exist'] === 1) {
          $(`[name="name"]`).after('<label class="error-label">Tên đã được sử dụng!</label>');
          $(`[name="title"]`).after('<label class="error-label">Tên đã được sử dụng!</label>');
        } else {
          $.each(data['empty_fields'], function (index, value) {
            $(`[name=${index}]`).after('<label class="error-label">Vui lòng không để trống trường này!</label>');
          });
        }
      } else {
        if (data['admin']) {
          window.location = window.location.href.split("?")[0] + data['admin'];
        } else {
          window.location = window.location.href.split("?")[0];
        }
      }
    }
  });
});
$("#login").submit(function (e) {
  e.preventDefault();
  var form = $(this);
  var url = form.attr('action');
  $.ajax({
    type: "POST",
    url: url,
    data: form.serialize(),
    beforeSend: function () {
      console.log(form.serialize());
      $('.error-label').remove();
    },
    success: function (data) {
      console.log(data);

      if (data['error'] === 1) {
        $(`[name=password]`).after(`<label class="error-label">${data['massage']}</label>`);
      } else {
        location.reload();
      }
    }
  });
});
$("#apply-class").submit(function (e) {
  e.preventDefault();
  var form = $(this);
  var url = form.attr('action');
  $.ajax({
    type: "POST",
    url: url,
    data: form.serialize(),
    beforeSend: function () {
      $('#apply-error').text();
    },
    success: function (data) {
      if (data['error'] === 1) {
        $('#apply-error').text(data['message']);
      } else {
        $('#apply-error').text('Đăng ký thành công!');
      }
    }
  });
});
$("#rating-form").submit(function (e) {
  e.preventDefault();
  var form = $(this);
  var url = form.attr('action');
  $.ajax({
    type: "POST",
    url: url,
    data: form.serialize(),
    beforeSend: function () {
      $('#rating-error').text();
    },
    success: function (data) {
      if (data['error'] === 1) {
        $('#rating-error').text(data['message']);
      } else {
        $('#rating-error').text('Đánh giá thành công!');
        location.reload();
      }
    }
  });
});
!function (o) {
  o.fn.customPopUp = function (e) {
    o(".custom-popup").addClass("popup-hide");
    o(this).on("click", function (e) {
      o(".custom-popup").addClass("animated");
      o(".custom-popup").removeClass("popup-hide");
    }), o(".custom-popup .backdrop").click(function () {
      o(this).parent('.custom-popup').addClass("popup-hide").delay(515);
    });
  };
}(jQuery);
$('.btn-popup').customPopUp(); //RATING

if ($('.rating-box').length) {
  let range = document.querySelector(".range");
  let slider = document.querySelector(".slider");
  let gradientStop = document.querySelector("#gradient-stop");
  let gradientGrey = document.querySelector("#gradient-grey");
  let colorBad = "#ff5722";
  let colorOk = "#ff9800";
  let colorGood = "#36d896";
  let colorGreat = "#3f51b5";
  slider.addEventListener("input", function () {
    checkSliderValue(this);
  });

  function checkSliderValue(slider) {
    gradientGrey.setAttribute("offset", 100 - slider.value + "%");

    if (slider.value > 0 && slider.value <= 25) {
      range.closest(".row").classList.add("bad");
      range.closest(".row").classList.remove("ok", "great", "good");
      gradientStop.setAttribute("stop-color", colorBad);
    }

    if (slider.value > 25 && slider.value <= 50) {
      range.closest(".row").classList.add("ok");
      range.closest(".row").classList.remove("bad", "great", "good");
      gradientStop.setAttribute("stop-color", colorOk);
    }

    if (slider.value > 50 && slider.value <= 75) {
      range.closest(".row").classList.add("good");
      range.closest(".row").classList.remove("ok", "great", "bad");
      gradientStop.setAttribute("stop-color", colorGood);
    }

    if (slider.value > 75 && slider.value <= 100) {
      range.closest(".row").classList.add("great");
      range.closest(".row").classList.remove("ok", "bad", "good");
      gradientStop.setAttribute("stop-color", colorGreat);
    }
  }

  checkSliderValue(slider);
}