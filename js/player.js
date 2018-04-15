//cac gia tri trong tracks la ten cac file trong Audio
var tracks = ["DeMaiCoNhau-MaiTron.mp3", "Diep Khuc Mua Xuan - Vy Oanh.mp3",
			  "Nhung Dieu Nho Nhoi - Vy Oanh.mp3", "Thinking Of You - ATC.mp3"];

var trackTitle = document.getElementById('trackTitle');
var trackSlider = document.getElementById('trackSlider');
var currentTime = document.getElementById('currentTime');
var duration = document.getElementById('duration');
var volumeSlider = document.getElementById('volumeSlider');
var nextTrackTitle = document.getElementById('nextTrackTitle');

var preBtn = document.getElementById('preBtn');
var playButton = document.getElementById('playBtn');
var nextBtn = document.getElementById('nextBtn');

var track = new Audio();
var currentTrack = 0;			//gia tri cua currentTrack tuong ung voi thu tu trong mang, bat dau tu 0
loadTrack();
setInterval(updateTrackSlider(track), 1000);

function loadTrack(){
	track.src = "Audio/" + tracks[currentTrack];
	trackTitle.textContent = (currentTrack + 1) + " - " + tracks[currentTrack];						//dien noi dung cho trackTitle voi cu phap " [soTT] - [ten track]

	nextTrackTitle.innerHTML = "<b>Next Track: </b>" + tracks[currentTrack + 1 % tracks.length];	//lay ten cua track tiep theo cho nextTrackTitle
	track.volume = volumeSlider.value;																//gia tri cua volume lay tu 0.0 (silent) den 1.0 (max)
	track.playbackRate = 1;					//thiet lap toc do chay cua audio - 1.0 la toc do binh thuong
	showDuration(track);
	
	//vo hieu hoa nut previous neu la track dau tien;
	//vo hieu hoa nut next neu la track cuoi cung
	if (currentTrack == 0)
		preBtn.disabled = true;
	else if (currentTrack == tracks.length - 1)
		nextBtn.disabled = true;
}

function updateTrackSlider(audio){
	var time = Math.round(audio.currentTime);
	trackSlider.value = time;
	currentTime.textContent = convertTime(time);
	if (audio.ended)
		next();
}

//thiet lap gia tri max cho trackSlider va thay doi noi dung cua duration
function showDuration (audio) {
	var length = Math.floor(audio.duration);
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

function playOrPause() {
	if(track.paused){
		track.play();
	}
	else
	{
		track.pause();
	}
}

function next() {
	currentTrack ++;
	loadTrack();
}

function previous () {
	currentTrack --;
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
