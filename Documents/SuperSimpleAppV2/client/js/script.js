/* Adding some custom jquery code */

$.fn.hasAttr = function(attr) {
  return typeof $(this).attr(attr) != "undefined"
};

/* Global variables */
let ui;
let templates;

/* jquery function that will be called as soon as the page finishes loading */
$(window).on("load", function() {
  initUIVariables();
  initTemplates();
  getUsers();
});

/* ajax call to database, via php, to get users */
function getUsers() {
  /*$.get({
    url: "server/api.php",
    cache: false,
    data: {action: "GET_USERS"}
  }).then(function(response) {
    if(response.success) {
      const users = response.users;

      updateUserList(users);
    } else {
      console.log(response.message);
    }
  });*/

  $.ajax({
    url: "server/api.php",
    cache: false,
    data: {action: "GET_USERS"},
    type: 'GET',
    success: function(response){
      console.log("GET_USERS response", response);
      if(response.success) {
        console.log("USERS", response);
        const users = response.users;

        updateUserList(users);
      } else {
        alert(response.message);
      }
    },
    error: function(data) {
      console.log("GET_USERS error", data);
    }
  });
}

function updateUserList(users) {
  ui.userListWrap.empty();
  if(users.length === 0) {
    ui.userListWrap.html("<div class='no-users'>No Users</div>")
  } else {
    users.forEach((user) => {
      const $user = $(templates.userWrap).clone();

      // removing the empty option as it's not need for user updates
      $user.find(".user-gender option[value='']").remove();
      $user
        .attr("id", `user-${user.id}`)
        .attr("data-id", user.id);

      $user.find(".user-summary").text(`${user.name} ${user.surname}`);
      $user.find(".user-name").val(user.name);
      $user.find(".user-id_number").val(user.id_number);
      $user.find(".user-surname").val(user.surname);
      $user.find(".user-gender").val(user.gender);
      $user.find(".user-email").val(user.email);
      $user.find(".user-age").val(user.age);
      $user.find(".user-phone_number").val(user.phone_number);
      $user.find(".user-town").val(user.town);
      $user.find(".user-services").val(user.services);
      $user.find(".user-notifications").val(user.notifications);
      console.log($user);

      $user.find(".user-summary").on("click", function() {
        $(this).parent().toggleClass("show-form");
      })

      ui.userListWrap.append($user);
    });
  }
}

/* function used to store references to the UI elements in jquery object form */
function initUIVariables() {
  ui = {
    addUserWrap: $("#add-user-wrap"),
    userListWrap: $("#users-list-wrap"),
  }
}

