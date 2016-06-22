<?php
wp_enqueue_style('testing-content2', td() . '/css/testing-content2.css');
?>
<section class="testing content-two">
    <div>
        <div class="line-faq">
            <div class="title"><?php _text('Webcam / Video Troubleshooter')?></div>
            <div class="desc">

                <div class="text"><?php _text("If you're having problems with video on a Skype call, and you've already tried the steps in the Connection Troubleshooter, 
                there are a few things you can check to make sure your webcam is working properly.")?></div>
                <div class="text"><?php _text("Skype for Windows Desktop")?></div>
                <div class="text"><?php _text("Before proceeding with the troubleshooting steps below, first ensure that you are in a room with proper lighting 
                (bad lighting can make your video too dark to be seen by the people you're calling.")?></div>
                <div class="text"><?php _text("Is your webcam working properly with Skype?")?></div>
                <div class="text"><?php _text("To make sure that your webcam is working correctly with Skype:")?></div>
                <div class="indent">
                    <div class="text"><?php _text("1. Sign into Skype.")?></div>
                    <div class="text"><?php _text("2. In the menu bar, click Tools &gt; Options...")?></div>
                    <div><img src="<?php img_e() ?>testing/1.png"></div>
                    <div class="text"><?php _text("3. Under General, select Video Settings. If you have a webcam connected, you should see live video of whatever your webcam is pointed at.
                     If you can see the video stream, your webcam is working correctly.")?></div>
                    <img src="<?php img_e() ?>testing/2.png">
                    <br>
                    <div class="text"><?php _text("If you can’t see the video stream, your webcam is not working correctly with Skype. Until you resolve this, 
                    you won’t be able to send any video if you make a video call.")?></div>
                </div>


                <div class="text"><?php _text("Is Skype using the correct webcam?")?></div>
                <div class="text"><?php _text("If you’re using multiple cameras (such as a laptop camera and a separate USB camera), you can easily switch between them:")?></div>
                <div class="indent">
                    <div class="text"><?php _text("1. Sign into Skype")?></div>
                    <div class="text"><?php _text("2. Select a contact, start a Skype call, then click the call quality icon The call quality icon in the call window.")?>
                        <img src="<?php img_e() ?>testing/3.png">
                    </div>
                    <img src="<?php img_e() ?>testing/4.png">
                    <div class="text"><?php _text("3. Click the Webcam tab, then select the webcam you want to use from the Choose the camera you want to use drop-down menu.")?></div>
                    <div class="text"><?php _text("If you can’t see the camera you want to use in the drop-down list, reinstall the latest device drivers from the manufacturer’s website.")?></div>
                    <img src="<?php img_e() ?>testing/5.png">
                </div>

                <div class="text"><?php _text("Is another application using your webcam?")?></div>
                <div class="text"><?php _text("Close all applications that may be using the webcam. These include video-editing software, virtual-camera software, 
                instant messengers, and browsers (such as Internet Explorer).")?></div>
                <div class="text"><?php _text("Also, if your camera isn't integrated into your computer, try to plug the camera to another USB slot or unplug other unused 
                devices that share the same USB slot as your camera. If you are trying to change your camera during the call and experience an error message, 
                try to end the call, change the camera and restart the call.")?></div>
                <div class="text"><?php _text("Is there a problem with your webcam drivers?")?></div>
                <div class="text"><?php _text("Check that your webcam is listed in Device Manager.")?></div>
                <div class="text"><?php _text("Click windows button and type 'Device Manager'")?></div>
                <div class="indent">
                    <div class="text"><?php _text("Check that your webcam is listed under Imaging devices.")?></div>
                    <img src="<?php img_e() ?>testing/6.png"><br>
                    <div class="text"><?php _text("If it’s not listed, or if a question or exclamation mark is displayed, you need to reinstall the drivers for your webcam.")?></div>
                </div>

                <div class="text"><?php _text("Are your webcam drivers loading?")?></div>
                <div class="text"><?php _text("To let your webcam drivers load, you need to change the start-up settings of Skype:")?></div>
                <div class="indent">
                    <div class="text"><?php _text("1. Sign out of Skype by clicking Skype &gt; Sign Out in the menu bar.")?></div>
                    <div class="text"><?php _text("2. In the Welcome to Skype window, uncheck the Sign me in when Skype starts option.")?></div>
                    <img src="<?php img_e() ?>testing/7.png">
                    <div class="text"><?php _text("3. Restart your computer.")?></div>
                    <div class="text"><?php _text("Sign in to Skype and make a video call.")?></div>
                    <div class="text"><?php _text("Are you using an old version of DirectX?")?></div>
                    <div class="text"><?php _text("Make sure that you have the latest version of Microsoft DirectX. For Windows Vista and Windows 7, 
                        you can get the latest version of DirectX by updating Windows with the latest") ?>
                        <a href='http://windowsupdate.microsoft.com/' target='_blank'><?php _text("service packs and updates") ?></a>
                    </div>
                    <div class="text"><?php _text("For Windows XP, you can download it") ?>
                        <a href='http://www.microsoft.com/downloads/en/details.aspx?FamilyID=2da43d38-db71-4c1b-bc6a-9b6652cd92a3' target='_blank'><?php _text("HERE") ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="line-faq">
            <div class="title"><?php _text('How can I test my sound is working properly')?></div>
            <div class="desc">
                <div class="text"><?php _text("If you want to practice making a call and check that your speakers and microphone are working properly in Skype, 
                you can make a test call to our friendly assistant Echo. She will prompt you to record a message, 
                and then play it back for you – so you’ll know right away if your sound is working.")?></div>
                <div class="indent">
                    <div class="text"><?php _text("1. Plug in your speakers and microphone")?></div>
                    <div class="text"><?php _text("If you’re using your device’s built-in speakers and microphone, you don’t need to plug anything in – but if you’re using a separate mic, 
                    speakers or a headset, make sure they’re plugged in and switched on.")?></div>
                    <div class="text"><?php _text("2. Find the Skype sound test service")?></div>
                    <div class="text"><?php _text("Sign into Skype and look in your contact list for Echo/Sound Test Service. If you don’t see her in your contact list, 
                    type echo123 into the search field and click Search Skype. She will show up as Echo/Sound Test Service.")?></div>
                    <img src="<?php img_e() ?>testing/8.png">
                    <div class="text"><?php _text("3. Call")?></div>
                    <div class="text"><?php _text("In the calling pane, click Call.")?></div>
                    <img src="<?php img_e() ?>testing/9.png">
                    <div class="text"><?php _text("4. Follow the instructions you hear")?></div>
                    <div class="text"><?php _text("Your new friend Echo will ask you to record a message, and then will play your message back to you.")?></div>
                </div>
            </div>
        </div>

    </div>
</section>