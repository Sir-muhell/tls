$(document).ready(function () {
  document.getElementById("s_mail").value = "";
  //Register
  $("#reg").click(function () {
    var name = $("#name").val();
    var l_name = $("#l_name").val();
    var email = $("#email").val();
    var company = $("#company").val();
    var role = $("#role").val();
    if (name == null || name == "") {
      $("#msg").html("Kindly input your name");
    } else {
      if (email == null || email == "") {
        $("#msg").html("Kindly input your email");
      } else {
        if (company == null || company == "") {
          $("#msg").html("Company can't be empty");
        } else {
          if (role == null || role == "") {
            $("#msg").html("Role can't be empty");
          } else {
            $.ajax({
              type: "post",
              url: "submit.php",
              data: {
                name: name,
                l_name: l_name,
                email: email,
                company: company,
                role: role,
              },
              success: function (data) {
                $("#msg").html(data);
              },
            });
          }
        }
      }
    }
    document.getElementById("name").value = "";
    document.getElementById("l_name").value = "";
    document.getElementById("email").value = "";
    document.getElementById("company").value = "";
    document.getElementById("role").value = "";
  });

  //Subscribe
  $("#sub").click(function () {
    var s_mail = $("#s_mail").val();
    if (mail == null || mail == "") {
      $("#s_msg").html("Input Email");
    } else {
      $.ajax({
        type: "post",
        url: "submit.php",
        data: { s_mail: s_mail },
        success: function (data) {
          $("#s_msg").html(data);
        },
      });
    }
  });
  document.getElementById("s_mail").value = "";
});