/* function used to init html templates */
function initTemplates() {
  templates = {
    userWrap:
      "<div class='user-wrap'>" +
        "<div class='user-summary'></div>" +
        "<div class='user-form'>" +
          "<div class='field'>" +
            "<label>Name</label>" +
            "<div class='input-error'></div>" +
            "<input type='text' class='user-name' />" +
          "</div>" +

          "<div class='field'>" +
            "<label>Surname</label>" +
            "<div class='input-error'></div>" +
            "<input type='text' class='user-surname' />" +
          "</div>" +

          "<div class='field'>" +
            "<label>id_number</label>" +
            "<div class='input-error'></div>" +
            "<input type='text' class='user-id_number' />" +
          "</div>" +

          "<div class='field'>" +
            "<label>Gender</label>" +
            "<div class='input-error'></div>" +
            "<select class='user-gender'>" +
              "<option value=''>Select Gender</option>" +
              "<option value='Male'>Male</option>" +
              "<option value='Female'>Female</option>" +
            "</select>" +
          "</div>" +

          "<div class='field'>" +
            "<label>email</label>" +
            "<div class='input-error'></div>" +
            "<input type='text' class='user-email' />" +
          "</div>" +

          "<div class='field'>" +
            "<label>Age</label>" +
            "<div class='input-error'></div>" +
            "<input type='text' class='user-age' />" +
          "</div>" +


         "<div class='field'>" +
            "<label>phone_number</label>" +
            "<div class='input-error'></div>" +
            "<input type='text' class='user-phone_number' />" +
          "</div>" +


"<div class='field'>" +
"<label>Town</label>" +
"<div class='input-error'></div>" +
"<select class='user-town'>" +
"<option value=''>Select Town</option>" +
"<option value='Queenstown'>Queenstown</option>" +
"<option value='Gqeberha'>Gqeberha</option>" +
"<option value='Engcobo'>Engcobo</option>" + 
"<option value='middledrift'>middledrift</option>" +
"<option value='Bizana'>Bizana</option>" +
"<option value='Mount Ayliff'>Mount Ayliff</option>" +
"<option value='Mount Fere'>Mount Fere</option>" +
"<option value='willowvale'>willowvale</option>" +
"<option value='Centane'>Centane</option>" +
"<option value='Butterworth'>Butterworth</option>" +
"<option value='Cradock'>Cradock</option>" +
"<option value='Cleary Park'>Cleary Park</option>" +
"<option value='Motherwell'>Motherwell</option>" +
"<option value='Uitenhage'>Uitenhage</option>" +
"<option value='East London'>East London</option>" +
"<option value='Bisho'>Bisho</option>" +
"<option value='Mdatsane'>Mdatsane</option>" +
"<option value='somerset East'>somerset East</option>" +
"<option value='Graaff Reinet'> Graaff Reinet</option>" +
"<option value='Humansdorp'>Humansdorp</option>" +
"<option value='Grahamstown'>Grahamstown</option>" +
"<option value='Port Alfred'>Port Alfred</option>" +
"<option value='Burgersdorp'>Burgersdorp</option>" +
"<option value='Aliwal North'>Aliwal North</option>" +
"<option value='Sterkspruit'>Sterkspruit</option>" +
"<option value='Mthatha'>Mathatha</option>" +
"<option value='Qumbu'>Qumbe</option>"+
"<option value='Tsolo'>Tsolo</option>" +
"<option value='libode'>libode</option>" +
"<option value='Ngqeleni'>Ngqeleni</option>" +
"<option value='Lusikisiki'>Lusikisiki</option>"+
"<option value='Buffalo City'>Buffalo City</option> " +
"<option value='Nelson Mandela Bay'>Nelson Mandela Bay</option>" +
"<option value='Chris Hani'>Chris Han</option>" +
"<option value='OR Tambo'>OR Tambo</option>" +
"</select>" +
"</div>" +


"<div class='field'>" +
"<label>Services</label>" +
"<div class='input-error'></div>" +
"<select class='user-services'>" +
"<option value=''>Select Services</option>" +
"<option value='Birth Certificate'>Birth Certificate</option> " + 
"<option value='Identity Document'>Identity Document</option> " +
"<option value='Marriage Certificate'>Marriage Certificate</option>" +
"<option value='Death Certificate'>Death Certificate</option> " +
"<option value='Adoption'>Adoption</option>" +
"<option value='Citizenship'>Citizenship</option> " +
"<option value='Amendments'>Amendments</option>"+
"<option value='Travel documents'>Travel documents</option>" +
"<option value='Parents Consent Affidavit ZA'>Parents Consent Affidavit ZA</option>" +
"<option value='Qualified Imams'>Qualified Imams</option>" +
"<option value='Abis'>Abis</option>" +             
"</select>" +
"</div>" +


"<div class='field'>" +
"<label>Notifications</label>" +
"<div class='input-error'></div>" +
"<select class='user-notifications'>" +
"<option value=''>Select Notifications</option>" +
"<option value='Sms'>Sms</option>" +
"<option value='Email'>Email</option>" +
"</select>" +
"</div>" +

 "<div class='user-update-btn-wrap'>" +
 "<input type='button' value='Update User' onclick='updateUser(this)' />" +
 "</div>" +
 "</div>" +
 "</div>",
  }

  initAddUserUI();
}

function initAddUserUI() {
  const $user = $(templates.userWrap).clone();
  ui.addUser = $user;

  const user = {name: "", surname: "", id_number: "", gender: "", email: "", age: "",phone_number: "", town: "", services: "", notifications: ""}

  $user.find(".user-summary")
    .text("Add User")
    .addClass("add-user-toggle");
  $user.find(".user-name").val(user.name);
  $user.find(".user-surname").val(user.surname);
  $user.find(".user-id_number").val(user.id_number);
  $user.find(".user-gender").val(user.gender);
  $user.find(".user-email").val(user.email);
  $user.find(".user-age").val(user.age);
  $user.find(".user-phone_number").val(user.phone_number);
  $user.find(".user-town").val(user.town);
  $user.find(".user-services").val(user.services);
  $user.find(".user-notifications").val(user.notifications);
  console.log($user);

  $user.find(".user-update-btn-wrap input").val("Add user");

  $user.find(".user-summary").on("click", function() {
    $(this).parent().toggleClass("show-form");
  })

  ui.addUserWrap.append($user);
}

