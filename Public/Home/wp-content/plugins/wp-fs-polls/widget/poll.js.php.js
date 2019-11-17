(function(window,document){
   
   var initScript = document.currentScript;
   var pollId = initScript.getAttribute('data-poll-id');
   var sba = initScript.getAttribute('data-sba');
   var blockId = initScript.getAttribute('data-block-id');
   var nativeId = initScript.getAttribute('data-id');
   var nativeHeight = initScript.getAttribute('data-height');
   var pollUid = pollId ? pollId : ( nativeId ? nativeId : null  );
   var votedSortIndex = null;
   
var widgetWrapContent = base64_decode('PGxpbmsgcmVsPSJzdHlsZXNoZWV0IiB0eXBlPSJ0ZXh0L2NzcyIgaHJlZj0iaHR0cHM6Ly93d3cud2ViZGVzaWduZXJkZXBvdC5jb20vd3AtY29udGVudC9wbHVnaW5zL3dwLWZzLXBvbGxzL2Nzcy9zdHlsZXMuY3NzP3Y9MTIiIC8+DQoNCiAgIDxkaXYgY2xhc3M9ImVtcG9sbF9ib3giPg0KPGRpdiBjbGFzcz0iZW1wb2xsc291dGVyIj4NCg0KPGRpdiBjbGFzcz0iZW1wb2xsaGVhZGVyIj4NCiAgPHNwYW4gY2xhc3M9ImVtcG9sbF9xdWVzdGlvbiI+PC9zcGFuPg0KDQogIDxkaXYgY2xhc3M9ImVtcG9sbGN0YSI+DQogICAgPGgyPg0KICAgICAgPHNwYW4gY2xhc3M9ImVtcG9sbGN0YV92b3RlIj5Wb3RlITwvc3Bhbj4NCiAgICAgIDxzcGFuIGNsYXNzPSJlbXBvbGxjdGFfaGVyZSI+SGVyZTwvc3Bhbj4NCiAgICA8L2gyPg0KICAgIDxkaXYgY2xhc3M9ImVtcG9sbGN0YV9hcnJvdyI+PC9kaXY+DQogIDwvZGl2Pg0KDQo8L2Rpdj4NCg0KPGRpdiBjbGFzcz0iZW1wb2xsX2JveF9jb250ZW50Ij4NCg0KCTwhLS0gdHdvLWNob2ljZSBwb2xsLS0+DQoJPHVsIGNsYXNzPSJwb2xsdm90ZXMiIHN0eWxlPSJkaXNwbGF5Om5vbmU7Ij4NCgkgIDxsaSBjbGFzcz0icG9sbG9wdGlvbiBwb2xsb3B0aW9uMSAiPg0KCSAgICANCgkgIDwvbGk+DQoJICA8bGkgY2xhc3M9InBvbGxvciI+T3I8L2xpPg0KCSAgPGxpIGNsYXNzPSJwb2xsb3B0aW9uIHBvbGxvcHRpb24yIj4NCgkgICAgDQoJICA8L2xpPg0KCTwvdWw+DQoJDQoJPGRpdiBjbGFzcz0icG9sbGltZ2JveCIgc3R5bGU9ImRpc3BsYXk6bm9uZTsiPg0KCSAgPHVsIGNsYXNzPSJwb2xsaW1ndm90ZXMiID4NCgkgICAgPGxpPg0KCSAgICA8YSBocmVmPSJqYXZhc2NyaXB0OjsiIGNsYXNzPSJwb2xsaW1ndm90ZSBwb2xsaW1ndm90ZTEiPjwvYT4NCgkgICAgPGRpdiBjbGFzcz0icG9sbGltZ3Jlc3VsdCBwb2xsaW1ncmVzdWx0MSAiIHN0eWxlPSJkaXNwbGF5Om5vbmU7Ij4NCgkgICAgICA8c3BhbiBjbGFzcz0idm90ZWNvdW50aW1nIj5Wb3RlZDxzcGFuIGNsYXNzPSJ2b3RlY291bnRpbWdjaGsiPjwvc3Bhbj48L3NwYW4+DQoJICAgICAgPHNwYW4gY2xhc3M9InZvdGVjb3VudDEiPjwvc3Bhbj4NCgkgICAgPC9kaXY+DQoJICAgIDwvbGk+DQoJICAgIDxsaT4NCgkgICAgPGEgaHJlZj0iamF2YXNjcmlwdDo7IiBjbGFzcz0icG9sbGltZ3ZvdGUgcG9sbGltZ3ZvdGUyIj48L2E+DQoJICAgIDxkaXYgY2xhc3M9InBvbGxpbWdyZXN1bHQgcG9sbGltZ3Jlc3VsdDIgIiBzdHlsZT0iZGlzcGxheTpub25lOyI+IDwhLS0gcG9sbGltZ3Jlc3VsdHZvdGVkIC0tPg0KCSAgICAgIDxzcGFuIGNsYXNzPSJ2b3RlY291bnRpbWciPlZvdGVkPHNwYW4gY2xhc3M9InZvdGVjb3VudGltZ2NoayI+PC9zcGFuPjwvc3Bhbj4NCgkgICAgICA8c3BhbiBjbGFzcz0idm90ZWNvdW50MiI+PC9zcGFuPg0KCSAgICA8L2Rpdj4NCgkgICAgPC9saT4NCgkgIDwvdWw+DQoJICAgICAgICAgIA0KCTwvZGl2Pg0KCQ0KCTwhLS0gbWFueS1jaG9pY2UgcG9sbC0tPg0KDQoJPGRpdiBjbGFzcz0ic2hhcmVtYmVkIiBzdHlsZT0iZGlzcGxheTpub25lOyI+DQogIDxkaXYgY2xhc3M9InNoYXJlbWJlZGNvbnQiPg0KICAgIDxhIGhyZWY9ImphdmFzY3JpcHQ6OyIgY2xhc3M9ImpzLWxpbmstY2FuY2VsIj5DYW5jZWw8L2E+DQogICAgICA8aDMgY2xhc3M9InNoYXJlaDMiPjwvaDM+DQogICAgPHVsIGNsYXNzPSJzaGFyZWxpbmtzIj4NCiAgICAgIDxsaSBjbGFzcz0ic2hhcmVsaSI+DQogICAgICAgIDxhIGhyZWY9IiMiIA0KICAgICAgICANCiAgICAgICAgdGFyZ2V0PSJfYmxhbmsiIGNsYXNzPSJzaGFyZWEgdHdzaGFyZSIgZGF0YS1zaGFyZS10eXBlPSJ0d2l0dGVyIj4NCiAgICAgICAgICA8c3Bhbj48L3NwYW4+VHdlZXQNCiAgICAgICAgPC9hPg0KICAgICAgPC9saT4NCiAgICAgIDxsaSBjbGFzcz0ic2hhcmVsaSI+DQogICAgICAgIDxhIGhyZWY9IiMiIA0KICAgICAgICAgIA0KICAgICAgICAgIHRhcmdldD0iX2JsYW5rIiBjbGFzcz0ic2hhcmVhIGZic2hhcmUiIGRhdGEtc2hhcmUtdHlwZT0iZmFjZWJvb2siPg0KICAgICAgICAgIDxzcGFuPjwvc3Bhbj5TaGFyZQ0KICAgICAgICA8L2E+DQogICAgICA8L2xpPg0KICAgIDwvdWw+DQogIDwvZGl2Pg0KPC9kaXY+DQoNCg0KCTwvZGl2Pg0KICA8L2Rpdj4JDQo8L2Rpdj4=');
var mainWrap = document.createElement('div');
var mainWrapId = 'wdd-poll-' + nativeId; 
if(blockId){
  mainWrapId = blockId;
}
mainWrap.id = mainWrapId;
mainWrap.insertAdjacentHTML('afterbegin', widgetWrapContent);

var mainWrapSelector = '#' + mainWrapId + ' ';



initScript.insertAdjacentElement('afterend', mainWrap);

var url = "https://www.webdesignerdepot.com/wp-content/plugins/wp-fs-polls/widget/get-poll-data.php?original_id=" + pollId;
if(nativeId){
  url = "https://www.webdesignerdepot.com/wp-content/plugins/wp-fs-polls/widget/get-poll-data.php?poll_id=" + nativeId;
};

doAjaxRequest(url, buildPoll);

const MULTI_CHOICE_TYPE = 3;
const TWO_CHOICE_TYPE = 2;

var fsPollQuestion;
var fsPollChoices;


function buildPoll(data){
  var data = JSON.parse(data);
  
  
  var questionElement = document.querySelector(mainWrapSelector + '.empoll_question');
  if (!questionElement) {
    return;
  }
  fsPollQuestion = questionElement.innerHTML = data.caption;
  fsPollChoices = data.choices;
  
  if( data.choice_type == MULTI_CHOICE_TYPE ){ //
     //document.querySelector(mainWrapSelector +'.pollvotes').setAttribute('style', '');
     var pollimgbox  =  document.querySelector(mainWrapSelector +'.empoll_box_content');// document.querySelector('.empollheader');
     var extraClass = " polloption-verbose-wording polloption-very-verbose-wording ";
     if(data.choices.length > 3 && sba){
       extraClass = "";
     }
     
     

     pollimgbox.insertAdjacentHTML('beforeend', '<ul class="multiul polloption-'+ data.num_choices + extraClass +' "></ul>' );
     
     var multiul = document.querySelector(mainWrapSelector +'.multiul');
      
     
     for(var key in data.choices ){
        var choice = data.choices[key];
        var index = parseInt(key) + 1;

        multiul.insertAdjacentHTML('beforeend', 
         '<li class="multili group">'+
      '<div data-poll-choice-sort-index="'+ index +'" class="multilia multilia'+ index +'">'+
        '<div class="multiimgwrap multiimgwrap'+ index +'">' +
        '<div class="multiimg multiimg'+ index +'" style="background-image: url(\''+ choice.image.url +'\');">' +
       '<p class="multicheck multicheck'+ index +'">'+ ( choice.vote_count > 0 ?  choice.vote_count : 0 ) +'</p>'+
        '</div>'+
        '</div>'+
        
        '<p class="multitext">'+ choice.name +'</p>'+
        '<div class="pollimgresultmulti"></div>'+
		    '</div>'+
	      '</li>' );
        
     }
     
     var multilias = document.querySelectorAll(mainWrapSelector +'.multilia') ;
     for(var key in  multilias){
       var multilia = multilias[key];
       if(!multilia.tagName){
        continue;
       }
       
       multilia.addEventListener("click", pollVoteClick);
     }
      
  }
  else if( data.choice_type == TWO_CHOICE_TYPE ){ //
     document.querySelector(mainWrapSelector +'.pollvotes').setAttribute('style', '');
     document.querySelector(mainWrapSelector +'.pollimgbox').setAttribute('style', '');
     
     for(var key in data.choices ){
        var choice = data.choices[key];
        var polloptionElement = document.querySelector(mainWrapSelector +'.polloption' + (parseInt(key) + 1 )  );
        polloptionElement.innerHTML = choice.name;
    
        var votecountElement = document.querySelector(mainWrapSelector +'.votecount' + (parseInt(key) + 1 )  );
        votecountElement.innerHTML = choice.vote_count;
      }
  
      var pollimgbox  = document.querySelector(mainWrapSelector +'.pollimgbox');
      
      if(nativeHeight && nativeHeight > 0 ){
        pollimgbox.style.height = nativeHeight + "px"; 
      }
  
      pollimgbox.insertAdjacentHTML('beforeend', '<img src="'+ data.image.largeUrl +'" alt="" />' );
  
      var pollvote1 = document.querySelector(mainWrapSelector +'.pollimgvote1');
      //pollvote1.setAttribute("data-poll-original-id", data.original_id );
      pollvote1.setAttribute("data-poll-choice-sort-index", 1 );
  
      var pollvote2 = document.querySelector(mainWrapSelector +'.pollimgvote2');
      //pollvote2.setAttribute("data-poll-original-id", data.original_id );
      pollvote2.setAttribute("data-poll-choice-sort-index", 2 );
  
      pollvote1.addEventListener("click", pollVoteClick);
      pollvote2.addEventListener("click", pollVoteClick);
      
  }
  
  /*
  var polloption1Element = document.querySelector(mainWrapSelector +'.polloption1');
  polloption1Element.innerHTML = data.first_choice_name;
  
  var polloption2Element = document.querySelector(mainWrapSelector +'.polloption2');
  polloption2Element.innerHTML = data.second_choice_name;
  
  var votecount1Element = document.querySelector(mainWrapSelector +'.votecount1');
  votecount1Element.innerHTML = data.choices[0].vote_count;// first_choice_vote_count;
  
  var votecount2Element = document.querySelector(mainWrapSelector +'.votecount2');
  votecount2Element.innerHTML = data.choices[1].vote_count;//data.second_choice_vote_count;
  */
  
  
  
  var selectedSortIndex = fs_get_cookie('fs_wp_poll_' + pollUid);
  if(selectedSortIndex){
    votedSortIndex = selectedSortIndex;
    selectVoteBySortIndex( parseInt(selectedSortIndex));
  }

  var cancelLnk = document.querySelector(mainWrapSelector +'.js-link-cancel') ; 
  cancelLnk.addEventListener("click", function(e){
    e.preventDefault();
    document.querySelector(mainWrapSelector +'.sharembed').style.display = 'none';
    return false;
  });

  document.querySelector(mainWrapSelector +'.sharembed .twshare').addEventListener("click", function(e){
    e.preventDefault();
    fsOpenTwUrl(this);
    return false;
  });

  document.querySelector(mainWrapSelector +'.sharembed .fbshare').addEventListener("click", function(e){
    e.preventDefault();
    fsOpenFbUrl(this);
    return false;
  });
  
}

function selectVoteBySortIndex(sortIndex){
 
    // two options
    var pollImgResults = document.querySelectorAll(mainWrapSelector +'.pollimgresult') ;
    for(var key in  pollImgResults){
      var pollImgResult = pollImgResults[key];
      if(!pollImgResult.tagName){
        continue;
      }
      removeClass(pollImgResult, 'pollimgresultvoted');
      pollImgResult.setAttribute("style", "" );
    }
    
    var selectedPollImgResult = document.querySelector(mainWrapSelector +'.pollimgresult' + sortIndex);
    if(selectedPollImgResult){
      addClass(selectedPollImgResult, 'pollimgresultvoted');
    }

    var polloptions = document.querySelectorAll(mainWrapSelector +'.polloption') ;
    for(var key in  polloptions){
      var tmpPolloption = polloptions[key];
      if(!tmpPolloption.tagName){
        continue;
      }
      removeClass(tmpPolloption, 'highlight');
      
    }
    
    var selectedPolloption = document.querySelector(mainWrapSelector +'.polloption' + sortIndex);
    if(selectedPolloption){
      addClass(selectedPolloption, 'highlight');
    }
    
    // multiple options
    var mlitlias = document.querySelectorAll(mainWrapSelector +'.multilia') ;
    for(var key in  mlitlias){
      var mlitlia = mlitlias[key];
      if(!mlitlia.tagName){
        continue;
      }
      removeClass(mlitlia, 'highlight');
      
    }
    
    var multilia = document.querySelector(mainWrapSelector +'.multilia' + sortIndex);
    if(multilia){
      addClass(multilia, 'highlight');
      addClass(multilia.parentElement.parentElement, 'voted');
    }
    
     
}

function pollVoteClick(){
    var choiceSortIndex = parseInt( this.getAttribute('data-poll-choice-sort-index') );
    selectVoteBySortIndex(choiceSortIndex);
    
    
    fs_set_cookie('fs_wp_poll_' + pollUid, choiceSortIndex, 355, "/");


     
    //console.log( pollId + ' ' + choiceSortIndex );
    var pollId = initScript.getAttribute('data-poll-id');
    var url = "https://www.webdesignerdepot.com/wp-content/plugins/wp-fs-polls/widget/do-poll.php?original_id=" + pollId +"&choice_sort_index=" + choiceSortIndex ;
    if(nativeId){
      url = "https://www.webdesignerdepot.com/wp-content/plugins/wp-fs-polls/widget/do-poll.php?poll_id=" + nativeId +"&choice_sort_index=" + choiceSortIndex ;
    }

    if(votedSortIndex){
      url += "&voted_sort_index=" + votedSortIndex;
    }
    
    doAjaxRequest( url, 
      function(data){
        var data = JSON.parse(data);
        for(var key in  data){
           var choice = data[key];
           var votecount = document.querySelector(mainWrapSelector +'.votecount' + (parseInt(key) + 1) );
           if(votecount){
             votecount.innerHTML = choice.vote_count > 0 ? choice.vote_count : 0 ;
           }
           
           var multicheck = document.querySelector(mainWrapSelector +'.multicheck' + (parseInt(key) + 1) );
           if(multicheck){
             multicheck.innerHTML = choice.vote_count > 0 ? choice.vote_count : 0 ;
           }
           
            
        }

        document.querySelector(mainWrapSelector +'.sharembed').style.display = "block";

        var sayResponse = fsPollQuestion + " I say " + fsPollChoices[choiceSortIndex - 1].name;
        document.querySelector(mainWrapSelector +'.sharembed .shareh3').innerHTML = sayResponse;

        var twUrl = "http://twitter.com/intent/tweet?text="+ encodeURIComponent(sayResponse) +"&amp;url=" + encodeURIComponent(window.location.href);
        document.querySelector(mainWrapSelector +'.sharembed .twshare').setAttribute('href', twUrl);

        var fbUrl = "http://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(window.location.href);
        document.querySelector(mainWrapSelector +'.sharembed .fbshare').setAttribute('href', fbUrl);
        
        
      } 
    );
    
    votedSortIndex = choiceSortIndex;

    return false;
  
}

function hasClass(ele,cls) {
    if(!ele.className){
      return false;
    }
    
    return ele.className.match(new RegExp('(\\s|^)'+cls+'(\\s|$)'));
}

function removeClass(ele,cls) {
        if (hasClass(ele,cls)) {
            var reg = new RegExp('(\\s|^)'+cls+'(\\s|$)');
            ele.className=ele.className.replace(reg,' ');
        }
}

function addClass(el, className) {
  if (el.classList)
    el.classList.add(className)
  else if (!hasClass(el, className)) el.className += " " + className
}


function fs_get_cookie( check_name ) {
	// first we'll split this cookie up into name/value pairs
	// note: document.cookie only returns name=value, not the other components
	var a_all_cookies = document.cookie.split( ';' );
	var a_temp_cookie = '';
	var cookie_name = '';
	var cookie_value = '';
	var b_cookie_found = false; // set boolean t/f default f

	for ( i = 0; i < a_all_cookies.length; i++ )
	{
		// now we'll split apart each name=value pair
		a_temp_cookie = a_all_cookies[i].split( '=' );


		// and trim left/right whitespace while we're at it
		cookie_name = a_temp_cookie[0].replace(/^\s+|\s+$/g, '');

		// if the extracted name matches passed check_name
		if ( cookie_name == check_name )
		{
			b_cookie_found = true;
			// we need to handle case where cookie has no value but exists (no = sign, that is):
			if ( a_temp_cookie.length > 1 )
			{
				cookie_value = unescape( a_temp_cookie[1].replace(/^\s+|\s+$/g, '') );
			}
			// note that in cases where cookie is initialized but no value, null is returned
			return cookie_value;
			break;
		}
		a_temp_cookie = null;
		cookie_name = '';
	}
	if ( !b_cookie_found )
	{
		return null;
	}
}


function fs_set_cookie( name, value, expires, path, domain, secure ){
// set time, it's in milliseconds
var today = new Date();
today.setTime( today.getTime() );

/*
if the expires variable is set, make the correct
expires time, the current script below will set
it for x number of days, to make it for hours,
delete * 24, for minutes, delete * 60 * 24
*/
if ( expires )
{
expires = expires * 1000 * 60 * 60 * 24;
}
var expires_date = new Date( today.getTime() + (expires) );

document.cookie = name + "=" +escape( value ) +
( ( expires ) ? ";expires=" + expires_date.toGMTString() : "" ) +
( ( path ) ? ";path=" + path : "" ) +
( ( domain ) ? ";domain=" + domain : "" ) +
( ( secure ) ? ";secure" : "" );

}

function doAjaxRequest(url, callback){
  // ajax request
 var xmlhttp;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
           if(xmlhttp.status == 200){
               //document.getElementById("myDiv").innerHTML = xmlhttp.responseText;
               if (typeof callback !== 'undefined') {
                 callback(xmlhttp.responseText);
               }
           }
           else if(xmlhttp.status == 400) {
              //alert('There was an error 400')
           }
           else {
               //alert('something else other than 200 was returned')
           }
        }
    };

    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}
   
