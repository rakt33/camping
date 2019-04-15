// Menu active class
var filename = window.location.pathname.replace(/^.*[\\\/]/, '')
filename = filename.substring(0, filename.length - 4);
$( "#" + filename).addClass( "active" );