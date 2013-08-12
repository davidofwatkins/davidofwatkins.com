<?php
	//Constants
	$TITLE = "Welcome to David Watkins!";
?>
<?php include("includes/header.php"); ?>
    
    <style>

        #content {
            font-size: 14px;
        }
        #content p {
            line-height: 1.5em;
        }
        #welcome-text p {
            font-family: "Trebuchet MS", "lucida grande",tahoma,verdana,arial,sans-serif;
            font-size: 16px;
            line-height: 1.5em;
            margin: 18px auto;
        }
        .readmore {
            display: none;
        }
        #readmore-link {
            margin-top: 20px !important;
            font-size: 16px;
        }
    </style>

    <script>
        $(document).ready(function() {
            $("#readmore-link a").click(function() {
                if ($(".readmore").css("display") == "none")
                    showReadMore();
                else
                    hideReadMore();
                return false; 
            });
        });

        function showReadMore() {
            //Slide and fade simultaneously
            $(".readmore").animate({
                "height" : "toggle",
                "opacity" : "toggle"
            });
            $("#readmore-link a").html("Show less...");
        }
        function hideReadMore() {
            $("html, body").animate({ scrollTop: 0 }, "fast");
            $(".readmore").animate({
                "height" : "toggle",
                "opacity" : "toggle"
            });
            $("#readmore-link a").html("Learn more about David");
        }
    </script>

	<div id="supercontent"><div id="content">
          	
            <h1>Welcome</h1>
            <div id="welcome-text">          

                <p>Greetings, and welcome!</p>

                <p>I'm David Watkins: developer, music lover, video editor, and tech enthusiast. I received my Bachelor of Science degree in Computer Information Technology with a minor in Web Development at <a href="http://www.champlain.edu/" target="_blank">Champlain College</a> in Burlington, VT in 2013. Currently residing in the Southern California area, I have created tools such as <a href="https://chrome.google.com/webstore/detail/rescroller/ddehdnnhjimbggeeenghijehnpakijod" target="_blank">Rescroller for Chrome</a> and worked on projects such as <a href="http://accessburlington.com" target="_blank">Access Burlington</a>. With innovation, I believe technology has the potential to improve our lives in exciting and creative ways. This is my personal website, so please feel free to read more about me, <a href="/portfolio">explore my portfolio</a>, or <a href="/contact">contact me</a>.</p>

                <p>Thank you, and I hope you'll enjoy your stay.</p>
                <p>&mdash;David Owen Frederic Watkins</p>

            </div>
            
            <p id="readmore-link"><a href="#">Learn more about David</a></p>
            <div class="readmore">
                
                <h2>About Me</h2>

                <p>I was born and raised in Southern California, where I attended middle school at <a href="http://www.vandammeacademy.com/" target="_blank">VanDamme Academy</a> and high school at <a href="http://sagehillschool.org" target="_blank">Sage Hill School</a>. After graduating in 2009 and applying to colleges <a href="http://maps.google.com/maps/ms?ie=UTF8&hl=en&msa=0&msid=202400406829683397268.00044781c74c5f1e27392&ll=40.913513,-97.558594&spn=53.919349,82.96875&z=4" target="_blank">around the country</a>, I decided to enroll at <a href="http://www.champlain.edu/" target="_blank">Champlain College</a> in Burlington, VT. Attracted to its small community, tech-related curriculum, liberal arts core, and college town setting, I am proud to say I chose the right school for me. At Champlain, I expanded my understanding of information technology and web programming, created an <a href="/portfolio#ccshuttletracker">Android app to track the school's shuttle system</a> and a <a href="">housing registration webapp</a> as a proposal to residential life, called Montr&eacute;al my home for one outstanding, <a href="http://www.youtube.com/watch?v=3AK4Tuv5coU" target="_blank">dance-worthy</a> semester, and&mdash;perhaps most importantly&mdash;<a href="http://www.youtube.com/watch?v=KZp7tDk7Sag" target="_blank">made some amazing lifetime friends</a>. In May, 2013 (on <a href="http://en.wikipedia.org/wiki/Star_Wars_Day" target="_blank">Star Wars Day</a>), <a href="http://www.youtube.com/watch?v=AV2p_xC9MXM" target="_blank">I graduated</a> <i>magna cum laude</i> with my peers. Since then, I have been enjoying some time off while pursuing miscellaneous personal projects and freelancing for such sites as <a href="http://accessburlington" target="_blank">Access Burlington</a>.</p>

                <p>Technology and electronics have captured my curiosity and interest for most of my life. My passion has expanded from how computers function to how they can improve our daily lives and beyond. Social networking has given us the ability to stay in touch with friends across the world, for example, and Google has given us the ability to research nearly anything from inside our homes or on the go (or even from <a href="http://www.youtube.com/watch?v=6BTCoT8ajbI" target="_blank"> our glasses</a>).  With a plethora of devices and platforms in every household (from phones to tablets, Androids to iPhones&mdash;each interconnected through a global network), I'm truly excited to be part of an industry with such potential and innovation.</p>

                <p>I enjoy challenging <a href="http://psychology.about.com/od/cognitivepsychology/a/left-brain-right-brain.htm" target="_blank">both sides of my brain</a> for differing activities. In contrast to code and tech, music is one of the most vital aspects of my life. I enjoy most genres of music and have been a part of <a href="http://www.sccchorus.org/" target="_blank">choruses</a>, school musicals, and vocal-study singing workshops. In college, I learned to play guitar and regularly participated in Champlain College's weekly open mic: <a href="http://www.thegrindlive.com/" target="_blank">The Grind</a>. Outside of music, I've developed a passion for video editing and have used it to document and share many of my experiences.</p>

                <p>Regardless of what my future holds for me, I hope to continue exploring these interests and passions of mine. Never do I ever want to stop learning. We live in an exciting era, where the growth of technology has the potential to improve and change our lives in unpredictable and unimaginable ways.</p>
                
                <!--<h2>Trivia</h2>
                <ol>
                	<li>I think Google is awesome!</li>
                    <li>I'm a <a href="http://en.wikipedia.org/wiki/Type_1_diabetes" type="_blank">type 1 diabetic</a>.</li>
                    <li>I like science fiction, from <a href="http://stargate.mgm.com/" target="_blank">Stargate</a> to <a href="http://www.bbc.co.uk/doctorwho/dw" target="_blank">Doctor Who</a> and beyond.</li>
                    <li>I'm fascinated by technology&mdash;whether it's the latest gadget, software, or hardware&mdash;and its inevitable effect on us socially, politically, or otherwise.</li>
                    <li>According to the Myers-Briggs Type Indicator, I'm an "<a href="http://typelogic.com/infj.html" target="_blank">INFJ</a>" (Introversion, iNtuition, Feeling, Judging).</li>
                    <li>I love stormy, windy weather.</li>
                    <li>I respect Steve Jobs and what he's done for the computing industry, but otherwise, I'm not necessarily a big Apple fan.</li>
                    <li>I like country music. I'm not sure why or how, but for some reason, I do.</li>
                    <li>I've done a lot of traveling with my family <a href="http://maps.google.com/maps/ms?msid=202400406829683397268.00048127903daf028ce72&msa=0&ll=39.774678,-102.620045&spn=108.095121,337.5" target="_blank">throughout the US and parts of Europe</a>.
                    <li>During my highschool's 2009 One Acts Festival, I was locked in the backstage bathroom because the lock jammed and wouldn't retract back into the door. One of my peers ended up having to kick it in.</li>
                </ol>-->
                <h2>Quotes</h2>
                <?php echo listFavQuotes(); ?>
            </div>

   	</div></div>
<?php include("includes/footer.php"); ?>