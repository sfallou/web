var supportedFormat = Array('aiff','ac3','avi','flv','h264','m4v','mp3','mpeg','ogg','wav');

$('document').ready(function(){
	// feature detection
	if (!!window.ProgressEvent && !!window.FormData) {
		// asynchronous file upload supported
	} else {
		$('#opacity').fadeIn( "fast", function() {});	
		alert('Your browser doesn\'t support asynchronous file upload, update it and then return on this page.');		
    }

	// supported format list
	$.each(supportedFormat, function(val, text) {
		var options = $('#outputFormat').prop('options');
		options[options.length] = new Option(text, text);
	});
	
	// file format validity test
	$('#inputFile').change(function(){
		var fileNameSplit = $('#inputFile').val().split('.');
		var fileExt = fileNameSplit[fileNameSplit.length - 1];
		
		if($('#inputFile').val() != '' && in_array(supportedFormat, fileExt)){
			 $( "#conversionOptions" ).slideDown( "slow", function() {
				$('#inputFormat').val(fileExt);
			});
		}else{
			  alert('Format de fichier non pris en charge dans cet exemple, veuillez choisir un fichier dont l\'extension est la suivante: ' + supportedFormat);
			  $( "#conversionOptions" ).hide( "slow", function() { });
		}
	});
	
	// output format selection
	$('#outputFormat').change(function(){
		if($('#outputFormat').val() != '' && in_array(supportedFormat,$('#outputFormat').val())){
			if($('#outputFormat').val() == $('#inputFormat').val()){
				alert('Le format de conversion choisi est identique au format d\'origine, conversion imposible pour le moment');
				$('input[type=button]').attr('disabled','disabled');	
			}else{
				$('input[type=button]').removeAttr('disabled');
			}
		}else{
			$('input[type=button]').attr('disabled','disabled');	
		}
	});
	
	// form submit
	$('input[type=button]').on('click',function(){
		// visual effects
		$('input[type=button]').attr('disabled','disabled');
		$('#opacity').fadeIn( "fast", function() {});		
		$('#encodeProgress').fadeIn( "fast", function() {});
		
		var xhr = new XMLHttpRequest();
		
		// upload progress (%)
		xhr.upload.addEventListener('progress',function(evt){
			var percent = Math.round((evt.loaded/evt.total) * 100);
			$('#progress-number').html(percent +'%');
			$('#progressbar').progressbar({ value: percent });
			$('#progressInfo').html('Envoi du fichier au serveur');
		}, false);
		
		// AJAX response
		xhr.onreadystatechange = function(evt){
			 if (xhr.readyState == 4 && xhr.status == 200){
				if(xhr.responseText == 'false'){
					alert('File upload problem, conversion failure');
					$('#opacity').fadeOut( "fast", function() {});		
					$('#encodeProgress').fadeOut( "fast", function() {});
					$('input[type=button]').removeAttr('disabled');
				}else{
					$('#progressInfo').html('Encodage en cours');
					$('#progressbar').progressbar( "option", "value", false );
					$('#progress-number').css('left','25%');
					$('#progress-number').html("En attente de retour du serveur");
					
					// using socket.io to convert file format
					var socket = io.connect('http://www.codeyourweb.org:5134');
					var inFileName = xhr.responseText;
					var outFileName = xhr.responseText.substr(0,xhr.responseText.length - $('#inputFormat').val().length) + $('#outputFormat').val();
					socket.emit('convertFile', { file: inFileName, output: outFileName });
					
					socket.on('conversionSuccess', function (data) {
						socket.disconnect();
						$('#encodeResult').val(data['log']);
						$('#encodedLink').attr('href', 'uploads/' + data['output']);
						$('#opacity').fadeOut( "fast", function() {});		
						$('#encodeProgress').fadeOut( "fast", function() {});
						$('#linkBox').fadeIn("fast", function() {
							window.open('uploads/' + data['output'], '_blank');
						});
					});
					
					socket.on('conversionFailure', function (data) {
						console.log(data['msg']);
						$('#opacity').fadeOut( "fast", function() {});		
						$('#encodeProgress').fadeOut( "fast", function() {});
						$('#errorResult').val(data['log']);
						socket.disconnect();
					});
				}
			}
		};
		
		// send xhr upload
		xhr.open('POST', 'upload.php', true);
		var files = document.getElementById('inputFile').files;
		var data = new FormData();
		data.append('inputFile', files[0])
		xhr.send(data);
		
	});
});

function in_array(array, value){
	for(i = 0; i < array.length; i++){
		if(array[i] == value){
			return true;
		}
	}
	return false;
}