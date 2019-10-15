    $(".trigger_popup_fricc").click(function() {
        $('.hover_bkgr_fricc').css('display', 'flex');
        $("body").css("overflow-y", "hidden");
        $('.news-popup').css('height', '50vh');
    });

    $('.popupCloseButton').click(function() {
        $('.hover_bkgr_fricc').css('display', 'none');
        closePopup();
    });
    $('.news-popup').click(function() {
        $('.hover_bkgr_fricc').css('display', 'none');
        closePopup();
    });
    
    function openPopup(id){
        document.getElementById(id).style.display = 'flex';
    }
    
    function closePopup(){
        $('.news-popup').css('display', 'none');
        $('.news-popup').css('height', '40vh');
        $("body").css("overflow-y", "scroll");
    }
    
    
    let del = 'delete-btn';
    function ConfirmDelete()
    {
      var x = confirm("Are you sure you want to delete?");
      if (x)
          del.submit();
      else
        return false;
    }
    
    
    