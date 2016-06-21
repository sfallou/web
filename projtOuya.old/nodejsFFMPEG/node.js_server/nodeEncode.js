var io = require('socket.io').listen(5134);
var sys = require('sys');
var fs = require('fs');
var exec = require('child_process').exec;

var converterPath = "/usr/bin/ffmpeg";
var inputPath = "/var/www/html/projtOuya/nodejsFFMPEG/http_server/uploads";
var supportedFormat = Array('aiff','ac3','avi','flv','h264','m4v','mp3','mpeg','ogg','wav');


io.sockets.on('connection', function (socket) {
	socket.on('convertFile', function (data) {
	
		// file test
		if(data['file'] != "" && data['output'] && ext_valid(data['file'],supportedFormat) && ext_valid(data['output'],supportedFormat) && file_exists(inputPath + data['file']) && !file_exists(inputPath + data['output'])){
			// file conversion
			var child = exec(converterPath + ' -i "' + inputPath + data['file'] + '" "' + inputPath + data['output'] + '"', function (error, stdout, stderr) {
			sys.print('stdout: ' + stdout + '\n\n');
			sys.print('stderr: ' + stderr + '\n\n');
				if (error !== null) {
					socket.emit('conversionFailure', { msg: "conversion failure", log: error });
				}else{
					socket.emit('conversionSuccess', { msg: "conversion ok", output: data['output'], log: 'stdout: ' + stdout + '\n\n' + 'stderr: ' + stderr });
				}
			});
		}else{
			console.log('file conversion rejetee par server');
		}		
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

function ext_valid(filename, extensionsList){
	var fileNameSplit = filename.split('.');
	var fileExt = fileNameSplit[fileNameSplit.length - 1];
	if(in_array(extensionsList, fileExt)){
		return true;
	}else{
		return false;
	}
}

function file_exists(file){
	var fileOk; 

	try{
		fileOk = fs.lstatSync(file).isFile();
	}catch(e){
		fileOk = false;
	}
	
	return fileOk;
}
