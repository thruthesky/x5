<?php
wp_enqueue_style('testing-content2', td() . '/css/testing-content2.css');
?>
<section class="testing content-two">
    <div>
        <div class="container">
            <div class="line-faq">
                <div class="title">
                    <?php _text('Webcam / Video Troubleshooter')?>
                    <div class="desc">
                        <div class="contents">
                            <div class="answer">
                                <div><?php _text("If you're having problems with video on a Skype call, and you've already tried the steps in the Connection Troubleshooter, there are a few things you can check to make sure your webcam is working properly.")?></div>
                                <strong><?php _text('Skype for Windows Desktop')?></strong>
                                <div><?php _text("Before proceeding with the troubleshooting steps below, first ensure that you are in a room with proper lighting (bad lighting can make your video too dark to be seen by the people you're calling.")?></div>

                                <strong>Is your webcam working properly with Skype?</strong>

                                <div><?php _text("To make sure that your webcam is working correctly with Skype:")?></div>

                                <div class="indent">
                                    <?php _text("
                                    1. Sign into Skype.
                                    2. In the menu bar, click <strong>Tools</strong> &gt; <strong>Options</strong>...
                                    ")?>
                                    <img src="<?php img_e() ?>testing/1.png">
                                    <br>
                                    <div>
                                    <?php _text("
                                    3. Under <strong>General</strong>, select <strong>Video Settings</strong>. If you have a webcam connected, you should see live video of whatever your webcam is pointed at. If you can see the video stream, your webcam is working correctly.<br>
                                    ")?>
                                    </div>
                                    <img src="<?php img_e() ?>testing/2.png">
                                    <br>
                                    <div><?php _text("If you can’t see the video stream, your webcam is not working correctly with Skype. Until you resolve this, you won’t be able to send any video if you make a video call.")?></div>
                                </div>
                            </div>

                                <strong><?php _text("Is Skype using the correct webcam?")?></strong>
                            <div><?php _text("If you’re using multiple cameras (such as a laptop camera and a separate USB camera), you can easily switch between them:")?></div>

                            <div class="indent"><?php _text("1. Sign into Skype")?>

                                <div><?php _text("2. Select a contact, start a Skype call, then click the call quality icon The call quality icon")?> <img src="<?php img_e() ?>testing/3.png">
                                    <?php _text("in the call window.")?></div>

                                <div><img src="<?php img_e() ?>testing/4.png"></div>

                                <div><?php _text("3. Click the <strong>Webcam</strong> tab, then select the webcam you want to use from the <strong>Choose the camera you want to use</strong> drop-down menu.")?></div>

                                <div><?php _text("If you can’t see the camera you want to use in the drop-down list, reinstall the latest device drivers from the manufacturer’s website.")?></div>

                                    <div><img src="<?php img_e() ?>testing/5.png"></div>


                            </div>

                                <strong><?php _text("Is another application using your webcam?")?></strong>
                            <div><?php _text("Close all applications that may be using the webcam. These include video-editing software, virtual-camera software, instant messengers, and browsers (such as Internet Explorer).")?></div>
                            <div><?php _text("xAlso, if your camera isn't integrated into your computer, try to plug the camera to another USB slot or unplug other unused devices that share the same USB slot as your camera. If you are trying to change your camera during the call and experience an error message, try to end the call, change the camera and restart the call.")?>


                                <strong>Is there a problem with your webcam drivers?</strong>
                                <div><?php _text("Check that your webcam is listed in Device Manager.")?></div>
                                <div><?php _text("1. Depending on your version of Windows:")?></div>


                                <div class="indent">
                                    <div>• <strong><?php _text("Windows 7")?></strong>: <?php _text("Click the Windows button and select <strong>Control Panel</strong>. Make sure that <strong>Category</strong> is selected in the top right corner, next to View by:. Click <strong>Hardware</strong> <strong>and Sound</strong>. Under Devices and Printers, select <strong>Device Manager</strong>. Click the little arrow beside <strong>Imaging Devices</strong>.")?></div>


                                    <div>• <strong><?php _text("Windows Vista")?></strong>: <?php _text("Open the <strong>Start</strong> menu and select <strong>Control Panel</strong>. Open <strong>System and Maintenance</strong> and click <strong>Device Manager</strong>.")?></div>

                                    <div>• <strong><?php _text("Windows XP")?></strong>: <?php _text("Open the <strong>Start</strong> menu and select <strong>Control Panel</strong>. Open <strong>System</strong> and, in the <strong>Hardware</strong> tab, click <strong>Device Manager</strong>.")?></div>


                                <div><?php _text("2. Check that your webcam is listed under <strong>Imaging devices</strong>.")?></div>

                                <img src="<?php img_e() ?>testing/6.png"><br>

                                    <div><?php _text("If it’s not listed, or if a question or exclamation mark is displayed, you need to reinstall the drivers for your webcam.")?></div>

                                </div>
                                <div><strong><?php _text("Are your webcam drivers loading?")?></strong></div>

                            <div><?php _text("To let your webcam drivers load, you need to change the start-up settings of Skype:")?></div>

                            <div class="indent">
                                <?php _text("1. Sign out of Skype by clicking <strong>Skype</strong> &gt; <strong>Sign Out</strong> in the menu bar.")?>
                                <div><?php _text("2. In the <strong>Welcome to Skype</strong> window, uncheck the <strong>Sign me in when Skype starts</strong> option.")?></div>
                                <img src="<?php img_e() ?>testing/7.png">

                                <div><?php _text("3. Restart your computer.")?></div></div>

                            <div><?php _text("Sign in to Skype and make a video call.")?></div>

                            <strong><?php _text("Are you using an old version of DirectX?")?></strong>
                                <div><?php _text("Make sure that you have the latest version of Microsoft DirectX. For Windows Vista and Windows 7, you can get the latest version of DirectX by updating Windows with the <strong>latest <a href='http://windowsupdate.microsoft.com/' target='_blank'>service packs and updates</a></strong>.<br>
                            For Windows XP, you can download it <a href='http://www.microsoft.com/downloads/en/details.aspx?FamilyID=2da43d38-db71-4c1b-bc6a-9b6652cd92a3' target='_blank'><strong>here</strong></a>.")?></div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="line-faq">
                <div class="title">
                    <?php _text('How can I test my sound is working properly')?>
                    <div class="desc">
                        <div class="contents">
                            <div class="answer">
                                <?php _text("If you want to practice making a call and check that your speakers and microphone are working properly in Skype, you can <strong>make a test call to our friendly assistant Echo</strong>. She will prompt you to record a message, and then play it back for you – so you’ll know right away if your sound is working.")?></div>

                                <div class="indent">
                                    <strong><?php _text("1. Plug in your speakers and microphone")?></strong>
                                    <div><?php _text("If you’re using your device’s built-in speakers and microphone, you don’t need to plug anything in – but if you’re using a separate mic, speakers or a headset, make sure they’re <strong>plugged in and switched on</strong>.")?></div>
                                    <strong><?php _text("2. Find the Skype sound test service")?></strong>
                                    <div><?php _text("Sign into Skype and look in your contact list for <strong>Echo/Sound Test Service</strong>. If you don’t see her in your contact list, type <strong>echo123</strong> into the search field and click <strong>Search Skype</strong>. She will show up as Echo/Sound Test Service.")?></div>
                                    <img src="<?php img_e() ?>testing/8.png"><br>
                                    <strong><?php _text("3. Call")?></strong><br>
                                    <div><?php _text("In the calling pane, click <strong>Call</strong>.")?></div>
                                    <img src="<?php img_e() ?>testing/9.png">
                                    <div><?php _text("<strong>4. Follow the instructions you hear</strong>")?></div>
                                    <div><?php _text("Your new friend Echo will ask you to record a message, and then will play your message back to you.")?></div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>