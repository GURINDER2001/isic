$(document).ready(function () {
   // $("#sidebar").mCustomScrollbar({
   //     theme: "minimal"
   // });

    $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').fadeOut();
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').addClass('active');
        $('.overlay').fadeIn();
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
});

function checkPhoto(target,id='blah')
{
	if(target.files[0].type.indexOf("image") == -1)
	{
		jQuery('#'+id).attr('src', '#'); 
		return false;
	}
	if (target.files && target.files[0])
	{
		var reader = new FileReader();
		reader.onload = function (e)
		{
			jQuery('#'+id).attr('src', e.target.result);
			jQuery('#'+id+'_container').css('display','block'); 
		}
		reader.readAsDataURL(target.files[0]);
	}
}

function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}

/* ------------Ajax--------------------*/
$(document).ready(function () {

    $(document).on('submit','#subscriptionfrm',function (e) { 
      e.preventDefault();
      $.ajax({
          type: 'post',
          url: $('body').attr("data-url")+'front/subscription',
          data: $(this).serialize(),
          beforeSend: function()
          {   
             $('#subscriptionmsg').html('<div class="alert alert-info">Please wait....</div>'); 
          },
          success: function(response)
          {
            if(response.trim()=='success')
            {
                $('#subscriptionmsg').html('<div class="alert alert-success"><strong>Congrats : </strong>You have subscribed successfully.</div>');
                //location.reload().delay(7000);
            }
            else if(response.trim()=='exist')
            {
               $('#subscriptionmsg').html('<div class="alert alert-warning"><strong>Wow : </strong>You have already subscribed.</div>');
            }
            else
            {
                $('#subscriptionmsg').html('<div class="alert alert-success"><strong>Congrats : </strong>You have subscribed successfully.</div>');
                //$('#subscriptionmsg').html('<div class="alert alert-danger"><strong>Oops : </strong>Something going wrong.</div>');            
            }
          }
      });

      return false;
    });

    $(document).on('submit','#contactfrm',function (e) { 
      e.preventDefault();

      $.ajax({
          type: 'post',
          url: $('body').attr("data-url")+'front/contact',
          data: $(this).serialize(),
          beforeSend: function()
          {   
             $('#contact-msg').html('<div class="alert alert-info">Please wait....</div>'); 
          },
          success: function(response)
          {
            if(response.trim()=='success')
            {
                $('#contact-msg').html('<div class="alert alert-success"><strong>Congrats : </strong>Your enquiery has sumbmitted successfully.</div>');
                location.reload().delay(20000);
            }
            else
            {
                $('#contact-msg').html('<div class="alert alert-danger"><strong>Oops : </strong>Something going wrong, Try again !!</div>');            
            }
          }
      });

      return false;
    });

    $(document).on('change','#concern',function (e) { 
      e.preventDefault();
      $.ajax({
          type: 'post',
          url: $('body').attr("data-url")+'front/specification',
          data: {'parent':$(this).val()},
          success: function(response)
          {
              $('#concern_specification').html(response); 
          }
      });
      return false;
    });

    $(document).on('submit','#bookdemofrm',function (e) { 
      e.preventDefault();

      $.ajax({
          type: 'post',
          url: $('body').attr("data-url")+'front/ajaxbookdemo',
          data: $(this).serialize(),
          beforeSend: function()
          {   
             $('#bookdemo-msg').html('<div class="alert alert-info">Please wait....</div>'); 
          },
          success: function(response)
          {
            if(response.trim()=='success')
            {
                $('#bookdemo-msg').html('<div class="alert alert-success"><strong>Congrats : </strong>Your enquiery has sumbmitted successfully.</div>');
                location.reload().delay(20000);
            }
            else
            {
                $('#bookdemo-msg').html('<div class="alert alert-danger"><strong>Oops : </strong>Something going wrong, Try again !!</div>');            
            }
          }
      });

      return false;
    });
    
    $(document).on('click','#referbyemail',function (e) { 
      e.preventDefault();
      var email_id = $('#raf_email_id').val();
      $.ajax({
          type: 'post',
          url: $('body').attr("data-url")+'front/ajaxReferFriendByEmail',
          dataType: "json",
          data: {'email_id':email_id },
          success: function(response)
          {
              if(response.status == 'success')
              {
                  $('#alertmessage').html('<div class="alert alert-success">'+response.message+'</div>'); 
              }
              else
              {
                  $('#alertmessage').html('<div class="alert alert-danger">'+response.message+'</div>');
              }
              
          }
      });
      return false;
    });
    $(document).on('click','#referbywhatsapp',function (e) { 
      e.preventDefault();
      var mobile_number = $('#raf_whatsapp_number').val();
      $.ajax({
          type: 'post',
          url: $('body').attr("data-url")+'front/ajaxReferFriendByWhatsapp',
          dataType: "json",
          data: {'mobile_number':mobile_number },
          success: function(response)
          {
              if(response.status == 'success')
              {
                  var textMessage = response.text;
                  //alert(textMessage);
                  var whatsappApiUrl = 'https://api.whatsapp.com/send?phone='+mobile_number+'&text='+textMessage;
                  $('#alertmessage').html('<div class="alert alert-success">'+response.message+'</div>'); 
                  window.location.href = whatsappApiUrl;
              }
              else
              {
                  $('#alertmessage').html('<div class="alert alert-danger">'+response.message+'</div>');
              }
              
          }
      });
    });
});
/*-------------Ajax-End----------------*/