
<p><b>Listening DEMO<b></p>
<div id="playerCont" class="first-part">	
	<div class="track-title-fluid"><label id="trackTitle">Track Title </label></div>		
	<input id="trackSlider" type="range" min="0" step="1" onchange="seekTrack()">
	<div>
		<div class="display current-time"><label id="currentTime">00:00</label></div>
		<div class="display duration"><label id="duration">00:00</label></div>
		<br />
	</div>   <!-- Ket thuc div chua phan tren thanh player -->
					
	<div class="controllers">
		<div class="first-part">
			<button type="button" id="playBtn" onClick="playOrPause()"/>
		</div>
						
		<div class="second-part">
			<img id="volume1" src="Image/volume-down.png" />
			<img id="volume2" src="Image/volume-up.png" />
			<input id="volumeSlider" class="volume-slider" type="range" min="0" max="1" step="0.01" onchange="adjustVolume()"  />
		</div>
	</div>
</div>	