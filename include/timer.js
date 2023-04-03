function timed_redirect(url)
{
   var TARG_ID = "_TIMER";

   if(!url) throw new Error('You didn\'t include the "url" parameter');

   var e = document.getElementById(TARG_ID);

   if(!e) throw new Error('"_TIMER" tag non trovato');

   var cTicks = parseInt(e.innerHTML);

   var timer = setInterval(function()
   {
      if( cTicks )
      {
         e.innerHTML = --cTicks;
      }
      else
      {
         clearInterval(timer);
         document.body.innerHTML = "fff";
         location = url;	
      }

   }, 1000);
}