function updateUser(btn) {
  const $user = $(btn).closest(".user-wrap");
  const isExistingUser = $user.hasAttr("data-id");

  // clear all input error warnings before validation
  $user.find(".input-error").text("");

  const $name = $user.find(".user-name");
  const $nameError = $name.siblings(".input-error");
  const name = $name.val().trim();

  const $surname = $user.find(".user-surname");
  const $surnameError = $surname.siblings(".input-error");
  const surname = $surname.val().trim();

  const $id_number = $user.find(".user-id_number");
  const $id_numberError = $id_number.siblings(".input-error");
  const id_number = $id_number.val().trim();

  const $gender = $user.find(".user-gender");
  const $genderError = $gender.siblings(".input-error");
  const gender = $gender.val().trim();

  const $email = $user.find(".user-email");
  const $emailError = $email.siblings(".input-error");
  const email = $email.val().trim();

  const $age = $user.find(".user-age");
  const $ageError = $age.siblings(".input-error");
  const age = $age.val().trim();


  const $phone_number = $user.find(".user-phone_number");
  const $phone_numberError = $phone_number.siblings(".input-error");
  const phone_number = $phone_number.val().trim();

  const $town = $user.find(".user-town");
  const $townError = $town.siblings(".input-error");
  const town = $town.val().trim();


  const $services = $user.find(".user-services");
  const $servicesError = $services.siblings(".input-error");
  const services = $services.val().trim();

  const $notifications = $user.find(".user-notifications");
  const $notificationsError = $notifications.siblings(".input-error");
  const notifications = $notifications.val().trim();

  let valid = true;
  if(name.length === 0) {
    valid = false;
    $nameError.text("Name is required");
  }
  if(surname.length === 0) {
    valid = false;
    $surnameError.text("Surname is required");
  }

  if(id_number.length === 0) {
    valid = false;
    $id_numberError.text("Id_Number is required");
  }

  if(gender.length === 0) {
    valid = false;
    $genderError.text("Gender is required");
  }

  if(email.length === 0) {
    valid = false;
    $emailError.text("Email is required");
  }

  if(age.length === 0) {
    valid = false;
    $ageError.text("Age is required");
  }

  if(phone_number.length === 0) {
    valid = false;
    $phone_numberError.text("Phone_Number is required");
  }

  if(town.length === 0) {
    valid = false;
    $townError.text("Town is required");
  }

  if(services.length === 0) {
    valid = false;
    $servicesError.text("Services is required");
  }

  if(notifications.length === 0) {
    valid = false;
    $notificationsError.text("Notifications is required");
  }


  if(valid) {
    let action;
    const userParams = {name, surname,id_number, gender,email, age, phone_number, town, services, notifications};
    if(isExistingUser) {
      userParams.id = parseInt($user.attr("data-id"));
      action = "UPDATE_USER";
    } else {
      action = "CREATE_USER";
    }

    /*$.post({
      url: "server/api.php",
      data: {action, user: userParams}
    }).then(function(response) {
      console.clear();
      if(response.success) {
        console.log("update success: ", response);

        if(isExistingUser) {
          const user = response.user;
          // These updates not needed as the values coming from the server should be the same as what was sent to the server
          // But not a bad idea to update the fields with what is coming from the server
          $name.val(user.name);
          $surname.val(user.surname);
          $id_number.val(user.id_number);
          $gender.val(user.gender);
          $email.val(user.email);
          $age.val(user.age);
          $phone_number.val(user.phone_number);
          $town.val(user.town);
          $services.val(user.services);
          $notifications.val(user.notifications);
          
          $user.find(".user-summary").text(`${user.name} ${user.surname}`);
        } else {
          ui.addUser.find("input:not([type='button'])").val("");
          ui.addUser.find("select").val("");
          updateUserList(response.users);
        }
      } else {
        console.log(response.message);
      }
    });*/

    $.ajax({
      url: "server/api.php",
      data: {action, user: userParams},
      cache: false,
      type: 'POST',
      success: function(response){
        console.clear();
        if(response.success) {
          console.log("update success: ", response);

          if(isExistingUser) {
            const user = response.user;
            // These updates not needed as the values coming from the server should be the same as what was sent to the server
            // But not a bad idea to update the fields with what is coming from the server
            $name.val(user.name);
            $surname.val(user.surname);
            $id_number.val(user.id_number);
            $gender.val(user.gender);
            $email.val(user.email);
            $age.val(user.age);
            $phone_number.val(user.phone_number);
            $town.val(user.town);
            $services.val(user.services);
            $notifications.val(user.notifications);

            $user.find(".user-summary").text(`${user.name} ${user.surname}`);
          } else {
            ui.addUser.find("input:not([type='button'])").val("");
            ui.addUser.find("select").val("");
            updateUserList(response.users);
          }
        } else {
          console.log(response.message);
        }
      },
      error: function(data) {
        console.log(`${action} error`, data);
      }
    });
  }
}