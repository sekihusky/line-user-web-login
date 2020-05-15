<?php
class LineController {

    private $lineConfig;

    public function __construct() {
        $config = new ConfigManager();
        $config->setRedirectUri(REDIRECT_URI)
        ->setScope(SCOPE)
        ->setClientSecret(CLIENT_SECRET)
        ->setClientId(CLIENT_ID);
        $this->lineConfig = $config;
    }

    public function lineLogin($state) {

		$parameter = [
            'response_type' => 'code',
            'client_id' => CLIENT_ID,
            'state' => $state
        ];

        $host = "https://access.line.me/oauth2/v2.1/authorize" ;
		
		$url = $host . "?" . http_build_query($parameter) . "&scope=". SCOPE . "&redirect_uri=" . REDIRECT_URI;

        return $url;
    }

    /**
     * 取得使用者資訊 access_token
     *
     */
    public function getLineProfile_access_token($access_token) {
        $lineProfile = new LineProfiles($this->lineConfig);
        $profile = $lineProfile->getLineProfile_access_token($access_token);
        return $profile;
    }

    /**
     * 以$code取得access_token
     */
    public function getAccessToken($code) {
        $lineProfile = new LineProfiles($this->lineConfig);
        $profile = $lineProfile->getAccessToken($code);
        return $profile;
    }
}