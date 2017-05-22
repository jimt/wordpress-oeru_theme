// support for Bootstrap modal login/registration,
/*global oeru_user_object*/
jQuery(document).ready(function() {
    var $ = jQuery;

    function showLoginForm() {
        $('#loginbutton,#goregisterbutton,#goforgotbutton').show();
        //$('.regodiv,#registerbutton,#gologinbutton,.help-block').hide();
        $('.regodiv,#registerbutton,#gologinbutton').hide();
        $('#userstatus').html('');
    }

    $('#userModal').on('show.bs.modal', function() {
        // make sure we initially display the login version of the form
        showLoginForm();
    });

    function processForm(bdo) {
      var username = $.trim($('#username').val()),
          name = $.trim($('#name').val()),
          password = $.trim($('#password').val()),
          confirmpassword = $.trim($('#confirmpassword').val()),
          email = $.trim($('#useremail').val()),
          usercountry = $('#usercountry').val(),
          courseblog = $.trim($('#courseblog').val()),
          security = $('#security').val();
      console.log('processForm', bdo);
      $('.oeru-user-login-button').prop('disabled', true);
      $('#userstatus').text('Processing...');
      console.log('url', oeru_user_object.ajaxurl);
      $.ajax({
          type: 'POST',
          dataType: 'json',
          url: oeru_user_object.ajaxurl,
          data: {
              'action': 'oerulogin',
              'do': bdo,
              'username': username,
              'name': name,
              'password': password,
              'useremail': email,
              'confirmpassword': confirmpassword,
              'usercountry': usercountry,
              'courseblog': courseblog,
              'security': security
          },
          success: function(data) {
              var msg = '';
              console.log('data', data);
              if (data.hasOwnProperty('result')) {
                  msg = data.result.replace(/<a[^>]*>[^<]*<\/a>/g, '');
                  console.log('result msg', msg);
              }
              if (data.hasOwnProperty('error')) {
                  msg = data.error.replace(/<a[^>]*>[^<]*<\/a>/g, '');
                  console.log('msg', msg);
                  $('#userstatus').html(msg);
              } else if (data.hasOwnProperty('loggedin')) {
                console.log('got a logged in result');
                // use the messages, but remove the links
                $('#userstatus').html(msg);
                if (data.loggedin === true) {
                    window.location.reload();
                } else {
                    $('.oeru-user-login-button').prop('disabled', false);
                }
              } else if (data.hasOwnProperty('registered')) {
                  $('#userstatus').html(msg);
                  if (data.registered === true) {
                      window.location.reload();
                  } else {
                      $('.oeru-user-login-button').prop('disabled', false);
                  }
              } else if (data.hasOwnProperty('updated')) {
                  $('#userstatus').html(msg);
                  $('.oeru-user-login-button').prop('disabled', false);
              } else {
                  $('#userstatus').text('Server error. Please try later.');
                  $('.oeru-user-login-button').prop('disabled', false);
              }
          },
          failure: function() {
              $('#userstatus').text('AJAX login POST failure. Please try later.');
              $('.oeru-user-login-button').prop('disabled', false);
          }
      });
    }
    $('#loginbutton').click(function(e) {
        processForm('login');
        e.preventDefault();
    });

    $('#registerbutton').click(function(e) {
        processForm('register');
        e.preventDefault();
    });

    $('#updatebutton').click(function(e) {
        processForm('update');
        e.preventDefault();
    });

    $('#gologinbutton').click(function() {
        // convert back to a login form
        showLoginForm();
    });

    $('#goregisterbutton').click(function() {
        // convert to a registration form
        $('#loginbutton,#goregisterbutton,#goforgotbutton').hide();
        //$('#registerbutton,#gologinbutton,.help-block').show();
        $('#registerbutton,#gologinbutton').show();
        $('.regodiv').show();
    });

    $('.update-field').focus(function() {
        $('#userstatus').html('');
    });
});
