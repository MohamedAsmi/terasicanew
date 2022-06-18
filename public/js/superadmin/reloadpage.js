if($('.senderDeleteOrUpdate img').length || $('.closechatButton').length <= 0 ){
    Getchar();
}

setTimeout(function () {
    loadContent();
}, 5000);