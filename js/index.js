jQuery(document).ready(function ($) {
  $("#coin").on("click", function () {
    var flipResult = Math.random();
    $("#coin").removeClass();
    setTimeout(function () {
      if (flipResult <= 0.5) {
        $("#coin").addClass("heads");
        console.log("it is head");
      } else {
        $("#coin").addClass("tails");
        console.log("it is tails");
      }
    }, 100);
  });
});


function confirmWithdraw() {
  if (confirm("ยันยืนเพื่อทำการถอนไหม?")) {
      // user clicked OK
      alert("ยันยืนการถอนออกจากระบบเเล้ว");
  } else {
      // user clicked Cancel
      alert("ยกเลิกการถอนออกจากระบบเเล้ว!");
  }
}