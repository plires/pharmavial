document.addEventListener('DOMContentLoaded', function() {

  const message = document.getElementById('message');
  const btnMenuMobile = document.getElementById('btn-menu-mobile');
  const navItem = document.getElementsByClassName('link-item');
  const nav = document.getElementsByTagName('nav')[0];
  const slide = document.getElementsByClassName('slide_mb');
  let counterNav = 1;

  const allMenuInstLg = document.getElementsByClassName('menu-inst-lg');
  const allContentInstLg = document.getElementsByClassName('content-inst-lg');

  for (let i = 0; i < allMenuInstLg.length; i++) {
    allMenuInstLg[i].addEventListener('click', function() {
      showContentItem(this.getAttribute('data-menu'));
      removeAllActiveClassFromSectionInstitucional();
      setActiveClass(this);
    });
  }

  btnMenuMobile.addEventListener('click', function() {
    setNavOpenOrClose();
  });

  for (let i = 0; i < navItem.length; i++) {
    navItem[i].addEventListener('click', function() {
      removeAllActiveClassFromNav();
      setActiveClass(this);
      counterNav = 1;
      nav.classList.remove('open');
    });
  }

  function setNavOpenOrClose() {
    if (counterNav == 1) {
      nav.classList.add('open');
      counterNav = 0;
    } else {
      counterNav = 1;
      nav.classList.remove('open');
    }
  }

  // function headerScroll() {
  //   if ($(document).scrollTop() > slide[0].offsetHeight) {
  //     $("nav").addClass("header_scroll");
  //   } else {
  //     $("nav").removeClass("header_scroll");
  //   }
  // }

  function removeAllActiveClassFromNav(){
    for (let i = 0; i < navItem.length; i++) {
      navItem[i].classList.remove("active");
    }
  }

  function removeAllActiveClassFromSectionInstitucional(){
    for (let i = 0; i < allMenuInstLg.length; i++) {
      allMenuInstLg[i].classList.remove("active");
    }
  }

  function showContentItem(element) {
    for (let i = 0; i < allContentInstLg.length; i++) {
      allContentInstLg[i].classList.remove("show", "animated", "wow", "fadeInUp");
    }

    let item = document.getElementById(element);
    item.classList.add("show", "animated", "wow", "fadeInUp");
  }

  function setActiveClass(link){
    link.classList.add("active");
  }

  /* Scroll header */
  // $(window).scroll(function() {
  //   headerScroll()
  // });

  // headerScroll();

  $(function() {
    $('.btn_to').bind('click', function(event) {
      var $anchor = $(this);
      $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top - 90
      }, 1500, 'easeInOutExpo');
      event.preventDefault();
    });
  });

  // Inicializa Wow
  new WOW().init();

  // Validacion del Formulario
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      let forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      let validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

  // Hacer que se vea el nombre del archivo subido en el label del input file
  document.querySelector('.custom-file-input').addEventListener('change',function(e){
    let fileName = document.getElementById("customFile").files[0].name;
    let nextSibling = e.target.nextElementSibling
    nextSibling.innerText = fileName
  })

});