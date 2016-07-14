<?php


# Set the default parameter
/*
ob_start(); opt('lms[facebook_app_id]'); $app_id = ob_get_clean();
ob_start(); opt('lms[facebook_app_secret]'); $app_secret = ob_get_clean();
ob_start(); opt('lms[facebook_api_version]'); $default_graph_version = ob_get_clean();
*/

$app_id = get_opt( 'lms[facebook_app_id]' );
$app_secret = get_opt('lms[facebook_app_secret]');
$default_graph_version = get_opt('lms[facebook_api_version]');


if ( empty( $app_id ) || empty( $app_secret ) || empty( $default_graph_version ) ) return;


# Start the session
session_start();

    $redirect = home_url() . '/user-log-in';
    $fb = new Facebook\Facebook([
        'app_id' => $app_id,
        'app_secret' => $app_secret,
        'default_graph_version' => $default_graph_version,
    ]);


# Create the login helper object
    $helper = $fb->getRedirectLoginHelper();

# Get the access token and catch the exceptions if any
    try {
        $accessToken = $helper->getAccessToken();
        di($accessToken);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

# If Logged in!
    if (isset($accessToken)) {
        // Logged in!
        // Now you can redirect to another page and use the
        // access token from $_SESSION['facebook_access_token']
        // But we shall we the same page

        // Sets the default fallback access token so
        // we don't have to pass it to each request
        $fb->setDefaultAccessToken($accessToken);

        try {
            $response = $fb->get('/me?fields=email,name,id,first_name');
            $userNode = $response->getGraphUser();
        }catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        di($userNode); //check what the $userNode contains


        // Print the user Details $user['name'] or $user->getName()
        echo "Welcome !<br><br>";
        echo 'Name: ' . $userNode->getName().'<br>';
        echo 'User ID: ' . $userNode->getId().'<br>';
        echo 'Email: ' . $userNode->getField('email').'<br>';
        echo 'FirstName: ' . $userNode->getFirstName().'<br><br>';

        /**
         * @todo
         * if accepted
         * check if the email exist
         *
         *
         * if email exist
         * ->link the fb account to the email that exist
         *
         *
         * if email doesn't exist
         * ->add the user with the email
         * ->to consider what would be the user ID since the response user ID from facebook is numerical  i.e. ****User ID: 10208090123456789
         *
         */

    }else{
        $permissions  = ['email'];
        $loginUrl = $helper->getLoginUrl($redirect,$permissions);
        echo '<div class="login-api">';
        echo '<div>or</div>';
        echo '<a class="btn btn-secondary" href="' . $loginUrl . '">Log in with Facebook!</a>';
        echo '</div>';
    }

