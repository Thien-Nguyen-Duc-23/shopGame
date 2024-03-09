function AddCommas(nStr) {
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}

function generatePassword() {
    var length = 14;
    var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    var retVal = "";
    for (var i = 0, n = charset.length; i < length; ++i) {
        retVal += charset.charAt(Math.floor(Math.random() * n));
    }
    return retVal;
}

function alertifyNote(error, message) {
    alertify.logPosition("top right");
    alertify.log("top right");
    if (error) {
        alertify.error(message);
    } else {
        alertify.success(message);
    }

}

function removeCharHtml(plainText)
{
    var arr = [
        "\"", "\'", "`", "~", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")",
        "-", "+", "_", "=", "|", "{", "}", "[", "]", ":", ";", "<",
        ">", "?", "/"
    ];
    for (let index = 0; index < arr.length; index++) {
        plainText = plainText.replaceAll(arr[index], "");

    }
    // Loại bỏ các thẻ HTML
    // Loại bỏ các ký tự JavaScript
    if ( typeof(plainText) !== 'undefined' ) {
        plainText = plainText.replace(/<script[^>]*>([\s\S]*?)<\/script>/gi, "");
    }
    else {
        plainText = '';
    }

    return plainText;
}
