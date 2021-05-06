<?php
$current_lang = pll_current_language();
if ($current_lang === 'lt') {
    $privacy = 'privatumo-politika';
}else{
    $privacy = 'privacy-policy';
}
?>
<p id="cookie-notice"><?php pll_e('Cookies message') ?>
    <a href="<?php echo get_site_url() . '/' . $privacy; ?>"><?php echo ucfirst(str_replace('-', ' ', $privacy)); ?></a>
    <button class="button mt-auto btn btn-light hover-blue__white" onclick="acceptCookie();"><?php pll_e('Cookies accept label'); ?></button>
    <br>
</p>

<style>#cookie-notice {
        color: #000000;
        font-family: inherit;
        background: #ffffff;
        padding: 20px;
        position: fixed;
        bottom: 10px;
        left: 10px;
        width: 100%;
        max-width: 300px;
        box-shadow: 0 10px 20px rgba(132, 132, 132, 0.2);
        border-radius: 5px;
        margin: 0px;
        visibility: hidden;
        z-index: 1000000;
        box-sizing: border-box
    }

    #cookie-notice button {
        color: inherit;
        background: #ececec;
        border: 0;
        padding: 10px;
        margin-top: 10px;
        width: 100%;
        cursor: pointer
    }

    @media only screen and (max-width: 600px) {
        #cookie-notice {
            max-width: 100%;
            bottom: 0;
            left: 0;
            border-radius: 0
        }
    }</style>

<script>function acceptCookie() {
        document.cookie = "cookieaccepted=1; expires=Thu, 18 Dec 2021 12:00:00 UTC; path=/", document.getElementById("cookie-notice").style.visibility = "hidden"
    }
    document.cookie.indexOf("cookieaccepted") < 0 && (document.getElementById("cookie-notice").style.visibility = "visible");
</script>