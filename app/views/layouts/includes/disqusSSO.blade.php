<?php

if ($user = Auth::user()) {

    $data = [
        "id"       => $user->id,
        "username" => $user->username,
        "email"    => $user->email
    ];

    function dsq_hmacsha1($data, $key) {
        $blocksize=64;
        $hashfunc='sha1';
        if (strlen($key)>$blocksize)
            $key=pack('H*', $hashfunc($key));
        $key=str_pad($key,$blocksize,chr(0x00));
        $ipad=str_repeat(chr(0x36),$blocksize);
        $opad=str_repeat(chr(0x5c),$blocksize);
        $hmac = pack(
                    'H*',$hashfunc(
                        ($key^$opad).pack(
                            'H*',$hashfunc(
                                ($key^$ipad).$data
                            )
                        )
                    )
                );
        return bin2hex($hmac);
    }

    $message = base64_encode(json_encode($data));
    $timestamp = time();
    $hmac = dsq_hmacsha1($message . ' ' . $timestamp, Config::get('site.DISQUS_SECRET_KEY'));

?>

<script type="text/javascript">
var disqus_config = function() {
    this.page.remote_auth_s3 = "<?php echo "$message $hmac $timestamp"; ?>";
    this.page.api_key = "<?php echo Config::get('site.DISQUS_PUBLIC_KEY'); ?>";

// This adds the custom login/logout functionality
    this.sso = {
        name:   "Laravel Korea",
        url:        "https://www.laravel.co.kr/login/",
        logout:  "https://www.laravel.co.kr/logout/",
    };
}
</script>
<?php } ?>
