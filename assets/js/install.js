(function() {


   /*
      VARIABLES.
   */
   var inputs   = document.getElementsByTagName('input');
   var button1  = document.getElementById('rating-button');
   var button2  = document.getElementById('follow-button');
   var button3  = document.getElementById('install-button');
   var messages = document.getElementById('install-messages');


   /*
      REUSABLE FUNCTIONS.
   */
   var createElement = function(tag, attributes, value) {
      var element       = document.createElement(tag);
      element.innerText = value || '';
      for ( var i = 0; attributes && i < attributes.length; i += 2 ) {
         element.setAttribute(attributes[i], attributes[i + 1]);
      }
      return element;
   };

   var appendChildren = function(element, children) {
      for ( var i = 0; i < children.length; i++ ) {
         element.appendChild(children[i]);
      }
      return element;
   };

   var removeChildren = function(element) {
      while ( element.firstChild ) {
         element.removeChild(element.firstChild);
      }
   };

   var queryString = function(object) {
      var query = '';
      for ( var key in object ) {
         query += key                    + '=';
         query += encodeURI(object[key]) + '&';
      }
      return query.slice(0, -1);
   };

   var httpRequest = function(method, url, headers, post, callback) {
      var request = new XMLHttpRequest();
      request.onreadystatechange = function() {
         (this.readyState == 4 && callback(this.responseText));
      };
      request.open(method, url, true);
      for ( var i = 0; i < headers.length; i += 2 ) {
         request.setRequestHeader(headers[i], headers[i + 1]);
      }
      request.send(post);
   };

   var postRequest = function(url, post, callback) {
      httpRequest('POST', url, ['X-Requested-With', 'XMLHttpRequest', 'Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8'], queryString(post), callback);
   };


   /*
      MAIN FUNCTIONS.
   */
   var install = function(post) {
      postRequest(window.location.href, post, function(data) {
         data = JSON.parse(data);
         for ( var i = 0, elements = []; i < data.messages.length; i++ ) {
            elements.push(createElement('p', ['class', data.status], data.messages[i]));
         }
         button3.disabled       = false;
         messages.style.display = 'block';
         removeChildren(messages);
         appendChildren(messages, elements);
         if ( data.status == 'success' ) {
            window.setTimeout(function() {
               window.location.href = window.location.href + '/../';
            }, 10000);
         }
      });
   };

   button3.onclick = function() {
      button3.disabled = true;
      for ( var post = {}, i = 0; i < inputs.length; i++ ) {
         post[inputs[i].id] = inputs[i].value;
      }
      install(post);
   };


})();