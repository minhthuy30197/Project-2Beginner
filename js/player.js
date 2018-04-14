//cac gia tri trong tracks la ten cac file trong Audio
var tracks = ["DeMaiCoNhau-MaiTron.mp3", "Diep Khuc Mua Xuan - Vy Oanh.mp3",
			  "Nhung Dieu Nho Nhoi - Vy Oanh.mp3", "Thinking Of You - ATC.mp3"];

var trackTitle = document.getElementById('trackTitle');
var trackSlider = document.getElementById('trackSlider');
var currentTime = document.getElementById('currentTime');
var duration = document.getElementById('duration');
var volumeSlider = document.getElementById('volumeSlider');
var nextTrackTitle = document.getElementById('nextTrackTitle');

var track = new Audio();
var currentTrack = 0;			//gia tri cua currentTrack tuong ung voi thu tu trong mang, bat dau tu 0
window.onload = loadTrack;

function loadTrack(){
	track.src = "Audio/" + tracks[currentTrack];
	trackTitle.textContent = (currentTrack + 1) + " - " + tracks[currentTrack];						//dien noi dung cho trackTitle voi cu phap " [soTT] - [ten track]

	nextTrackTitle.innerHTML = "<b>Next Track: </b>" + tracks[currentTrack + 1 % tracks.length];	//lay ten cua track tiep theo cho nextTrackTitle
	track.volume = volumeSlider.value;		//gia tri cua volume lay tu 0.0 (silent) den 1.0 (max)
	setTimeout(showDuration, 1000);
}

function updateTrackSlider (){
	var time = Math.round(track.currentTime);
	trackSlider.value = time;
	currentTimek.textContent = convertTime(time);
	if (track.ended)
		next();
}

setInterval(updateTrackSlider, 1000);

function showDuration () {
	var length = Math.floor(track.duration);
	trackSlider.setAttribute("max", length);
	duration.textContent = convertTime(length);
}

function convertTime (seconds) {
	var minute = Math.floor(seconds/60);
	var second = seconds % 60;
	minute = (minute < 10) ? "0" + minute : minute;
	second = (second < 10) ? "0" + second : second;
	return (minute + ":" + second);
}

function playOrPause(img) {
	track.playbackRate = 1;
	if(track.paused){
		track.play();
		img.src = "Image/pause.png";
	}else{
		track.pause();
		img.src="Imgae/play.png";
	}
}

function next() {
	currentTrack = currentTrack + 1 % tracks.length;
	loadTrack();
}

function previous () {
	currentTrack--;
	currentTrack = (currentTrack < 0) ? tracks.length - 1 : currentTrack;
	loadTrack();
}

function seekTrack () {
	track.currentTime = trackSlider.value;
	currentTime.textContent = convertTime(track.currentTime);
}

function adjustVolume () {
	track.volume = volumeSlider.value;
}

function increasePlaybackRate () {
	tracks.playbackRate += 0.5;
}

function decreasePlaybackRate () {
	tracks.playbackRate -= 0.5;
}
