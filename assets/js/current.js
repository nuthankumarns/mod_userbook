				//$(document).ready(function() {
			var hiddenDivs = [];

jQuery.fn.divroller = function(options) {
	console.log(options);
	settings = jQuery.extend( {
		visible : 5,
		pause : 3000
	}, options);

	start(settings, this);
	/*
	console.log(opt);
		console.log(this);*/
	
	function start(settings, container) {
		var divs = container.children();
		//hide unvisible divs
		while (settings.visible < divs.length) {
			var removedDiv = $(divs[divs.length - 1]).remove();
			hiddenDivs.push(removedDiv);
			divs = container.children();
		}
		
		setTimeout( function() {
			roll(settings, container)
		}, settings.pause);
		
	};

	function roll(settings, container) {
		//Dom manipulation.
		container.prepend(hiddenDivs.pop());
		hiddenDivs.unshift($(container.children()[settings.visible]).remove());
		
		//Efect
		$(container.children()[0]).hide();
		$(container.children()[0]).slideDown("slow");

		//Repeat
		setTimeout( function() {
			roll(settings, container)
		}, settings.pause);
	}
}

		function change()
		{
		//	var elm='';
	    $.get('index.php?option=com_api&format=json&task=UserBooks', function(data, textStatus) {
	    	//console.log(data);
	       /*
	        alert('Status is '+textStatus);
	               alert('JSON data string is: '+data);*/
	       
	
	        // this will give us an array of objects
	        var books = JSON.parse(data);
			function timeConverter(UNIX_timestamp){
			 var a = new Date(UNIX_timestamp*1000);
			 var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
			     var year = a.getFullYear();
			     var month = months[a.getMonth()];
			     var date = a.getDate();
			     var hour = a.getHours();
			     var min = a.getMinutes();
			     var sec = a.getSeconds();
			     var time = date+','+month+' '+year+' '+hour+':'+min+':'+sec ;
			     return time;
			 }
			        // iterate over public_tweets
	      //  var elm;
	      var elm = '<div id="divroller_container">';
	     // console.log(books.length);
	        for(var x=0; x < books.length; x++) {
	        	var twt = books[x];
	                 
	                 // console.log(twt);
	                 var y=x+1;
	                  elm += '<div class="box_light box_size" id="item'+y+'">';
	                  elm +=   '<div class="name">'+twt.name+'</div>';
	                    elm +=   '<div class="prod"">'+twt.product_name+'</div>'; 
	                     elm +=       '<div class="start_time">'+timeConverter(twt.read_start_time)+'</div>'; 
	                   //  elm +=       '<div class="prodt">'+twt.product_id+'</div>'; 
	                  
	                 elm += '</div>';
	              }
	      
	          elm +=   '</div>';
	        console.log(elm);
	         $('#roll_container').html(elm);
	         $("#divroller_container").divroller({pause:3000, visible:4});
	    }, 'text');
    }

	//setInterval(function() { change() }, 5000);
	//setInterval(function() { change }, 5000);
	//setInterval(change(), 5000);
	change();
	setInterval(change, 10000);