// util functions  
function base64_decode (data) { 
    // http://kevin.vanzonneveld.net
    // +   original by: Tyler Akins (http://rumkin.com)
    // +   improved by: Thunder.m
    // +      input by: Aman Gupta
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: Onno Marsman
    // +   bugfixed by: Pellentesque Malesuada
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +      input by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // -    depends on: utf8_decode
    // *     example 1: base64_decode('S2V2aW4gdmFuIFpvbm5ldmVsZA==');
    // *     returns 1: 'Kevin van Zonneveld'
    // mozilla has this native
    // - but breaks in 2.0.0.12!
    //if (typeof this.window['btoa'] == 'function') {
    //    return btoa(data);
    //}
    var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
    var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
        ac = 0,
        dec = "",
        tmp_arr = [];

    if (!data) {
        return data;
    }

    data += '';

    do { // unpack four hexets into three octets using index points in b64
        h1 = b64.indexOf(data.charAt(i++));
        h2 = b64.indexOf(data.charAt(i++));
        h3 = b64.indexOf(data.charAt(i++));
        h4 = b64.indexOf(data.charAt(i++));

        bits = h1 << 18 | h2 << 12 | h3 << 6 | h4;

        o1 = bits >> 16 & 0xff;
        o2 = bits >> 8 & 0xff;
        o3 = bits & 0xff;

        if (h3 == 64) {
            tmp_arr[ac++] = String.fromCharCode(o1);
        } else if (h4 == 64) {
            tmp_arr[ac++] = String.fromCharCode(o1, o2);
        } else {
            tmp_arr[ac++] = String.fromCharCode(o1, o2, o3);
        }
    } while (i < data.length);

    dec = tmp_arr.join('');
    dec = utf8_decode(dec);

    return dec;
}

