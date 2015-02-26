

var args = require('system').args;
var page = require('webpage').create();
var url = args[1] ;
var filePath = args[2] ;

page.open(url, function() {
   // page.settings.userAgent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.6; rv:7.0.1) Gecko/20100101 Firefox/7.0.1';
    page.settings.userAgent = 'WebKit/534.46 Mobile/9A405 Safari/7534.48.3';
    page.viewportSize = {width: 1400, height: 800 };
    page.render(filePath, {format: 'JPG', quality: '100'});
    phantom.exit();
});