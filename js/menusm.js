// menu smothness
// version 1.0.2

$(function(){

  // dropdown menu with 3 levels

  //$('.menusm li').click(function() {
  //  window.location = $(this).find('a:first').attr('href');
  //});
  var level=0;
  $('.menusm').find('li:first-child').addClass('ms_first');
  $('.menusm').find('li:last-child').addClass('ms_last');
  $('.menusm').find('li:first-child').children('a').addClass('ms_first');
  $('.menusm').find('li:last-child').children('a').addClass('ms_last');
  $('.menusm ul').find('li:first-child').addClass('ms_first');
  $('.menusm ul').find('li:last-child').addClass('ms_last');
  $('.menusm ul').find('li:first-child').children('a').addClass('ms_first');
  $('.menusm ul').find('li:last-child').children('a').addClass('ms_last');
  $('.menusm').children('li').addClass('ms_top');
  $('.menusm').children('li').children('a').addClass('ms_top');
  $('.menusm').children('li').children('ul').parent().addClass('ms_havesubmenu');
  $('.menusm').children('li').children('ul').parent().children('a').addClass('ms_havesubmenu');
  $('.menusm ul li').children('ul').parent().addClass('ms_havesubmenu');
  $('.menusm ul li').children('ul').parent().children('a').addClass('ms_havesubmenu');

  hiConfig = {
      sensitivity: 7, // number = sensitivity threshold (must be 1 or higher)
      interval: 50, // number = milliseconds for onMouseOver polling interval
      timeout: 50, // number = milliseconds delay before onMouseOut
      over: function () {
          $(this).find('ul:first').stop(true,true).slideDown(300).show();
          $(this).addClass('ms_hover');
          $(this).children('a').addClass('ms_hover');
          level++;
      },
  
      out: function(){
          $(this).find('ul:first').stop(true,true).slideUp(200);
          $(this).removeClass('ms_hover');
          $(this).children('a').removeClass('ms_hover');
          level--;
      }
  }

    // Increase timeout and interval for IE browser if it version 7 or earlier.

  if ($.browser.msie && $.browser.version < 8) {
      hiConfig.interval = 400;
      hiConfig.timeout = 500;
  }

  $('.menusm li').hoverIntent(hiConfig);

  // tab-navigation

  $('#mstabs').find('ul:first').find('li:first').children('a').addClass('ms_active');
  $('#mstabs').children('div').css({'display':'none'});
  $('#'+$('#mstabs').find('a.ms_active:first').attr('rel')).css({'display':'block'});
  $('#mstabs').find('ul:first').children('li').children('a').click(function() {
	$('#mstabs').find('ul:first').children('li').children('a').removeClass('ms_active');
	$(this).addClass('ms_active');
	$('#mstabs').children('div').css({'display':'none'});
	$('#'+$(this).attr('rel')).css({'display':'block'});
	return false;
  });

});