function utf8_decode (str_data) {
    // http://kevin.vanzonneveld.net
    // +   original by: Webtoolkit.info (http://www.webtoolkit.info/)
    // +      input by: Aman Gupta
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: Norman "zEh" Fuchs
    // +   bugfixed by: hitwork
    // +   bugfixed by: Onno Marsman
    // +      input by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // *     example 1: utf8_decode('Kevin van Zonneveld');
    // *     returns 1: 'Kevin van Zonneveld'
    var tmp_arr = [],
        i = 0,
        ac = 0,
        c1 = 0,
        c2 = 0,
        c3 = 0;

    str_data += '';

    while (i < str_data.length) {
        c1 = str_data.charCodeAt(i);
        if (c1 < 128) {
            tmp_arr[ac++] = String.fromCharCode(c1);
            i++;
        } else if (c1 > 191 && c1 < 224) {
            c2 = str_data.charCodeAt(i + 1);
            tmp_arr[ac++] = String.fromCharCode(((c1 & 31) << 6) | (c2 & 63));
            i += 2;
        } else {
            c2 = str_data.charCodeAt(i + 1);
            c3 = str_data.charCodeAt(i + 2);
            tmp_arr[ac++] = String.fromCharCode(((c1 & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
            i += 3;
        }
    }

    return tmp_arr.join('');
}

function fsGetMetaContentByName(name,content){
   var content = (content==null)?'content':content;
   var element  = document.querySelector("meta[name='"+name+"']");
   if(!element){
     return null;
   }

   return element.getAttribute(content);
}

function fsOpenTwUrl(target){
    var url = target.getAttribute('href');
    var leftPosition, topPosition;
    var width = 626;
    var height = 436;
    leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
    topPosition = (window.screen.height / 2) - ((height / 2) + 50);
    var windowFeatures = "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";
    window.open(url,'Twitter',windowFeatures);
    return false;
  };

function fsOpenFbUrl(target){
    var url = target.getAttribute('href');
    var leftPosition, topPosition;
    //Allow for borders.
    var width = 626;
    var height = 436;
    leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
    //Allow for title and status bars.
    topPosition = (window.screen.height / 2) - ((height / 2) + 50);
    var windowFeatures = "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";
    
    window.open(url ,'Facebook',windowFeatures);
    return false;
  };
  
})(window,document);
