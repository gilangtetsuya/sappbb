/*
| Definition javascript for theme SAP PBB
| Build by @gilangtetsuya
*/
if (typeof jQuery === 'undefined') {
    throw new Error("Definisi element memerlukan jQuery!");
}
/*
| Autotab form permohonan 
*/
function autotab(original,destination) {
    original.value = original.value.replace(/[^\d]/g,'');
    if (original.getAttribute&&original.value.length==original.getAttribute('maxlength'))
        destination.focus();
}
/**
 * General definitions
 */
/*
| Validasi form
*/
+ function ($) {
'use strict';

   const btnLogin = $('._login');
   var username = $('._user');
   var password = $('._pass');

   btnLogin.on('click', function () {
     if (username.val() == '' || password.val() == '') {
        alert("Masukkan username dan password anda!"); 
        username.focus();
        return false;
     }
   });
   
   const btnPelayanan = $('._subPer');
   const statKol = $('._statKol');
   const jnsPelayanan = $('._jnsPelayanan');

   btnPelayanan.on('click', function () {
       if (statKol.val() == '') {
          alert("Status kolektif harus di isi!");
          statKol.focus();
          return false;
       }   
       if (jnsPelayanan.val() == "")  {
          alert("Pilih jenis pelayanan permohonan!");
          jnsPelayanan.focus();
          return false;
       } 
   });

}(jQuery);
// sidemenu toggle 
+ function ($) {
'use strict';

  var btnToggle    = [
      '#menu-toggle-1',
      '#menu-toggle-2'
  ]
  var toggleMobile = '.toggle-visible';
  var sidenav      = $('.sidenav');  
  var sidenavEl    = $('.sidenav__container');

  const sidenavElCon = document.querySelector('.sidenav__container');
  const detabinator  = new Detabinator(sidenavElCon);
  detabinator.inert = true;

  $(btnToggle.join(",")).on('click', function () {
      $(this).next().slideToggle(300);
  });

  $(document).on('click', toggleMobile,function () {
       sidenavEl.addClass('sidenav--visible');
       detabinator.inert = false;
  });

  sidenav.on('click', function (e) {
      e.stopPropagation();
  });
  
  $('.js-sidenav').on('click', function () {
       $(this).removeClass('sidenav--visible');
  });
 
}(jQuery);  
// datatable definition
+ function ($) {

  var table = $('#table-1').DataTable({
                 responsive: true
              });
  new $.fn.dataTable.FixedHeader( table );
  
  

}(jQuery);
// definition datepicker 
+ function ($) {
'use strict';
  
  var date  = [
      '#date-1',
      '#date-2',
      '#date-3' 
  ];

  var output = date.join(",");

  $(output).datepicker({
      dateFormat: "dd-mm-yyyy",
      language: "en"
  });

}(jQuery);
// search from method 
+ function ($) {
'use strict';

  const method  = $('#method');
  const formId = [
      '#input-1',
      '#input-2',
      '#input-3',
      '#input-4'
  ];
  const inputId1 = [
       '#tahun',
       '#bundel',
       '#urut'  
  ];
  const inputId2 = [
       '#prov',
       '#dati2',
       '#kec',
       '#kel',
       '#blok',
       '#no_urut',
       '#jns_op'  
  ];
  const inputId3 = '#pemohon';
  const inputId4 = [
        '#date-1',
        '#date-2'
  ];

  method.change(changeMethod);

  function changeMethod () {
     if (method.val() == '1') {
        $(formId[0]).fadeIn(300, function () {
            $(this).removeClass('none');
        });    
        $(inputId1.join(", ")).removeAttr('disabled');  
     } else {
        $(formId[0]).fadeOut(300, function () {
            $(this).addClass('none');
        });    
        $(inputId1.join(", ")).attr('disabled', '');
     }
     if (method.val() == '2') {
        $(formId[1]).fadeIn(300, function () {
            $(this).removeClass('none');
        });    
        $(inputId2.join(", ")).removeAttr('disabled');  
     } else {
        $(formId[1]).fadeOut(300, function () {
            $(this).addClass('none');
        });    
        $(inputId2.join(", ")).attr('disabled', '');
     }
     if (method.val() == '3') {
        $(formId[2]).fadeIn(300, function () {
            $(this).removeClass('none');
        });    
        $(inputId3).removeAttr('disabled');  
     } else {
        $(formId[2]).fadeOut(300, function () {
            $(this).addClass('none');
        });    
        $(inputId3).attr('disabled', '');
     }
     if (method.val() == '4') {
        $(formId[3]).fadeIn(300, function () {
            $(this).removeClass('none');
        });    
        $(inputId4.join(", ")).removeAttr('disabled');  
     } else {
        $(formId[3]).fadeOut(300, function () {
            $(this).addClass('none');
        });    
        $(inputId4.join(", ")).attr('disabled', '');
     }
  }

}(jQuery);