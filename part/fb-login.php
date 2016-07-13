<?php


# Start the session
session_start();

# Autoload the required files

# Set the default parameters
ob_start(); opt('lms[facebook_app_id]'); $app_id = ob_get_clean();
ob_start(); opt('lms[facebook_app_secret]'); $app_secret = ob_get_clean();
ob_start(); opt('lms[facebook_api_version]'); $default_graph_version = ob_get_clean();


$fb = new Facebook\Facebook([
    'app_id' => $app_id,
    'app_secret' => $app_secret,
    'default_graph_version' => $default_graph_version,
]);

$redirect = home_url();
# Create the login helper object
$helper = $fb->getRedirectLoginHelper();

# Get the access token and catch the exceptions if any
try {
    $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

# If the
if (isset($accessToken)) {
    // Logged in!
    // Now you can redirect to another page and use the
    // access token from $_SESSION['facebook_access_token']
    // But we shall we the same page

    // Sets the default fallback access token so
    // we don't have to pass it to each request
    $fb->setDefaultAccessToken($accessToken);

    try {
        $response = $fb->get('/me?fields=email,name');
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


    // Print the user Details
    echo "Welcome !<br><br>";
    echo 'Name: ' . $userNode->getName().'<br>';
    echo 'User ID: ' . $userNode->getId().'<br>';
    echo 'Email: ' . $userNode->getField('email').'<br><br>';

    $image = 'https://graph.facebook.com/'.$userNode->getId().'/picture?width=200';
    echo "Picture<br>";
    echo "<img src='$image' /><br><br>";

}else{
    $permissions  = ['email'];
    $loginUrl = $helper->getLoginUrl($redirect,$permissions);
    echo '<a class="btn btn-secondary" href="' . $loginUrl . '">Log in with Facebook!</a>';
}
