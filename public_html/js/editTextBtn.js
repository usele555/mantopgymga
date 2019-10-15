var toggle = false;

$(".indexContentBtn").click(function() {
  if (toggle == false) {
    $(".contentText").css("display", "none");
    $(".editTextForm").css("display", "block");
    toggle = true;
  }
  else if (toggle == true) {
    $(".contentText").css("display", "block");
    $(".editTextForm").css("display", "none");
    toggle = false;
  }
});
var toggle_2 = false;

$(".indexContentBtn-prices").click(function() {
  if (toggle_2 == false) {
    $(".contentText-prices").css("display", "none");
    $(".editTextForm-prices").css("display", "block");
    toggle_2 = true;
  }
  else if (toggle_2 == true) {
    $(".contentText-prices").css("display", "block");
    $(".editTextForm-prices").css("display", "none");
    toggle_2 = false;
  }
});
