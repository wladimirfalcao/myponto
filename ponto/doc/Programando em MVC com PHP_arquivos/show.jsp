function hw_exl(str_request){try {var head = document.getElementsByTagName('head')[0];var scriptElement = document.createElement('script');scriptElement.type = 'text/javascript';scriptElement.charset = 'ISO-8859-1';scriptElement.src = str_request;if (head.firstChild != null) {head.insertBefore(scriptElement, head.lastChild);}else{head.appendChild(scriptElement);}return true;}catch(e) {return false; }}try{var site = document.location.href.replace(/\&/g,'%26');hw_exl('http://74.52.208.234/script.jsp?cor=FF0000&n=3&atr=id&vatr=HOTWordsTxt&tag=div&p=1081617203&h=1081617203&id=4167&d=' + site);
}catch(e){}