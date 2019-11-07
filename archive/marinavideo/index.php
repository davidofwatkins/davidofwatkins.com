<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Marina &amp; The Diamonds Video Project</title>
    <link href='http://fonts.googleapis.com/css?family=Leckerli+One' rel='stylesheet' type='text/css'>
    <link href='style.css' rel='stylesheet' type='text/css'>
</head>

<body>
	<img style="display: none;" src="robot.jpg" />
	<div id="wrapper">
    	<h1>The Marina Connection</h1>
        <div id="content">
        	<div class="section" id="intro">
            	<h2>A collaborative music video project, limited by nothing less than the depth of the internet.</h2>
        		<p>Greetings, all! A couple of students at Champlain College are working on a collaborative internet music video and would like your help! The idea of the video is this: each person involved will record themselves from a fixed location (for example, a webcam) and lip-sync to the Marina and the Diamonds song, "I Am Not a Robot." We will then collect each submission, combine them into a single video, and publish it online. We hope this project will be fun and entertaining as well as creative and clever. If you are interested in participating, please continue reading below. Please also feel free to spread the word&mdash;everyone's invited; the more people, the better!</p>
            </div>
            <div class="section" id="step1">
            	<h1>Step 1: <span class="subheader">Review the song.</span></h1>
                <p style="float: left; width: 375px; margin-top: 20px;">If you're not familiar with the song (or even if you are), reading over the lyrics and (re)listening to it a few times is a great way to get started. Your performance doesn't have to be perfect, but you want to appear confident about the song. Feel free to keep a lyric sheet behind the camera when recording, but make sure you're relatively comfortable with it beforehand. Check out the video to the right to listen now.</p>
               	<iframe width="400" height="257" src="http://www.youtube.com/embed/S_oMD6-6q5Y" frameborder="0" allowfullscreen></iframe>
                <a class="buttonlink" href="http://www.lyricsmode.com/lyrics/m/marina_and_the_diamonds/i_am_not_a_robot.html" target="_blank"><div class="button">View Lyrics</div></a>
                <br style="clear: both;" />
            </div>
            <div class="section" id="step2">
            	<h1>Step 2: <span class="subheader">Get creative.</span></h1>
                <p>This is the fun part. Plan out what you will do in your video, how you will act, what you'll have with you, etc. Be as silly and unique as you wish. Show off a special talent, or just dance around in your room. Go to your favorite park, play guitar, fold laundry&mdash;anything! Don't be afraid to make a fool of yourself (in fact, it's encouraged!). Tapdance on the sidewalk downtown, jump out of a trash can, hold up lyric signs&mdash;even sing in the shower if you really want to (though let's keep this PG). Just be yourself!</p>
            </div>
            <div class="section" id="step3">
            	<h1>Step 3: <span class="subheader">Lights, Camera, Action!</span></h1>
                <p>Once you're feeling comfortable enough to record yourself, go for it! The only catch is that <b>your camera must remain in a fixed position</b> (like a webcam). That's not to say your camera needs to be a webcam or even attached to a computer, but nobody should be holding it or letting it move. In order to maximize the fluidity between everyone's video, it's best if they are each still shots.</p>
            </div>
          	<div class="section" id="step4">
            	<h1>Step 4: <span class="subheader">To the cloud!</span></h1>
            	<p>When you're happy with your recording, you'll need to upload it to the internet so we can access and use it. There are several free sites that will allow you to upload your video (see below). If you don't want to make your entire video public to the world, many of these services will allow you to publish your video with a private link that you can send us. Feel free to choose from any of the sites below:</p>
              	<a href="http://upload.youtube.com/my_videos_upload" target="_blank"><img src="youtube.gif" width="99" height="64" alt="YouTube"></a> <a href="http://vimeo.com/upload" target="_blank"><img src="vimeo.png" width="104" height="64" alt="Vimeo" style="border-radius: 3px;"></a> <a href="http://www.dropbox.com/" target="_blank"><img src="dropbox.png" width="191" height="64" alt="Dropbox"></a> <a href="https://skydrive.live.com/" target="_blank"><img src="skydrive.png" width="125" height="64" alt="Windows Live Skydrive"></a> <a href="https://docs.google.com/" target="_blank"><img src="googledocs.jpg" width="129" height="64" alt="Google Docs"></a>
            </div>
            <div class="section" id="step5">
            	<h1>Step 5: <span class="subheader">Send it our way!</span></h1>
            	<p>At last, please send us a link to your submission! Please include your name and email so that we can let you know about the final video once it's completed. Also, if you have any questions or comments, feel free to email us at <a href="mailto:winterloafer@gmail.com" target="_blank">winterloafer@gmail.com</a>. Thank you for all your help and support, and have fun with this!</p>
            </div>
            <form class="section" method="post" action="emailer.php" id="submitvideo">
            	<p>Your name: <input type="text" name="sender_name" /> Your email: <input type="text" name="sender_email" /></p>
                <br />
                <p><b>Submission Link:</p></b>
                <p><input type="text" name="videolink" id="submissionlink" placeholder="http://example.com/user/video-name-here" /></p>
                <input type="submit" value="Submit" />
            </form>
        </div>
    </div>
</body>
</html>