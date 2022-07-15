$(document).ready(function () {
  $(".RegisterLink").click(function () {
    window.location = "./register";
  });
  $(".LoginLink").click(function () {
    window.location = "./login";
  });

  $(".button-error").click(function () {
    window.location = ".";
  });

  $(".button-gogroup").click(function () {
    let idbtn = $(this).attr("data-id");
    window.location = "/chat/" + idbtn;
  });

  $(".button-send-message").click(function () {
    let sendmessage = $(".footerviewmain input[name = 'sendmessage']").val();
    let idbtn = $(".button-send-message").attr("data-id");
    $.post(
      "./controller/sendmessage.php",
      {
        sendmessage: sendmessage,
        idbtn: idbtn,
      },

      function () {
        $(".footerviewmain input[name = 'sendmessage']").val("");
        $(".bodyviewmain").scrollTop($(".bodyviewmain")[0].scrollHeight);
      }
    );
  });

  $(".button-reg").click(function () {
    let username = $("#sign-up input[name = 'username']").val();
    let mail = $("#sign-up input[name = 'mail']").val();
    let password = $("#sign-up input[name = 'password']").val();
    let day = $("#sign-up select[name = 'day']").val();
    let month = $("#sign-up select[name = 'month']").val();
    let year = $("#sign-up select[name = 'year']").val();
    let date = year + "-" + month + "-" + day;
    $.post(
      "./controller/register.php",
      {
        username: username,
        mail: mail,
        password: password,
        date: date,
      },

      function (data) {
        if (data != "") {
          $(".field-username").removeClass("success");
          $(".field-username").removeClass("error");
          $(".field-mail").removeClass("success");
          $(".field-mail").removeClass("error");
          $(".field-password").removeClass("success");
          $(".field-password").removeClass("error");

          let datafirstcut = data.split(",");
          let datafirstcutlength = datafirstcut[0].length;
          let datadatafirstcut0 = datafirstcut[0].split("/");
          let datadatafirstcut1 = datafirstcut[1].split("/");
          let datadatafirstcut2 = datafirstcut[2].split("/");
          let datadatafirstcut3 = datafirstcut[3].split("/");

          console.log(datafirstcut);
          console.log(datafirstcutlength);

          if (datafirstcutlength > 2) {
            $(".field").addClass("success");
            $(".field-username").empty();
            $(".field-mail").empty();
            $(".field-password").empty();
            $(".field.success").append(datadatafirstcut0[0]);
          } else {
            if (datadatafirstcut1[1] == 2) {
              $(".field-username").addClass("success");
              $(".field-username.success").empty();
              $(".field-username.success").append(" - " + datadatafirstcut1[0]);
            } else {
              $(".field-username").addClass("error");
              $(".field-username.error").empty();
              $(".field-username.error").append(" - " + datadatafirstcut1[0]);
            }
            if (datadatafirstcut2[1] == 2) {
              $(".field-mail").addClass("success");
              $(".field-mail.success").empty();
              $(".field-mail.success").append(" - " + datadatafirstcut2[0]);
            } else {
              $(".field-mail").addClass("error");
              $(".field-mail.error").empty();
              $(".field-mail.error").append(" - " + datadatafirstcut2[0]);
            }
            if (datadatafirstcut3[1] == 2) {
              $(".field-password").addClass("success");
              $(".field-password.success").empty();
              $(".field-password.success").append(" - " + datadatafirstcut3[0]);
            } else {
              $(".field-password").addClass("error");
              $(".field-password.error").empty();
              $(".field-password.error").append(" - " + datadatafirstcut3[0]);
            }
          }
        }
      }
    );
  });

  $(".button-log").click(function () {
    let mail = $("#sign-in input[name = 'mail']").val();
    let password = $("#sign-in input[name = 'password']").val();
    $.post(
      "./controller/connect.php",
      {
        mail: mail,
        password: password,
      },

      function (data) {
        if (data != "") {
          $(".field").removeClass("success");
          $(".field").removeClass("error");

          if (data.includes("✅")) {
            $(".field").addClass("success");
            $(".field.success").empty();
            // $(".field.success").append(data);
            window.location = "./chat/@me";
          } else {
            $(".field").addClass("error");
            $(".field.error").empty();
            $(".field.error").append(data);
          }
        }
      }
    );
  });

  $(".button-group").click(function () {
    let namegroup = $(".add-container input[name = 'namegroup']").val();

    $.post(
      "./controller/addgroup.php",
      {
        namegroup: namegroup,
      },

      function (data) {
        if (data != "") {
          $(".field").removeClass("success");
          $(".field").removeClass("error");

          if (data.includes("✅")) {
            $(".field").addClass("success");
            $(".field.success").empty();
            $(".field.success").append(data);
          } else {
            $(".field").addClass("error");
            $(".field.error").empty();
            $(".field.error").append(data);
          }
        }
      }
    );
  });

  $(".deco").click(function () {
    $.post(
      "./controller/deco.php",
      {},

      function () {
        window.location = "/";
      }
    );
  });

  $(".add").click(function () {
    $(".add-container").css("display", "flex");
  });

  $(".edit-profil").click(function () {
    $(".edit-container").css("display", "flex");
  });

  $(".button-add-people").click(function () {
    $(".add-thepeople-container").css("display", "flex");
  });

  $(".img-close").click(function () {
    $(".add-container").css("display", "none");
    $(".edit-container").css("display", "none");
    $(".add-thepeople-container").css("display", "none");
  });

  $(".button-password").on("click", function () {
    let gettype = $(".password").attr("type");

    if (gettype == "password") {
      $(".path-pass").attr(
        "d",
        "M12 4c6.627 0 12 6.625 12 8s-5.373 8-12 8-12-6.625-12-8 5.373-8 12-8zm0 3a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 2a3 3 0 1 1 0 6 3 3 0 0 1 0-6z"
      );
      $(".password").attr("type", "text");
    } else {
      $(".path-pass").attr(
        "d",
        "M1.393 4.222l1.415-1.414 18.384 18.384-1.414 1.415-3.496-3.497c-1.33.547-2.773.89-4.282.89-6.627 0-12-6.625-12-8 0-.752 1.607-3.074 4.147-5.024L1.393 4.222zM12 4c6.627 0 12 6.625 12 8 0 .752-1.607 3.074-4.147 5.024l-3.198-3.196a5 5 0 0 0-6.483-6.483L7.718 4.89C9.048 4.343 10.49 4 12 4zm-4.656 6.173a5 5 0 0 0 6.483 6.483l-1.661-1.66L12 15a3 3 0 0 1-3-3l.005-.166-1.66-1.66zM12 9a3 3 0 0 1 3 3l-.005.166-3.162-3.161L12 9z"
      );
      $(".password").attr("type", "password");
    }
  });

  $(".button-profil").click(function () {
    let mail = $(".edit-container-input input[name = 'mail']").val();
    let username = $(".edit-container-input input[name = 'username']").val();
    let password = $(".edit-container-input input[name = 'password']").val();
    let phone = $(".edit-container-input input[name = 'phone']").val();
    $.post(
      "./controller/editprofil.php",
      {
        username: username,
        mail: mail,
        password: password,
        phone: phone,
      },

      function (data) {
        if (data != "") {
          $(".field-mail").removeClass("success");
          $(".field-mail").removeClass("error");
          $(".field-username").removeClass("success");
          $(".field-username").removeClass("error");
          $(".field-password").removeClass("success");
          $(".field-password").removeClass("error");
          $(".field-phone").removeClass("success");
          $(".field-phone").removeClass("error");

          let datacut = data.split(",");

          if (datacut[0].includes("✅")) {
            $(".field-mail").addClass("success");
            $(".field-mail").empty();
            $(".field-mail").append(datacut[0]);
          } else {
            $(".field-mail").addClass("error");
            $(".field-mail").empty();
            $(".field-mail").append(datacut[0]);
          }

          if (datacut[1].includes("✅")) {
            $(".field-username").addClass("success");
            $(".field-username").empty();
            $(".field-username").append(datacut[1]);
          } else {
            $(".field-username").addClass("error");
            $(".field-username").empty();
            $(".field-username").append(datacut[1]);
          }

          if (datacut[2].includes("✅")) {
            $(".field-password").addClass("success");
            $(".field-password").empty();
            $(".field-password").append(datacut[2]);
          } else {
            $(".field-password").addClass("error");
            $(".field-password").empty();
            $(".field-password").append(datacut[2]);
          }

          if (datacut[3].includes("✅")) {
            $(".field-phone").addClass("success");
            $(".field-phone").empty();
            $(".field-phone").append(datacut[3]);
          } else {
            $(".field-phone").addClass("error");
            $(".field-phone").empty();
            $(".field-phone").append(datacut[3]);
          }
        }
      }
    );
  });

  $(".button-delete-group").click(function () {
    let idbtn = $(".button-delete-group").attr("data-id");

    $.post(
      "./controller/deletegroup.php",
      {
        idbtn: idbtn,
      },

      function () {
        window.location = "/chat/@me";
      }
    );
  });
});
